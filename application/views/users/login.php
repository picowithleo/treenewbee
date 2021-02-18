<?php echo validation_errors('<div class="alert alert-danger col-md-4 mx-auto">', '</div>'); ?>
<?php echo form_open('users/login'); ?>
	<div class="row">
  		<div class="col-md-4 mx-auto">
			<h4 class="text-center"><?= $title ?></h4>
		
			<div class="form-group">
				<input type="text" class="form-control" name="username" placeholder="Enter Username">
			</div>

			<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="Enter Password">
			</div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
            <small class="form-text text-muted">New user? Click <strong><a href="<?php echo base_url(); ?>users/register">here for Sign Up!</a></strong></small>
		</div>
	</div>
<?php echo form_close(); ?>