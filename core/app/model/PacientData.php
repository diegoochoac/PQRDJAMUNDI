<?php
class PacientData
{
	public static $tablename = "pacient";
	public function PacientData()
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
		$sql = "insert into " . self::$tablename . " (name,lastname,typedoc,numdoc,day_of_birth,age,typepobla,typepobla2,gender,gender2,typedisca,phone,phonecel,address,address2,address3,address4,email,eps,typereg,extranjero,extranjerostate,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->typedoc\",\"$this->numdoc\",\"$this->day_of_birth\",\"$this->age\",\"$this->typepobla\",\"$this->typepobla2\",\"$this->gender\",\"$this->gender2\",\"$this->typedisca\",\"$this->phone\",\"$this->phonecel\",\"$this->address\",\"$this->address2\",\"$this->address3\",\"$this->address4\",\"$this->email\",\"$this->eps\",\"$this->typereg\",\"$this->extranjero\",\"$this->extranjerostate\",$this->created_at)";
		//echo $sql;
		try {
			Executor::doit($sql);
			Core::alert("Creado exitosamente!");
		} catch (Exception $e) {
			echo "ERROR ADD PACIENT: " . $e;
			Core::alert("Error!");
		}
	}

	public static function addForce($pacienid, $namea, $lastnamea, $typedoca, $numdoca, $phone1a, $phone2a, $emaila, $gender, $day_of_birth, $age, $gender2, $disca, $address, $address2, $address3, $address4, $eps, $regimen, $extranjero, $extranjerostate, $tipopoblacion)
	{
		$sql = "insert into " . self::$tablename . " (name,lastname,typedoc,numdoc,phone,phonecel,email,id_pacientp,gender,day_of_birth,age,gender2,typedisca,address,address2,address3,address4,eps,typereg,extranjero,extranjerostate,typepobla,created_at ) ";
		$sql .= "value (\"$namea\",\"$lastnamea\",\"$typedoca\",$numdoca,\"$phone1a\",\"$phone2a\",\"$emaila\",$pacienid,\"$gender\",\"$day_of_birth\",\"$age\",\"$gender2\",\"$disca\",\"$address\",\"$address2\",\"$address3\",\"$address4\",\"$eps\",\"$regimen\",\"$extranjero\",\"$extranjerostate\",\"$tipopoblacion\",NOW())";
		//echo $sql;
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

	// partiendo de que ya tenemos creado un objecto PacientData previamente utilizamos el contexto
	public function update_active()
	{
		$sql = "update " . self::$tablename . " set last_active_at=NOW() where id=$this->id";
		Executor::doit($sql);
	}


	public function update()
	{
		$sql = "update " . self::$tablename . " set name=\"$this->name\",lastname=\"$this->lastname\",typedoc=\"$this->typedoc\",numdoc=\"$this->numdoc\",day_of_birth=\"$this->day_of_birth\",age=\"$this->age\",typepobla=\"$this->typepobla\",typepobla2=\"$this->typepobla2\",gender=\"$this->gender\",gender2=\"$this->gender2\",typedisca=\"$this->typedisca\",phone=\"$this->phone\",phonecel=\"$this->phonecel\",address=\"$this->address\",address2=\"$this->address2\",address3=\"$this->address3\",address4=\"$this->address4\",email=\"$this->email\",eps=\"$this->eps\",typereg=\"$this->typereg\",extranjero=\"$this->extranjero\",extranjerostate=\"$this->extranjerostate\" where id=$this->id";
		//echo $sql;
		try {
			Executor::doit($sql);
			Core::alert("Creado exitosamente!");
		} catch (Exception $e) {
			echo "ERROR ADD PACIENT: " . $e;
			Core::alert("Error!");
		}
	}

	public static function getById($id)
	{
		$sql = "select * from " . self::$tablename . " where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0], new PacientData());
	}


	public static function getAll()
	{
		$sql = "select * from " . self::$tablename . " order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0], new PacientData());
	}

	public static function getAllActive()
	{
		$sql = "select * from client where last_active_at>=date_sub(NOW(),interval 3 second)";
		$query = Executor::doit($sql);
		return Model::many($query[0], new PacientData());
	}

	public static function getAllUnActive()
	{
		$sql = "select * from client where last_active_at<=date_sub(NOW(),interval 3 second)";
		$query = Executor::doit($sql);
		return Model::many($query[0], new PacientData());
	}

	public static function getBySQL($sql)
	{
		$query = Executor::doit($sql);
		return Model::many($query[0], new PacientData());
	}

	public static function getByCC($id)
	{
		$sql = "select * from " . self::$tablename . " where numdoc=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0], new PacientData());
	}
	//public function getUnreads(){ return MessageData::getUnreadsByClientId($this->id); }


	public static function getLike($q)
	{
		$sql = "select * from " . self::$tablename . " where title like '%$q%' or email like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0], new PacientData());
	}
}
