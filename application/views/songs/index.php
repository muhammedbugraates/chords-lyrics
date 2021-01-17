<h2><?= $title; ?></h2>
<hr>
<ul class="list-group">
    <?php foreach ($songs as $song) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="float-left">
                <a class="nav-link" href="<?php echo base_url(); ?>songs/<?php echo $song['id']; ?>">
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