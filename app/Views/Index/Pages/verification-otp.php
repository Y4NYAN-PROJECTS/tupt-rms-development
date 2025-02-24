<?= $this->extend('/Index/Components/main-layout'); ?>
<?= $this->section('content'); ?>

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

<div class="card my-5">
    <div class="card-body">
        <form action="/MainController/VerifyOTP" method="post">
            <div class="text-center">
                <h3 class="text-center mb-3">One Time Password</h3>
                <p class="mb-4">Please enter the 4-digit OTP sent to your email to verify your registration. The code is valid for <span id="countdown"></span>.</p>
            </div>
            <div class="row my-4 text-center">
                <div class="col">
                    <input type="text" class="form-control text-center otp-input" placeholder="0" name="code1" maxlength="1" oninput="handleInput(this, null, 'code2')" onkeydown="handleBackspace(this, null)" autofocus />
                </div>
                <div class="col">
                    <input type="text" class="form-control text-center otp-input" placeholder="0" name="code2" maxlength="1" oninput="handleInput(this, 'code1', 'code3')" onkeydown="handleBackspace(this, 'code1')" />
                </div>
                <div class="col">
                    <input type="text" class="form-control text-center otp-input" placeholder="0" name="code3" maxlength="1" oninput="handleInput(this, 'code2', 'code4')" onkeydown="handleBackspace(this, 'code2')" />
                </div>
                <div class="col">
                    <input type="text" class="form-control text-center otp-input" placeholder="0" name="code4" maxlength="1" oninput="handleInput(this, 'code3', null)" onkeydown="handleBackspace(this, 'code3')" />
                </div>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary auth-conf">Confirm</button>
            </div>
        </form>

        <a href="/" class="d-flex justify-content-center align-items-center text-sm mt-3">
            <i data-feather="chevron-left"></i> Cancel
        </a>
    </div>
</div>

<script>
    function handleInput(current, prevFieldID, nextFieldID) {
        const value = current.value;
        current.value = value.replace(/[^0-9]/g, ''); // Allow only digits
        if (current.value.length === 1 && nextFieldID) {
            document.querySelector(`[name="${nextFieldID}"]`).focus();
        }
    }

    function handleBackspace(current, prevFieldID) {
        if (event.key === "Backspace" && current.value.length === 0 && prevFieldID) {
            const prevField = document.querySelector(`[name="${prevFieldID}"]`);
            prevField.focus();
            prevField.select();
        }
    }

    document.querySelectorAll('.otp-input').forEach(input => {
        input.addEventListener('input', (e) => {
            e.target.value = e.target.value.slice(0, 1);
        });
        input.addEventListener('keypress', (e) => {
            if (!/[0-9]/.test(e.key)) {
                e.preventDefault();
            }
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        let remainingtime = <?= $remainingtime ?>;
        const countdownDisplay = document.getElementById('countdown');

        const countdown = () => {
            if (remainingtime > 0) {
                const minutes = Math.floor(remainingtime / 60);
                const seconds = remainingtime % 60;

                countdownDisplay.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                remainingtime--;
                setTimeout(countdown, 1000);
            } else {
                countdownDisplay.textContent = "00:00";
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }
        };
        countdown();
    });
</script>


<?= $this->endSection(); ?>