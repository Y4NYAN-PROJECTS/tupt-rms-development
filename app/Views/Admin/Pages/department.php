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
                    <li class="breadcrumb-item"><a href="">Department</a></li>
                </ul>
            </div>

            <!-- [ Title ] -->
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Manage Department/s</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($departments)): ?>
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-sm-center justify-content-sm-between text-center">
                        <h4 class="mb-3 mb-sm-0">List of Department</h4>
                        <div>
                            <a href="#" class="btn px-sm-5 btn-primary" data-bs-toggle="modal" data-bs-target="#newdepartment">Create New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 table-datatable">
                            <thead>
                                <tr>
                                    <th>Department Code</th>
                                    <th>Department Title</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($departments as $department): ?>
                                    <tr>
                                        <td><?= $department['department_acronym'] ?></td>
                                        <td><?= $department['department_name'] ?></td>

                                        <td class="text-center">
                                            <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#updateDepartment" data-department-id="<?= $department['department_id'] ?>" data-acronym="<?= $department['department_acronym'] ?>" data-name="<?= $department['department_name'] ?>" data-category-id="<?= $department['department_category_id'] ?>">
                                                <i class=" ti ti-edit f-20" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i>
                                            </a>

                                            <a href="#" class="avtar avtar-xs btn-link-secondary delete-department-button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" data-department-id="<?= $department['department_id'] ?>">
                                                <i class="ti ti-trash f-20 text-primary"></i>
                                            </a>

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
                <h1>No Department/s Found</h1>
                <p class="m-0">There are no data found.</p>

                <a href="#" class="btn px-5 btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#newdepartment">Create Department</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- [ New Department ] -->
<div class="modal fade" id="newdepartment" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">New Department</h3>
                    <small>Fill the data to create a new Department.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/AdminController/SaveDepartment" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label" for="dept-category">Department Category</label>
                            <select class="form-control" id="dept-category" name="department_category" required>
                                <option value="">Select Category</option>
                                <?php foreach ($departmentcategories as $category): ?>
                                    <option value="<?= $category['department_category_id'] ?>"><?= $category['department_category_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label" for="dept-code ">Department Code</label>
                            <input type="text" class="form-control text-uppercase" id="dept-code" placeholder="ex. BASD" name="department_code" required />
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                            <label class="form-label" for="dept-name">Department Name</label>
                            <input type="text" class="form-control" id="dept-name" placeholder="Department Name" name="department_name" required />
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

<!-- [ Edit Department ] -->
<div class="modal fade" id="updateDepartment" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">Update Department</h3>
                    <small>Fill the data to update a new Department.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/AdminController/SaveDepartment" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label" for="updt-dept-category">Department Category</label>
                            <select class="form-control" id="updt-dept-category" name="department_category" required>
                                <option value="">Select Category</option>
                                <?php foreach ($departmentcategories as $category): ?>
                                    <option value="<?= $category['department_category_id'] ?>"><?= $category['department_category_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label" for="updt-dept-code">Department Code</label>
                            <input type="text" class="form-control text-uppercase" id="updt-dept-code" placeholder="ex. BASD" name="department_code" required />
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                            <label class="form-label" for="updt-dept-name">Department Name</label>
                            <input type="text" class="form-control" id="updt-dept-name" placeholder="Department Name" name="department_name" required />
                        </div>
                    </div>

                    <!-- [ Hidden Input ] -->
                    <input type="hidden" id="updt-dept-id" name="department_id">
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
        document.querySelectorAll('a[data-name]').forEach(function (anchor) {
            anchor.addEventListener('click', function (event) {
                event.preventDefault();

                const departmentid = this.getAttribute('data-department-id');
                const categoryid = this.getAttribute('data-category-id');
                const acronym = this.getAttribute('data-acronym');
                const name = this.getAttribute('data-name');

                console.log('departmentid:', departmentid);
                console.log('categoryid:', categoryid);
                console.log('acronym:', acronym);
                console.log('name:', name);

                const modalId = document.getElementById('updt-dept-id');
                const modalCategory = document.getElementById('updt-dept-category');
                const modalName = document.getElementById('updt-dept-name');
                const modalCode = document.getElementById('updt-dept-code');

                if (modalId) modalId.value = departmentid;
                if (modalCategory) modalCategory.value = categoryid;
                if (modalName) modalName.value = name;
                if (modalCode) modalCode.value = acronym;

            });
        });
    });
</script>

<?= $this->endSection(); ?>