<div class="container mb-3 text-center">
    <h3><i class="fa fa-music fa-3x"></i></h3>
    <h2 class="text-center d-flex justify-content-center"><?php echo "Songs"; ?></h2>
</div>
<hr>
<ul class="list-group">
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
</ul>