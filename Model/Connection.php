<?php
namespace Model;
	class Connection {
		private $data=array(
			"host" => "localhost",
			"user" => "root",
			"password" => "",
			"dbName" => "messageboard",

		);
		private $con;

		public function __construct(){
			$this->con = new \mysqli($this->data['host'],
					$this->data['user'], $this->data['password'], $this->data['dbName']);
		}

		public function simpleQuery($sql){
			$this->con->query($sql);
		}

		public function returnQuery ($sql){
			$data = $this->con->query($sql);
			return $data;
		}
	}
?>