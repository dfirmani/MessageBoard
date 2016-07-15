<?php
namespace View;
use Model\Session as Session;
	$session = new Session();
	$session->init();

	$user = isset($_SESSION['usId']) ? $_SESSION['usId'] : null ;

	if($user == ''){
		header("Location: ".URL."/user/login.php?err=-2");
	}

	$template=new Template();
	class Template{
		public function __construct(){
?>	
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Message Board</title>
		<link rel="stylesheet" href="<?php echo URL; ?>/View/template/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo URL; ?>/View/template/css/general.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-nav">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"> Message Board</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo URL?>/user/login">Home</a></li>
					<?php if($_SESSION['usProfile'] == 'Admin'){?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo URL;?>/user">List</a></li>
							<li><a href="<?php echo URL;?>/user/add">Add</a></li>
						</ul>
					</li>
					<?php }?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo URL;?>/categorie">List</a></li>
							<?php if($_SESSION['usProfile'] != 'ReadOnly'){?>
							<li><a href="<?php echo URL;?>/categorie/add">Add</a></li>
							<?php }?>
						</ul>
					</li>
					<?php if($_SESSION['usProfile'] != 'ReadOnly'){?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Threads</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo URL;?>/thread/add">Add</a></li>
						</ul>
					</li>
					<?php }?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Session</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo URL;?>/user/updateLimit/<?php echo $_SESSION['usId']?>">Edit Profile</a></li>
							<li><a href="<?php echo URL;?>logOut.php">Log Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<?php echo "Welcome, " . $_SESSION['usId'];?>
		</div>
<?php
		}

		public function __destruct(){
?>
	<footer class="navbar-fixed-bottom">
		© 2016 ALL RIGHTS RESERVED DEBORA FIRMANI
	</footer>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="<?php echo URL;?>/View/template/js/bootstrap.js"></script>
	</body>
	</html>

<?php
		}
	}
?>