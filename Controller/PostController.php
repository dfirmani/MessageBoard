<?php
namespace Controller;
	use Model\User as User;
	use Model\Thread as Thread;
	use Model\Post as Post;

	class PostController{
		private $user;
		private $thread;
		private $post;

		public function __construct (){
			$this->user = new User();
			$this->thread = new Thread();
			$this->post = new Post();
		}

		public function index ($thId){
			$_GET['thId']=$thId;
			$_GET['thName'] = $this->post->getNameThread($thId);
			$data = $this->post->list($thId);
			return $data;
		}

		public function add ($thId){
			if($_SESSION['usProfile'] != 'ReadOnly'){
				$_GET['thId']=$thId;
				if(!$_POST){
					$data = $this->thread->list($thId);
					return $data;
				}else{
					$post = new Post();
					$post->set("poComment", $_POST["poComment"]);
					$post->set("thId", $thId);
					$post->add();
					$_GET['thId'] = $this->post->getNameThread($thId);
					$_GET['thName'] = $this->post->getNameThread($thId);
					header("Location: ".URL."/Post/index/".$post->get('thId'));
				}
			}else{
				echo '<script language="JavaScript">'.'alert("Error: You do not have permission to do this action.");'.'</script>'; 
				header("Location: ".URL."/categorie");
			}
		}

		public function update ($poId){	
			if(!$_POST){
				$this->post->set("poId", $poId);
				$data = $this->post->view();
				return $data;
			}else{
				$user = $this->post->getUser($poId);
				if(($_SESSION['usProfile'] == 'Admin') || ($_SESSION['usProfile'] == 'Standard'  && $_SESSION['usId'] == $user)){
					$this->post->set("poComment", $_POST['poComment']);
					$this->post->set("thId", $_POST["thId"]);
					$this->post->update($poId);
					$_GET['thName'] = $this->post->getNameThread($this->post->get('poId'));
					header("Location: ".URL."/Post/index/".$this->post->get("thId"));
				}else{
					echo '<script language="JavaScript">'.'alert("Error: You do not have permission to do this action.");'.'</script>'; 
					header("Location: ".URL."/categorie");
				}
			}
		}

		public function delete($poId){
				$user = $this->post->getUser($poId);
				if(($_SESSION['usProfile'] == 'Admin') || ($_SESSION['usProfile'] == 'Standard'  && $_SESSION['usId'] == $user)){
				$this->post->set("poId",$poId);
				$_GET['thName'] = $this->post->getNameThread($_GET['thId']);
				$this->post->delete();
				
				header("Location: ".URL."/Post/index/".$_GET['thId']);
			}else{
				echo '<script language="JavaScript">'.'alert("Error: You do not have permission to do this action.");'.'</script>'; 
				header("Location: ".URL."/categorie");
			}
		}
	}
?>