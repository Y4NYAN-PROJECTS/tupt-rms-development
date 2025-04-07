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
                    <li class="breadcrumb-item"><a href="">Profile Visit</a></li>
                </ul>
            </div>

            <!-- [ Title ] -->
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Account Information</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- [ Profile ] -->
<div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xxl-4">
        <div class="card">
            <div class="card-header text-center">
                <div class="mb-3 position-relative d-inline-block">
                    <div class="position-relative rounded-circle overflow-hidden" style="width: 120px; height: 120px; cursor: pointer;">
                        <img class="img-fluid w-100 h-100" style="object-fit: cover;" src="<?= $visit['image_path'] ?>" alt="User image">
                    </div>
                </div>

                <h4><?= $visit['full_name'] ?></h4>
                <small class="text-muted text-sm"><?= $visit['id_number'] ?></small>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                        <small class="mb-1 text-muted">User type</small>
                        <p class="mb-0"><?= $visit['user_type'] == 1 ? 'Administrator' : 'Employee' ?>
                        </p>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                        <small class="mb-1 text-muted">Plantilla</small>
                        <p class="mb-0"><?= $visit['plantilla_title'] ?></p>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                        <small class="mb-1 text-muted">Department</small>
                        <p class="mb-0"><?= $visit['department_name'] ?></p>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                        <small class="mb-1 text-muted">Degree</small>
                        <p class="mb-0"><?= $visit['degree_title'] ?? 'Not Assigned' ?></p>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                        <small class="mb-1 text-muted">Employee Type</small>
                        <p class="mb-0"><?= $visit['employee_type_name'] ?? '-' ?>
                        </p>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                        <small class="mb-1 text-muted">Role</small>
                        <p class="mb-0"><?= $visit['role_description'] ?? 'Not Assigned' ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xxl-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="m-0">Personal Details</h4>
                </div>
            </div>

            <div class="card-body pb-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-0 pt-0">
                        <div class="row">
                            <div class="mb-3 col-12 col-sm-12 col-md-12 col-lg-6">
                                <p class="mb-1 text-muted">Full Name</p>
                                <p class="mb-0"><?= $visit['full_name'] ?></p>
                            </div>
                            <div class="mb-3 col-12 col-sm-12 col-md-12 col-lg-6">
                                <p class="mb-1 text-muted">Email</p>
                                <p class="mb-0"><?= $visit['email_address']; ?>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item px-0">
                        <div class="row">
                            <div class="mb-3 col-12 col-sm-12 col-md-12 col-lg-6">
                                <p class="mb-1 text-muted">Address</p>
                                <p class="mb-0"><?= $visit['address'] ?? '-'; ?></p>
                            </div>

                            <div class="mb-3 col-12 col-sm-12 col-md-12 col-lg-6">
                                <p class="mb-1 text-muted">Phone</p>
                                <p class="mb-0"><?= $visit['mobile_number'] ?? '-'; ?></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0">
                        <div class="row">
                            <div class="mb-3 col-12 col-sm-6 col-md-6 col-lg-3">
                                <p class="mb-1 text-muted">Birth Date</p>
                                <p class="mb-0"><?= $visit['birthdate'] ?? '-'; ?></p>
                            </div>

                            <div class="mb-3 col-12 col-sm-6 col-md-6 col-lg-3">
                                <p class="mb-1 text-muted">Age</p>
                                <p class="mb-0"><?= $visit['age'] ?? '-'; ?></p>
                            </div>

                            <div class="mb-3 col-12 col-sm-12 col-md-12 col-lg-6">
                                <p class="mb-1 text-muted">Gender</p>
                                <p class="mb-0"><?= $visit['sex'] ?? '-'; ?></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-12">
        <!-- [ Promotion Table ] -->
        <?= $this->include('/Admin/Pages/Partials/promotion-table.php'); ?>
    </div>
</div>

<!-- [ Promotion Modal ] -->
<?= $this->include('/Admin/Pages/Partials/promotion-modal.php'); ?>


<?= $this->endSection(); ?>