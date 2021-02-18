<?php echo validation_errors('<div class="alert alert-danger col-md-4 mx-auto">', '</div>'); ?>
<?php echo form_open('users/register'); ?>
	<div class="row">
		<div class="col-4 mx-auto">
			<h4 class="text-center"><?= $title ?></h4>
		
			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" name="firstname" placeholder="First Name">
			</div>

			<div class="form-group">
				<label>Last Name</label>
				<input type="text" class="form-control" name="lastname" placeholder="Last Name">
			</div>
			
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email">
			</div>
		
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username">
			</div>
			
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
			</div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            <small class="form-text text-muted">Already a member? <strong><a href="<?php echo base_url(); ?>users/login">Login here!</a></strong></small>
		</div>
	</div>
<?php echo form_close(); ?>