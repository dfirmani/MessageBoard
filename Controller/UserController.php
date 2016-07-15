<?php
namespace Controller;
	use Model\User as User;
	use Model\Session as Session;
	class UserController{
		private $user;

		public function __construct (){
			$this->user = new User();
			$this->session = new Session();
		}

		public function login (){
			if ($_POST){
				$this->user->set("usId", $_POST["usId"]);
				$this->user->set("usPassword", $_POST["usPassword"]);
				$data = $this->user->login();

				$this->session->init();
				$this->session->set('usId', $data["usId"]);
				$this->session->set('usProfile', $data["usProfile"]);

				switch($data["usProfile"]){					
					case 'Standard':
						header("Location: ".URL."/categorie");
						break;
					case 'Admin':
						header("Location: ".URL."/user");
						break;	
					case 'ReadOnly':
						header("Location: ".URL."/categorie");
						break;				
				}
				return $data;
			}	
		}

		public function index (){
			$data = $this->user->list();
			return $data;
		}

		public function add (){
			if ($_POST){
				if($_SESSION['usProfile'] == 'Admin'){
					$user = new User();
					$user->set("usId", $_POST["usId"]);
					$user->set("usName", $_POST["usName"]);
					$user->set("usLastName", $_POST["usLastName"]);
					$user->set("usPassword", $_POST["usPassword"]);
					$user->set("usAdminFlag", $_POST["usAdminFlag"]);
					$user->set("usReadOnly", $_POST["usReadOnly"]);

					if ($this->validateProfile($user)){
						$this->setProfile($user);
						$user->add();
						header("Location: ".URL."/user");
					}else {
					   	echo '<script language="JavaScript">'.'alert("Error: A user can not be Admin and Read Only at the same time.");'.'</script>'; 

						echo "<script type=\"text/javascript\">history.go(-1);</script>";
					}
				}else {
					echo '<script language="JavaScript">'.'alert("Error: You do not have permission to do this action.");'.'</script>'; 

					header("Location: ".URL."/categorie");
				}
			}
		}

		public function setProfile ($user){
			if ($user->get("usAdminFlag") == 0 && $user->get("usReadOnly")==0)
				$user->set("usProfile", "Standard");
			else if ($user->get("usAdminFlag") == 1 && $user->get("usReadOnly")==0)
				$user->set("usProfile", "Admin");
			else if ($user->get("usAdminFlag") == 0 && $user->get("usReadOnly")==1)
				$user->set("usProfile", "ReadOnly");
		}

		public function validateProfile ($user){
			if ($user->get('usAdminFlag') == 1 && $user->get('usReadOnly') == 1)return false;
			return true;
		} 

		public function update ($usId){
			if($_SESSION['usProfile'] == 'Admin'){
				if(!$_POST){
					$this->user->set("usId", $usId);
					$data = $this->user->view();
					return $data;
				}else{
					$this->user->set("usId", $_POST['usId']);
					$this->user->set("usName", $_POST['usName']);
					$this->user->set("usLastName", $_POST['usLastName']);
					$this->user->set("usPassword", $_POST['usPassword']);
					$this->user->set("usAdminFlag", $_POST['usAdminFlag']);
					$this->user->set("usReadOnly", $_POST['usReadOnly']);

					if ($this->validateProfile($this->user)){
						$this->setProfile($this->user);
						$this->user->update($usId);
						header("Location: ".URL."/user");
					}else {
					   echo '<script language="JavaScript">'.'alert("Error: A user can not be Admin and Read Only at the same time.");'.'</script>'; 
						echo "<script type=\"text/javascript\">history.go(-1);</script>";
					}
				}
			}else{
				echo '<script language="JavaScript">'.'alert("Error: You do not have permission to do this action.");'.'</script>'; 
				header("Location: ".URL."/categorie");
			}
		}

		public function updateLimit ($usId){
			if(!$_POST){
				$this->user->set("usId", $usId);
				$data = $this->user->view();
				return $data;
			}else{
				$this->user->set("usId", $_POST['usId']);
				$this->user->set("usName", $_POST['usName']);
				$this->user->set("usLastName", $_POST['usLastName']);
				$this->user->set("usPassword", $_POST['usPassword']);
				$this->user->set("usAdminFlag", $_POST['usAdminFlag']);
				$this->user->set("usReadOnly", $_POST['usReadOnly']);

				if ($this->validateProfile($this->user)){
					$this->setProfile($this->user);
					$this->user->update($usId);
					header("Location: ".URL."/user");
				}else {
				   echo '<script language="JavaScript">'.'alert("Error: A user can not be Admin and Read Only at the same time.");'.'</script>'; 
					echo "<script type=\"text/javascript\">history.go(-1);</script>";
				}
			}
		}

		public function delete($usId){
			if($_SESSION['usProfile'] == 'Admin'){
				$this->user->set("usId",$usId);
				$this->user->delete();
				header("Location: " . URL . "/user");
			}else{
				echo '<script language="JavaScript">'.'alert("Error: You do not have permission to do this action.");'.'</script>'; 
				header("Location: ".URL."/categorie");
			}
		}
	}
?>