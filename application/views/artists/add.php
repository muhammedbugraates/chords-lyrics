<h2><?= $title ;?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('artists/add'); ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" placeholder="Enter name">
	</div>
	<button type="submit" class="btn btn-secondary">Submit</button>
</form>