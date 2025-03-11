<?= $this->extend('/Index/Components/main-layout'); ?>
<?= $this->section('content'); ?>

<?php
if ($usertype == 1) {
    $title = 'Admin';
} else if ($usertype == 2) {
    $title = 'Employee';
}
?>

<div class="card my-5">
    <div class="card-body">
        <form action="/MainController/Login/<?= $usertype ?>" method="post">
            <div class="text-center">
                <h1 class="text-center"><?= $title ?> Login</h1>
                <p class="mb-4">Welcome to TUPT Employee Project.</p>
            </div>

            <div class="my-2">
                <label class="form-label">ID Number</label>
                <input type="text" class="form-control text-uppercase" placeholder="XXXX-00-0000" id="idnumber" name="log_idnumber" required autofocus />
                <div class="invalid-feedback"> ID number is not registered. </div>
            </div>

            <div class="mb-2">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Password" id="password" name="log_password" required />
                <div class="invalid-feedback"> Wrong password. </div>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center text-sm">
                <div class="form-check m-0">
                    <label class="label" for="show-password">Show password</label>
                    <input class="form-check-input" type="checkbox" id="show-password">
                </div>
                <a href="/MainController/ForgotPassword" class="">Forgot Password?</a>
            </div>

            <input type="hidden" name="log_usertype" value="<?= $usertype ?>">
            <input type="hidden" name="log_checklogin" value="true">

            <div class="row">
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </div>
                </div>
            </div>
        </form>

        <form action="/MainController/Register/<?= $usertype ?>" method="post">
            <p class="mt-3 w-100 text-center">
                Don't have an Account?
                <button type="submit" class="border-0 bg-transparent text-primary p-0">Register Now</button>
            </p>
        </form>

        <a href="/" class="d-flex justify-content-center align-items-center text-sm">
            <i data-feather="chevron-left"></i> Return
        </a>
    </div>
</div>


<script>
    const loginData = {
        checkLogin: <?= json_encode($checkLogin) ?>,
        idnumber: <?= json_encode($idnumber) ?>,
        idnumberError: <?= json_encode($idnumberError) ?>,
        passwordError: <?= json_encode($passwordError) ?>
    };
</script>
<script src="/tup-javascript/login.js"></script>
<script>
    window.history.pushState(null, '', window.location.href);
    window.onpopstate = function () {
        window.history.pushState(null, '', window.location.href);
    };
</script>

<?= $this->endSection(); ?>