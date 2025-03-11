<?= $this->extend('/Index/Components/main-layout'); ?>
<?= $this->section('content'); ?>

<div class="card my-5">
    <div class="card-body">
        <form action="/MainController/ForgotPassword" method="post">
            <div class="">
                <h3 class="mb-3">Forgot Password</h3>
                <p class="mb-4">Kindly complete the fields, temporary password will be sent to your email address.</p>
            </div>

            <?php
            $hasInput = isset($oldinput) && !empty($oldinput);
            $isValidated = isset($validation) && !empty($validation);

            $idnumberError = $isValidated && $validation->hasError('fp_idnumber');
            $idnumberClass = $idnumberError ? 'is-invalid' : '';

            $emailError = $isValidated && $validation->hasError('fp_emailaddress');
            $emailClass = $emailError ? 'is-invalid' : '';
            ?>

            <div class="form-group">
                <label for="id-number" class="form-label">ID Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control text-uppercase <?= $idnumberClass ?>" name="fp_idnumber" id="id-number" placeholder="XXXX-00-0000" value="<?= $hasInput ? $oldinput['fp_idnumber'] : '' ?>">

                <?php if ($idnumberError): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('fp_idnumber') ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="id-email" class="form-label">Email Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?= $emailClass ?>" name="fp_emailaddress" id="id-email" placeholder="sample@email.com" value="<?= $hasInput ? $oldinput['fp_emailaddress'] : '' ?>">
                <?php if ($emailError): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('fp_emailaddress') ?>
                    </div>
                <?php endif; ?>
            </div>

            <input type="hidden" name="is_submitted" value="true">

            <button class="w-100 btn btn-primary" type="submit">Submit</button>
        </form>

        <a href="/" class="d-flex justify-content-center align-items-center text-sm mt-3">
            <i data-feather="chevron-left"></i> Cancel
        </a>
    </div>
</div>


<?= $this->endSection(); ?>