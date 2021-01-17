<h2 class="artist-delete"><i class="fa fa-microphone-alt"></i></h2>
<h2 class="artist-delete"><?php echo str_repeat('&nbsp;', 2); ?><?= $title; ?></h2>
<hr>
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('artists/add'); ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" placeholder="Enter name">
	</div>
	<button type="submit" class="btn btn-secondary">Submit</button>
</form>