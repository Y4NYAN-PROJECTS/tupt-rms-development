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
                    <li class="breadcrumb-item"><a href="">Role</a></li>
                </ul>
            </div>

            <!-- [ Title ] -->
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Manage Role/s</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($roles)): ?>
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-sm-center justify-content-sm-between text-center">
                        <h4 class="mb-3 mb-sm-0">List of Role/s</h4>
                        <a href="#" class="btn px-sm-5 btn-primary" data-bs-toggle="modal" data-bs-target="#newRole">
                            Create New
                        </a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 table-datatable">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($roles as $role): ?>
                                    <tr>
                                        <td><?= $role['role_code'] ?></td>
                                        <td><?= $role['role_description'] ?></td>
                                        <td class="text-center">
                                            <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#updateRole" data-role-id="<?= $role['role_id'] ?>" data-code="<?= $role['role_code'] ?>" data-description="<?= $role['role_description'] ?>">
                                                <i class="ti ti-edit f-20" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i>
                                            </a>

                                            <a href="#" class="avtar avtar-xs btn-link-secondary delete-role-button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" data-role-id="<?= $role['role_id'] ?>">
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
                <h1>No Role/s Found</h1>
                <p class="m-0">There are no data found.</p>

                <a href="#" class="btn px-5 btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#newRole">Create Role</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- [ New Role ] -->
<div class="modal fade" id="newRole" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">New Role</h3>
                    <small>Fill the data to create a new role.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/AdminController/SaveRole" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                            <label class="form-label" for="rl-code">Role Code</label>
                            <input type="text" class="form-control text-uppercase" id="rl-code" placeholder="ex. SH" name="role_code" required />
                        </div>

                        <div class="col-sm-12 col-md-8 col-lg-8 mb-3">
                            <label class="form-label" for="rl-description">Role Description</label>
                            <input type="text" class="form-control" id="rl-description" placeholder="Role Description" name="role_description" required />
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

<!-- [ Edit Role ] -->
<div class="modal fade" id="updateRole" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">Edit Role</h3>
                    <small>Fill the data to create a new role.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/AdminController/SaveRole" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                            <label class="form-label" for="updt-rl-code">Role Code</label>
                            <input type="text" class="form-control text-uppercase" id="updt-rl-code" placeholder="ex. SH" name="role_code" required />
                        </div>

                        <div class="col-sm-12 col-md-8 col-lg-8 mb-3">
                            <label class="form-label" for="updt-rl-description">Role Description</label>
                            <input type="text" class="form-control" id="updt-rl-description" placeholder="Role Description" name="role_description" required />
                        </div>

                        <!-- [ Hidden Input] -->
                        <input type="hidden" id="updt-rl-id" name="role_id" />
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
        document.querySelectorAll('a[data-code]').forEach(function (anchor) {
            anchor.addEventListener('click', function (event) {
                event.preventDefault();

                const roleid = this.getAttribute('data-role-id')
                const code = this.getAttribute('data-code');
                const description = this.getAttribute('data-description');

                console.log('roleid:', roleid);
                console.log('code:', code);
                console.log('description:', description);

                const modalId = document.getElementById('updt-rl-id');
                const modalCode = document.getElementById('updt-rl-code');
                const modalDescription = document.getElementById('updt-rl-description');

                if (modalId) modalId.value = roleid;
                if (modalCode) modalCode.value = code;
                if (modalDescription) modalDescription.value = description;
            });
        });
    });
</script>

<?= $this->endSection(); ?>