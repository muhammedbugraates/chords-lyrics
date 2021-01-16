<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>


<?php echo form_open('repertories/update'); ?>
<input type="hidden" name="id" value="<?php echo $repertory['id']; ?>">
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Add Name" name="name" value="<?php echo $repertory['name']; ?>">
</div>
<div class="form-group">
    <label>Privacy</label>
    <select name="privacy" class="form-control">
        <option value="0" <?php if($repertory['privacy'] == '0'){ echo 'selected';} ?>>Public</option>
        <option value="1" <?php if($repertory['privacy'] == '1'){ echo 'selected';} ?>>Private</option>
    </select>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>

