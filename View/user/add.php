<div class="box-principal">
	<div class="panel panel-success">
		<div class="panel-heading">
	    	<h3 class="panel-title">Add New User</h3>
	  	</div>
	  	<div class="panel-body">
		  	<div class="row">
		  		<div class="col-md-1"></div>
		  		<div class="col-md-10">
		  			<form class="form-horizontal" action="" method="POST">
		  				<div class="form-group">
					    	<label for="inputEmail" class="control-label">Email</label>
					        <input class="form-control" name="usId" type="email" required>
				    	</div>
					    <div class="form-group">
					      	<label for="inputEmail" class="control-label">Name</label>
					        <input class="form-control" name="usName" type="text" required>
					    </div>
					    <div class="form-group">
					      	<label for="inputEmail" class="control-label">Last Name</label>
					        <input class="form-control" name="usLastName" type="text" required>
					    </div>
					    <div class="form-group">
					      	<label for="inputEmail" class="control-label">Password</label>
					        <input class="form-control" name="usPassword" type="password" required>
					    </div>
					    <div class="form-group">
					    	<label for="inputEmail" class="control-label">Administrator</label>
					    	<select name="usAdminFlag" class="control-control" required>
					    		<option value="">-- Select an option --</option>
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>
					    </div>
					    <div class="form-group">
					    	<label for="inputEmail" class="control-control">Read Only</label>
					    	<select name="usReadOnly" class="control-control" required> 
					    		<option value="">-- Select an option --</option>
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select >
					    </div >
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