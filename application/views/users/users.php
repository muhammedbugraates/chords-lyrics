    <!-- <div class="container mb-3">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <h2><i class="fa fa-users fa"></i><?php echo str_repeat('&nbsp;', 2); ?></h2>
                <h2 class="text-center d-flex justify-content-center"><?php echo "Users"; ?></h2>
            </div>
        </div>
    </div> -->
    <div class="container mb-3 text-center">
        <h3><i class="fa fa-users fa-3x"></i></h3>
        <h2 class="text-center d-flex justify-content-center"><?php echo "Users"; ?></h2>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-users"></i></th>
                <th scope="col">Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Delete</th>
                <th scope="col">Admin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <th><i class="fa fa-user"></i></th>
                    <th scope="row"><?= $user->id ?></th>
                    <td><?= $user->first_name ?></td>
                    <td><?= $user->last_name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->username ?></td>
                    <td><?= $user->password ?></td>
                    <td>
                        <form action="<?php echo base_url('users/delete_with_admin/' . $user->id); ?>">
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                    <td>
                        <?php if (!$this->user_model->check_id_admin($user->id)) : ?>
                            <form action="<?php echo base_url('users/make_admin/' . $user->id); ?>">
                                <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
                            </form>
                        <?php else : ?>
                            <form action="<?php echo base_url('users/delete_admin/' . $user->id); ?>">
                                <button class="btn btn-danger"><i class="fa fa-minus"></i></button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>