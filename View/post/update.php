<div class="box-principal">
	<div class="panel panel-success">
		<div class="panel-heading">
	    	<h3 class="panel-title">Update Post</h3>
	  	</div>
  	<div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST">
	  				<div class="form-group">
				    	<label for="inputEmail" class="control-label">Post</label>
				        <input class="form-control" name="poComment" type="text" value="<?php echo $data['poComment'];?>" required>
			    	</div>		    
				    <input value="<?php echo $data['poId'];?>" name="poId" type="hidden" required>
				    <input value="<?php echo $data['thId'];?>" name="thId" type="hidden" required>
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