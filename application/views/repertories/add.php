<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('repertories/add'); ?>
<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Add Name" name="name">
</div>
<div class="form-group">
    <label>Privacy</label>
    <select name="privacy" class="form-control">
        <option value="0">Public</option>
        <option value="1">Private</option>
    </select>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>