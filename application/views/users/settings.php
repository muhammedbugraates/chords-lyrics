<div class="container">
    <div class="text-center mb-3">
        <h3><i class="fa fa-user-cog fa-3x"></i></h3>
        <h2 class="text-center"><?= $title; ?></h2>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header text-center">
                    <i class="fa fa-user-edit fa-2x"></i>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">Edit User</h4>
                    <p class="card-text">You can change your first name, last name and your username.</p>
                    <form action="<?php echo base_url('users/edit'); ?>">
                        <button type="submit" class="btn btn-primary btn-block">Edit User</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header text-center">
                    <i class="fa fa-lock fa-2x"></i>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">Change Password</h4>
                    <p class="card-text">You can change your password with another one.</p>
                    <form action="<?php echo base_url('users/changepassword'); ?>">
                        <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header text-center">
                    <i class="fa fa-trash fa-2x"></i>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">Delete Account</h4>
                    <p class="card-text">You can delete your account. This operation requires password.</p>
                    <form action="<?php echo base_url('users/delete'); ?>">
                        <button type="submit" class="btn btn-primary btn-block">Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>