<!-- [ Promotion Card & Table ] -->
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="m-0">Promotion History</h4>
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#newPromotion">New Promotion</button>
        </div>
    </div>

    <div class="card-body">
        <?php if (isset($promotion_histories) && !empty($promotion_histories)): ?>
            <div class="table-responsive">
                <table class="table table-hover mb-0 table-datatable">
                    <thead>
                        <tr>
                            <th>Promoted To</th>
                            <th>Id Number</th>
                            <th>Status</th>
                            <th>Date Promoted</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($promotion_histories as $promotion): ?>
                            <tr>
                                <td><?= $promotion['plantilla_title'] ?></td>
                                <td><?= $promotion['id_number'] ?></td>
                                <td>
                                    <?php if ($promotion['promotion_status'] == 1): ?>
                                        <span class="badge bg-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Past</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= $promotion['date_promoted'] ?></td>

                                <td class="text-center">
                                    <a href="#" class="avtar avtar-xs btn-link-secondary promotion-delete-button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" data-promotion-id="<?= $promotion['promotion_history_id'] ?>" data-account-id="<?= $promotion['account_id'] ?>">
                                        <i class="ti ti-trash f-20 text-primary"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="d-flex justify-content-center align-items-center">
                <div class="text-center fst-italic my-5">
                    <h1>No History</h1>
                    <p class="m-0">There are no data found.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>