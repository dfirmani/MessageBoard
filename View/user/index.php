<div class="box-principal">	
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3>List Users</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Email</th>
						<th>Name</th>
						<th>Last Name</th>
						<th>Profile</th>						
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $cont=1; while ($row = mysqli_fetch_array($data)){ ?>
					<tr>
						<td><?php echo $cont++;?></td>
						<td><?php echo $row['usId']; ?></td>
						<td><?php echo $row['usName']; ?></td>
						<td><?php echo $row['usLastName']; ?></td>
						<td><?php echo $row['usProfile']; ?></td>
						<?php if($_SESSION['usProfile'] != 'ReadOnly'){?>
						<td><a class="btn btn-warning" href="<?php echo URL;?>/User/update/<?php echo $row['usId']; ?>">Update</a></td>
						<?php }?>
						<?php if($_SESSION['usProfile'] != 'ReadOnly'){?>
						<td><a class="btn btn-danger" href="<?php echo URL;?>/User/delete/<?php echo $row['usId']; ?>">Delete</a></td>
						<?php }?>
					<?php } ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>