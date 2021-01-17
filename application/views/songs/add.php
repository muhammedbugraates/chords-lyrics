<h2 class="artist-delete"><i class="fa fa-music"></i></h2>
<h2 class="artist-delete"><?php echo str_repeat('&nbsp;', 2); ?><?= $title; ?></h2>
<hr>
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('songs/add'); ?>
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Add Name" name="name">
</div>
<div class="form-group">
    <label>Lyrics</label>
    <textarea id="editor1" class="form-control" name="lyrics" placeholder="Add Lyrics"></textarea>
</div>
<div class="form-group">
    <label>Genre</label>
    <select name="genre_id" class="form-control">
        <?php foreach ($genres as $genre) : ?>
            <option value="<?php echo $genre['id']; ?>"><?php echo $genre['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label>Artist</label>
    <select name="artist_id" class="form-control">
        <?php foreach ($artists as $artist) : ?>
            <option value="<?php echo $artist['id']; ?>"><?php echo $artist['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>