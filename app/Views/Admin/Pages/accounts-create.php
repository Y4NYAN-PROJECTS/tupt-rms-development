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
                    <li class="breadcrumb-item">Create Account</li>
                </ul>
            </div>
            <!-- [ Title ] -->
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Create New Account</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body my-sm-3">
                <div class="text-center">
                    <h2 class="text-center">Registration</h2>
                    <p class="mb-4">Direct account registration</p>
                </div>

                <form action="/AdminController/SaveRegistration" method="post" id="regsiter-form">
                    <div class="row">
                        <div class="d-sm-flex align-items-sm-center justify-content-sm-center">
                            <div class="col-sm-12 col-md-8 col-lg-6">
                                <div class="row">
                                    <!-- [ Hidden Input ] -->
                                    <input type="hidden" id="idnumber-hidden" name="reg_fullidnumber" />

                                    <div class="col-12">
                                        <?php
                                        $isadmin = isset($oldinput) ?? $oldinput['reg_usertype'] == 1 ? true : false;
                                        $isemployee = isset($oldinput) ?? $oldinput['reg_usertype'] == 2 ? true : false;
                                        ?>
                                        <div class="mb-3">
                                            <label class="form-label">User Type</label>
                                            <select class="form-select <?= isset($validation) && $validation->hasError('reg_usertype') ? 'is-invalid' : '' ?>" name="reg_usertype">
                                                <option value="">Select User Type</option>
                                                <option value="1" <?= $isadmin ? 'selected' : '' ?>>Administrator</option>
                                                <option value="2" <?= $isemployee ? 'selected' : '' ?>>Employee</option>
                                            </select>

                                            <!-- [ Error Message ] -->
                                            <?php if (isset($validation) && $validation->hasError('reg_usertype')): ?>
                                                <div class="invalid-feedback"><?= $validation->getError('reg_usertype') ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">First name</label>
                                            <input type="text" class="form-control text-uppercase <?= isset($validation) && $validation->hasError('reg_firstname') ? 'is-invalid' : '' ?>" placeholder="First name" id="firstname" name="reg_firstname" value="<?= isset($oldinput) ? $oldinput['reg_firstname'] : '' ?>" />

                                            <!-- [ Error Message ] -->
                                            <?php if (isset($validation) && $validation->hasError('reg_firstname')): ?>
                                                <div class="invalid-feedback"><?= $validation->getError('reg_firstname') ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Middle name</label>
                                            <input type="text" class="form-control text-uppercase <?= isset($validation) && $validation->hasError('reg_middlename') ? 'is-invalid' : '' ?>" placeholder="Middle name" id="middlename" name="reg_middlename" value="<?= isset($oldinput) ? $oldinput['reg_middlename'] : '' ?>" />

                                            <!-- [ Error Message ] -->
                                            <?php if (isset($validation) && $validation->hasError('reg_middlename')): ?>
                                                <div class="invalid-feedback"><?= $validation->getError('reg_middlename') ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Last name</label>
                                            <input type="text" class="form-control text-uppercase <?= isset($validation) && $validation->hasError('reg_lastname') ? 'is-invalid' : '' ?>" placeholder="Last name" id="lastname" name="reg_lastname" value="<?= isset($oldinput) ? $oldinput['reg_lastname'] : '' ?>" />

                                            <!-- [ Error Message ] -->
                                            <?php if (isset($validation) && $validation->hasError('reg_lastname')): ?>
                                                <div class="invalid-feedback"><?= $validation->getError('reg_lastname') ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <!-- [ Extentions ] -->
                                    <?php
                                    $extensions = ['Jr.', 'Sr.', 'III', 'IV'];
                                    $selectedExtension = $oldinput['reg_extension'] ?? '';
                                    ?>

                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Extension name</label>
                                            <select name="reg_extension" id="extension" class="form-control">
                                                <option value="">N/A</option>
                                                <?php foreach ($extensions as $extension): ?>
                                                    <option value="<?= $extension ?>" <?= ($selectedExtension === $extension) ? 'selected' : '' ?>>
                                                        <?= $extension ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Department</label>
                                            <select class="form-select <?= isset($validation) && $validation->hasError('reg_department') ? 'is-invalid' : '' ?>" name="reg_department">
                                                <option value="">Select Department</option>
                                                <?php foreach ($departments as $department): ?>
                                                    <option value="<?= $department['department_id'] ?>" <?= (isset($oldinput) && $oldinput['reg_department'] == $department['department_id']) ? 'selected' : '' ?>>
                                                        <?= $department['department_name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>

                                            <!-- [ Error Message ] -->
                                            <?php if (isset($validation) && $validation->hasError('reg_department')): ?>
                                                <div class="invalid-feedback"><?= $validation->getError('reg_department') ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Employee Type</label>
                                            <select class="form-select <?= isset($validation) && $validation->hasError('reg_employeetype') ? 'is-invalid' : '' ?>" name="reg_employeetype">
                                                <option value="">Select Employee Type</option>
                                                <?php foreach ($employeetypes as $employeetype): ?>
                                                    <option value="<?= $employeetype['employee_type_id'] ?>" <?= (isset($oldinput) && $oldinput['reg_employeetype'] == $employeetype['employee_type_id']) ? 'selected' : '' ?>>
                                                        <?= $employeetype['employee_type_name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>

                                            <!-- [ Error Message ] -->
                                            <?php if (isset($validation) && $validation->hasError('reg_employeetype')): ?>
                                                <div class="invalid-feedback"><?= $validation->getError('reg_employeetype') ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="plntl-select" class="form-label">Plantilla</label>
                                            <select id="plntl-select" class="form-select <?= isset($validation) && $validation->hasError('reg_plantilla') ? 'is-invalid' : '' ?>" name="reg_plantilla">
                                                <option value="">Select Plantilla</option>
                                                <?php foreach ($plantillas as $plantilla): ?>
                                                    <option value="<?= $plantilla['plantilla_id'] ?>" <?= (isset($oldinput) && $oldinput['reg_plantilla'] == $plantilla['plantilla_id']) ? 'selected' : '' ?> data-plantilla-code="<?= $plantilla['plantilla_titlecode'] ?>">
                                                        <?= $plantilla['plantilla_title'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>

                                            <!-- [ Error Message ] -->
                                            <?php if (isset($validation) && $validation->hasError('reg_plantilla')): ?>
                                                <div class="invalid-feedback"><?= $validation->getError('reg_plantilla') ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Employee ID Number</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="idnumber-text"></span>
                                                    <input type="text" class="form-control <?= isset($validation) && $validation->hasError('reg_idnumber') || isset($errorid) && !empty($errorid) ? 'is-invalid' : '' ?>" placeholder="00-0000" id="idnumber" name="reg_idnumber" value="<?= isset($oldinput) ? $oldinput['reg_idnumber'] : '' ?>" />

                                                    <!-- [ Error Message ] -->
                                                    <?php if (isset($validation) && $validation->hasError('reg_idnumber')): ?>
                                                        <div class="invalid-feedback"><?= $validation->getError('reg_idnumber') ?></div>
                                                    <?php endif; ?>

                                                    <?php if (isset($errorid) && !empty($errorid)): ?>
                                                        <div class="invalid-feedback"><?= $errorid ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Email Address</label>
                                            <input type="text" class="form-control <?= isset($validation) && $validation->hasError('reg_email') ? 'is-invalid' : '' ?>" placeholder="Email Address" id="email" name="reg_email" value="<?= isset($oldinput) ? $oldinput['reg_email'] : '' ?>" />

                                            <!-- [ Error Message ] -->
                                            <?php if (isset($validation) && $validation->hasError('reg_email')): ?>
                                                <div class="invalid-feedback"><?= $validation->getError('reg_email') ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary" id="submit">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const plantillaSelect = document.getElementById('plntl-select');
        const idnumberHidden = document.getElementById('idnumber-hidden');
        const idnumberText = document.getElementById('idnumber-text');
        const idnumberInput = document.getElementById('idnumber');

        function updateIdNumberDisplay() {
            const selectedOption = plantillaSelect.options[plantillaSelect.selectedIndex];
            const plantillaCode = selectedOption.dataset.plantillaCode || "";

            idnumberText.textContent = plantillaCode ? `${plantillaCode}-` : "Select Plantilla";

            if (!plantillaCode) {
                idnumberInput.value = "";
            }

            idnumberHidden.value = plantillaCode ? `${plantillaCode}-${idnumberInput.value}` : "";
            idnumberInput.readOnly = !plantillaCode;
        }

        // For restrict key
        function restrictInvalidKeys(event) {
            const allowedKeys = ['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab'];
            if (!/[\d-]/.test(event.key) && !allowedKeys.includes(event.key)) {
                event.preventDefault();
            }
        }

        updateIdNumberDisplay();

        plantillaSelect.addEventListener('change', updateIdNumberDisplay);
        idnumberInput.addEventListener('input', updateIdNumberDisplay);
        idnumberInput.addEventListener('keydown', restrictInvalidKeys);
    });
</script>

<?= $this->endSection(); ?>