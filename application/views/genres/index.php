<div class="container mb-3 text-center">
    <h3><i class="fa fa-chart-pie fa-3x"></i></h3>
    <h2 class="text-center d-flex justify-content-center"><?php echo "Genres"; ?></h2>
</div>
<hr>
<ul class="list-group">
    <?php foreach ($genres as $genre) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class=" float-left">
                <h4 class="artist-delete"><i class="fa fa-chart-pie"></i></h4>
                <a class="nav-link artist-delete" href="<?php echo base_url(); ?>genres/<?php echo $genre['id']; ?>">
                    <?php echo $genre['name'] . str_repeat('&nbsp;', 5); ?>
                    <span class=" badge badge-primary badge-pill">
                        <?php echo $genre['count']; ?>
                    </span>
                </a>
            </div>
            <div class="float-right">
                <?php if ($this->user_model->check_user_admin() && $genre['id'] != 1) : ?>
                    <form action="<?php echo base_url('genres/delete/' . $genre['id']); ?>">
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                <?php endif; ?>
            </div>
        </li>
    <?php endforeach; ?>
</ul>