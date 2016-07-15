<div class="box-principal">
	<div class="panel panel-success">
		<div class="panel-heading">
	    	<h3 class="panel-title">Add New Comment<?php echo $_GET['thId'];; ?></h3>
	  	</div>
	  	<div class="panel-body">
		  	<div class="row">
		  		<div class="col-md-1"></div>
		  		<div class="col-md-10">
		  			<form class="form-horizontal" action="" method="POST">
		  				<div class="form-group">
					    	<label for="inputEmail" class="control-label">Comment</label>
					        <input class="form-control" name="poComment" type="text" required>
					        <input value="<?php echo $_GET['thId']; ?>" name="thId" type="hidden" required>
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