<div class="box-principal">	
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3>Post Thread <?php echo $_GET['thName'];?></h3> <!--ARREGLAR Y PONER EL NOMBRE DE LA CATEGORIA EN VEZ DE SU ID -->
		</div>
		<div class="panel-body">
			<?php if($_SESSION['usProfile'] != 'ReadOnly'){?>
			<a class="btn btn-success" href="<?php echo URL;?>/Post/add/<?php echo $_GET['thId']; ?>">Add Post</a>
			<?php }?>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Post</th>
						<th>Author</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $cont=1; while ($row = mysqli_fetch_array($data)){ ?>
					<tr>
						<td><?php echo $cont++;?></td>
						<td><?php echo $row['poComment']; ?></td>
						<td><?php echo $row['usId']; ?></td>
						<?php if($_SESSION['usProfile'] != 'ReadOnly'){?>
						<td><a class="btn btn-warning" href="<?php echo URL;?>/Post/update/<?php echo $row['poId']; ?>">Update</a></td>
						<?php }?>
						<?php if($_SESSION['usProfile'] != 'ReadOnly'){?>
						<td><a class="btn btn-danger" href="<?php echo URL;?>/Post/delete/<?php echo $row['poId'].'&thId='.$row['thId']; ?>">Delete</a></td>
						<?php }?>
					<?php } ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>