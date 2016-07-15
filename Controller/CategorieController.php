<?php
namespace Controller;
	use Model\User as User;
	use Model\Categorie as Categorie;

	class CategorieController{
		private $user;
		private $categorie;

		public function __construct (){
			$this->user = new User();
			$this->categorie = new Categorie();
		}

		public function index (){
			$data = $this->categorie->list();
			return $data;
		}

		public function add (){
			if($_SESSION['usProfile'] != 'ReadOnly'){
				if ($_POST){
					$categorie = new Categorie();
					$categorie->set("caName", $_POST["caName"]);
					$categorie->set("usId", $_SESSION["usId"]);
					$categorie->add();
					header("Location: ".URL."/categorie");
				}
			}else{
				echo '<script language="JavaScript">'.'alert("Error: You do not have permission to do this action.");'.'</script>'; 
				header("Location: ".URL."/categorie");
			}
		}

		public function update ($caId){
			if(!$_POST){
				$this->categorie->set("caId", $caId);
				$data = $this->categorie->view();
				return $data;
			}else{
				$user = $this->categorie->getUser($caId);
				if(($_SESSION['usProfile'] == 'Admin') || ($_SESSION['usProfile'] == 'Standard'  && $_SESSION['usId'] == $user)){
					$this->categorie->set("caName", $_POST['caName']);
					$this->categorie->update($caId);
					header('Location: '. URL . "/categorie");
				}
				else{
					echo '<script language="JavaScript">'.'alert("Error: You do not have permission to do this action.");'.'</script>'; 
					header("Location: ".URL."/categorie");
				}
			}
		}

		public function delete($caId){
			$user = $this->categorie->getUser($caId);
			if(($_SESSION['usProfile'] == 'Admin') || ($_SESSION['usProfile'] == 'Standard'  && $_SESSION['usId'] == $user)){
				$this->categorie->set("caId",$caId);
				$this->categorie->delete();
				header("Location: " . URL . "/categorie");
			}else{
				echo '<script language="JavaScript">'.'alert("Error: You do not have permission to do this action.");'.'</script>'; 
				header("Location: ".URL."/categorie");
			}
		}
	}
?>