<div class="details" id="menu">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Update Users</h2>
        </div>
        <div class="upload-container">
            <table>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    <?php foreach($data as $datas): ?>
                    <tr>
                        <td><?= $datas['username']; ?></td>
                        <td><?= $datas['email']; ?></td>
                        <td><?= $datas['password']; ?></td>
                        <td class="actionBtn" style="display:flex;gap:1rem;">
                            <div class="cardHeader">
                                <a href="" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal<?= $datas['userid']; ?>">
                                    <i class="fa-solid fa-pen-to-square fa-xl"></i>
                                </a>
                            </div>
                            
                        </td>
                    </tr>

                    <div class="modal fade" id="exampleModal<?= $datas['userid']; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= site_url('/updateUsers'); ?>" method="post" class="form-image">
                                        <input type="hidden" name="userid" class="form-control"
                                            value="<?= $datas['userid']; ?>">
                                        <input type="text" name="username" class="form-control" placeholder="Username"
                                            value="<?= $datas['username']; ?>">
                                        <input type="text" name="email" class="form-control" placeholder="Email"
                                            value="<?= $datas['email']; ?>">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" value="<?= $datas['password']; ?>" />
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>

                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </tbody>
            </table>




        </div>
    </div>

</div>