<?php
/**
 * Created by PhpStorm.
 * User: marcondes.vinicius
 */

class CRUD{
    private $db_ip,$user,$passwd,$db_name,$sql,$result,$conn;

    public function CRUD($db_ip,$user,$passwd,$db_name){
        $this->db_ip = $db_ip;
        $this->user = $user;
        $this->passwd = $passwd;
        $this->db_name = $db_name;
    }

    public function printData(){
        echo $this->db_ip."<br>".$this->user."<br>".$this->passwd."<br>".$this->db_name."<br>".$this->sql."<br>".$this->result;
    }

    public function conn(){
        $this->conn = new mysqli($this->db_ip,$this->user,$this->passwd,$this->db_name);
        if(!$this->conn){
            die("Could not connect".mysqli_error($this->conn));
        }
        else{
            return true;
        }
    }

    public function disconnect(){
        if($this->conn){
            $this->conn->close();
            return true;
        }
        else{
            return false;
        }
    }

    public function update($table,$column,$value,$condition){
        $query = "UPDATE $table SET $column = '$value' WHERE $condition";
        if($this->conn->query($query)){
            return true;
        }
        else{
            return false;
        }
    }

    public function insert($table,$column,$values){
        $query = "INSERT INTO $table ($column) VALUES ($values)";
        echo $query;
        if($this->conn->query($query)){
            return true;
        }
        else{
			die ("Cant insert".mysqli_error($this->conn));
        }
    }

    public function delete($table,$condition){
        $query = "DELETE FROM $table WHERE $condition";
        if($this->conn->query($query)){
            return true;
        }
        else{
            return false;
        }
    }
	
	public function select($table,$column, $condition){
		$query = "SELECT $column FROM $table WHERE $condition";
		$aa = $this->conn->query($query);
		while($row = $aa->fetch_assoc()){
			$array[] = $row;	
		}
		//json_encode($array);
		return $array;
		
		
	}
}