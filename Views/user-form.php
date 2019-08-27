<!--	FORM	-->
<div class="container py-3">
	<div class="row justify-content-center">
		<div class="col-8">
			<h3><?php echo $title ?></h3>
			<form class="pt-3" method="post" action="<?php echo 'add-new-user' ?>">
				<div class="form-group">
					<label  for="userName">Name</label>
					<input name="user_name" type="text" class="form-control" id="userName" placeholder="Enter name" >
				</div>
				<div class="form-group">
					<label for="userMail">Email address</label>
					<input name="user_email" type="email" class="form-control" id="userMail" placeholder="Enter email" >
				</div>
				<div class="form-group">
					<label for="userCountry">Country</label>
					<select name="user_country" id="userCountry" class="custom-select" >
						<option selected disabled>Select country</option>

						<?php foreach ($vars as $country): ?>
							<option id="country_<?php echo $country["country_id"]?>"
							        value=<?php echo $country["country_name"]?> >
								<?php echo $country["country_name"]?>
							</option>
						<?php endforeach;?>

					</select>
				</div>
				<button type="submit" class=" btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>