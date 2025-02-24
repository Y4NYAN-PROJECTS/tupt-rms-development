<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employee</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="/tup-files/tup-logo-transparent.png" type="image/x-icon" />

    <!-- [Font] Family -->
    <link rel="stylesheet" href="/assets/fonts/inter/inter.css" id="main-font-link" />

    <!-- [Tabler Icons] -->
    <link rel="stylesheet" href="/assets/fonts/tabler-icons.min.css" />

    <!-- [Feather Icons] -->
    <link rel="stylesheet" href="/assets/fonts/feather.css" />

    <!-- [Font Awesome Icons] -->
    <link rel="stylesheet" href="/assets/fonts/fontawesome.css" />

    <!-- [Material Icons] -->
    <link rel="stylesheet" href="/assets/fonts/material.css" />

    <!-- [Others] -->
    <link rel="stylesheet" href="/assets/css/plugins/uppy.min.css" />
    <link rel="stylesheet" href="/assets/css/plugins/datepicker-bs5.min.css">
    <link href="/assets/css/plugins/animate.min.css" rel="stylesheet" type="text/css">

    <!-- [Scripts] -->
    <script src="/assets/js/plugins/sweetalert2.all.min.js"></script>

    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="/assets/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="/assets/css/style-preset.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" />


    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>

    <script src="/assets/js/plugins/datepicker-full.min.js"></script>
    <script src="/assets/js/plugins/apexcharts.min.js"></script>
    <script src="/assets/js/plugins/peity-vanilla.min.js"></script>

    <link rel="stylesheet" href="/assets/extensions/filepond/filepond.css">
    <link rel="stylesheet" href="/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css">
</head>

<body>
    <!-- [ Pre-loader ] -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <!-- [ Sidebar Menu ] -->
    <?= $this->include('/Employee/Components/nav-side.php'); ?>

    <!-- [ Header Topbar ] -->
    <?= $this->include('/Employee/Components/nav-top.php'); ?>

    <div class="pc-container">
        <div class="pc-content">
            <!-- [ Breadcrumbs & Title ] -->
            <?= $this->include('/Employee/Components/breadcrumbs.php'); ?>

            <!-- [ Content ] -->
            <?= $this->renderSection('content'); ?>
        </div>
    </div>

    <?= $this->include('/Toast/sweet-alert') ?>
    <?= $this->include('/Toast/sa-employee') ?>

    <!-- [ Footer ] -->
    <?= $this->include('/Employee/Components/footer.php'); ?>

    <!-- [ Custom Scripts ] -->
    <script src="/tup-javascript/formhandling.js"></script>
    <script src="/tup-javascript/datatables.js"></script>
    <!-- <script src="/tup-javascript/loader.js"></script> -->

    <!-- [ Template Scipts ] -->
    <script src="/assets/js/plugins/popper.min.js"></script>
    <script src="/assets/js/plugins/simplebar.min.js"></script>
    <script src="/assets/js/plugins/bootstrap.min.js"></script>
    <script src="/assets/js/fonts/custom-font.js"></script>
    <script src="/assets/js/pcoded.js"></script>
    <script src="/assets/js/plugins/feather.min.js"></script>
    <script>
        layout_change('light');
        layout_caption_change('true');
        layout_rtl_change('false');
        preset_change('preset-5');
        layout_theme_contrast_change('true');
        change_box_container('false');
    </script>

    <script src="/assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
    <script src="/assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
    <script src="/assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js"></script>
    <script src="/assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
    <script src="/assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js"></script>
    <script src="/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
    <script src="/assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js"></script>
    <script src="/assets/extensions/filepond/filepond.js"></script>
    <script src="/assets/extensions/filepond.js"></script>
</body>

</html>