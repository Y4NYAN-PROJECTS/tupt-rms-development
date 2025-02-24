<!--
===== Toast Variables =====
fd_primary_toast
fd_secondary_toast
fd_success_toast
fd_primary_toast_center
fd_success_toast_center
toast

===== Toast Locations =====
Top left       > top-0 start-0 => 
Top center     > top-0 start-50 translate-middle-x => 
Top right      > top-0 end-0 => 
Middle left    > top-50 start-0 translate-middle-y => 
Middle center  > top-50 start-50 translate-middle => 
Middle right   > top-50 end-0 translate-middle-y => 
Bottom left    > bottom-0 start-0 => 
Bottom center  > bottom-0 start-50 translate-middle-x => 
Bottom right   > bottom-0 end-0 => 
-->


<?php if (!empty(session()->get('fd_primary_toast'))): ?>
    <div class="toast-container position-absolute p-3 top-0 end-0">
        <div class="toast text-white bg-primary fade show shadow-sm" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="3000">
            <div class="d-flex">
                <div class="toast-body"> <?= session()->get('fd_primary_toast'); ?> </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (!empty(session()->get('fd_secondary_toast'))): ?>
    <div class="toast-container position-absolute p-3 top-0 end-0">
        <div class="toast text-white bg-secondary fade show shadow-sm" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="3000">
            <div class="d-flex">
                <div class="toast-body"> <?= session()->get('fd_secondary_toast'); ?> </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (!empty(session()->get('fd_success_toast'))): ?>
    <div class="toast-container position-absolute p-3 top-0 end-0">
        <div class="toast text-white bg-success fade show shadow-sm" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="3000">
            <div class="d-flex">
                <div class="toast-body"> <?= session()->get('fd_success_toast'); ?> </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (!empty(session()->get('fd_primary_toast_center'))): ?>
    <div class="toast-container position-absolute p-3 top-0 start-50 translate-middle-x">
        <div class="toast text-white bg-primary fade show shadow-sm" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="3000">
            <div class="text-center">
                <div class="toast-body"> <?= session()->get('fd_primary_toast_center'); ?> </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (!empty(session()->get('fd_success_toast_center'))): ?>
    <div class="toast-container position-absolute p-3 top-0 start-50 translate-middle-x">
        <div class="toast text-white bg-success fade show shadow-sm" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="3000">
            <div class="text-center">
                <div class="toast-body"> <?= session()->get('fd_success_toast_center'); ?> </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<!-- Normal Toast -->
<?php if (!empty(session()->get('toast'))): ?>
    <div class="toast-container position-absolute p-3 top-0 start-0">
        <div class="toast show fade">
            <div class="toast-header">
                <img src="/tup-files/tup-logo-transparent.png" class="img-fluid m-r-5" alt="images" style="width: 17px">
                <strong class="me-auto">Notification</strong>
                <small>Alert</small>
            </div>
            <div class="toast-body"> <?= session()->get('toast'); ?> </div>
        </div>
    </div>
<?php endif; ?>

<script>
    setTimeout(function () {
        var toastElement = document.querySelector('.toast');
        if (toastElement) {
            var toast = new bootstrap.Toast(toastElement);
            toast.show();
            setTimeout(function () {
                toast.hide(); // Hide the toast
            }, 5000); // Hide after 30 seconds
        }
    }, 99); // Show after 99 milliseconds
</script>