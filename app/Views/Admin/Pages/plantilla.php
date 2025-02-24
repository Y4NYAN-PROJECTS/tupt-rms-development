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
                    <li class="breadcrumb-item"><a href="">Plantilla</a></li>
                </ul>
            </div>

            <!-- [ Title ] -->
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Manage Plantilla/s</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($plantillas)): ?>
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-3 mb-sm-0">List of Plantilla/s</h4>
                        <div>
                            <a href="#" class="btn px-5 btn-primary" data-bs-toggle="modal" data-bs-target="#newPlantilla">Create New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 table-datatable">
                            <thead>
                                <tr>
                                    <th>Acronym</th>
                                    <th>Title</th>
                                    <th>Salary Grade</th>
                                    <th>Annual Salary</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($plantillas as $plantilla): ?>
                                    <tr>
                                        <td><?= $plantilla['plantilla_titlecode'] ?></td>
                                        <td><?= $plantilla['plantilla_title'] ?></td>
                                        <td><?= $plantilla['plantilla_salary_grade'] ?></td>
                                        <td><?= $plantilla['plantilla_annual_salary'] ?></td>
                                        <td class="text-center">
                                            <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#updatePlantilla" data-plantilla-id="<?= $plantilla['plantilla_id'] ?>" data-code="<?= $plantilla['plantilla_titlecode'] ?>" data-title="<?= $plantilla['plantilla_title'] ?>" data-salary-grade="<?= $plantilla['plantilla_salary_grade'] ?>" data-salary="<?= $plantilla['plantilla_annual_salary'] ?>">
                                                <i class="ti ti-edit f-20" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i>
                                            </a>

                                            <a href="#" class="avtar avtar-xs btn-link-secondary delete-plantilla-button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" data-plantilla-id="<?= $plantilla['plantilla_id'] ?>">
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
<?php else: ?>
    <div class="card">
        <div class="card-body d-flex justify-content-center align-items-center">
            <div class="text-center fst-italic my-5">
                <h1>No Plantilla/s Found</h1>
                <p class="m-0">There are no data found.</p>

                <a href="#" class="btn px-5 btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#newPlantilla">Create Plantilla</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- [ New Plantilla ] -->
<div class="modal fade" id="newPlantilla" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">New Plantilla</h3>
                    <small>Fill the data to create a new plantilla.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/AdminController/SavePlantilla" method="post">
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                            <label class="form-label" for="plntl-code">Plantilla Code</label>
                            <input type="text" class="form-control text-uppercase" id="plntl-code" placeholder="ex. INST1" name="plntl_titlecode" required />
                        </div>

                        <div class="col-sm-12 col-md-8 col-lg-8 mb-3">
                            <label class="form-label" for="plntl-title">Plantilla Title</label>
                            <input type="text" class="form-control" id="plntl-title" placeholder="Plantilla Title" name="plntl_title" required />
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label" for="plntl-slrygrd">Salary Grade</label>
                            <input type="text" class="form-control" id="plntl-slrygrd" placeholder="Salary Grade" name="plntl_salarygrade" required />
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label" for="plntl-slry">Salary</label>
                            <input type="text" class="form-control" id="plntl-slry" placeholder="Salary" name="plntl_annualsalary" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn px-5 btn-primary" type="submit" data-bs-dismiss="modal">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- [ Edit Plantilla ] -->
<div class="modal fade" id="updatePlantilla" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">Edit Plantilla</h3>
                    <small>Fill the data to create a new plantilla.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/AdminController/SavePlantilla" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                            <label class="form-label" for="updt-plntl-code">Plantilla Code</label>
                            <input type="text" class="form-control text-uppercase" id="updt-plntl-code" placeholder="ex. INST1" name="plntl_titlecode" required />
                        </div>

                        <div class="col-sm-12 col-md-8 col-lg-8 mb-3">
                            <label class="form-label" for="updt-plntl-title">Plantilla Title</label>
                            <input type="text" class="form-control" id="updt-plntl-title" placeholder="Plantilla Title" name="plntl_title" required />
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label" for="updt-plntl-slrygrd">Salary Grade</label>
                            <input type="text" class="form-control" id="updt-plntl-slrygrd" placeholder="Salary Grade" name="plntl_salarygrade" required />
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label" for="updt-plntl-slry">Salary</label>
                            <input type="text" class="form-control" id="updt-plntl-slry" placeholder="Salary" name="plntl_annualsalary" required />
                        </div>

                        <!-- [ Hidden Input] -->
                        <input type="hidden" id="updt-plntl-id" name="plntl_id" />
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn px-5 btn-primary" type="submit" data-bs-dismiss="modal">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('a[data-title]').forEach(function (anchor) {
            anchor.addEventListener('click', function (event) {
                event.preventDefault();

                const plantillaid = this.getAttribute('data-plantilla-id')
                const code = this.getAttribute('data-code');
                const title = this.getAttribute('data-title');
                const salarygrade = this.getAttribute('data-salary-grade');
                const salary = this.getAttribute('data-salary');

                console.log('plantillaid:', plantillaid);
                console.log('code:', code);
                console.log('title:', title);
                console.log('salarygrade:', salarygrade);
                console.log('salary:', salary);

                const modalId = document.getElementById('updt-plntl-id');
                const modalTitle = document.getElementById('updt-plntl-title');
                const modalCode = document.getElementById('updt-plntl-code');
                const modalSalaryGrade = document.getElementById('updt-plntl-slrygrd');
                const modalSalary = document.getElementById('updt-plntl-slry');
                const modalStatus = document.getElementById('updt-plntl-stts');

                if (modalId) modalId.value = plantillaid;
                if (modalTitle) modalTitle.value = title;
                if (modalCode) modalCode.value = code;
                if (modalSalaryGrade) modalSalaryGrade.value = salarygrade;
                if (modalSalary) modalSalary.value = salary;
            });
        });
    });
</script>

<?= $this->endSection(); ?>