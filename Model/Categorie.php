<?php
namespace Model;
	class Categorie{
		private $caId;
		private $caName;
		private $usId;
		private $con;

		public function __construct (){
			$this->con = new Connection();
		}

		public function list (){
			$sql = "SELECT * FROM categorie ORDER BY caId ASC";
			$data = $this->con->returnQuery($sql);
			return $data;
		}

		public function add (){
			$usId=$_SESSION['usId'];
			$sql = "INSERT INTO categorie (caId, caName, usId) 
					VALUES (null, '{$this->caName}', '$usId')";
			$this->con->simpleQuery($sql);
		}

		public function delete(){
			$sql = "DELETE FROM categorie WHERE caId='{$this->caId}'";
			$this->con->simpleQuery($sql);
		}

		public function update ($caId){
			$sql = "UPDATE categorie SET caName = '{$this->caName}'
					WHERE caId='$caId'";
			$this->con->simpleQuery($sql);
		}

		public function view (){
			$sql = "SELECT * FROM categorie WHERE caId = '{$this->caId}'";
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

		public function getUser ($caId){
			$sql="SELECT usId FROM categorie WHERE caId=$caId";
			$data=$this->con->returnQuery($sql);
			$row = mysqli_fetch_assoc($data);
			return $row['usId'];
		}
	}
?>