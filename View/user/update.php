<div class="box-principal">
	<div class="panel panel-success">
		<div class="panel-heading">
	    	<h3 class="panel-title">Update User</h3>
	  	</div>
  	<div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST">
	  				<div class="form-group">
				    	<label for="inputEmail" class="control-label">Email</label>
				        <input class="form-control" name="usId" type="email" value="<?php echo $data['usId'];?>" required>
			    	</div>
				    <div class="form-group">
				      	<label for="inputEmail" class="control-label">Name</label>
				        <input class="form-control" name="usName" type="text" value="<?php echo $data['usName'];?>" required>
				    </div>
				    <div class="form-group">
				      	<label for="inputEmail" class="control-label">Last Name</label>
				        <input class="form-control" name="usLastName" type="text" value="<?php echo $data['usLastName'];?>" required>
				    </div>
				    <div class="form-group">
				      	<label for="inputEmail" class="control-label">Password</label>
				        <input class="form-control" name="usPassword" type="password" value="<?php echo $data['usPassword'];?>" required>
				    </div>
				    <div class="form-group">
				    	<label for="inputEmail" class="control-label">Administrator</label>
				    	<select name="usAdminFlag" class="control-control" required>
				    		<option value="<?php echo $data['usAdminFlag'];?>"><?php echo $data['usAdminFlag'];?></option>
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select>
				    </div>
				    <div class="form-group">
				    	<label for="inputEmail" class="control-control">Read Only</label>
				    	<select name="usReadOnly" class="control-control" required> 
				    		<option value="<?php echo $data['usReadOnly'];?>"><?php echo $data['usReadOnly'];?></option>
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select >
				    </div >
				    <input value="<?php echo $data['usId'];?>" name="oldId" type="hidden" required>
				    <div class="form-group">
				    	<button type="submit" class="btn btn-success">Update</button>
				    </div>
				</form>
	  		</div>
	  		<div class="col-md-1"></div>
	  	</div>
	  </div>
	</div>
</div>