<?= $this->extend('/Employee/Components/main-layout'); ?>
<?= $this->section('content'); ?>

<!-- [ Header ] -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <!-- [ Breadcrumbs ] -->
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Dashboards</li>
                </ul>
            </div>
            <!-- [ Title ] -->
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Dashboard</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xxl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 me-3">
                        <p class="mb-1 fw-medium text-muted">All Users</p>
                        <h4 class="mb-1"><?= $analytics['allusers'] ?></h4>
                        <p class="mb-0 text-sm">All Employees</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="avtar avtar-l bg-light-success rounded-circle">
                            <i class="ph-duotone ph-users f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 me-3">
                        <p class="mb-1 fw-medium text-muted">Retired</p>
                        <h4 class="mb-1"><?= $analytics['retired'] ?></h4>
                        <p class="mb-0 text-sm">Retired Employees</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="avtar avtar-l bg-light-primary rounded-circle">
                            <i class="ph-duotone ph-person-arms-spread f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 me-3">
                        <p class="mb-1 fw-medium text-muted">Senior Citizen</p>
                        <h4 class="mb-1"><?= $analytics['senior'] ?></h4>
                        <p class="mb-0 text-sm">Senior Employees</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="avtar avtar-l bg-light-warning rounded-circle">
                            <i class="ph-duotone ph-person f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 me-3">
                        <p class="mb-1 fw-medium text-muted">Active</p>
                        <h4 class="mb-1"><?= $analytics['active'] ?></h4>
                        <p class="mb-0 text-sm">Active Employees</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="avtar avtar-l bg-light-success rounded-circle">
                            <i class="ph-duotone ph-shield-check f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 me-3">
                        <p class="mb-1 fw-medium text-muted">Male</p>
                        <h4 class="mb-1"><?= $analytics['male'] ?></h4>
                        <p class="mb-0 text-sm">Male Employees</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="avtar avtar-l bg-light-secondary rounded-circle">
                            <i class="ph-duotone ph-gender-male f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 me-3">
                        <p class="mb-1 fw-medium text-muted">Female</p>
                        <h4 class="mb-1"><?= $analytics['female'] ?></h4>
                        <p class="mb-0 text-sm">Female Employees</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="avtar avtar-l bg-light-secondary rounded-circle">
                            <i class="ph-duotone ph-gender-female f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<script>

</script>

<?= $this->endSection(); ?>