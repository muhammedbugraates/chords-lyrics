<?php echo validation_errors(); ?>

<form action="<?php echo base_url('users/edit'); ?>" method="post">
    <div class="row mb-3">
        <div class="col-md-4 offset-4">
            <div class="text-center">
                <h3><i class="fa fa-user-edit fa-3x"></i></h3>
                <h2 class="text-center"><?= $title; ?></h2>
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-font"></i></span>
                        </div>
                        <input type="text" class="form-control" name="first_name" placeholder="first name" value="<?php echo $user['first_name']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-font"></i></span>
                        </div>
                        <input type="text" class="form-control" name="last_name" placeholder="last name" value="<?php echo $user['last_name']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                        </div>
                        <input type="text" class="form-control" name="username" placeholder="username" value="<?php echo $user['username']; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        </div>
    </div>
</form>