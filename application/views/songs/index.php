<div class="container mb-3 text-center">
    <h3><i class="fa fa-music fa-3x"></i></h3>
    <h2 class="text-center d-flex justify-content-center"><?php echo "Songs"; ?></h2>
</div>
<div class="row">
    <div class="col-md-4 offset-4">
        <form action="<?php echo base_url(); ?>songs" method="get">
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" name="key" placeholder="song name" autofocus>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Search Song</button>
        </form>
    </div>
</div>
<?php if ($key) : ?>
    <p>Result for: <?php echo $key; ?></p>
<?php endif; ?>
<hr>

<ul class="list-group">
    <?php if ($songs) : ?>
        <?php foreach ($songs as $song) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="float-left">
                    <h4 class="artist-delete"><i class="fa fa-music"></i></h4>
                    <a class="nav-link artist-delete" href="<?php echo base_url(); ?>songs/<?php echo $song['id']; ?>">
                        <?php echo $song['name']; ?>
                    </a>
                </div>
                <div class="float-right">
                    <?php if ($this->user_model->check_user_admin()) : ?>
                        <form action="<?php echo base_url('songs/delete/' . $song['id']); ?>">
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    <?php endif; ?>
                </div>
            </li>
        <?php endforeach; ?>
    <?php else : ?>
        <p>There is no result</p>
    <?php endif; ?>
</ul>