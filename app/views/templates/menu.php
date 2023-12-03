<div class="details" id="menu">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Update Menu</h2>
            <div class="cardHeader">
                <a href="<?= site_url('/addMenu'); ?>" type="button" class="btn btn-primary">
                    Add Menu
                </a>
            </div>
        </div>
        <div class="upload-container">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    <?php foreach($data as $datas): ?>
                    <tr>
                        <td><?= $datas['name']; ?></td>
                        <td>Php<?= $datas['price']; ?></td>
                        <td><img src="public/<?= $datas['image']; ?>" alt="" class="image-data"></td>
                        <td class="actionBtn" style="display:flex;gap:1rem;">
                            <div class="cardHeader">
                                <a href="" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal<?= $datas['id']; ?>">
                                    <i class="fa-solid fa-pen-to-square fa-xl"></i>
                                </a>
                            </div>
                            <div class="cardHeader">
                                <a href="<?= site_url('/deleteMenu/'.$datas['id']) ?>" type="button"
                                    class="btn btn-primary">
                                    <i class="fa-solid fa-trash fa-xl"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="exampleModal<?= $datas['id']; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= site_url('/updateMenu'); ?>" method="post" class="form-image">
                                        <input type="hidden" name="id" class="form-control"
                                            value="<?= $datas['id']; ?>">
                                        <input type="text" name="name" class="form-control" placeholder="Name"
                                            value="<?= $datas['name']; ?>">
                                        <input type="text" name="price" class="form-control" placeholder="Price"
                                            value="<?= $datas['price']; ?>">
                                        <input type="file" name="userfile" accept="image/jpeg, image/png"
                                            maxlength="2097152" />
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