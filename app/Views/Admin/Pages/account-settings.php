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
                    <li class="breadcrumb-item"><a href="">Setting</a></li>
                </ul>
            </div>

            <!-- [ Title ] -->
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Setting</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow-none border">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="/assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-55 rounded-circle" />
                    </div>
                    <div class="flex-grow-1 mx-3">
                        <h6 class="mb-0">Airi Satou</h6>
                        <p class="mb-0">Maiduguri, Borno State</p>
                    </div>
                    <div class="flex-shrink-0">
                        <button class="btn btn-sm btn-light-secondary"><i class="ti ti-edit"></i> Edit</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card shadow-none border mb-0 h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-3">
                                        <h6 class="mb-0">Email Address</h6>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <button class="btn btn-sm btn-light-secondary"><i class="ti ti-edit"></i>
                                            Edit</button>
                                    </div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Your email address is</label>
                                    <input type="email" class="form-control" placeholder="Enter email" value="emailis@private.com">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-none border mb-0 h-100">
                            <div class="card-body">
                                <h6 class="mb-2">Password</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" placeholder="Enter New Password" value="emailis">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Current Password</label>
                                            <input type="password" class="form-control" placeholder="Enter Current Password" value="emailis">
                                        </div>
                                    </div>
                                </div>
                                <p>Can’t Remember your current password? <a href="#" class="link-primary text-decoration-underline">Reset your password</a>
                                </p>
                                <button class="btn btn-primary">Save Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>