<?= $this->extend('/Index/Components/main-layout'); ?>
<?= $this->section('content'); ?>

<div class="card my-5">
    <div class="card-body">
        <div class="text-center">
            <h1 class="text-center">Welcome Back!</h1>
            <p class="mb-4">Your setup experience will be streamlined accordingly</p>
        </div>

        <div class="row mb-5 g-3">
            <div class="col-sm-6">
                <div class="auth-option" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Continue as Employee">
                    <input type="radio" class="btn-check" name="select" value="2" id="employee" />
                    <label class="auth-megaoption" for="employee">
                        <svg class="pc-icon">
                            <use xlink:href="#custom-user"></use>
                        </svg>
                        <span class="h5">Employee</span>
                    </label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="auth-option" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Continue as Administrator">
                    <input type="radio" class="btn-check" name="select" value="1" id="admin" />
                    <label class="auth-megaoption" for="admin">
                        <svg class="pc-icon">
                            <use xlink:href="#custom-shield"></use>
                        </svg>
                        <span class="h5">Admin</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-grid">
                    <button type="button" class="btn btn-primary" onclick="redirectToLogin()">Continue</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function redirectToLogin() {
        if (document.getElementById("employee").checked) {
            window.location.href = "/MainController/Login/2";
        } else if (document.getElementById("admin").checked) {
            window.location.href = "/MainController/Login/1";
        }
    }
</script>

<?= $this->endSection(); ?>