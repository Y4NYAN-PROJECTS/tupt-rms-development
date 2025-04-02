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
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="m-0">Promotion History</h4>
                    <button class="btn btn-primary px-5" type="button" data-bs-toggle="modal" data-bs-target="#newPromotion">Add New</button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 table-datatable">
                        <thead>
                            <tr>
                                <th>Promoted To</th>
                                <th>Date Promoted</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($promtionhistories as $promtionhistory): ?>
                                <tr>
                                    <td><?= $promtionhistory['plantilla_title'] ?></td>
                                    <td><?= $promtionhistory['date_promoted'] ?></td>
                                    <td class="text-center">
                                        <a href="#" class="avtar avtar-xs btn-link-secondary promotion-delete-button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" data-promotion-id="<?= $promtionhistory['promotion_history_id'] ?>">
                                            <i class="ti ti-trash f-20 text-primary"></i>
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

<!-- [ New Promotion ] -->
<div class="modal fade" id="newPromotion" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">Promotion Details</h3>
                    <small>Fill the data to document promotion.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/AdminController/SavePromotion" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="prmtn-plantilla">Plantilla Title</label>
                            <select name="prmtn_plantilla" class="form-control" id="prmtn-plantilla">
                                <?php foreach ($plantillas as $plantilla): ?>
                                    <option value="<?= $plantilla['plantilla_id'] ?>"><?= $plantilla['plantilla_title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label" for="prmtn-date">Date of Appointment</label>
                            <input type="date" class="form-control" id="prmtn-date" placeholder="Salary" name="prmtn_date" required value="<?= $datenow ?>" />
                        </div>
                    </div>

                    <!-- [ Hidden Input/s ] -->
                    <input type="hidden" name="prmtn_accountid" value="<?= $visit['account_id'] ?>">
                    <input type="hidden" name="prmtn_accountcode" value="<?= $visit['account_code'] ?>">
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn px-5 btn-primary" type="submit" data-bs-dismiss="modal">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>