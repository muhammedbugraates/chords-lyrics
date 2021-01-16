<?php echo validation_errors(); ?>

<form action="<?php echo base_url('users/register'); ?>" method="post">
    <div class="row mb-3">
        <div class="col-md-4 offset-4 text-center">
            <h3><i class="fa fa-user-plus fa-3x"></i></h3>
            <h2 class="text-center"><?= $title; ?></h2>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-font"></i></span>
                    </div>
                    <input type="text" class="form-control" name="first_name" placeholder="first name">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-font"></i></span>
                    </div>
                    <input type="text" class="form-control" name="last_name" placeholder="last name">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                    </div>
                    <input type="text" class="form-control" name="username" placeholder="username">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </div>
</form>

