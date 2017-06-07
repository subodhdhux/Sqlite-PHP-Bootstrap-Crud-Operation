<?php 
namespace Myclasses\Crud;
//require "DB.php";
use Myclasses\Connect\Connect;

class Crud extends Connect
{
	function __construct()
	{
		parent::__construct();
	}

	function insert($table = 'tasks',$data)
	{
		if(empty($data))
			return false;

		$k = array();
		$v = array();

		foreach($data as $key => $value)
		{
			$k[] = $this->filter($key);
			$v[] = "'".$this->filter($value)."'";
		}

		$fields = implode(',', $k);
		$values = implode(',', $v);

		$query = "INSERT INTO $table ($fields) VALUES ($values)";
		if( $this->db->exec($query) )
			return true;
		else
			return false;
	}

	function update($table = 'tasks',$id,$data)
	{
		if(empty($data) OR empty($id) OR empty($this->getOne('tasks',$id)))
			return false;

		$query = "UPDATE $table set ";

		foreach($data as $key => $value)
		{
			$query.=$key."='".$this->filter($value)."',";
		}

		$query = substr($query, 0 , -1);
		$query.= " WHERE id = $id";

		if( $this->db->exec($query) )
			return true;
		else
			return false;
	}

	function delete($table , $id)
	{
		if( empty($id) OR empty($this->getOne('tasks',$id)))
			return false;
		
		$query = "DELETE FROM $table WHERE id = $id";

		if( $this->db->query($query) )
			return true;
		else 
			return false;
	}

	function getAll($table = 'tasks',$fields)
	{
		$result = $this->db->query("SELECT * FROM $table");

		$res = array();
		$sn = 0;
		while ($row = $result->fetchArray()) {

			if(!empty($fields))
			{
				foreach($fields as $field)
				{
					$res[$sn][$field] = $row[$field];	
				}
			}

			$sn++;
		}

		return $res;
	}

	function getOne($table = 'tasks', $id)
	{
		if( empty($id) )
			return false;

		$result = $this->db->querySingle("SELECT * FROM $table  WHERE id = $id", true);
		return ($result);
	}

	function filter($value)
	{
		$value = trim($value);
		$value = stripslashes($value);
		$value = htmlspecialchars($value);
		return $value;
	}

}