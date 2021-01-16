<?php echo validation_errors(); ?>

<form action="<?php echo base_url('users/delete'); ?>" method="post">
    <div class="row mb-3">
        <div class="col-md-4 offset-4 text-center">
            <h3><i class="fa fa-trash fa-3x"></i></h3>
            <h2 class="text-center"><?= $title; ?></h2>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>
            <p>Are you sure you want to delete your account?</p>
            <button type="submit" class="btn btn-danger btn-block">Delete Account</button>
        </div>
    </div>
</form>