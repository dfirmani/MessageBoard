<div class="box-principal">
	<div class="panel panel-success">
		<div class="panel-heading">
	    	<h3 class="panel-title">Update Thread</h3>
	  	</div>
  	<div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST">
	  				<div class="form-group">
				    	<label for="inputEmail" class="control-label">Thread Name</label>
				        <input class="form-control" name="thName" type="text" value="<?php echo $data['thName'];?>" required>
			    	</div>	
			    	<div class="form-group">
						<label for="inputEmail" class="control-label">Categorie (<b>Actual Categorie: <?php echo $data['caId']; ?></b>)</label>
						<select name="caId" class="form-control" required>
							<option value="<?php echo $data['caId'];?>"><?php echo $data['caId'];?></option>
							<?php while($row = mysqli_fetch_array($data)){ ?>
								<option value="<?php echo $row['caId']; ?>"><?php echo $row['caName']; ?></option>
							<?php } ?>
						</select>
					</div>			    
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