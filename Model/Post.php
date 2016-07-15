<?php
namespace Model;
	class Post{
		//Attributes
		private $poId;
		private $poComment;
		private $poDate;
		private $thId;
		private $usId;
		private $con;

		//Methods
		public function __construct (){
			$this->con = new Connection();
		}

		public function list ($thId){
			$sql = "SELECT * FROM post WHERE thId=$thId ORDER BY poId ASC";
			$data = $this->con->returnQuery($sql);
			return $data;
		}

		public function add (){
			$usId=$_SESSION['usId'];
			$sql = "INSERT INTO post (poId, poComment, poDate, thId, usId) 
					VALUES (null, '{$this->poComment}', '{$this->poDate}', '{$this->thId}', '$usId')"; #editar al loguear usuario.
			$this->con->simpleQuery($sql);
		}

		public function delete(){
			$sql = "DELETE FROM post WHERE poId=$this->poId";
			$this->con->simpleQuery($sql);
		}

		public function update ($poId){
			$sql = "UPDATE post SET poComment='{$this->poComment}', poDate='{$this->poDate}',thId='{$this->thId}'
					WHERE poId='$poId'";
			$this->con->simpleQuery($sql);
		}

		public function view (){
			$sql = "SELECT * FROM post WHERE poId='{$this->poId}'";
			$data = $this->con->returnQuery($sql);
			$row = mysqli_fetch_assoc($data);
			return $row;
		}

		public function getNameThread ($thId){
			$sql = "SELECT thName FROM thread WHERE thId=$thId";
			$data = $this->con->returnQuery($sql);
			$row = mysqli_fetch_assoc($data);
			return $row['thName'];
		}

		public function set ($attribute, $content){
			$this->$attribute= $content ;
		}

		public function get ($attribute){
			return $this->$attribute;
		}

		public function getUser ($poId){
			$sql="SELECT usId FROM post WHERE poId=$poId";
			$data=$this->con->returnQuery($sql);
			$row = mysqli_fetch_assoc($data);
			return $row['usId'];
		}
	}
?>