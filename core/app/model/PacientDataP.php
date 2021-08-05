<?php
class PacientDataP
{
	public static $tablename = "pacientp";
	public function PacientDataP()
	{
		$this->title = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add()
	{
		// $sql = "insert into ".self::$tablename." (name,lastname,cc,gender,day_of_birth,address,phone,email,sick,medicaments,alergy,created_at) ";
		// $sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->cc\",\"$this->gender\",\"$this->day_of_birth\",\"$this->address\",\"$this->phone\",\"$this->email\",\"$this->sick\",\"$this->medicaments\",\"$this->alergy\",$this->created_at)";
		$sql = "insert into " . self::$tablename . " (namepeticionario,lastnamepeticionario,typedocpeticionario,ccpeticionario,phone1peticionario,phone2peticionario,emailpeticionario,name,lastname,typedoc,cc,gender,day_of_birth,age,gender2,disca,address,address2,phone,phonecel,eps,regimen,extranjero,extranjerostate,email,created_at,tipopoblacion) ";
		$sql .= "value (\"$this->namepeticionario\",\"$this->lastnamepeticionario\",\"$this->typedocpeticionario\",\"$this->ccpeticionario\",\"$this->phone1peticionario\",\"$this->phone2peticionario\",\"$this->emailpeticionario\",\"$this->name\",\"$this->lastname\",\"$this->typedoc\",\"$this->cc\",\"$this->gender\",\"$this->day_of_birth\",\"$this->age\",\"$this->gender2\",\"$this->disca\",\"$this->address\",\"$this->address2\",\"$this->phone\",\"$this->phonecel\",\"$this->eps\",\"$this->regimen\",\"$this->extranjero\",\"$this->extranjerostate\",\"$this->email\",$this->created_at,$this->tipopoblacion)";
		try {
			Executor::doit($sql);
		} catch (Exception $e) {
			echo "ERROR ADD PACIENT: " . $e;
		}
	}

	public static function addForce($nameq, $lastnameq, $typedocq, $numdocq, $phone1q, $phone2q, $emailq)
	{
		$sql = "insert into " . self::$tablename . " (name,lastname,typedoc,numdoc,phone1,phone2,email) ";
		$sql .= "value (\"$nameq\",\"$lastnameq\",\"$typedocq\",$numdocq,\"$phone1q\",\"$phone2q\",\"$emailq\")";
		try {
			
			Executor::doit($sql);
		} catch (Exception $e) {
			echo "ERROR ADD PACIENT: " . $e;
		}
	}

	public static function delById($id)
	{
		$sql = "delete from " . self::$tablename . " where id=$id";
		Executor::doit($sql);
	}
	public function del()
	{
		$sql = "delete from " . self::$tablename . " where id=$this->id";
		Executor::doit($sql);
	}

	// partiendo de que ya tenemos creado un objecto PacientDataP previamente utilizamos el contexto
	public function update_active()
	{
		$sql = "update " . self::$tablename . " set last_active_at=NOW() where id=$this->id";
		Executor::doit($sql);
	}


	public function update()
	{
		$sql = "update " . self::$tablename . " set name=\"$this->name\",lastname=\"$this->lastname\",address=\"$this->address\",phone=\"$this->phone\",email=\"$this->email\",gender=\"$this->gender\",day_of_birth=\"$this->day_of_birth\",sick=\"$this->sick\",medicaments=\"$this->medicaments\",alergy=\"$this->alergy\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id)
	{
		$sql = "select * from " . self::$tablename . " where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0], new PacientDataP());
	}


	public static function getAll()
	{
		$sql = "select * from " . self::$tablename . " order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0], new PacientDataP());
	}

	public static function getAllActive()
	{
		$sql = "select * from client where last_active_at>=date_sub(NOW(),interval 3 second)";
		$query = Executor::doit($sql);
		return Model::many($query[0], new PacientDataP());
	}

	public static function getAllUnActive()
	{
		$sql = "select * from client where last_active_at<=date_sub(NOW(),interval 3 second)";
		$query = Executor::doit($sql);
		return Model::many($query[0], new PacientDataP());
	}

	public static function getBySQL($sql)
	{
		$query = Executor::doit($sql);
		return Model::many($query[0], new PacientDataP());
	}

	public static function getByCC($id)
	{
		$sql = "select * from " . self::$tablename . " where numdoc=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0], new PacientDataP());
	}
	//public function getUnreads(){ return MessageData::getUnreadsByClientId($this->id); }


	public static function getLike($q)
	{
		$sql = "select * from " . self::$tablename . " where title like '%$q%' or email like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0], new PacientDataP());
	}
}
