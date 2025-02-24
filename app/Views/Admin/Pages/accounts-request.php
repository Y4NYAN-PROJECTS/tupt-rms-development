<?= $this->extend('/Admin/Components/main-layout'); ?>
<?= $this->section('content'); ?>

<!-- [ Header ] -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <!-- [ Breadcrumbs ] -->
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Accounts</a></li>
                    <li class="breadcrumb-item">Pending Request</li>
                </ul>
            </div>
            <!-- [ Title ] -->
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Pending Request List</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($pendings)): ?>
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-3 mb-sm-0">Review Request/s</h4>
                        <!-- <div>
                            <a href="#" class="btn btn-sm ps-3 pe-3 btn-outline-secondary">Something</a>
                            <a href="#" class="btn btn-sm ps-3 pe-3 btn-primary ms-2">Another Something</a>
                        </div> -->
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 table-datatable">
                            <thead>
                                <tr>
                                    <th>ID Number</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Departments</th>
                                    <th>Plantilla</th>
                                    <th>Joining Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($pendings as $pending): ?>
                                    <tr>
                                        <td><?= $pending['id_number'] ?></td>
                                        <td><?= $pending['full_name'] ?></td>
                                        <td><?= $pending['email_address'] ?></td>
                                        <td><?= $pending['department_name'] ?></td>
                                        <td><?= $pending['plantilla_title'] ?></td>
                                        <td><?= $pending['date_created'] ?></td>
                                        <td>
                                            <a href="#" class="avtar avtar-xs btn-link-secondary approve-account-button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Approve" data-account-id="<?= $pending['account_id'] ?>">
                                                <i class="ti ti-check f-20"></i>
                                            </a>
                                            <a href="#" class="avtar avtar-xs btn-link-secondary decline-account-button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Decline" data-account-id="<?= $pending['account_id'] ?>">
                                                <i class="ti ti-x f-20"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="card">
        <div class="card-body d-flex justify-content-center align-items-center">
            <div class="text-center fst-italic my-5">
                <h1>No Pending Account Request!</h1>
                <p class="m-0">All account requests have been reviewed.</p>
            </div>
        </div>
    </div>
<?php endif; ?>

<?= $this->endSection(); ?>