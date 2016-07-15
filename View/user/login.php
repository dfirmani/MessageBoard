<div class="box-principal">
	<div class="panel panel-success">
		<div class="panel-heading">
	    	<h3 class="panel-title">Login</h3>
	  	</div>
	  	<div class="panel-body">
		  	<div class="row">
		  		<div class="col-md-1"></div>
		  		<div class="col-md-10">
		  			<form class="form-horizontal" name="user" action="" method="POST">

		  				<?php if($data==-1)echo "The email and password you entered don't match. <br />";
						if($data==-2)echo "Sign in to continue to Message Board. <br />"?>

		  				<div class="form-group">
					    	<label for="inputEmail" class="control-label">Email</label>
					        <input class="form-control" name="usId" type="email" required>
				    	</div>
					    <div class="form-group">
					      	<label for="inputEmail" class="control-label">Password</label>
					        <input class="form-control" name="usPassword" type="password" required>
					    </div>
					    <div class="form-group">
					    	<button type="submit" class="btn btn-success">Login</button>
					    </div>
					</form>
		  		</div>
		  		<div class="col-md-1"></div>
	  		</div>
	  	</div>
	</div>
</div>