<h2><?= $title; ?></h2>
<hr>
<ul class="list-group">
    <?php foreach ($artists as $artist) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class=" float-left">
                <a class="nav-link " href="<?php echo base_url(); ?>artists/<?php echo $artist['id']; ?>">
                    <?php echo $artist['name'] . str_repeat('&nbsp;', 5); ?>
                    <span class=" badge badge-primary badge-pill">
                        <?php echo $artist['count']; ?>
                    </span>
                </a>
            </div>
            <div class="float-right">
                <?php if ($this->user_model->check_user_admin() && $artist['id'] != 1) : ?>
                    <form action="<?php echo base_url('artists/delete/' . $artist['id']); ?>">
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                <?php endif; ?>
            </div>
        </li>
    <?php endforeach; ?>
</ul>