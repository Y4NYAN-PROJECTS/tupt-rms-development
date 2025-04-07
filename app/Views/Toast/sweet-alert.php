<!-- [ Alert Types ] -->
<!-- question -->
<!-- success -->
<!-- error -->
<!-- warning -->
<!-- info -->

<script>
    const timerConfig = {
        timer: 2000,
        timerProgressBar: true,
        willOpen: () => {
            timerInterval = setInterval(() => {
                const popup = Swal.getPopup(); // Get the popup element
                if (popup) {
                    const timerText = popup.querySelector('b');
                    if (timerText) {
                        timerText.textContent = Swal.getTimerLeft();
                    }
                }
            }, 100);
        },
    }
</script>

<!-- [ General Alerts ] -->
<?php if (!empty(session()->get('alert_registersuccess'))): ?>
    <script>
        const sessionMessage = "<?= session()->get('alert_registersuccess'); ?>";
        let timerInterval;
        Swal.fire({
            icon: 'success',
            title: sessionMessage,
            html: 'Request sent. Wait for the admin approval.',

            showCancelButton: false,
            showDenyButton: false,
            confirmButtonText: 'Continue',
            denyButtonText: 'Cancel',

            ...timerConfig
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) { }
        });
    </script>

    <?php session()->remove('alert_registersuccess'); ?>
<?php endif; ?>


<?php if (!empty(session()->get('alert_complete'))): ?>
    <script>
        const sessionMessage = "<?= session()->get('alert_complete'); ?>";
        let timerInterval;
        Swal.fire({
            icon: 'success',
            title: sessionMessage,
            html: 'Congratulations for completing PDS!',

            showCancelButton: false,
            showDenyButton: false,
            confirmButtonText: 'Continue',
            denyButtonText: 'Cancel',

            ...timerConfig
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) { }
        });
    </script>

    <?php session()->remove('alert_complete'); ?>
<?php endif; ?>

<?php if (!empty(session()->get('alert_upload'))): ?>
    <script>
        const sessionMessage = "<?= session()->get('alert_upload'); ?>";
        let timerInterval;
        Swal.fire({
            icon: 'success',
            title: sessionMessage,
            html: 'Your Profile Picture Uploaded Successfully',

            showCancelButton: false,
            showDenyButton: false,
            confirmButtonText: 'Continue',
            denyButtonText: 'Cancel',

            ...timerConfig
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) { }
        });
    </script>

    <?php session()->remove('alert_upload'); ?>
<?php endif; ?>

<?php if (!empty(session()->get('alert_insertsuccess'))): ?>
    <script>
        const sessionMessage = "<?= session()->get('alert_insertsuccess'); ?>";
        let timerInterval;
        Swal.fire({
            icon: 'success',
            title: sessionMessage,
            html: 'Added Item Successfully!',

            showCancelButton: false,
            showDenyButton: false,
            confirmButtonText: 'Continue',
            denyButtonText: 'Cancel',

            ...timerConfig
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) { }
        });
    </script>

    <?php session()->remove('alert_insertsuccess'); ?>
<?php endif; ?>

<?php if (!empty(session()->get('alert_deletesuccess'))): ?>
    <script>
        const sessionMessage = "<?= session()->get('alert_deletesuccess'); ?>";
        let timerInterval;
        Swal.fire({
            icon: 'error',
            title: sessionMessage,
            html: 'Deleted Item/s Successfully!',

            showCancelButton: false,
            showDenyButton: false,
            confirmButtonText: 'Continue',
            denyButtonText: 'Cancel',

            ...timerConfig
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) { }
        });
    </script>

    <?php session()->remove('alert_deletesuccess'); ?>
<?php endif; ?>

<?php if (!empty(session()->get('alert_updatesuccess'))): ?>
    <script>
        const sessionMessage = "<?= session()->get('alert_updatesuccess'); ?>";
        let timerInterval;
        Swal.fire({
            icon: 'success',
            title: sessionMessage,
            html: 'Your updates have been saved and applied.',

            showCancelButton: false,
            showDenyButton: false,
            confirmButtonText: 'Continue',
            denyButtonText: 'Cancel',

            ...timerConfig
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) { }
        });
    </script>

    <?php session()->remove('alert_updatesuccess'); ?>
<?php endif; ?>

<?php if (!empty(session()->get('alert_failed'))): ?>
    <script>
        const sessionMessage = "<?= session()->get('alert_failed'); ?>";
        let timerInterval;
        Swal.fire({
            icon: 'error',
            title: sessionMessage,
            html: 'An issue occurred, Sorry for the inconvience.',

            showCancelButton: false,
            showDenyButton: false,
            confirmButtonText: 'Continue',
            denyButtonText: 'Cancel',

            ...timerConfig
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) { }
        });
    </script>

    <?php session()->remove('alert_failed'); ?>
<?php endif; ?>

<?php if (!empty(session()->get('alert_failedpromotion'))): ?>
    <script>
        const sessionMessage = "<?= session()->get('alert_failedpromotion'); ?>";
        let timerInterval;
        Swal.fire({
            icon: 'error',
            title: sessionMessage,
            html: 'Promotion on this date already exists!',

            showCancelButton: false,
            showDenyButton: false,
            confirmButtonText: 'Continue',
            denyButtonText: 'Cancel',

            ...timerConfig
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) { }
        });
    </script>

    <?php session()->remove('alert_failedpromotion'); ?>
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('.ongoing-button')) {
            document.addEventListener('click', function (event) {
                const deleteButton = event.target.closest('.ongoing-button');

                if (deleteButton) {
                    Swal.fire({
                        title: 'Not Available',
                        text: 'This feature is currently under construction.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Okay',
                        cancelButtonText: 'Close',
                        reverseButtons: true
                    });
                }
            });
        }
    });
</script>