<?php
class ColData {
	public static $tablename = "col";


	public function ColData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name,width,ref_table_field,suggest,label,placeholder,position,type,is_required,tbl_id,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->width\",$this->ref_table_field,\"$this->suggest\",\"$this->label\",\"$this->placeholder\",\"$this->position\",\"$this->type\",\"$this->is_required\",$this->tbl_id,$this->created_at)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ColData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",width=\"$this->width\",ref_table_field=$this->ref_table_field,suggest=\"$this->suggest\",label=\"$this->label\",placeholder=\"$this->placeholder\",position=\"$this->position\",type=\"$this->type\",is_required=\"$this->is_required\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ColData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ColData());
	}


	public static function getAllByTblId($id){
		$sql = "select * from ".self::$tablename." where tbl_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ColData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ColData());
	}


}

?>