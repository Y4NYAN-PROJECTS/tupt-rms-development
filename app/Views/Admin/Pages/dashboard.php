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

<!-- Top -->
<div class="row">
    <div class="col-md-4 col-xl-4">
        <div class="card social-widget-card bg-dark">
            <div class="card-body">
                <h3 class="text-white m-0"><?= $analytics['doctorate'] ?></h3>
                <span class="m-t-10">Doctorate Degree</span>
                <i class="ph-duotone ph-certificate"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl-4">
        <div class="card social-widget-card bg-primary">
            <div class="card-body">
                <h3 class="text-white m-0"><?= $analytics['masters'] ?></h3>
                <span class="m-t-10">Master's Degree</span>
                <i class="ph-duotone ph-graduation-cap"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl-4">
        <div class="card social-widget-card bg-secondary">
            <div class="card-body">
                <h3 class="text-white m-0"><?= $analytics['baccalaureate'] ?></h3>
                <span class="m-t-10">Baccalaureate</span>
                <i class="ph-duotone ph-student"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Graph -->
    <div class="col-md-6">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Total Income</h5>
                            <div class="dropdown">
                                <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti ti-dots-vertical f-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item ongoing-button" href="#">Download</a>
                                </div>
                            </div>
                        </div>
                        <div id="total-income-graph"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cards -->
    <div class="col-md-6">
        <div class="row">
            <div class="col-xxl-6 col-md-12">
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

            <div class="col-xxl-6 col-md-12">
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

            <div class="col-xxl-6 col-md-12">
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

            <div class="col-xxl-6 col-md-12">
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

            <div class="col-xxl-6 col-md-12">
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

            <div class="col-xxl-6 col-md-12">
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
    </div>
</div>

<script src="/assets/js/plugins/apexcharts.min.js"></script>
<script>
    var options8 = {
        chart: {
            height: 250,
            type: 'donut'
        },
        series: [
            <?php foreach ($analytics['categories'] as $category): ?>
                                <?php $count = $category['count']; ?>
                                <?= $count . "," ?>
        <?php endforeach; ?>
        ],
        colors: ['#4680FF', '#E58A00', '#2CA87F', '#4640FF'],
        labels: [
            <?php foreach ($analytics['categories'] as $category): ?>
                                <?php $title = $category['department_category_code']; ?>
                                <?= "'$title'," ?>
            <?php endforeach; ?>
        ],
        fill: {
            opacity: [1, 1, 1, 0.3]
        },
        legend: {
            show: true
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '70%',
                    labels: {
                        show: true,
                        name: {
                            show: true
                        },
                        value: {
                            show: true
                        }
                    }
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        responsive: [
            {
                breakpoint: 575,
                options: {
                    chart: {
                        height: 250
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '65%',
                                labels: {
                                    show: false
                                }
                            }
                        }
                    }
                }
            }
        ]
    };

    var chart = new ApexCharts(document.querySelector('#total-income-graph'), options8);
    chart.render();
</script>

<?= $this->endSection(); ?>