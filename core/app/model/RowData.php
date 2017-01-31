<?php
class RowData {
	public static $tablename = "row";


	public function RowData(){
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (val,col_id,entry_id,created_at) ";
		$sql .= "value (\"$this->val\",$this->col_id,$this->entry_id,NOW())";
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

// partiendo de que ya tenemos creado un objecto RowData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",content=\"$this->content\",image=\"$this->image\",is_public=\"$this->is_public\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new RowData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new RowData());
	}


	public static function getAllByEntryId($id){
		$sql = "select * from ".self::$tablename." where entry_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new RowData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new RowData());
	}


}

?>