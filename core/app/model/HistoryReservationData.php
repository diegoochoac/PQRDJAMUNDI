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
		$sql = "insert into historyreservation (rad,rad_prorroga,f_prorroga,f_cierre,tiposeguimiento,diagnostico,llamada,estado,rad_cierre,rad_traslado,f_traslado,entidadtraslado,tipoevento,descripcion,reservation_id,created_at) ";
		$sql .= "value (\"$this->rad\",\"$this->rad_prorroga\",\"$this->f_prorroga\",\"$this->f_cierre\",\"$this->tiposeguimiento\",\"$this->diagnostico\",\"$this->llamada\",\"$this->estado\",\"$this->rad_cierre\",\"$this->rad_traslado\",\"$this->f_traslado\",\"$this->entidadtraslado\",\"$this->tipoevento\",\"$this->descripcion\",\"$this->reservation_id\",$this->created_at)";
		//echo $sql;
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
