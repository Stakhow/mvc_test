<!--	USERS TABLE	-->


<div class="container">
	<div class="row justify-content-center">
		<div class="col-10 py-3">
			<h3><?php echo $title?></h3>
			<table class="table">
				<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Country</th>
				</tr>
				</thead>
				<tbody>
				<?php $counter=1; foreach ($vars as $user): ?>
					<tr>
						<th data-user-id="<?php echo $user["user_id"]?>" scope="row"><?php echo $counter++?></th>
						<td><?php echo $user["user_name"]?></td>
						<td><?php echo $user["user_email"]?></td>
						<td><?php echo $user["user_country"]?></td>
						<td><a href="<?php echo 'edit-form-user?user_id=' . $user["user_id"]?>" type="button" class="edit-user btn btn-outline-warning">Edit</a></td>
						<td><a href="<?php echo 'delete-user?user_id=' . $user["user_id"]?>" type="button" class="btn btn-outline-danger">Remove</a></td>
					</tr>
				<?php endforeach; ?>

				</tbody>
			</table>
		</div>
	</div>

</div>