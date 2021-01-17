<h2 class="artist-delete"><i class="fa fa-music"></i></h2>
<h2 class="artist-delete"><?php echo str_repeat('&nbsp;', 2); ?><?php echo $song['name']; ?></h2>
<hr>
<div class="post-body">
	<?php echo $song['lyrics']; ?>
</div>

<?php if ($this->session->userdata('logged_in') && $repertories) : ?>
	<hr>
	<h3>Add to your repertory</h3>

	<?php echo form_open('repertories/add_song_to_repertory'); ?>
	<input type="hidden" name="song_id" value="<?php echo $song['id']; ?>">
	<div class="form-group">
		<label>Repertory</label>
		<select name="repertory_id" class="form-control">
			<?php foreach ($repertories as $repertory) : ?>
				<option value="<?php echo $repertory['id']; ?>"><?php echo $repertory['name']; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<button class="btn btn-primary" type="submit">Add</button>
	</form>

<?php endif; ?>

<?php if ($this->user_model->check_user_admin()) : ?>
	<hr>
	<a href="<?php echo base_url(); ?>songs/edit/<?php echo $song['id']; ?>" class="btn btn-secondary">Edit</a>
	<div class="float-right">
		<?php echo form_open('/songs/delete/' . $song['id']); ?>
		<input type="submit" value="Delete" class="btn btn-danger">
		</form>
	</div>
<?php endif; ?>