<?= $this->extend('/Admin/Components/main-layout'); ?>
<?= $this->section('content'); ?>

<!-- [ Header ] -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <!-- [ Breadcrumbs ] -->
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/AdminController/DashboardPage">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Accounts</a></li>
                    <li class="breadcrumb-item">Administrator</li>
                </ul>
            </div>
            <!-- [ Title ] -->
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Administrator List</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($administrators)): ?>
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-3 mb-sm-0">Current Active List</h4>
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
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Employee Type</th>
                                    <th>Departments</th>
                                    <th>Plantilla</th>
                                    <th>Role</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($administrators as $administrator): ?>
                                    <tr>
                                        <td><?= $administrator['id_number'] ?></td>
                                        <td><?= $administrator['full_name'] ?></td>
                                        <td><?= $administrator['sex'] ?? '-' ?></td>
                                        <td><?= $administrator['email_address'] ?></td>
                                        <td><?= $administrator['employee_type_name'] ?></td>
                                        <td><?= $administrator['department_name'] ?></td>
                                        <td><?= $administrator['plantilla_title'] ?></td>
                                        <td><?= $administrator['role_code'] ?? 'Not Assigned' ?></td>
                                        <td class="text-center">
                                            <a href="/AdminController/ProfileVisit/<?= $administrator['account_code'] ?>" class="avtar avtar-xs btn-link-secondary">
                                                <i class="ti ti-eye-off f-20" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Visit Profile"></i>
                                            </a>

                                            <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#updateUserDetailModal" data-account-id="<?= $administrator['account_id'] ?>" data-role-id="<?= $administrator['role_id'] ?? 0 ?>" data-department-id="<?= $administrator['department_id'] ?? 0 ?>" data-employee-type-id="<?= $administrator['employee_type_id'] ?? 0 ?>" data-user-type-id="<?= $administrator['user_type'] ?? 0 ?>" data-plantilla-id="<?= $administrator['plantilla_id'] ?? 0 ?>">
                                                <i class="ti ti-edit f-20" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update"></i>
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
                <h1>No Adminstrator/s Found!</h1>
                <p class="m-0">There are no adminstrator accounts.</p>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- [ Update User Details ] -->
<div class="modal fade" id="updateUserDetailModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">Update Details</h3>
                    <small>Changes will reflect right away.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/AdminController/UpdateUserDetails" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="updt-emptype-id">Employee Type</label>
                                <select name="admn_employeetype" id="updt-emptype-id" class="form-control" required>
                                    <?php foreach ($employeetypes as $employeetype): ?>
                                        <option value="<?= $employeetype['employee_type_id']; ?>">
                                            <?= $employeetype['employee_type_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="updt-role-id">Role</label>
                                <select name="admn_role" id="updt-role-id" class="form-control">
                                    <option value="0">Select Role</option>
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?= $role['role_id']; ?>">
                                            <?= $role['role_code']; ?> - <?= $role['role_description']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="updt-dept-id">Department</label>
                                <select name="admn_department" id="updt-dept-id" class="form-control" required>
                                    <?php foreach ($departments as $department): ?>
                                        <option value="<?= $department['department_id']; ?>">
                                            <?= $department['department_acronym']; ?> - <?= $department['department_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="updt-usertype-id">User Type <small class="form-text text-muted">(This will change the access level of user)</small></label>
                                <select name="admn_usertype" id="updt-usertype-id" class="form-control" required>
                                    <option value="1">Administrator</option>
                                    <option value="2">Employee</option>
                                </select>
                            </div>
                        </div>

                        <!-- [ Hidden Input/s -->
                        <input type="hidden" id="updt-role-accountid" name="admn_accountid">
                        <!-- [ Hidden Input/s -->
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary px-5" type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('a[data-role-id]').forEach(function (anchor) {
            anchor.addEventListener('click', function (event) {
                event.preventDefault();

                const roleid = this.getAttribute('data-role-id');
                const departmentid = this.getAttribute('data-department-id');
                const employeetypeid = this.getAttribute('data-employee-type-id');
                const usertypeid = this.getAttribute('data-user-type-id');
                const accountid = this.getAttribute('data-account-id');

                console.log('roleid:', roleid);
                console.log('departmentid:', departmentid);
                console.log('employeetypeid:', employeetypeid);
                console.log('usertypeid:', usertypeid);
                console.log('accountid:', accountid);

                const modalroleId = document.getElementById('updt-role-id');
                const modaldeptId = document.getElementById('updt-dept-id');
                const modalemptypeId = document.getElementById('updt-emptype-id');
                const modalusertypeId = document.getElementById('updt-usertype-id');
                const modalaccountId = document.getElementById('updt-role-accountid');

                if (modalroleId) modalroleId.value = roleid;
                if (modaldeptId) modaldeptId.value = departmentid;
                if (modalemptypeId) modalemptypeId.value = employeetypeid;
                if (modalusertypeId) modalusertypeId.value = usertypeid;
                if (modalaccountId) modalaccountId.value = accountid;
            });
        });
    });
</script>

<?= $this->endSection(); ?>