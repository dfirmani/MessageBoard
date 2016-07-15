<div class="box-principal">	
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3>List Categories</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Author</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $cont=1; while ($row = mysqli_fetch_array($data)){ ?>
					<tr>
						<td><?php echo $cont++;?></td>
						<td><?php echo $row['caName']; ?></td>
						<td><?php echo $row['usId']; ?></td>
						<td><a class="btn btn-success" href="<?php echo URL;?>/Thread/index/<?php echo $row['caId']; ?>">Threads</a></td>
						<?php if($_SESSION['usProfile'] != 'ReadOnly'){?>
						<td><a class="btn btn-warning" href="<?php echo URL;?>/Categorie/update/<?php echo $row['caId']; ?>">Update</a></td>
						<?php }?>
						<?php if($_SESSION['usProfile'] != 'ReadOnly'){?>
						<td><a class="btn btn-danger" href="<?php echo URL;?>/Categorie/delete/<?php echo $row['caId']; ?>">Delete</a></td>
						<?php }?>
					<?php } ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>