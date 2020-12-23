
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row"><?=$user->id ?></th>
                        <td><?=$user->first_name ?></td>
                        <td><?=$user->last_name ?></td>
                        <td><?=$user->email ?></td>
                        <td><?=$user->username ?></td>
                        <td><?=$user->password ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>