<?php
namespace Model;
	class User{
		//Attributes
		private $usId;
		private $usName;
		private $usLastName;
		private $usPassword;
		private $usAdminFlag;
		private $usReadOnly;
		private $usProfile;
		private $con;

		//Methods
		public function __construct (){
			$this->con = new Connection();
		}

		public function list (){
			$sql = "SELECT * FROM user ORDER BY usId ASC";
			$data = $this->con->returnQuery($sql);
			return $data;
		}

		public function add (){
			$sql = "INSERT INTO user (usId, usName, usLastName, usPassword, usAdminFlag, usReadOnly, usProfile) 
					VALUES ('{$this->usId}', '{$this->usName}', '{$this->usLastName}', '{$this->usPassword}',
							'{$this->usAdminFlag}', '{$this->usReadOnly}','{$this->usProfile}')";
			$this->con->simpleQuery($sql);
		}

		public function delete(){
			$sql = "DELETE FROM user WHERE usId='{$this->usId}'";
			$this->con->simpleQuery($sql);
		}

		public function update ($usId){
			echo "en el modelo: ".$usId;
			$sql = "UPDATE user SET usId = '{$this->usId}', usName = '{$this->usName}',
					usLastName = '{$this->usLastName}', usPassword = '{$this->usPassword}',usAdminFlag = '{$this->usAdminFlag}', usReadOnly = '{$this->usReadOnly}', usProfile = '{$this->usProfile}'
					WHERE usId='$usId'";
			$this->con->simpleQuery($sql);
		}

		public function view (){
			$sql = "SELECT * FROM user WHERE usId = '{$this->usId}'";
			$data = $this->con->returnQuery($sql);
			$row = mysqli_fetch_assoc($data);
			return $row;
		}

		public function set ($attribute, $content){
			$this->$attribute= $content ;
		}

		public function get ($attribute){
			return $this->$attribute;
		}

		public function login(){
			$sql = "SELECT * FROM user WHERE usId = '{$this->usId}' 
				AND usPassword = '{$this->usPassword}' ";
			$data = $this->con->returnQuery($sql);
			$row = mysqli_num_rows($data);
			if($row > 0){				
				if($row=mysqli_fetch_assoc($data)){										
					return $row;
				}
			}else{
				$err=-1;
				return $err;			
				header('Location: login.php?err=1');			
			}			
		} 
	}
?>