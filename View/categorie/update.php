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
				    	<label for="inputEmail" class="control-label">Categorie Name</label>
				        <input class="form-control" name="caName" type="text" value="<?php echo $data['caName'];?>" required>
			    	</div>				    
				    <input value="<?php echo $data['caId'];?>" name="caId" type="hidden" required>
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