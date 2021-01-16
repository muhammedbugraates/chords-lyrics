<?php if ($this->session->userdata('logged_in')) : ?>
    <h2>My Repertories</h2>
    <hr>
    <ul class="list-group mb-5">
        <?php if ($my_repertories) : ?>
            <?php foreach ($my_repertories as $repertory) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class=" float-left">
                        <a class="nav-link " href="<?php echo base_url(); ?>repertories/<?php echo $repertory['id']; ?>">
                            <?php echo $repertory['name'] . str_repeat('&nbsp;', 5); ?>
                            <span class=" badge badge-primary badge-pill">
                                <?php echo $repertory['count']; ?>
                            </span>
                        </a>
                    </div>
                    <div class="float-right">
                        <?php if ($this->user_model->check_user_admin()) : ?>
                            <form class="artist-delete" action="repertories/delete/<?php echo $repertory['id']; ?>" method="POST">
                                <input type="submit" class="btn btn-link text-danger" value="[X]">
                            </form>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php else : ?>
            <p>You have no repertory</p>
        <?php endif; ?>
    </ul>
<?php endif; ?>

<h2><?= $title; ?></h2>
<hr>
<ul class="list-group">
    <?php foreach ($repertories as $repertory) : ?>
        <?php if ($this->user_model->check_user_admin() || $repertory['privacy'] == '0') : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class=" float-left">
                    <a class="nav-link " href="<?php echo base_url(); ?>repertories/<?php echo $repertory['id']; ?>">
                        <?php echo $repertory['name'] . str_repeat('&nbsp;', 5); ?>
                        <span class=" badge badge-primary badge-pill">
                            <?php echo $repertory['count']; ?>
                        </span>
                    </a>
                </div>
                <div class="float-right">
                    <?php if ($this->user_model->check_user_admin()) : ?>
                        <form class="artist-delete" action="repertories/delete/<?php echo $repertory['id']; ?>" method="POST">
                            <input type="submit" class="btn btn-link text-danger" value="[X]">
                        </form>
                    <?php endif; ?>
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>