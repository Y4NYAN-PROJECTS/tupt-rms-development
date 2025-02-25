<?= $this->extend('/Employee/Components/main-layout'); ?>
<?= $this->section('content'); ?>

<!-- [ Header ] -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <!-- [ Breadcrumbs ] -->
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Profile</a></li>
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

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body py-0">
                <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?= isset($tab) && ($tab == 'profile') ? 'active' : '' ?>" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="true">
                            <i class="ti ti-user me-2"></i>Profile
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= isset($tab) && ($tab == 'myaccount') ? 'active' : '' ?>" id="my-account-tab" data-bs-toggle="tab" href="#my-account" role="tab" aria-selected="true">
                            <i class="ti ti-id me-2"></i>My Account
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="tab-content">
            <!-- [ Profile ] -->
            <div class="tab-pane show <?= isset($tab) && ($tab == 'profile') ? 'active' : '' ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-5 col-xxl-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <div class="mb-3 position-relative d-inline-block">
                                    <div class="position-relative rounded-circle overflow-hidden" style="width: 120px; height: 120px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#uploadProfilePicture">
                                        <img class="img-fluid w-100 h-100" style="object-fit: cover;" src="<?= $user['image_path'] ?>" alt="User image">

                                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 
                                                    d-flex align-items-center justify-content-center text-white fw-bold opacity-0 
                                                    hover-overlay">
                                            Edit
                                        </div>
                                    </div>
                                </div>

                                <style>
                                    /* Bootstrap Only: Add hover effect */
                                    .position-relative:hover .hover-overlay {
                                        opacity: 1 !important;
                                        transition: opacity 0.3s ease-in-out;
                                    }
                                </style>

                                <h4><?= $user['full_name'] ?></h4>
                                <small class="text-muted text-sm"><?= $user['id_number'] ?></small>
                            </div>

                            <div class="card-body position-relative">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6 mb-3">
                                        <small class="mb-1 text-muted">User type</small>
                                        <p class="mb-0"><?= $user['user_type'] == 1 ? 'Employeeistrator' : 'Employee' ?>
                                        </p>
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6 mb-3">
                                        <small class="mb-1 text-muted">Plantilla</small>
                                        <p class="mb-0"><?= $user['plantilla_title'] ?></p>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                                        <small class="mb-1 text-muted">Degree</small>
                                        <p class="mb-0"><?= $user['degree_title'] ?? '-' ?></p>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                                        <small class="mb-1 text-muted">Role</small>
                                        <p class="mb-0"><?= $user['role_description'] ?? 'Not Assigned' ?></p>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                                        <small class="mb-1 text-muted">Department</small>
                                        <p class="mb-0"><?= $user['department_name'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-sm-12 col-md-8 col-lg-7 col-xxl-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="m-0">Personal Details</h5>
                                    <a href="/EmployeeController/RedirectToProfileUpdate">
                                        <button class="btn btn-outline-secondary btn-sm px-3"><i class="ti ti-edit"></i>
                                            Update</button>
                                    </a>
                                </div>
                            </div>

                            <div class="card-body pb-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0 pt-0">
                                        <div class="row">
                                            <div class="mb-3 col-12 col-sm-12 col-md-6 col-lg-6">
                                                <p class="mb-1 text-muted">Full Name</p>
                                                <p class="mb-0"><?= $user['full_name'] ?></p>
                                            </div>
                                            <div class="mb-3 col-12 col-sm-12 col-md-6 col-lg-6">
                                                <p class="mb-1 text-muted">Email</p>
                                                <p class="mb-0"><?= $user['email_address']; ?>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item px-0">
                                        <div class="row">
                                            <div class="mb-3 col-12 col-sm-12 col-md-6 col-lg-6">
                                                <p class="mb-1 text-muted">Address</p>
                                                <p class="mb-0"><?= $user['address']; ?></p>
                                            </div>

                                            <div class="mb-3 col-12 col-sm-12 col-md-6 col-lg-6">
                                                <p class="mb-1 text-muted">Phone</p>
                                                <p class="mb-0"><?= $user['mobile_number']; ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item px-0">
                                        <div class="row">
                                            <div class="mb-3 col-6 col-sm-6 col-md-4 col-lg-3">
                                                <p class="mb-1 text-muted">Birth Date</p>
                                                <p class="mb-0"><?= $user['birthdate']; ?></p>
                                            </div>

                                            <div class="mb-3 col-6 col-sm-6 col-md-4 col-lg-3">
                                                <p class="mb-1 text-muted">Age</p>
                                                <p class="mb-0"><?= $user['age']; ?></p>
                                            </div>

                                            <div class="mb-3 col-12 col-sm-12 col-md-4 col-lg-6">
                                                <p class="mb-1 text-muted">Gender</p>
                                                <p class="mb-0"><?= $user['sex']; ?></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- [ My Account ] -->
            <div class="tab-pane <?= isset($tab) && ($tab == 'myaccount') ? 'active' : '' ?>" id="my-account" role="tabpanel" aria-labelledby="my-account-tab">
                <div class="row">

                    <!-- [ Update Profile Details ] -->
                    <?php
                    $isProfileSubmitted = ($form == 'profileform' && !empty($validation));

                    $firstNameInput = $isProfileSubmitted ? $oldinput['admn_firstname'] : $user['first_name'];
                    $firstNameError = $isProfileSubmitted && $validation->hasError('admn_firstname');
                    $firstNameClass = $firstNameError ? 'is-invalid' : '';

                    $middleNameInput = $isProfileSubmitted ? $oldinput['admn_middlename'] : $user['middle_name'];
                    $middleNameError = $isProfileSubmitted && $validation->hasError('admn_middlename');
                    $middleNameClass = $middleNameError ? 'is-invalid' : '';

                    $lastNameInput = $isProfileSubmitted ? $oldinput['admn_lastname'] : $user['last_name'];
                    $lastNameError = $isProfileSubmitted && $validation->hasError('admn_lastname');
                    $lastNameClass = $lastNameError ? 'is-invalid' : '';

                    $mobileNumberInput = $isProfileSubmitted ? $oldinput['admn_mobilenumber'] : $user['mobile_number'];
                    $mobileNumberError = $isProfileSubmitted && $validation->hasError('admn_mobilenumber');
                    $mobileNumberClass = $mobileNumberError ? 'is-invalid' : '';

                    $addressInput = $isProfileSubmitted ? $oldinput['admn_address'] : $user['address'];
                    $addressError = $isProfileSubmitted && $validation->hasError('admn_address');
                    $addressClass = $addressError ? 'is-invalid' : '';

                    $genderSelect = $isProfileSubmitted ? $oldinput['admn_gender'] : $user['sex'];
                    $genderError = $isProfileSubmitted && $validation->hasError('admn_gender');
                    $genderClass = $genderError ? 'is-invalid' : '';

                    $extensionSelect = $isProfileSubmitted ? $oldinput['admn_extension'] : $user['extension_name'];
                    $extensionError = $isProfileSubmitted && $validation->hasError('admn_extension');
                    $extensionClass = $extensionError ? 'is-invalid' : '';

                    $degreeSelect = $isProfileSubmitted ? $oldinput['admn_degree'] : $user['degree_id'];
                    $degreeError = $isProfileSubmitted && $validation->hasError('admn_degree');
                    $degreeClass = $degreeError ? 'is-invalid' : '';

                    ?>

                    <div class="col-12">
                        <div class="card" id="update-profile">
                            <div class="card-header">
                                <h5>Update Profile Details</h5>
                            </div>
                            <form action="/EmployeeController/UpdateProfile" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control <?= $firstNameClass ?>" name="admn_firstname" value="<?= $firstNameInput ?>" placeholder="First Name">

                                                <?php if ($firstNameError): ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('admn_firstname') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Middle Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control <?= $middleNameClass ?>" name="admn_middlename" value="<?= $middleNameInput ?>" placeholder="Middle Name">

                                                <?php if ($middleNameError): ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('admn_middlename') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control <?= $lastNameClass ?>" name="admn_lastname" value="<?= $lastNameInput ?>" placeholder="Last Name">

                                                <?php if ($lastNameError): ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('admn_lastname') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="form-label">Extension name</label>
                                                <select name="admn_extension" id="extension" class="form-control">
                                                    <option value="">N/A</option>
                                                    <?php foreach ($extensions as $extension): ?>
                                                        <?php $isSelected = $extensionSelect == $extension['extension_name'] ? 'selected' : ''; ?>
                                                        <option value="<?= $extension['extension_name']; ?>" <?= $isSelected ?>>
                                                            <?= $extension['extension_name']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>

                                                <?php if (($form == 'profileform') && $validation->hasError('extension_name')): ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('extension_name') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><span class="fi fi-ph"></span></span>
                                                    <span class="input-group-text">+63</span>
                                                    <input type="tel" id="phone" class="form-control <?= $mobileNumberClass ?>" name="admn_mobilenumber" value="<?= $mobileNumberInput ?>" placeholder="912 345 6789" oninput="formatPhoneNumber(this)" maxlength="12">

                                                    <?php if ($mobileNumberError): ?>
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('admn_mobilenumber'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control <?= $addressClass ?>" name="admn_address" value="<?= $addressInput ?>" placeholder="# Street, Subdivision, Barangay, City">

                                                <?php if (($form == 'profileform') && $validation->hasError('admn_address')): ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('admn_address') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                <select class="form-select <?= $genderClass ?>" id="sex-select" name="admn_gender">
                                                    <option value="">Select Gender</option>
                                                    <?php foreach ($genders as $gender): ?>
                                                        <?php $isSelected = $genderSelect == $gender['gender_name'] ? 'selected' : ''; ?>
                                                        <option value="<?= $gender['gender_name']; ?>" <?= $isSelected ?>>
                                                            <?= $gender['gender_name']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>

                                                <?php if (($form == 'profileform') && $validation->hasError('admn_gender')): ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('admn_gender') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="form-label">Birth Date <span class="text-danger">*</span></label>
                                                <input type="date" max="<?= $datenow ?>" class="form-control <?= ($form == 'profileform') && $validation->hasError('admn_birthdate') ? 'is-invalid' : '' ?>" name="admn_birthdate" value="<?= ($form == 'profileform') ? $oldinput['admn_birthdate'] : $user['birthdate']; ?>">
                                                <?php if (($form == 'profileform') && $validation->hasError('admn_birthdate')): ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('admn_birthdate') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="form-label">Degree <span class="text-danger">*</span></label>
                                                <select name="admn_degree" id="degree" class="form-control <?= $degreeClass ?>">
                                                    <option value="">N/A</option>
                                                    <?php foreach ($degrees as $degree): ?>
                                                        <?php $isSelected = $degreeSelect == $degree['degree_id'] ? 'selected' : ''; ?>
                                                        <option value="<?= $degree['degree_id']; ?>" <?= $isSelected ?>>
                                                            <?= $degree['degree_title']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>

                                                <?php if (($form == 'profileform') && $validation->hasError('admn_degree')): ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('admn_degree') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Hidden Input -->
                                        <input type="hidden" name="account_id" value="<?= session()->get('logged_id') ?>" />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary px-3" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- [ Change Password ] -->
                    <?php
                    $isPasswordSubmitted = ($form == 'passwordform' && !empty($validation));

                    $oldpasswordInput = $isPasswordSubmitted ? $oldinput['admn_oldpassword'] : '';
                    $oldpasswordError = $isPasswordSubmitted && $validation->hasError('admn_oldpassword');
                    $oldpasswordClass = $oldpasswordError ? 'is-invalid' : '';

                    $newpasswordInput = $isPasswordSubmitted ? $oldinput['admn_newpassword'] : '';
                    $newpasswordError = $isPasswordSubmitted && $validation->hasError('admn_newpassword');
                    $newpasswordClass = $newpasswordError ? 'is-invalid' : '';

                    $newconfirmpwInput = $isPasswordSubmitted ? $oldinput['admn_newconfirmpassword'] : '';
                    $newconfirmpwError = $isPasswordSubmitted && $validation->hasError('admn_newconfirmpassword');
                    $newconfirmpwClass = $newconfirmpwError ? 'is-invalid' : '';
                    ?>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-7">
                        <div class="card" id="change-password">
                            <div class="card-header">
                                <h5>Change Password</h5>
                            </div>
                            <form action="/EmployeeController/ChangePassword" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label" for="admn_oldpw">
                                                    Old Password <span class="text-danger">*</span>
                                                </label>
                                                <input type="password" id="admn_oldpw" class="form-control <?= $oldpasswordClass ?>" name="admn_oldpassword" value="<?= $oldpasswordInput ?>" placeholder="Old Password">

                                                <!-- [ Error Message ] -->
                                                <?php if ($oldpasswordError): ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('admn_oldpassword') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="admn_newpw">Password <span class="text-danger">*</span></label>
                                                <input type="password" id="admn_newpw" class="form-control <?= $newpasswordClass ?>" name="admn_newpassword" value="<?= $newpasswordInput ?>" placeholder="New Password">

                                                <!-- [ Error Message ] -->
                                                <?php if ($newpasswordError): ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('admn_newpassword') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class=" col-12 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="admn_newcpw">Confirm Password <span class="text-danger">*</span></label>
                                                <input type="password" for="admn_newcpw" class="form-control <?= $newconfirmpwClass ?>" name="admn_newconfirmpassword" value="<?= $newconfirmpwInput ?>" placeholder="Confirm New Password">

                                                <!-- [ Error Message ] -->
                                                <?php if ($newconfirmpwError): ?>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('admn_newconfirmpassword') ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- [ Hidden Input/s ] -->
                                        <input type="hidden" name="account_id" value="<?= session()->get('logged_id') ?>">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button class=" btn btn-sm btn-primary px-3" type="submit">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                        <div class="card" id="change-email">
                            <div class="card-header">
                                <h5>Change Email Address</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="admn_newemail">New Email Address <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <input type="email" id="admn_newemail" class="form-control" placeholder="Ex. johndoe@email.com" value="">
                                                <button class="btn btn-secondary ongoing-button" type="button" id="btn-sendcode">Send Code</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="admn_confirmationcode">Confirmation Code
                                                <span class="text-danger">*</span></label>
                                            <input type="password" id="admn_confirmationcode" class="form-control" placeholder="12 Character Confirmation Code" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer ">
                                <button class="btn btn-sm btn-primary px-3 ongoing-button">Update Email</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- [ Upload Profile Picture ] -->
    <div class="modal fade" id="uploadProfilePicture" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="">
                        <h3 class="modal-title">Upload Profile Picture</h3>
                        <small>Select photo to be uploaded.</small>
                    </div>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/EmployeeController/UploadProfilePicture" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="file" class="image-crop-filepond" name="admn_profile_picture" data-max-file-size="10MB" data-allow-image-preview="true" data-allow-image-crop="true" data-image-crop-aspect-ratio="1:1">
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button class="btn btn-primary px-5" type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Register plugins
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginImageCrop,
        FilePondPluginImageResize,
        FilePondPluginImageTransform
    );

    // Initialize FilePond
    const pond = FilePond.create(document.querySelector('.image-crop-filepond'), {
        allowImageCrop: true,
        imageCropAspectRatio: '1:1',

        allowImageResize: true,
        imageResizeTargetWidth: 500,
        imageResizeTargetHeight: 500,

        allowImageTransform: true,

        // Ensures only the cropped & resized version is uploaded
        imageTransformVariants: {
            'cropped': (transforms) => {
                transforms.resize = {
                    size: { width: 500, height: 500 },
                };
                return transforms;
            }
        },
        imageTransformOutputMimeType: 'image/jpeg',
        imageTransformOutputQuality: 1
    });

</script>


<script>
    // Profile Update
    function formatPhoneNumber(input) {
        let value = input.value.replace(/\D/g, '');
        if (value.length > 3 && value.length <= 6) {
            value = value.replace(/(\d{3})(\d{1,3})/, '$1 $2');
        } else if (value.length > 6) {
            value = value.replace(/(\d{3})(\d{3})(\d{1,4})/, '$1 $2 $3');
        }
        input.value = value;
    }

    // Card Focus
    document.addEventListener("DOMContentLoaded", function () {
        const hash = window.location.hash;
        if (hash) {
            const target = document.querySelector(hash);

            if (target) {
                target.classList.add("border", "border-primary", "shadow-lg");
                setTimeout(() => {
                    target.classList.remove("border", "border-primary", "shadow-lg");
                }, 2000);
            }
        }
    });

    // Send Code
    // document.addEventListener("DOMContentLoaded", function () {
    //     const newemailInput = document.getElementById('admn_newemail');
    //     const sendcodeButton = document.getElementById('btn-sendcode');

    //     let ongoingChangeEmail = <?= session()->get('s_emailchange') ? 'true' : 'false' ?>;
    //     let expirationTime = <?= session()->get('s_otptime') ?? '0' ?> + 300; // OTP valid for 5 minutes
    //     let currentTime = <?= $timenow ?>;

    //     const startCountdown = (remainingTime) => {
    //         const countdown = () => {
    //             if (remainingTime > 0) {
    //                 const minutes = Math.floor(remainingTime / 60);
    //                 const seconds = remainingTime % 60;
    //                 sendcodeButton.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
    //                 remainingTime--;
    //                 setTimeout(countdown, 1000);
    //             } else {
    //                 sendcodeButton.textContent = "Resend Code";
    //                 sendcodeButton.disabled = false;
    //                 sendcodeButton.classList.remove("btn-primary");
    //                 sendcodeButton.classList.add("btn-secondary");
    //             }
    //         };
    //         countdown();
    //     };

    //     // If there is an ongoing change email process
    //     if (ongoingChangeEmail && currentTime < expirationTime) {
    //         const remainingTime = expirationTime - currentTime;
    //         sendcodeButton.disabled = true;
    //         sendcodeButton.textContent = "Processing...";
    //         startCountdown(remainingTime);
    //     }

    //     // Event listener for input validation
    //     if (!ongoingChangeEmail) {
    //         newemailInput.addEventListener("input", function () {
    //             if (newemailInput.validity.valid && newemailInput.value !== "") {
    //                 sendcodeButton.classList.remove("btn-secondary");
    //                 sendcodeButton.classList.add("btn-primary");
    //                 sendcodeButton.disabled = false;
    //             } else {
    //                 sendcodeButton.textContent = "Send Code";
    //                 sendcodeButton.classList.add("btn-secondary");
    //                 sendcodeButton.classList.remove("btn-primary");
    //                 sendcodeButton.disabled = true;
    //             }
    //         });
    //     }

    // Event listener for sending OTP
    // if (sendcodeButton) {
    //     sendcodeButton.addEventListener("click", function () {
    //         sendcodeButton.disabled = true;
    //         sendcodeButton.textContent = "Sending...";

    //         $.ajax({
    //             url: '/EmployeeController/ChangeEmailOTP',
    //             type: 'POST',
    //             data: {
    //                 admn_newemail: newemailInput.value
    //             },
    //             success: function (response) {
    //                 if (response.success) {
    //                     const newExpirationTime = response.otptime + 300; // Update expiration time from server
    //                     const remainingTime = newExpirationTime - <?= $timenow ?>;
    //                     startCountdown(remainingTime);
    //                 } else {
    //                     sendcodeButton.textContent = "Failed";
    //                     console.error(response.message);
    //                     console.error(response.debug);
    //                 }
    //             },
    //             error: function (xhr, status, error) {
    //                 console.error('AJAX Error:', error);
    //                 sendcodeButton.textContent = "Error";
    //             }
    //         });
    //     });
    // }
    // });
</script>

<?= $this->endSection(); ?>