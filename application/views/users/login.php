<?php echo validation_errors(); ?>

<?php echo form_open('users/login'); ?>
<div class="row">
	<div class="col-md-4 offset-4">
		<div class="text-center">
			<h3><i class="fa fa-sign-in-alt fa-3x"></i></h3>
			<h2 class="text-center"><?= $title; ?></h2>
			<div class="form-group">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-at"></i></span>
					</div>
					<input type="text" class="form-control" name="username" placeholder="username" required autofocus>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
					</div>
					<input type="password" class="form-control" name="password" placeholder="password" required autofocus>
				</div>
			</div>
			<button class="btn btn-primary btn-block" type="submit">Login</button>
		</div>
	</div>
</div>
<?php echo form_close(); ?>

