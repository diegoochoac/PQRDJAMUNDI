<?php
class HistoryReservationData {
	public static $tablename = "historyreservation";


	public function HistoryReservationData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	// public function getPacient(){ return PacientData::getById($this->pacient_id); }
	// public function getMedic(){ return MedicData::getById($this->medic_id); }
	// public function getStatus(){ return StatusData::getById($this->status_id); }
	// public function getPayment(){ return PaymentData::getById($this->payment_id); }

	public function add(){
		// $sql = "insert into reservation (title,note,medic_id,date_at,time_at,pacient_id,user_id,price,status_id,payment_id,sick,symtoms,medicaments,created_at) ";
		// $sql .= "value (\"$this->title\",\"$this->note\",\"$this->medic_id\",\"$this->date_at\",\"$this->time_at\",$this->pacient_id,$this->user_id,\"$this->price\",$this->status_id,$this->payment_id,\"$this->sick\",\"$this->symtoms\",\"$this->medicaments\",$this->created_at)";
		$sql = "insert into historyreservation (tiposeguimiento,diagnostico,llamada,estado,tipoevento,descripcion,reservation_id,created_at) ";
		$sql .= "value (\"$this->tiposeguimiento\",\"$this->diagnostico\",\"$this->llamada\",\"$this->estado\",\"$this->tipoevento\",\"$this->descripcion\",\"$this->reservation_id\",$this->created_at)";

		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto HistoryReservationData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",pacient_id=\"$this->pacient_id\",medic_id=\"$this->medic_id\",date_at=\"$this->date_at\",time_at=\"$this->time_at\",note=\"$this->note\",SISNET=\"$this->SISNET\",symtoms=\"$this->symtoms\",medicaments=\"$this->medicaments\",status_id=\"$this->status_id\",payment_id=\"$this->payment_id\",price=\"$this->price\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new HistoryReservationData());
	}

	public static function getByIdReservation($id){
		$sql = "select * from ".self::$tablename." where reservation_id=$id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HistoryReservationData());
	}

	public static function getRepeated($reservation_id){
		$sql = "select * from ".self::$tablename." where reservation_id=$reservation_id ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new HistoryReservationData());
	}

	public static function getEvery(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new HistoryReservationData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." where date(date_at)>=date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HistoryReservationData());
	}

	public static function getAllDATA(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HistoryReservationData());
	}

	public static function getAllPendings(){
		$sql = "select * from ".self::$tablename." where date(date_at)>=date(NOW()) and status_id=1 and payment_id=1 order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HistoryReservationData());
	}


	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new HistoryReservationData());
	}

	public static function getOld(){
		$sql = "select * from ".self::$tablename." where date(date_at)<date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HistoryReservationData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HistoryReservationData());
	}


}

?>