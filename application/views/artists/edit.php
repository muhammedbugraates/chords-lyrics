<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>


<?php echo form_open('artists/update'); ?>
<input type="hidden" name="id" value="<?php echo $artist['id']; ?>">
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Add Name" name="name" value="<?php echo $artist['name']; ?>">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>

