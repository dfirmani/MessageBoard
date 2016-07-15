<?php
namespace Model;
	class Thread{
		private $thId;
		private $thName;
		private $caId;
		private $usId;
		private $con;

		public function __construct (){
			$this->con = new Connection();
		}

		public function list ($caId){
			$sql = "SELECT * FROM thread WHERE caId=$caId ORDER BY thId ASC";
			$data = $this->con->returnQuery($sql);
			return $data;
		}

		public function add (){
			$usId=$_SESSION['usId'];
			$sql = "INSERT INTO thread (thId, thName, caId, usId) 
					VALUES (null, '{$this->thName}', '{$this->caId}', '$usId')"; #editar al loguear usuario.
			$this->con->simpleQuery($sql);
		}

		public function delete(){
			$sql = "DELETE FROM thread WHERE thId=$this->thId";
			$this->con->simpleQuery($sql);
		}

		public function update ($thId){
			$sql = "UPDATE thread SET thName = '{$this->thName}', caId = '{$this->caId}'
					WHERE thId='$thId'";
			$this->con->simpleQuery($sql);
		}

		public function view (){
			$sql = "SELECT * FROM thread WHERE thId = '{$this->thId}'";
			$data = $this->con->returnQuery($sql);
			$row = mysqli_fetch_assoc($data);
			return $row;
		}

		public function getNameCat ($caId){
			$sql = "SELECT caName FROM categorie WHERE caId=$caId";
			$data = $this->con->returnQuery($sql);
			$row = mysqli_fetch_assoc($data);
			return $row['caName'];
		}

		public function set ($attribute, $content){
			$this->$attribute= $content ;
		}

		public function get ($attribute){
			return $this->$attribute;
		}

		public function getUser ($thId){
			$sql="SELECT usId FROM thread WHERE thId=$thId";
			$data=$this->con->returnQuery($sql);
			$row = mysqli_fetch_assoc($data);
			return $row['usId'];
		}
	}
?>