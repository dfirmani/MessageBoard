<div class="box-principal">
	<div class="panel panel-success">
		<div class="panel-heading">
	    	<h3 class="panel-title">Login</h3>
	  	</div>
	  	<div class="panel-body">
		  	<div class="row">
		  		<div class="col-md-1"></div>
		  		<div class="col-md-10">
		  			<form class="form-horizontal" name="user" action="<?php echo URL;?>/Controller/UserController.php" method="POST">

		  				<?php if($err==1)echo "Usuario o Contraseña Erróneos <br />";
						if($err==2)echo "Debe iniciar sesion para poder acceder el sitio. <br />"?>

		  				<div class="form-group">
					    	<label for="inputEmail" class="control-label">Email</label>
					        <input class="form-control" name="usId" type="email" required>
				    	</div>
					    <div class="form-group">
					      	<label for="inputEmail" class="control-label">Password</label>
					        <input class="form-control" name="usPassword" type="password" required>
					    </div>
					    <div class="form-group">
					    	<button type="submit" class="btn btn-success">Add</button>
					    </div>
					</form>
		  		</div>
		  		<div class="col-md-1"></div>
	  		</div>
	  	</div>
	</div>
</div>