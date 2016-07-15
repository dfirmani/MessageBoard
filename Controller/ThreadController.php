<?php
namespace Controller;
	use Model\User as User;
	use Model\Categorie as Categorie;
	use Model\Thread as Thread;

	class ThreadController{
		private $user;
		private $categorie;
		private $thread;

		public function __construct (){
			$this->user = new User();
			$this->categorie = new Categorie();
			$this->thread = new Thread();
		}

		public function index ($caId){
			$_GET['caName'] = $this->thread->getNameCat($caId);
			$data = $this->thread->list($caId);
			return $data;
		}

		public function add (){
			if($_SESSION['usProfile'] != 'ReadOnly'){
				if(!$_POST){
					$data = $this->categorie->list();
					return $data;
				}else{
					$thread = new Thread();
					$thread->set("thName", $_POST["thName"]);
					$thread->set("caId", $_POST["caId"]);
					$thread->add();
					$_GET['caName'] = $this->thread->getNameCat($caId);
					header("Location: ".URL."/thread/index/".$thread->get('caId'));
				}
			}else{
				echo '<script language="JavaScript">'.'alert("Error: You do not have permission to do this action.");'.'</script>'; 
				header("Location: ".URL."/categorie");
			}
		}

		public function update ($thId){	
			if(!$_POST){
				$this->thread->set("thId", $thId);
				$data = $this->thread->view();
				return $data;
			}else{
				$user = $this->thread->getUser($thId);
				if(($_SESSION['usProfile'] == 'Admin') || ($_SESSION['usProfile'] == 'Standard'  && $_SESSION['usId'] == $user)){
					$this->thread->set("thName", $_POST['thName']);
					$this->thread->set("caId", $_POST["caId"]);
					$this->thread->update($thId);
					$_GET['caName'] = $this->thread->getNameCat($this->thread->get('thId'));
					header("Location: ".URL."/Thread/index/".$this->thread->get("caId"));
				}else{
					echo '<script language="JavaScript">'.'alert("Error: You do not have permission to do this action.");'.'</script>'; 
					header("Location: ".URL."/categorie");
				}
			}
		}

		public function delete($thId){
			$user = $this->thread->getUser($thId);
			if(($_SESSION['usProfile'] == 'Admin') || ($_SESSION['usProfile'] == 'Standard'  && $_SESSION['usId'] == $user)){
				$this->thread->set("thId",$thId);
				$_GET['caName'] = $this->thread->getNameCat($_GET['caId']);
				$this->thread->delete();
				
				header("Location: ".URL."/Thread/index/".$_GET['caId']);
			}else{
				echo '<script language="JavaScript">'.'alert("Error: You do not have permission to do this action.");'.'</script>'; 
				header("Location: ".URL."/categorie");
			}
		}
	}
?>