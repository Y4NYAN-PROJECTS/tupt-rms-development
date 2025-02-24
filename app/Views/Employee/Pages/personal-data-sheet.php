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
                    <li class="breadcrumb-item">PDS</li>
                </ul>
            </div>
            <!-- [ Title ] -->
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Personal Data Sheet</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xxl-12 col-md-12">
        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link position-relative <?= (session()->get('fd_column') == 'personal') ? 'active' : ''; ?>" id="personal-tab" href="#personal" aria-controls="personal" aria-selected="false" data-bs-toggle="tab" role="tab">Personal
                    <?php if (!$checkpersonal): ?>
                        <span class="position-absolute top-5 start-100 translate-middle badge rounded-circle bg-danger p-1"><span class="visually-hidden"></span></span>
                    <?php endif; ?>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link position-relative <?= (session()->get('fd_column') == 'family') ? 'active' : '' ?>" id="family-tab" href="#family" aria-controls="family" aria-selected="false" data-bs-toggle="tab" role="tab">Family
                    <?php if (!$checkfamily): ?>
                        <span class="position-absolute top-5 start-100 translate-middle badge rounded-circle bg-danger p-1"><span class="visually-hidden"></span></span>
                    <?php endif; ?>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link position-relative <?= (session()->get('fd_column') == 'education') ? 'active' : ''; ?>" id="education-tab" href="#education" aria-controls="education" aria-selected="false" data-bs-toggle="tab" role="tab">Education
                    <?php if (!$checkeducation): ?>
                        <span class="position-absolute top-5 start-100 translate-middle badge rounded-circle bg-danger p-1"><span class="visually-hidden"></span></span>
                    <?php endif; ?>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link position-relative <?= (session()->get('fd_column') == 'civil_service') ? 'active' : ''; ?>" id="civil-tab" href="#civil" aria-controls="civil" aria-selected="false" data-bs-toggle="tab" role="tab">Civil Service
                    <?php if (!$checkcivilservice): ?>
                        <span class="position-absolute top-5 start-100 translate-middle badge rounded-circle bg-danger p-1"><span class="visually-hidden"></span></span>
                    <?php endif; ?>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link position-relative <?= (session()->get('fd_column') == 'work_experience') ? 'active' : ''; ?>" id="work-tab" href="#work" aria-controls="work" aria-selected="false" data-bs-toggle="tab" role="tab">Work Experience
                    <?php if (!$checkworkexperience): ?>
                        <span class="position-absolute top-5 start-100 translate-middle badge rounded-circle bg-danger p-1"><span class="visually-hidden"></span></span>
                    <?php endif; ?>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link position-relative <?= (session()->get('fd_column') == 'voluntary_work') ? 'active' : ''; ?>" id="voluntary-tab" href="#voluntary" aria-controls="voluntary" aria-selected="false" data-bs-toggle="tab" role="tab">Voluntary Work
                    <?php if (!$checkvoluntarywork): ?>
                        <span class="position-absolute top-5 start-100 translate-middle badge rounded-circle bg-danger p-1"><span class="visually-hidden"></span></span>
                    <?php endif; ?>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link position-relative <?= (session()->get('fd_column') == 'training_program') ? 'active' : ''; ?>" id="programs-tab" href="#programs" aria-controls="programs" aria-selected="false" data-bs-toggle="tab" role="tab">Training Program
                    <?php if (!$checktrainingprogram): ?>
                        <span class="position-absolute top-5 start-100 translate-middle badge rounded-circle bg-danger p-1"><span class="visually-hidden"></span></span>
                    <?php endif; ?>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link position-relative <?= (session()->get('fd_column') == 'other_information') ? 'active' : ''; ?>" id="others-tab" href="#others" aria-controls="others" aria-selected="false" data-bs-toggle="tab" role="tab">Others
                    <?php if (!$checkotherinformation): ?>
                        <span class="position-absolute top-5 start-100 translate-middle badge rounded-circle bg-danger p-1"><span class="visually-hidden"></span></span>
                    <?php endif; ?>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link position-relative <?= (session()->get('fd_column') == 'final') ? 'active' : ''; ?>" id="final-tab" href="#final" aria-controls="final" aria-selected="false" data-bs-toggle="tab" role="tab">Final
                    <?php if (!$checkfinal): ?>
                        <span class="position-absolute top-5 start-100 translate-middle badge rounded-circle bg-danger p-1"><span class="visually-hidden"></span></span>
                    <?php endif; ?>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link position-relative" id="pds-print-tab" target="_blank" href="/EmployeeController/PDSPrintPage">
                    <span class="pc-micon">
                        <i data-feather="printer"></i>
                    </span>
                </a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- [ Personal ] -->
            <div class="tab-pane fade <?= (session()->get('fd_column') == 'personal') ? 'show active' : ''; ?>" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                <form action="/EmployeeController/SavePDS" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center mb-0">Personal Information</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <h5>Personal Details</h5>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                                    <label class="form-label" for="form-fn">First Name <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-fn" name="prsnl_firstname" placeholder="First Name" value="<?= $checkpersonal ? $personal['first_name'] : '' ?>" required>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                                    <label class="form-label" for="form-mn">Middle Name</label>
                                    <input type="text" class="form-control" id="form-mn" name="prsnl_middlename" placeholder="Middle Name" value="<?= $checkpersonal ? $personal['middle_name'] : '' ?>">
                                </div>

                                <div class="col-sm-8 col-md-6 col-lg-3 mb-3">
                                    <label class="form-label" for="form-ln">Last Name <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-ln" name="prsnl_lastname" placeholder="Last Name" value="<?= $checkpersonal ? $personal['last_name'] : '' ?>" required>
                                </div>

                                <input type="hidden" id="extensionname" value="<?= $checkpersonal ? $personal['extension_name'] : 'N/A' ?>">
                                <div class="col-sm-4 col-md-6 col-lg-2 mb-3">
                                    <label class="form-label" for="extensionname-select">Extension</label>
                                    <select class="form-control" id="extensionname-select" name="prsnl_extension">
                                        <option value="N/A">N/A</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Sr.">Sr.</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                                    <label class="form-label" for="form-pob">Place of Birth <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-pob" name="prsnl_placeofbirth" placeholder="Place of Birth" value="<?= $checkpersonal ? $personal['place_of_birth'] : '' ?>" required>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="form-bd">Birthdate <span class="text-primary">*</span></label>
                                    <input type="date" class="form-control" id="form-bd" name="prsnl_birthdate" placeholder="Select date" value="<?= $checkpersonal ? $personal['birthdate'] : date('d/m/Y') ?>" required>
                                </div>

                                <input type="hidden" id="sex" value="<?= $checkpersonal ? $personal['sex'] : 'Male' ?>">
                                <div class="col-sm-6 col-md-3 col-lg-3 mb-3">
                                    <label class="form-label" for="sex-select">Sex <span class="text-primary">*</span></label>
                                    <select class="form-select" id="sex-select" name="prsnl_sex" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <input type="hidden" id="civilstatus" value="<?= $checkpersonal ? $personal['civil_status'] : 'Single' ?>">
                                <div class="col-sm-6 col-md-3 col-lg-3 mb-3">
                                    <label class="form-label" for="civilstatus-select">Civil Status <span class="text-primary">*</span></label>
                                    <select class="form-select" id="civilstatus-select" name="prsnl_civilstatus" required>
                                        <option value="Single">Single</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Married">Married</option>
                                        <option value="Seperated">Seperated</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>

                                <div class="col-sm-4 col-md-3 col-lg-2 mb-3">
                                    <label class="form-label" for="form-hgt">Height <span class="text-primary">*</span></label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="form-hgt" name="prsnl_height" value="<?= $checkpersonal ? $personal['height'] : 0 ?>" required>
                                        <span class="input-group-text">m</span>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-3 col-lg-2 mb-3">
                                    <label class="form-label" for="form-wgt">Weight <span class="text-primary">*</span></label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="form-wgt" name="prsnl_weight" value="<?= $checkpersonal ? $personal['weight'] : 0 ?>" required>
                                        <span class="input-group-text">kg</span>
                                    </div>
                                </div>

                                <input type="hidden" id="bloodtype" value="<?= $checkpersonal ? $personal['blood_type'] : 'A+' ?>">
                                <div class="col-sm-4 col-md-6 col-lg-2 mb-3">
                                    <label class="form-label" for="bloodtype-select">Blood Type</label>
                                    <select class="form-select" id="bloodtype-select" name="prsnl_bloodtype">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O+">O-</option>
                                    </select>
                                </div>

                                <h5>Documents</h5>
                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="form-gsis">GSIS ID No. <span class="text-primary">*</span></label>
                                    <input type="number" class="form-control" id="form-gsis" name="prsnl_gsis" placeholder="GSIS ID No." value="<?= $checkpersonal ? $personal['gsis'] : '' ?>" required>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="form-pgbg">PAGIBIG ID No. <span class="text-primary">*</span></label>
                                    <input type="number" class="form-control" id="form-pgbg" name="prsnl_pagibig" placeholder="PAGIBIG ID No." value="<?= $checkpersonal ? $personal['pagibig'] : '' ?>" required>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="form-phl">Philhealth No. <span class="text-primary">*</span></label>
                                    <input type="number" class="form-control" id="form-phl" name="prsnl_philhealth" placeholder="Philhealth No." value="<?= $checkpersonal ? $personal['philhealth'] : '' ?>" required>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="form-sss">SSS No. <span class="text-primary">*</span></label>
                                    <input type="number" class="form-control" id="form-sss" name="prsnl_sss" placeholder="SSS No." value="<?= $checkpersonal ? $personal['sss'] : '' ?>" required>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="form-tin">TIN No. <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-tin" name="prsnl_tin" placeholder="TIN No." value="<?= $checkpersonal ? $personal['tin'] : '' ?>" required>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="form-ae">Agency Employee No. <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-ae" name="prsnl_agency" placeholder="Agency Employee No." value="<?= $checkpersonal ? $personal['agency'] : '' ?>" required>
                                </div>

                                <h5>Citizenship</h5>
                                <input type="hidden" id="citizenship" value="<?= $checkpersonal ? $personal['citizenship'] : 'Filipino' ?>">
                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="citizenship-select">Citizenship <span class="text-primary">*</span></label>
                                    <select class="form-select" id="citizenship-select" name="prsnl_citizenship" required>
                                        <option value="Filipino">Filipino</option>
                                        <option value="Dual Citizenship">Dual Citizenship</option>
                                    </select>
                                </div>

                                <input type="hidden" id="citizenship-by" value="<?= $checkpersonal ? $personal['citizenship_by'] : 'By Birth' ?>">
                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="citizenship-by-select">Citizenship by <span class="text-primary">*</span></label>
                                    <select class="form-select" id="citizenship-by-select" name="prsnl_citizenshipby" required>
                                        <option>By Birth</option>
                                        <option>By Naturalization</option>
                                    </select>
                                </div>

                                <input type="hidden" id="country" value="<?= $checkpersonal ? $personal['second_country'] : 'Philippines' ?>">
                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <small class="form-text text-muted">If holder of dual citizenship, Please select country:</small>
                                    <select class="form-select" id="country-select" name="prsnl_secondcountry" disabled></select>
                                </div>

                                <h5>Residential Address</h5>

                                <div class="col-sm-12 col-md-4 col-lg-6 mb-3">
                                    <label class="form-label" for="ra-blk">House/Block/Lot No. <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="ra-blk" name="prsnl_residentialnumber" placeholder="House/Block/Lot No." value="<?= $checkpersonal ? $personal['raddress_no'] : '' ?>" required>
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-6 mb-3">
                                    <label class="form-label" for="ra-st">Street <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="ra-st" name="prsnl_residentialstreet" placeholder="Street" value="<?= $checkpersonal ? $personal['raddress_street'] : '' ?>" required>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="ra-vllg">Subdivision/Village <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="ra-vllg" name="prsnl_residentialvillage" placeholder="Subdivision/Village" value="<?= $checkpersonal ? $personal['raddress_village'] : '' ?>" required>
                                </div>

                                <!-- Resident Address Hidden Values -->
                                <input type="hidden" id="resident-city" value="<?= $checkpersonal ? $personal['raddress_city'] : '' ?>">
                                <input type="hidden" id="prsnl_residentialcity" name="prsnl_residentialcity">

                                <input type="hidden" id="resident-barangay" value="<?= $checkpersonal ? $personal['raddress_barangay'] : '' ?>">
                                <input type="hidden" id="prsnl_residentialbarangay" name="prsnl_residentialbarangay">
                                <!-- Resident Address Hidden Values -->

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="ra-city">City <span class="text-primary">*</span></label>
                                    <select class="form-control" id="ra-city">
                                    </select>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="ra-brgy">Barangay <span class="text-primary">*</span></label>
                                    <select class="form-control" id="ra-brgy" disabled required>
                                        <option value="">Select City</option>
                                    </select>
                                </div>

                                <div class="col-sm-8 col-md-8 col-lg-6 mb-3">
                                    <label class="form-label" for="ra-prvnc">Province </label>
                                    <input type="text" class="form-control" id="ra-prvnc" name="prsnl_residentialprovince" placeholder="Province" value="<?= $checkpersonal ? $personal['raddress_province'] : '' ?>" required>
                                </div>

                                <div class="col-sm-4 col-md-4 col-lg-6 mb-3">
                                    <label class="form-label" for="ra-zip">Zip Code <span class="text-primary">*</span></label>
                                    <input type="number" class="form-control" id="ra-zip" name="prsnl_residentialzipcode" placeholder="Zip Code" value="<?= $checkpersonal ? $personal['raddress_zipcode'] : '' ?>" required>
                                </div>

                                <h5>Permanent Address</h5>
                                <div class="col-sm-12 col-md-12 col-lg-12 my-3">
                                    <div class="form-check form-switch custom-switch-v1 mb-2">
                                        <input type="checkbox" class="form-check-input input-primary" id="permanent-address-toggle">
                                        <label class="form-check-label" for="permanent-address-toggle">Same as Residential Address</label>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-6 mb-3">
                                    <label class="form-label" for="pa-blk">House/Block/Lot No. <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="pa-blk" name="prsnl_permanentnumber" placeholder="House/Block/Lot No." value="<?= $checkpersonal ? $personal['paddress_no'] : '' ?>" required>
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-6 mb-3">
                                    <label class="form-label" for="pa-st">Street <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="pa-st" name="prsnl_permanentstreet" placeholder="Street" value="<?= $checkpersonal ? $personal['paddress_street'] : '' ?>" required>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="pa-vllg">Subdivision/Village <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="pa-vllg" name="prsnl_permanentvillage" placeholder="Subdivision/Village" value="<?= $checkpersonal ? $personal['paddress_village'] : '' ?>" required>
                                </div>

                                <!-- Permanent Address Hidden Values -->
                                <input type="hidden" id="permanent-city" value="<?= $checkpersonal ? $personal['paddress_city'] : '' ?>">
                                <input type="hidden" id="prsnl_permanentcity" name="prsnl_permanentcity">

                                <input type="hidden" id="permanent-barangay" value="<?= $checkpersonal ? $personal['paddress_barangay'] : '' ?>">
                                <input type="hidden" id="prsnl_permanentbarangay" name="prsnl_permanentbarangay">
                                <!-- Permanent Address Hidden Values -->

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="pa-city">City <span class="text-primary">*</span></label>
                                    <select class="form-control" id="pa-city" required></select>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="pa-brgy">Barangay <span class="text-primary">*</span></label>
                                    <select class="form-control" id="pa-brgy" disabled>
                                        <option value="">Select City</option>
                                    </select>
                                </div>

                                <div class="col-sm-8 col-md-8 col-lg-6 mb-3">
                                    <label class="form-label" for="pa-prvnc">Province </label>
                                    <input type="text" class="form-control" id="pa-prvnc" name="prsnl_permanentprovince" placeholder="Province" value="<?= $checkpersonal ? $personal['paddress_province'] : '' ?>" required>
                                </div>

                                <div class="col-sm-4 col-md-4 col-lg-6 mb-3">
                                    <label class="form-label" for="pa-zip">Zip Code <span class="text-primary">*</span></label>
                                    <input type="number" class="form-control" id="pa-zip" name="prsnl_permanentzipcode" placeholder="Zip Code" value="<?= $checkpersonal ? $personal['paddress_zipcode'] : '' ?>" required>
                                </div>

                                <h5>Contact Information</h5>
                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="">Telephone No.</label>
                                    <input type="number" class="form-control" id="" name="prsnl_telephone" placeholder="Telephone No." value="<?= $checkpersonal ? $personal['telephone_no'] : '' ?>">
                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="">Mobile No. <span class="text-primary">*</span></label>
                                    <input type="number" class="form-control" id="" name="prsnl_mobilenumber" placeholder="Mobile No." value="<?= $checkpersonal ? $personal['mobile_no'] : '' ?>" required>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="">Email Address <span class="text-primary">*</span></label>
                                    <input type="email" class="form-control" id="" name="prsnl_emailaddress" placeholder="Email Address" value="<?= $checkpersonal ? $personal['email_address'] : '' ?>" required>
                                </div>

                                <input type="hidden" name="pds_column" value="personal">
                                <input type="hidden" name="prsnl_id" value="<?= $checkpersonal ? $personal['personal_id'] : '' ?>">
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary mb-2 px-5" type="submit">Save Changes</button><br>
                            <button class="btn btn-sm btn-secondary mb-2 px-5" type="button">Clear</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- [ Family ] -->
            <div class="tab-pane fade <?= (session()->get('fd_column') == 'family') ? 'show active' : ''; ?>" id="family" role="tabpanel" aria-labelledby="family-tab">
                <form action="/EmployeeController/SavePDS" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center mb-0">Family Background</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <h5>Spouse</h5>
                                <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                                    <label class="form-label" for="form-spsln">Last Name</label>
                                    <input type="text" class="form-control" id="form-spsln" name="fmly_spouse_lastname" placeholder="Last Name" value="<?= $checkfamily ? $family['spouse_last_name'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                    <label class="form-label" for="form-spsfn">First Name</label>
                                    <input type="text" class="form-control" id="form-spsfn" name="fmly_spouse_firstname" placeholder="First Name" value="<?= $checkfamily ? $family['spouse_first_name'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                    <label class="form-label" for="form-spsmn">Middle Name</label>
                                    <input type="text" class="form-control" id="form-spsmn" name="fmly_spouse_middlename" placeholder="Middle Name" value="<?= $checkfamily ? $family['spouse_middle_name'] : '' ?>">
                                </div>

                                <input type="hidden" id="spouse-extensionname" value="<?= $checkfamily ? $family['spouse_extension_name'] : 'N/A' ?>">
                                <div class="col-sm-12 col-md-2 col-lg-2 mb-3">
                                    <label class="form-label" for="spouse-extensionname-select">Extension</label>
                                    <select class="form-control" id="spouse-extensionname-select" name="fmly_spouse_extension">
                                        <option value="N/A">N/A</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Sr.">Sr.</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="form-ocptn">Occupation</label>
                                    <input type="text" class="form-control" id="form-ocptn" name="fmly_spouse_occupation" placeholder="Occupation" value="<?= $checkfamily ? $family['spouse_occupation'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="form-bsnnm">Employers/Business Name</label>
                                    <input type="text" class="form-control" id="form-bsnnm" name="fmly_spouse_employerbusinessname" placeholder="Employers/Business Name" value="<?= $checkfamily ? $family['spouse_employer_or_business_name'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="form-bsnad">Business Address</label>
                                    <input type="text" class="form-control" id="form-bsnad" name="fmly_spouse_businessaddress" placeholder="Business Address" value="<?= $checkfamily ? $family['spouse_business_address'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="form-tlpn">Telephone No.</label>
                                    <input type="text" class="form-control" id="form-tlpn" name="fmly_spouse_telephone" placeholder="Telephone No." value="<?= $checkfamily ? $family['spouse_telephone_no'] : '' ?>">
                                </div>


                                <input type="hidden" id="count" value="<?= $checkfamily ? ($family['children_count'] == 0 ? 1 : $family['children_count']) : '' ?>">
                                <input type="hidden" id="children-count" name="fmly_childrencount" value="<?= $checkfamily ? ($family['children_count'] == 0 ? 1 : $family['children_count']) : '' ?>">

                                <?php if ($checkfamily): ?>
                                    <?php $count = 1 ?>
                                    <?php foreach ($childrens as $children): ?>
                                        <input type="hidden" id="children-saved-name-<?= $count ?>" value="<?= $children['children_name'] ?>">
                                        <input type="hidden" id="children-saved-bday-<?= $count ?>" value="<?= $children['children_birthdate'] ?>">
                                        <?php $count++; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <h5>1. Children</h5>
                                <div class="col-sm-12 col-md-6 col-lg-8 mb-3">
                                    <label class="form-label" for="child-1">Name of Children</label>
                                    <input type="text" class="form-control" id="child-1" placeholder="Name of Children" name="fmly_children_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                                    <label class="form-label" for="child-bd-1">Birthdate</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="child-bd-1" name="fmly_children_birthdate_1" placeholder="Select date" value="<?= date('Y-m-d') ?>">
                                        <button class="btn btn-success" id="add-children" type="button"><i class="feather icon-plus"></i></button>
                                    </div>
                                </div>

                                <!-- [ script.js ] -->
                                <div id="childrens-background"></div>

                                <h5>Father</h5>
                                <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                                    <label class="form-label" for="form-fthrln">Last Name</label>
                                    <input type="text" class="form-control" id="form-fthrln" name="fmly_father_lastname" placeholder="Last Name" value="<?= $checkfamily ? $family['father_last_name'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                    <label class="form-label" for="form-fthrfn">First Name</label>
                                    <input type="text" class="form-control" id="form-fthrfn" name="fmly_father_firstname" placeholder="First Name" value="<?= $checkfamily ? $family['father_first_name'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                                    <label class="form-label" for="form-fthrmn">Middle Name</label>
                                    <input type="text" class="form-control" id="form-fthrmn" name="fmly_father_middlename" placeholder="Middle Name" value="<?= $checkfamily ? $family['father_middle_name'] : '' ?>">
                                </div>

                                <input type="hidden" id="father-extensionname" value="<?= $checkfamily ? $family['father_extension_name'] : 'N/A' ?>">
                                <div class="col-sm-12 col-md-2 col-lg-2 mb-3">
                                    <label class="form-label" for="father-extensionname-select">Extension</label>
                                    <select class="form-control" id="father-extensionname-select" name="fmly_father_extension">
                                        <option value="N/A">N/A</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Sr.">Sr.</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </div>

                                <h5>Mother - Maiden Name</h5>
                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="form-mthrln">Maiden Name</label>
                                    <input type="text" class="form-control" id="form-mthrln" name="fmly_mother_maidenname" placeholder="Maiden Name" value="<?= $checkfamily ? $family['mother_maiden_name'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                                    <label class="form-label" for="form-mthrln">Last Name</label>
                                    <input type="text" class="form-control" id="form-mthrln" name="fmly_mother_lastname" placeholder="Last Name" value="<?= $checkfamily ? $family['mother_last_name'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                                    <label class="form-label" for="form-mthrfn">First Name</label>
                                    <input type="text" class="form-control" id="form-mthrfn" name="fmly_mother_firstname" placeholder="First Name" value="<?= $checkfamily ? $family['mother_first_name'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                                    <label class="form-label" for="form-mthrmn">Middle Name</label>
                                    <input type="text" class="form-control" id="form-mthrmn" name="fmly_mother_middlename" placeholder="Middle Name" value="<?= $checkfamily ? $family['mother_middle_name'] : '' ?>">
                                </div>



                                <input type="hidden" name="pds_column" value="family">
                                <input type="hidden" name="fmly_id" value="<?= $checkfamily ? $family['family_id'] : '' ?>">
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary mb-2 px-5" type="submit">Save Changes</button><br>
                            <button class="btn btn-sm btn-secondary mb-2 px-5" type="button">Clear</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- [ Education ] -->
            <div class="tab-pane fade <?= (session()->get('fd_column') == 'education') ? 'show active' : ''; ?>" id="education" role="tabpanel" aria-labelledby="education-tab">
                <form action="/EmployeeController/SavePDS" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center mb-0">Educational Background</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <h5>Elementary</h5>
                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="form-elmtryschl">Name of School <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-elmtryschl" name="educ_elementary_school" placeholder="Name of School" value="<?= $checkeducation ? $education['elementary_school'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="form-elmtryedu">Basic Education/Degree/Course <small class="form-text text-muted">(write in full)</small><span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-elmtryedu" name="educ_elementary_education" placeholder="Basic Education/Degree/Course" value="<?= $checkeducation ? $education['elementary_education'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-5 mb-3">
                                    <label class="form-label" for="form-elmtrypoa">Period of Attendance <span class="text-primary">*</span></label>
                                    <div class="input-daterange input-group" id="form-elmtrypoa">
                                        <input type="number" class="form-control text-left" name="educ_elementary_period_from" placeholder="From" name="range-start" value="<?= $checkeducation ? $education['elementary_period_from'] : '' ?>" />
                                        <span class="input-group-text">to</span>
                                        <input type="number" class="form-control text-left" name="educ_elementary_period_to" placeholder="To" name="range-end" value="<?= $checkeducation ? $education['elementary_period_to'] : '' ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-7 mb-3">
                                    <label class="form-label" for="form-elmtryhghstlvl">Highest Level/Units earned <small class="form-text text-muted">(if not graduated)</small><span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-elmtryhghstlvl" name="educ_elementary_highest_level" placeholder="Highest Level" value="<?= $checkeducation ? $education['elementary_highest_level'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-5 mb-3">
                                    <label class="form-label" for="form-elmtryyrgrdt">Year Graduated <span class="text-primary">*</span></label>
                                    <input type="number" class="form-control" id="form-elmtryyrgrdt" name="educ_elementary_year_graduated" placeholder="Year Graduated" value="<?= $checkeducation ? $education['elementary_year_graduated'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-7 mb-3">
                                    <label class="form-label" for="form-elmtryhnrs">Scholarship/Academic Honors Recieved <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-elmtryhnrs" name="educ_elementary_honors" placeholder="Scholarship/Academic Honors Recieved" value="<?= $checkeducation ? $education['elementary_honors'] : '' ?>">
                                </div>

                                <h5>Secondary</h5>
                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="form-scndryschl">Name of School <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-scndryschl" name="educ_secondary_school" placeholder="Name of School" value="<?= $checkeducation ? $education['secondary_school'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="form-scndryedu">Basic Education/Degree/Course <small class="form-text text-muted">(write in full)</small> <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-scndryedu" name="educ_secondary_education" placeholder="Basic Education/Degree/Course" value="<?= $checkeducation ? $education['secondary_education'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-5 mb-3">
                                    <label class="form-label" for="form-scndrypoa">Period of Attendance <span class="text-primary">*</span></label>
                                    <div class="input-daterange input-group" id="form-scndrypoa">
                                        <input type="number" class="form-control text-left" name="educ_secondary_period_from" placeholder="From" name="range-start" value="<?= $checkeducation ? $education['secondary_period_from'] : '' ?>" />
                                        <span class="input-group-text">to</span>
                                        <input type="number" class="form-control text-left" name="educ_secondary_period_to" placeholder="To" name="range-end" value="<?= $checkeducation ? $education['secondary_period_to'] : '' ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-7 mb-3">
                                    <label class="form-label" for="form-scndryhghstlvl">Highest Level/Units earned <small class="form-text text-muted">(if not graduated)</small> <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-scndryhghstlvl" name="educ_secondary_highest_level" placeholder="Highest Level" value="<?= $checkeducation ? $education['secondary_highest_level'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-5 mb-3">
                                    <label class="form-label" for="form-scndryyrgrdt">Year Graduated <span class="text-primary">*</span></label>
                                    <input type="number" class="form-control" id="form-scndryyrgrdt" name="educ_secondary_year_graduated" placeholder="Year Graduated" value="<?= $checkeducation ? $education['secondary_year_graduated'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-7 mb-3">
                                    <label class="form-label" for="form-scndryhnrs">Scholarship/Academic Honors Recieved <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-scndryhnrs" name="educ_secondary_honors" placeholder="Scholarship/Academic Honors Recieved" value="<?= $checkeducation ? $education['secondary_honors'] : '' ?>">
                                </div>

                                <h5>Vocational</h5>
                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="form-vctnlschl">Name of School <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-vctnlschl" name="educ_vocational_school" placeholder="Name of School" value="<?= $checkeducation ? $education['vocational_school'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="form-vctnledu">Basic Education/Degree/Course <small class="form-text text-muted">(write in full)</small> <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-vctnledu" name="educ_vocational_education" placeholder="Basic Education/Degree/Course" value="<?= $checkeducation ? $education['vocational_education'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-5 mb-3">
                                    <label class="form-label" for="form-vctnlpoa">Period of Attendance <span class="text-primary">*</span></label>
                                    <div class="input-daterange input-group" id="form-vctnlpoa">
                                        <input type="number" class="form-control text-left" name="educ_vocational_period_from" placeholder="From" name="range-start" value="<?= $checkeducation ? $education['vocational_period_from'] : '' ?>" />
                                        <span class="input-group-text">to</span>
                                        <input type="number" class="form-control text-left" name="educ_vocational_period_to" placeholder="To" name="range-end" value="<?= $checkeducation ? $education['vocational_period_to'] : '' ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-7 mb-3">
                                    <label class="form-label" for="form-vctnlhghstlvl">Highest Level/Units earned <small class="form-text text-muted">(if not graduated)</small> <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-vctnlhghstlvl" name="educ_vocational_highest_level" placeholder="Highest Level" value="<?= $checkeducation ? $education['vocational_highest_level'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-5 mb-3">
                                    <label class="form-label" for="form-vctnlyrgrdt">Year Graduated <span class="text-primary">*</span></label>
                                    <input type="number" class="form-control" id="form-vctnlyrgrdt" name="educ_vocational_year_graduated" placeholder="Year Graduated" value="<?= $checkeducation ? $education['vocational_year_graduated'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-7 mb-3">
                                    <label class="form-label" for="form-vctnlhnrs">Scholarship/Academic Honors Recieved <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-vctnlhnrs" name="educ_vocational_honors" placeholder="Scholarship/Academic Honors Recieved" value="<?= $checkeducation ? $education['vocational_honors'] : '' ?>">
                                </div>

                                <h5>College</h5>
                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="form-cglschl">Name of School <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-cglschl" name="educ_college_school" placeholder="Name of School" value="<?= $checkeducation ? $education['college_school'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="form-cgedu">Basic Education/Degree/Course <small class="form-text text-muted">(write in full)</small> <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-cgedu" name="educ_college_education" placeholder="Basic Education/Degree/Course" value="<?= $checkeducation ? $education['college_education'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-5 mb-3">
                                    <label class="form-label" for="form-cgpoa">Period of Attendance <span class="text-primary">*</span></label>
                                    <div class="input-daterange input-group" id="form-cgpoa">
                                        <input type="number" class="form-control text-left" name="educ_college_period_from" placeholder="From" name="range-start" value="<?= $checkeducation ? $education['college_period_from'] : '' ?>" />
                                        <span class="input-group-text">to</span>
                                        <input type="number" class="form-control text-left" name="educ_college_period_to" placeholder="To" name="range-end" value="<?= $checkeducation ? $education['college_period_to'] : '' ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-7 mb-3">
                                    <label class="form-label" for="form-cghghstlvl">Highest Level/Units earned <small class="form-text text-muted">(if not graduated)</small> <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-cghghstlvl" name="educ_college_highest_level" placeholder="Highest Level" value="<?= $checkeducation ? $education['college_highest_level'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-5 mb-3">
                                    <label class="form-label" for="form-cgyrgrdt">Year Graduated <span class="text-primary">*</span></label>
                                    <input type="number" class="form-control" id="form-cgyrgrdt" name="educ_college_year_graduated" placeholder="Year Graduated" value="<?= $checkeducation ? $education['college_year_graduated'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-7 mb-3">
                                    <label class="form-label" for="form-cghnrs">Scholarship/Academic Honors Recieved <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-cghnrs" name="educ_college_honors" placeholder="Scholarship/Academic Honors Recieved" value="<?= $checkeducation ? $education['college_honors'] : '' ?>">
                                </div>

                                <h5>Graduate Studies</h5>
                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="form-gslschl">Name of School <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-gslschl" name="educ_graduatestudies_school" placeholder="Name of School" value="<?= $checkeducation ? $education['graduatestudies_school'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="form-gsedu">Basic Education/Degree/Course <small class="form-text text-muted">(write in full)</small> <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-gsedu" name="educ_graduatestudies_education" placeholder="Basic Education/Degree/Course" value="<?= $checkeducation ? $education['graduatestudies_education'] : '' ?>">
                                </div>


                                <div class="col-sm-12 col-md-4 col-lg-5 mb-3">
                                    <label class="form-label" for="form-gspoa">Period of Attendance <span class="text-primary">*</span></label>
                                    <div class="input-daterange input-group" id="form-gspoa">
                                        <input type="number" class="form-control text-left" name="educ_graduatestudies_period_from" placeholder="From" name="range-start" value="<?= $checkeducation ? $education['graduatestudies_period_from'] : '' ?>" />
                                        <span class="input-group-text">to</span>
                                        <input type="number" class="form-control text-left" name="educ_graduatestudies_period_to" placeholder="To" name="range-end" value="<?= $checkeducation ? $education['graduatestudies_period_to'] : '' ?>" />
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-7 mb-3">
                                    <label class="form-label" for="form-gshghstlvl">Highest Level/Units earned <small class="form-text text-muted">(if not graduated)</small> <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-gshghstlvl" name="educ_graduatestudies_highest_level" placeholder="Highest Level" value="<?= $checkeducation ? $education['graduatestudies_highest_level'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-5 mb-3">
                                    <label class="form-label" for="form-gsyrgrdt">Year Graduated <span class="text-primary">*</span></label>
                                    <input type="number" class="form-control" id="form-gsyrgrdt" name="educ_graduatestudies_year_graduated" placeholder="Year Graduated" value="<?= $checkeducation ? $education['graduatestudies_year_graduated'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-7 mb-3">
                                    <label class="form-label" for="form-gshnrs">Scholarship/Academic Honors Recieved <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control" id="form-gshnrs" name="educ_graduatestudies_honors" placeholder="Scholarship/Academic Honors Recieved" value="<?= $checkeducation ? $education['graduatestudies_honors'] : '' ?>">
                                </div>
                            </div>

                            <input type="hidden" name="pds_column" value="education">
                            <input type="hidden" name="educ_id" value="<?= $checkeducation ? $education['education_id'] : '' ?>">
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary mb-2 px-5" type="submit">Save Changes</button><br>
                            <button class="btn btn-sm btn-secondary mb-2 px-5" type="button">Clear</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- [ Civil Service ] -->
            <div class="tab-pane fade <?= (session()->get('fd_column') == 'civil_service') ? 'show active' : ''; ?>" id="civil" role="tabpanel" aria-labelledby="civil-tab">
                <form action="/EmployeeController/SavePDS" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center mb-0">Civil Service Eligibility</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" id="cse-saved-count" value="<?= $checkcivilservice ? $civilservice['civilservice_count'] : '' ?>">
                                <input type="hidden" id="civil-service-count" name="cse_count" value="<?= $checkcivilservice ? ($civilservice['civilservice_count'] == 0 ? 1 : $civilservice['civilservice_count']) : '1' ?>">

                                <?php if ($checkcivilservice): ?>
                                    <?php $count = 1 ?>
                                    <?php foreach ($civilserviceitems as $cseitem): ?>
                                        <input type="hidden" id="cse-saved-csvc-<?= $count ?>" value="<?= $cseitem['career_service'] ?>">
                                        <input type="hidden" id="cse-saved-rtng-<?= $count ?>" value="<?= $cseitem['rating'] ?>">
                                        <input type="hidden" id="cse-saved-doe-<?= $count ?>" value="<?= $cseitem['date_of_examination'] ?>">
                                        <input type="hidden" id="cse-saved-poe-<?= $count ?>" value="<?= $cseitem['place_of_examination'] ?>">
                                        <input type="hidden" id="cse-saved-lcns-<?= $count ?>" value="<?= $cseitem['license_number'] ?>">
                                        <input type="hidden" id="cse-saved-vldty-<?= $count ?>" value="<?= $cseitem['validity_date'] ?>">
                                        <?php $count++ ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="csvc-1">
                                        <h5>1. Career Service</h5> <small class="form-text text-muted pb-0">(RA 1080 (Board/ Bar) Under Special LAWS/ CES/ CSEE Barangay Eligibility / Drivers License)</small>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="csvc-1" placeholder="Career Service" name="cse_career_service_1">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="rtng-1">Rating</label>
                                    <input type="number" step="0.1" class="form-control" id="rtng-1" placeholder="Rating" name="cse_rating_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="doe-1">Date of Examination / Conferment</label>
                                    <input class="form-control" id="doe-1" type="date" value="<?= date('Y-m-d') ?>" name="cse_examination_date_1">
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="poe-1">Place of Examination / Conferment</label>
                                    <input type="text" class="form-control" id="poe-1" placeholder="Place of Examination / Conferment" name="cse_examination_place_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="lcns-1">License Number</label>
                                    <input type="number" step="0.1" class="form-control" id="lcns-1" placeholder="License Number" name="cse_license_number_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="vldty-1">Date of Validity</label>
                                    <input class="form-control" id="vldty-1" type="date" value="<?= date('Y-m-d') ?>" name="cse_license_validity_1">
                                </div>
                            </div>

                            <!-- [ script.js ] -->
                            <div id="civil-service-background"></div>

                            <div class="text-center">
                                <button class="btn btn-primary ps-5 pe-5 mt-3" id="add-civil-service" type="button"><i class="feather icon-plus"></i> Add More</button>
                            </div>

                            <input type="hidden" name="pds_column" value="civil_service">
                            <input type="hidden" name="cse_id" value="<?= $checkcivilservice ? $civilservice['civilservice_id'] : '' ?>">
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary mb-2 px-5" type="submit">Save Changes</button><br>
                            <button class="btn btn-sm btn-secondary mb-2 px-5" type="button">Clear</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- [ Work Experience ] -->
            <div class="tab-pane fade <?= (session()->get('fd_column') == 'work_experience') ? 'show active' : ''; ?>" id="work" role="tabpanel" aria-labelledby="work-tab">
                <form action="/EmployeeController/SavePDS" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center mb-0">Work Experience</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" id="cse-saved-count" value="<?= $checkworkexperience ? $workexperience['workexperience_count'] : '' ?>">
                                <input type="hidden" id="work-experience-count" name="workexp_count" value="<?= $checkworkexperience ? ($workexperience['workexperience_count'] == 0 ? 1 : $workexperience['workexperience_count']) : '1' ?>">

                                <?php if ($checkworkexperience): ?>
                                    <?php $count = 1 ?>
                                    <?php foreach ($workexperienceitems as $workexperience): ?>
                                        <input type="hidden" id="wrkexp-saved-pstn-<?= $count ?>" value="<?= $workexperience['position'] ?>">
                                        <input type="hidden" id="wrkexp-saved-inclsvdtfrom-<?= $count ?>" value="<?= $workexperience['inclusive_date_from'] ?>">
                                        <input type="hidden" id="wrkexp-saved-inclsvdtto-<?= $count ?>" value="<?= $workexperience['inclusive_date_to'] ?>">
                                        <input type="hidden" id="wrkexp-saved-cmpny-<?= $count ?>" value="<?= $workexperience['company'] ?>">
                                        <input type="hidden" id="wrkexp-saved-mthlyslry-<?= $count ?>" value="<?= $workexperience['mothly_salary'] ?>">
                                        <input type="hidden" id="wrkexp-saved-incrmnt-<?= $count ?>" value="<?= $workexperience['increment'] ?>">
                                        <input type="hidden" id="wrkexp-saved-stts-<?= $count ?>" value="<?= $workexperience['appointment_status'] ?>">
                                        <input type="hidden" id="wrkexp-saved-srvc-<?= $count ?>" value="<?= $workexperience['gov_service'] ?>">
                                        <?php $count++ ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>


                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="pstn-1">
                                        <h5>1. Position Title</h5> <small class="form-text text-muted">(Write in full / Do not abbreviate)</small>
                                    </label>
                                    <input type="text" class="form-control" id="pstn-1" placeholder="Position Title" name="workexp_position_title_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="inclsvdt-1">Inclusive Dates</label>
                                    <div class="input-daterange input-group" id="inclsvdt-1">
                                        <input class="form-control" type="date" value="<?= date('Y-m-d') ?>" id="inclsvdtfrom-1" name="workexp_inclusivefrom_1">
                                        <span class="input-group-text">to</span>
                                        <input class="form-control" type="date" value="<?= date('Y-m-d') ?>" id="inclsvdtto-1" name="workexp_inclusiveto_1">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="cmpny-1">Department / Agency / Office / Company</label>
                                    <input type="text" class="form-control" id="cmpny-1" placeholder="Department / Agency / Office / Company" name="workexp_company_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="mthlyslry-1">Monthly Salary</label>
                                    <input type="number" step="0.1" class="form-control" id="mthlyslry-1" placeholder="Monthly Salary" name="workexp_monthly_salary_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="incrmnt-1">Salary / Job / Pay Grade & Step / Increment</label>
                                    <input type="text" class="form-control" id="incrmnt-1" placeholder="Salary / Job / Pay Grade & Step / Increment" name="workexp_increment_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="stts-1">Status of Appointment</label>
                                    <input type="text" class="form-control" id="stts-1" placeholder="Status of Appointment" name="workexp_status_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="srvc-select-1">Government Service</label>
                                    <select class="form-select" id="srvc-select-1">
                                        <option value="">Select</option>
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                                <input type="hidden" name="workexp_govservice_1" id="srvc-hidden-1">

                                <!-- [ script.js ] -->
                                <div id="work-experience-background"></div>

                                <div class="text-center">
                                    <button class="btn btn-primary ps-5 pe-5 mt-3" id="add-work-experience" type="button"><i class="feather icon-plus"></i> Add More</button>
                                </div>
                            </div>

                            <input type="hidden" name="pds_column" value="work_experience">
                            <input type="hidden" name="workexp_id" value="<?= $checkworkexperience ? $workexperience['workexperience_id'] : '' ?>">
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary mb-2 px-5" type="submit">Save Changes</button><br>
                            <button class="btn btn-sm btn-secondary mb-2 px-5" type="button">Clear</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- [ Voluntary Work ] -->
            <div class="tab-pane fade <?= (session()->get('fd_column') == 'voluntary_work') ? 'show active' : ''; ?>" id="voluntary" role="tabpanel" aria-labelledby="voluntary-tab">
                <form action="/EmployeeController/SavePDS" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center mb-0">Voluntary Work / Involvement in Civic / Non-Government / People / Voluntary Organization/s</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" id="vlntrywork-saved-count" value="<?= $checkvoluntarywork ? $voluntarywork['voluntarywork_count'] : '' ?>">
                                <input type="hidden" id="voluntary-work-count" name="vltrywork_count" value="<?= $checkvoluntarywork ? ($voluntarywork['voluntarywork_count'] == 0 ? 1 : $voluntarywork['voluntarywork_count']) : '1' ?>">

                                <?php if ($checkvoluntarywork): ?>
                                    <?php $count = 1 ?>
                                    <?php foreach ($voluntaryworkitems as $voluntarywork): ?>
                                        <input type="hidden" id="vlntrywork-saved-orgnztn-<?= $count ?>" value="<?= $voluntarywork['organization'] ?>">
                                        <input type="hidden" id="vlntrywork-saved-vwinclsvdtfrom-<?= $count ?>" value="<?= $voluntarywork['inclusive_date_from'] ?>">
                                        <input type="hidden" id="vlntrywork-saved-vwinclsvdtto-<?= $count ?>" value="<?= $voluntarywork['inclusive_date_to'] ?>">
                                        <input type="hidden" id="vlntrywork-saved-nmbrhrs-<?= $count ?>" value="<?= $voluntarywork['hours'] ?>">
                                        <input type="hidden" id="vlntrywork-saved-ntrwrk-<?= $count ?>" value="<?= $voluntarywork['nature_of_work'] ?>">
                                        <?php $count++ ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="orgnztn-1">
                                        <h5>1. Name & Adress of Organization</h5> <small class="form-text text-muted">(Write in full / Do not abbreviate)</small>
                                    </label>
                                    <input type="text" class="form-control" id="orgnztn-1" placeholder="Name & Adress of Organization" name="vltrywork_oganization_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="vw-inclsvdt">Inclusive Dates</label>
                                    <div class="input-daterange input-group" id="vw-inclsvdt">
                                        <input class="form-control" type="date" value="<?= date('Y-m-d') ?>" id="vwinclsvdtfrom-1" name="vltrywork_inclusivefrom_1">
                                        <span class="input-group-text">to</span>
                                        <input class="form-control" type="date" value="<?= date('Y-m-d') ?>" id="vwinclsvdtto-1" name="vltrywork_inclusiveto_1">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="nmbrhrs-1">Number of Hours</label>
                                    <input type="number" class="form-control" id="nmbrhrs-1" placeholder="Number of Hours" name="vltrywork_hours_1">
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="ntrwrk-1">Position / Nature of Work</label>
                                    <input type="text" class="form-control" id="ntrwrk-1" placeholder="Position / Nature of Work" name="vltrywork_nature_of_work_1">
                                </div>

                                <!-- [ script.js ] -->
                                <div id="voluntary-work-background"></div>

                                <div class="text-center">
                                    <button class="btn btn-primary ps-5 pe-5 mt-3" id="add-voluntary-work" type="button"><i class="feather icon-plus"></i> Add More</button>
                                </div>
                            </div>

                            <input type="hidden" name="pds_column" value="voluntary_work">
                            <input type="hidden" name="vltrywork_id" value="<?= $checkvoluntarywork ? $voluntarywork['voluntarywork_id'] : '' ?>">
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary mb-2 px-5" type="submit">Save Changes</button><br>
                            <button class="btn btn-sm btn-secondary mb-2 px-5" type="button">Clear</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- [ Training Program ] -->
            <div class="tab-pane fade <?= (session()->get('fd_column') == 'training_program') ? 'show active' : ''; ?>" id="programs" role="tabpanel" aria-labelledby="programs-tab">
                <form action="/EmployeeController/SavePDS" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center mb-0">Learning and Development (L&D) Interventions/Training Programs Attended</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" id="program-saved-count" value="<?= $checktrainingprogram ? $trainingprogram['trainingprogram_count'] : '' ?>">
                                <input type="hidden" id="program-count" name="prgm_count" value="<?= $checktrainingprogram ? ($trainingprogram['trainingprogram_count'] == 0 ? 1 : $trainingprogram['trainingprogram_count']) : '1' ?>">

                                <?php if ($checktrainingprogram): ?>
                                    <?php $count = 1 ?>
                                    <?php foreach ($trainingprogramitems as $trainingprogram): ?>
                                        <input type="hidden" id="program-saved-trngprgm-<?= $count ?>" value="<?= $trainingprogram['training_program'] ?>">
                                        <input type="hidden" id="program-saved-tpinclsvdtfrom-<?= $count ?>" value="<?= $trainingprogram['inclusive_date_from'] ?>">
                                        <input type="hidden" id="program-saved-tpinclsvdtto-<?= $count ?>" value="<?= $trainingprogram['inclusive_date_to'] ?>">
                                        <input type="hidden" id="program-saved-tpnmbrhrs-<?= $count ?>" value="<?= $trainingprogram['hours'] ?>">
                                        <input type="hidden" id="program-saved-typld-<?= $count ?>" value="<?= $trainingprogram['type_of_ld'] ?>">
                                        <input type="hidden" id="program-saved-spnsrdby-<?= $count ?>" value="<?= $trainingprogram['sponsored_by'] ?>">
                                        <?php $count++ ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="trngprgm-1">
                                        <h5>1. Title of Learning and Development (L&D) Interventions/Training Programs</h5>
                                        <small class="form-text text-muted">(Write in full / Do not abbreviate)</small>
                                    </label>
                                    <input type="text" class="form-control" id="trngprgm-1" placeholder="Title of Learning and Development (L&D) Interventions/Training Programs" name="prgm_title_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="tpinclsvdt-1">Inclusive Dates</label>
                                    <div class="input-daterange input-group" id="tpinclsvdt-1">
                                        <input class="form-control" type="date" value="<?= date('Y-m-d') ?>" id="tpinclsvdtfrom-1" name="prgm_inclusivefrom_1">
                                        <span class="input-group-text">to</span>
                                        <input class="form-control" type="date" value="<?= date('Y-m-d') ?>" id="tpinclsvdtto-1" name="prgm_inclusiveto_1">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="tpnmbrhrs-1">Number of Hours</label>
                                    <input type="number" class="form-control" id="tpnmbrhrs-1" placeholder="Number of Hours" name="prgm_hours_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="typld-1">Type of LD <small class="form-text text-muted">(Managerial/Supervisory/Techinical/etc)</small></label>
                                    <input type="text" class="form-control" id="typld-1" placeholder="Type of LD" name="prgm_type_of_ld_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="spnsrdby-1">Conducted / Sponsored By <small class="form-text text-muted">(Write in full / Do not abbreviate)</small></label>
                                    <input type="text" class="form-control" id="spnsrdby-1" placeholder="Conducted / Sponsored By" name="prgm_sponsored_by_1">
                                </div>

                                <!-- [ script.js ] -->
                                <div id="program-background"></div>

                                <div class="text-center">
                                    <button class="btn btn-primary ps-5 pe-5 mt-3" id="add-program" type="button"><i class="feather icon-plus"></i> Add More</button>
                                </div>
                            </div>

                            <input type="hidden" name="pds_column" value="training_program">
                            <input type="hidden" name="prgm_id" value="<?= $checktrainingprogram ? $trainingprogram['trainingprogram_id'] : '' ?>">
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary mb-2 px-5" type="submit">Save Changes</button><br>
                            <button class="btn btn-sm btn-secondary mb-2 px-5" type="button">Clear</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- [ Other Information ] -->
            <div class="tab-pane fade <?= (session()->get('fd_column') == 'other_information') ? 'show active' : ''; ?>" id="others" role="tabpanel" aria-labelledby="others-tab">
                <form action="/EmployeeController/SavePDS" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center mb-0">Other Informations</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <!-- Skill Hidden Values -->
                                <input type="hidden" id="skill-saved-count" value="<?= $checkotherinformation ? $otherinformation['skill_count'] : '' ?>">
                                <input type="hidden" id="skill-count" name="othrinfo_skill_count" value="<?= $checkotherinformation ? ($otherinformation['skill_count'] == 0 ? 1 : $otherinformation['skill_count']) : '1' ?>">

                                <?php if ($checkotherinformation): ?>
                                    <?php $count = 1 ?>
                                    <?php foreach ($otherinformationitems as $skillinformation): ?>
                                        <?php if ($skillinformation['item_type'] == 1): ?>
                                            <input type="hidden" id="skill-saved-<?= $count ?>" value="<?= $skillinformation['information'] ?>">
                                            <?php $count++ ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <!-- Recognition Hidden Values -->
                                <input type="hidden" id="recognition-saved-count" value="<?= $checkotherinformation ? $otherinformation['recognition_count'] : '' ?>">
                                <input type="hidden" id="recognition-count" name="othrinfo_recognition_count" value="<?= $checkotherinformation ? ($otherinformation['recognition_count'] == 0 ? 1 : $otherinformation['recognition_count']) : '1' ?>">

                                <?php if ($checkotherinformation): ?>
                                    <?php $count = 1 ?>
                                    <?php foreach ($otherinformationitems as $recognitioninformation): ?>
                                        <?php if ($recognitioninformation['item_type'] == 2): ?>
                                            <input type="hidden" id="recognition-saved-<?= $count ?>" value="<?= $recognitioninformation['information'] ?>">
                                            <?php $count++ ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <!-- Membership Hidden Values -->
                                <input type="hidden" id="membership-saved-count" value="<?= $checkotherinformation ? $otherinformation['membership_count'] : '' ?>">
                                <input type="hidden" id="membership-count" name="othrinfo_membership_count" value="<?= $checkotherinformation ? ($otherinformation['membership_count'] == 0 ? 1 : $otherinformation['membership_count']) : '1' ?>">

                                <?php if ($checkotherinformation): ?>
                                    <?php $count = 1 ?>
                                    <?php foreach ($otherinformationitems as $membershipinformation): ?>
                                        <?php if ($membershipinformation['item_type'] == 3): ?>
                                            <input type="hidden" id="membership-saved-<?= $count ?>" value="<?= $membershipinformation['information'] ?>">
                                            <?php $count++ ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <h5>Skills</h5>
                                <div class="mb-3">
                                    <label class="form-label" for="othrinfo-skills-1">1. Special Skills and Hobbies</label>
                                    <div class="input-group">
                                        <input type="text" id="othrinfo-skills-1" class="form-control" placeholder="Special Skills and Hobbies" name="othrinfo_skill_1">
                                        <button class="btn btn-success" id="add-skill" type="button"><i class="feather icon-plus"></i></button>
                                    </div>
                                </div>

                                <!-- [ script.js ] -->
                                <div id="skill-background"></div>

                                <h5>Recognitions</h5>
                                <div class="mb-3">
                                    <label class="form-label" for="othrinfo-recognition-1">1. Non-Academic Distintions / Recognitions</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="othrinfo-recognition-1" placeholder="Non-Academic Distintions / Recognitions" name="othrinfo_recognition_1">
                                        <button class="btn btn-success" id="add-recognition" type="button"><i class="feather icon-plus"></i></button>
                                    </div>
                                </div>

                                <!-- [ script.js ] -->
                                <div id="recognition-background"></div>

                                <h5>Memberships</h5>
                                <div class="mb-3">
                                    <label class="form-label" for="othrinfo-membership-1">1. Memberships in Associations / Organization</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="othrinfo-membership-1" placeholder="Memberships in Associations / Organization" name="othrinfo_membership_1">
                                        <button class="btn btn-success" id="add-membership" type="button"><i class="feather icon-plus"></i></button>
                                    </div>
                                </div>

                                <!-- [ script.js ] -->
                                <div id="membership-background"></div>

                                <input type="hidden" name="pds_column" value="other_information">
                                <input type="hidden" name="othrinfo_id" value="<?= $checkotherinformation ? $otherinformation['otherinformation_id'] : '' ?>">
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary mb-2 px-5" type="submit">Save Changes</button><br>
                            <button class="btn btn-sm btn-secondary mb-2 px-5" type="button">Clear</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Final Information -->
            <div class="tab-pane fade <?= (session()->get('fd_column') == 'final') ? 'show active' : ''; ?>" id="final" role="tabpanel" aria-labelledby="final-tab">
                <form action="/EmployeeController/SavePDS" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center mb-0">Final Information</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label" for="rfrnc-1">
                                        <h5>ID Picture</h5>
                                        <small class="form-text text-muted">
                                            ID picture taken within the last 6 months 3.5 cm. X 4.5 cm (passport size) with full and handwritten name tag and signature overprinted name. Computer generated or photocopied picture is not acceptable.
                                        </small>
                                    </label>
                                    <input type="file" class="image-crop-filepond" image-crop-aspect-ratio="0.78:1" data-max-file-size="5MB" data-max-files="1" name="final_idpicture">
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label">
                                        <h5>Government Issue ID</h5>
                                    </label>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <input type="text" class="form-control" id="fnl-gvrnmtid" placeholder="Ex. Passport" name="final_government_id" value="<?= $checkfinal ? $final['government_id'] : '' ?>">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label for="form-label" for="fnl-gvrnmtidno">ID/License/Passport No.</label>
                                    <input type="text" class="form-control" id="fnl-gvrnmtidno" placeholder="ID/License/Passport No." name="final_government_idnumber" value="<?= $checkfinal ? $final['id_number'] : '' ?>">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label for="form-label" for="doi">Date/Place of Issuance</label>
                                    <input type="text" class="form-control" id="doi" placeholder="Date/Place of Issuance" name="final_date_of_issuance" value="<?= $checkfinal ? $final['date_or_issuance'] : '' ?>">
                                </div>

                                <!-- Refrence Hidden -->
                                <input type="hidden" id="reference-saved-count" value="<?= $checkfinal ? $final['reference_count'] : '' ?>">
                                <input type="hidden" id="reference-count" name="rfrnc_count" value="<?= $checkfinal ? ($final['reference_count'] == 0 ? 1 : $final['reference_count']) : '1' ?>">

                                <?php if ($checkfinal): ?>
                                    <?php $count = 1 ?>
                                    <?php foreach ($refrenceitems as $reference): ?>
                                        <input type="hidden" id="rfrnc-saved-name-<?= $count ?>" value="<?= $reference['reference_name'] ?>">
                                        <input type="hidden" id="rfrnc-saved-address-<?= $count ?>" value="<?= $reference['reference_address'] ?>">
                                        <input type="hidden" id="rfrnc-saved-telephone-<?= $count ?>" value="<?= $reference['reference_telephone'] ?>">
                                        <?php $count++ ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                                    <label class="form-label" for="rfrncnm-1">
                                        <h5>1. Reference</h5></small>
                                    </label>
                                    <input type="text" class="form-control" id="rfrncnm-1" placeholder="Name of Reference" name="final_reference_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="rfrncadd-1">Address</label>
                                    <input type="text" class="form-control" id="rfrncadd-1" placeholder="Address" name="final_address_1">
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label class="form-label" for="rfrnctlphn-1">Telephone No.</label>
                                    <input type="number" class="form-control" id="rfrnctlphn-1" placeholder="Telephone No." name="final_telephone_1">
                                </div>

                                <!-- [ script.js ] -->
                                <div id="reference-background"></div>

                                <div class="text-center">
                                    <button class="btn btn-primary ps-5 pe-5 mt-3" id="add-reference" type="button"><i class="feather icon-plus"></i> Add More</button>
                                </div>
                            </div>

                            <input type="hidden" name="pds_column" value="final">
                            <input type="hidden" name="final_id" value="<?= $checkfinal ? $final['final_id'] : '' ?>">
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-primary mb-2 px-5" type="submit">Save Changes</button><br>
                            <button class="btn btn-sm btn-secondary mb-2 px-5" type="button">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JS Custom -->
<script src="/tup-javascript/pdsform.js"></script>
<script src="/assets/js/plugins/choices.min.js"></script>
<script>
    $(document).ready(function () {
        // Retrieve initial values from hidden input fields (if they exist)
        // Province
        // const residentprovinceValue = document.getElementById('resident-province').value;
        // const permanentprovinceValue = document.getElementById('permanent-province').value;

        // City
        const residentcityValue = document.getElementById('resident-city').value;
        const permanentcityValue = document.getElementById('permanent-city').value;

        // Barangay
        const residentbarangayValue = document.getElementById('resident-barangay').value;
        const permanentbarangayValue = document.getElementById('permanent-barangay').value;

        // var residentprovinceSelect = $("#ra-province");
        // residentprovinceSelect.html('<option value="">Loading Provinces...</option>');

        // var permanentprovinceSelect = $("#pa-province");
        // permanentprovinceSelect.html('<option value="">Loading Provinces...</option>');


        // [ City Select ]
        var residentcitySelect = $("#ra-city");
        residentcitySelect.html('<option value="">Loading Cities and Municipalities...</option>');

        var permanentcitySelect = $("#pa-city");
        permanentcitySelect.html('<option value="">Loading Cities and Municipalities...</option>');

        $.get("<?= site_url('EmployeeController/fetchDataCity') ?>", function (data) {
            var cities = JSON.parse(data);

            // Check if cities data exists and populate the dropdown
            if (cities && cities.length > 0) {
                residentcitySelect.empty();
                residentcitySelect.append('<option value="">Select City/Municipality</option>');

                permanentcitySelect.empty();
                permanentcitySelect.append('<option value="">Select City/Municipality</option>');

                // Add each city to the dropdown
                cities.forEach(function (city) {
                    residentcitySelect.append(`<option value="${city.code}">${city.name}</option>`);
                    permanentcitySelect.append(`<option value="${city.code}">${city.name}</option>`);
                });

                // Initialize the Choices.js library for enhanced dropdown functionality
                var residentcityChoices = new Choices(residentcitySelect[0], {
                    allowHTML: true,
                    searchEnabled: true
                });

                var permanentcityChoices = new Choices(permanentcitySelect[0], {
                    allowHTML: true,
                    searchEnabled: true
                });

                // If there's an initial city value (from the hidden input), select it
                if (residentcityValue) {
                    var residentselectedCity = cities.find(city => city.name === residentcityValue);
                    if (residentselectedCity) {
                        // Set the selected city in the Choices.js dropdown
                        residentcityChoices.setValue([
                            { value: residentselectedCity.code, label: residentcityValue }
                        ]);
                        residentcitySelect.trigger('change');
                        console.log("Residential City: " + residentselectedCity.name);
                    }
                }

                if (permanentcityValue) {
                    var permanentselectedCity = cities.find(city => city.name === permanentcityValue);
                    if (permanentselectedCity) {
                        permanentcityChoices.setValue([
                            { value: permanentselectedCity.code, label: permanentcityValue }
                        ]);
                        permanentcitySelect.trigger('change');
                        console.log("Permanent City: " + permanentselectedCity.name);
                    }
                }
            } else {
                console.log('No cities found.');
            }
        });


        // [ Original ]
        var residentialbarangayChoices;
        var permanentbarangayChoices;

        // [ Resident City Select - Triggers when Changed ]
        $("#ra-city").change(function () {
            var cityCode = $(this).val();
            var barangaySelect = $("#ra-brgy");
            barangaySelect.html('<option value="">Loading Barangays...</option>');

            if (residentialbarangayChoices) { // Destroy any existing Choices.js
                residentialbarangayChoices.destroy();
                barangaySelect.html('<option value="">Loading Barangays...</option>');
            }

            // If a city is selected/changed, fetch the corresponding barangays based on the code
            if (cityCode) {
                $.get("<?= site_url('EmployeeController/fetchDataBarangay') ?>/" + cityCode, function (data) {
                    var barangays = JSON.parse(data);
                    barangaySelect.empty();
                    barangaySelect.append('<option value="">Select Barangay</option>').prop('disabled', false);

                    // Add all barangay data 
                    barangays.forEach(function (barangay) {
                        barangaySelect.append(`<option value="${barangay.code}">${barangay.name}</option>`);
                    });

                    // Initialize the Choices.js
                    residentialbarangayChoices = new Choices(barangaySelect[0], {
                        allowHTML: true,
                        searchEnabled: true
                    });

                    // If there's an initial barangay value (from the hidden input), select it
                    if (residentbarangayValue) {
                        var selectedBarangay = barangays.find(barangay => barangay.name === residentbarangayValue);
                        if (selectedBarangay) {
                            residentialbarangayChoices.setValue([
                                { value: selectedBarangay.code, label: residentbarangayValue }
                            ]);
                            barangaySelect.trigger('change');
                            console.log("Old Barangay: " + selectedBarangay.name);
                        }
                    }
                });

                // Set the city name in the hidden input field for submission
                var selectedCityName = residentcitySelect.find("option:selected").text();
                $("#prsnl_residentialcity").val(selectedCityName); // Set city name in hidden input

            } else {
                // If no city is selected, clear barangay dropdown and disable it
                barangaySelect.empty().append('<option value="">Select Barangay</option>').prop('disabled', true);
                $("#prsnl_residentialcity").val('');
                $("#prsnl_residentialbarangay").val('');
                console.log('No City Selected' + cityCode);
            }
        });

        // Event listener for when a barangay is selected
        $("#ra-brgy").change(function () {
            var barangayCode = $(this).val(); // Get the selected barangay code
            var selectedBarangayName = $("#ra-brgy option:selected").text(); // Get the selected barangay name

            // Set the barangay name in the hidden input field for submission
            $("#prsnl_residentialbarangay").val(selectedBarangayName); // Set barangay name in hidden input

            console.log("Barangay Selected: " + barangayCode);
        });


        <!-- **************** -->
        // Event listener for when a city is selected
        $("#pa-city").change(function () {
            var cityCode = $(this).val(); // Get the selected city code

            // Prepare barangay dropdown and show loading message
            var barangaySelect = $("#pa-brgy");
            barangaySelect.html('<option value="">Loading Barangays...</option>');

            // Destroy any existing Choices.js instance to reinitialize it later
            if (permanentbarangayChoices) {
                permanentbarangayChoices.destroy();
                barangaySelect.html('<option value="">Loading Barangays...</option>');
            }

            // If a city code is selected, fetch the corresponding barangays
            if (cityCode) {
                $.get("<?= site_url('EmployeeController/fetchDataBarangay') ?>/" + cityCode, function (data) {
                    var barangays = JSON.parse(data);
                    barangaySelect.empty();
                    barangaySelect.append('<option value="">Select Barangay</option>').prop('disabled', false);

                    // Add each barangay to the dropdown
                    barangays.forEach(function (barangay) {
                        barangaySelect.append(`<option value="${barangay.code}">${barangay.name}</option>`);
                    });

                    // Initialize the Choices.js library for barangay dropdown
                    permanentbarangayChoices = new Choices(barangaySelect[0], {
                        allowHTML: true,
                        searchEnabled: true
                    });

                    // If there's an initial barangay value (from the hidden input), select it
                    if (permanentbarangayValue) {
                        var selectedBarangay = barangays.find(barangay => barangay.name === permanentbarangayValue);
                        if (selectedBarangay) {
                            // Set the selected barangay in the Choices.js dropdown
                            permanentbarangayChoices.setValue([
                                { value: selectedBarangay.code, label: permanentbarangayValue }
                            ]);
                            barangaySelect.trigger('change');
                            console.log("Old Barangay: " + selectedBarangay.name);
                        }
                    }
                });

                // Set the city name in the hidden input field for submission
                var selectedCityName = permanentcitySelect.find("option:selected").text();
                $("#prsnl_permanentcity").val(selectedCityName); // Set city name in hidden input

            } else {
                // If no city is selected, clear barangay dropdown and disable it
                barangaySelect.empty().append('<option value="">Select Barangay</option>').prop('disabled', true);
                $("#prsnl_permanentcity").val('');
                $("#prsnl_permanentbarangay").val('');
                console.log('No City Selected' + cityCode);
            }
        });

        // Event listener for when a barangay is selected
        $("#pa-brgy").change(function () {
            var barangayCode = $(this).val(); // Get the selected barangay code
            var selectedBarangayName = $("#pa-brgy option:selected").text(); // Get the selected barangay name

            // Set the barangay name in the hidden input field for submission
            $("#prsnl_permanentbarangay").val(selectedBarangayName); // Set barangay name in hidden input

            console.log("Barangay Selected: " + barangayCode);
        });
    });
</script>

<?= $this->endSection(); ?>