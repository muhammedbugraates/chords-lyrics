<div class="container mb-3 text-center">
    <h3><i class="fa fa-folder fa-3x"></i></h3>
    <h2 class="text-center d-flex justify-content-center"><?php echo "Repertories"; ?></h2>
</div>

<?php if ($this->session->userdata('logged_in')) : ?>
    <h2>My Repertories</h2>
    <hr>
    <ul class="list-group mb-5">
        <?php if ($my_repertories) : ?>
            <?php foreach ($my_repertories as $repertory) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class=" float-left">
                        <h4 class="artist-delete"><i class="fa fa-folder"></i></h4>
                        <a class="nav-link artist-delete" href="<?php echo base_url(); ?>repertories/<?php echo $repertory['id']; ?>">
                            <?php echo $repertory['name'] . str_repeat('&nbsp;', 5); ?>
                            <span class=" badge badge-primary badge-pill">
                                <?php echo $repertory['count']; ?>
                            </span>
                        </a>
                    </div>
                    <div class="float-right">
                        <?php if ($this->user_model->check_user_admin()) : ?>
                            <!-- <form class="artist-delete" action="repertories/delete/<?php echo $repertory['id']; ?>" method="POST">
                                <input type="submit" class="btn btn-link text-danger" value="[X]">
                            </form> -->
                            <form action="<?php echo base_url('repertories/delete/' . $repertory['id']); ?>">
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
    <?php if ($repertories) :  ?>
        <?php foreach ($repertories as $repertory) : ?>
            <?php if ($this->user_model->check_user_admin() || $repertory['privacy'] == '0') : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class=" float-left">
                        <h4 class="artist-delete"><i class="fa fa-folder"></i></h4>
                        <a class="nav-link artist-delete" href="<?php echo base_url(); ?>repertories/<?php echo $repertory['id']; ?>">
                            <?php echo $repertory['name'] . str_repeat('&nbsp;', 5); ?>
                            <span class=" badge badge-primary badge-pill">
                                <?php echo $repertory['count']; ?>
                            </span>
                        </a>
                    </div>
                    <div class="float-right">
                        <?php if ($this->user_model->check_user_admin()) : ?>
                            <form action="<?php echo base_url('repertories/delete/' . $repertory['id']); ?>">
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else : ?>
        <p>There is no public repertory</p>
    <?php endif; ?>
</ul>