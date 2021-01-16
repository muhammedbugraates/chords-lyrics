<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>


<?php echo form_open('songs/update'); ?>
<input type="hidden" name="id" value="<?php echo $song['id']; ?>">
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Add Name" name="name" value="<?php echo $song['name']; ?>">
</div>
<div class="form-group">
    <label>Lyrics</label>
    <textarea id="editor1" class="form-control" name="lyrics" placeholder="Add Lyrics"><?php echo $song['lyrics']; ?></textarea>
</div>
<div class="form-group">
    <label>Genre</label>
    <select name="genre_id" class="form-control">
        <?php foreach ($genres as $genre) : ?>
            <option value="<?php echo $genre['id']; ?>" <?php if($genre['id'] == $song['genre_id']){ echo 'selected';} ?>><?php echo $genre['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label>Artist</label>
    <select name="artist_id" class="form-control">
        <?php foreach ($artists as $artist) : ?>
            <option value="<?php echo $artist['id']; ?>" <?php if($artist['id'] == $song['artist_id']){ echo 'selected';} ?>><?php echo $artist['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>