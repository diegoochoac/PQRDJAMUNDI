<?php
class ReservationData {
	public static $tablename = "reservation";


	public function ReservationData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getPacient(){ return PacientData::getById($this->pacient_id); }
	public function getMedic(){ return MedicData::getById($this->funci_id1); }
	public function getStatus(){ return StatusData::getById($this->status_id); }
	public function getPayment(){ return PaymentData::getById($this->payment_id); }


	function sumasdiasemana($fecha,$dias)
	{
		$datestart= strtotime($fecha);
		$datesuma = 15 * 86400;
		$diasemana = date('N',$datestart);
		$totaldias = $diasemana+$dias;
		$findesemana = intval( $totaldias/5) *2 ; 
		$diasabado = $totaldias % 5 ; 
		if ($diasabado==6) $findesemana++;
		if ($diasabado==0) $findesemana=$findesemana-2;
	 
		$total = (($dias+$findesemana) * 86400)+$datestart ; 
		return $fechafinal = date('Y-m-d', $total);
	}
	


	public function add(){
		
		// $sumarDias=1;
		// $entre1 = sumasdiasemana(date("Y-m-d"),$sumarDias);
		// echo $entre1 ;
		$fecha = date("Y-m-d");
		$dias=15;
		$datestart= strtotime($fecha);
		$datesuma = 15 * 86400;
		$diasemana = date('N',$datestart);
		$totaldias = $diasemana+$dias;
		$findesemana = intval( $totaldias/5) *2 ; 
		$diasabado = $totaldias % 5 ; 
		if ($diasabado==6) $findesemana++;
		if ($diasabado==0) $findesemana=$findesemana-2;
	 
		$fechatotal = (($dias+$findesemana) * 86400)+$datestart ; 
		$fechatotal = date('Y-m-d', $fechatotal);
		//echo $fechatotal;
		
		$sql = "insert into reservation (user_id,date_at,description,diagnostico,typecase,typeevent,conafec,numrad,encontrol,orpeticion,funci_id1,funci_id2,chcomun,atrcalidad,pacient_id,pacientp_id,status_id,created_at,end_at) ";
		$sql .= "value ($this->user_id,\"$this->date_at\",\"$this->description\",\"$this->diagnostico\",\"$this->typecase\",\"$this->typeevent\",\"$this->conafec\",\"$this->numrad\",\"$this->encontrol\",\"$this->orpeticion\",\"$this->funci_id1\",\"$this->funci_id2\",\"$this->chcomun\",\"$this->atrcalidad\",$this->pacient_id,$this->pacientp_id,\"$this->status_id\",$this->created_at, \"$fechatotal\")";
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

// partiendo de que ya tenemos creado un objecto ReservationData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",pacient_id=\"$this->pacient_id\",medic_id=\"$this->medic_id\",date_at=\"$this->date_at\",time_at=\"$this->time_at\",note=\"$this->note\",SISNET=\"$this->SISNET\",symtoms=\"$this->symtoms\",medicaments=\"$this->medicaments\",status_id=\"$this->status_id\",payment_id=\"$this->payment_id\",price=\"$this->price\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReservationData());
	}

	public static function getEndId(){
		//"“SELECT MAX(id) AS id FROM tabla”
		$sql = "select MAX(id) As id FROM reservation";
		//echo $sql;
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReservationData());
	}

	public static function getRepeated($pacient_id,$medic_id,$date_at,$time_at){
		$sql = "select * from ".self::$tablename." where pacient_id=$pacient_id and medic_id=$medic_id and date_at=\"$date_at\" and time_at=\"$time_at\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReservationData());
	}



	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where mail=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ReservationData());
	}

	public static function getEvery(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." where date(date_at)>=date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getAllDATA(){
		//$sql = "select * from ".self::$tablename." order by created_at asc";
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getAllPendings(){
		$sql = "select * from ".self::$tablename." where date(date_at)>=date(NOW()) and status_id=1 and payment_id=1 order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}


	public static function getAllByPacientId($id){
		$sql = "select * from ".self::$tablename." where pacient_id=$id order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getAllByMedicId($id){
		$sql = "select * from ".self::$tablename." where funci_id1=$id order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}

	public static function getOld(){
		$sql = "select * from ".self::$tablename." where date(date_at)<date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ReservationData());
	}


}
