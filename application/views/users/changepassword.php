<?php echo validation_errors(); ?>

<form action="<?php echo base_url('users/changepassword'); ?>" method="post">
    <div class="row mb-3">
        <div class="col-md-4 offset-4 text-center">
            <h3><i class="fa fa-lock fa-3x"></i></h3>
            <h2 class="text-center"><?= $title; ?></h2>
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="oldpassword" placeholder="current password">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="new password">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password2" placeholder="confirm new password">
                </div>
            </div>
            <button type="submit" class="btn btn-danger btn-block">Save</button>
        </div>
    </div>
</form>