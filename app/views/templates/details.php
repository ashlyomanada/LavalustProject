<div class="details" id="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent Reserved</h2>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Table</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>No. People</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($data as $datas): ?>
                <tr>
                    <td><?=$datas['fullname'] ?></td>
                    <td><?=$datas['email'] ?></td>
                    <td><?=$datas['contact'] ?></td>
                    <td><?=$datas['continenteaTbl'] ?></td>
                    <td><?=$datas['address'] ?></td>
                    <td><?=$datas['date'] ?></td>
                    <td><?=$datas['noPeople'] ?></td>
                    <td><span class="status <?= htmlspecialchars($datas['status']) ?>"><?=$datas['status'] ?></span>
                    </td>
                    <td>
                        <div class="cardHeader">
                            <a href="" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal<?=$datas['id'] ?>">
                                <i class="fa-solid fa-pen-to-square fa-xl"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?=$datas['id'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <label for="exampleDataList" class="form-label">Status Update of
                                    <?=$datas['fullname'] ?></label>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= site_url('/updateStatus/' . $datas['id']); ?>" method="post" class="">
                                    <select class="form-control" name="status">
                                        <option value="Reserved">Reserved</option>
                                        <option value="No Vacant">No Vacant</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>

                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

    <!-- ================= New Customers ================ -->

</div>