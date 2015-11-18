<?php
// Mavc - Amazonas Software
class conexion{
	private $link;
	private $user,$pass,$server,$db;	
        function __construct($db="academico",$server="localhost",$user="root",$pass=""){
            $this->db=$db;
            $this->pass=$pass;
            $this->server=$server;
            $this->user=$user;
	}
        
        private function open(){  
            $this->link = mysql_connect($this->server,$this->user);
            if(!$this->link){return false;}
            if(!(mysql_select_db($this->db, $this->link))){return false;}
            return true;
	}
	
	private function  close(){mysql_close($this->link);}
	public function setServer($server){$this->server=$server;}
	public function setBd($db){$this->db=$db;}
	public function setPassword($pass){$this->pass=$pass;}
	public function setUser($user){$this->user=$user;}
	
	public function getServer(){return $this->server;}
	public function getBd(){return $this->db;}
	public function getPassword(){return $this->pass;}
	public function getUser(){return $this->user;}
	
	public function setLink($db,$server,$user,$pass){
            $this->db=$db;
            $this->pass=$pass;
            $this->server=$server;
            $this->user=$user;
	}
        
	public function select($sql) {
            if($this->open()){                
                $query = mysql_query($sql);
                $data=array();
                while($record=mysql_fetch_array($query)){
                    $data[]=$record;
                }
                $this->close();
                return $data;
            }
            return NULL;    	
	}
	
	public function execute($sql){
            if($this->open()){
                $r = mysql_query($sql);
                $this->close();
                return $r;
            }
            return false;
	}
}
?>



