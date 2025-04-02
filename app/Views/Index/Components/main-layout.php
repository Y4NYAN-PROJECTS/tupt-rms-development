<!doctype html>
<html lang="en">

<head>
    <title>TUP-Taguig | Employee Record Management System</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.8, user-scalable=no, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Technological University of the Philippines - Employee Record Management System. Manage employee data with ease and security." />
    <meta name="keywords" content="Technological University of the Philippines, TUP, Employee Record Management System, TUP RMS, TUP login, employee management system, TUP employee login" />
    <meta name="author" content="Roselle Honorio, TUP" />
    <meta property="og:title" content="TUP - Employee Files Management System" />
    <meta property="og:description" content="An efficient and secure Employee Files Management System for TUP. Easy management of employee data." />
    <meta property="og:image" content="/tup-files/tup-logo-transparent.png" />
    <meta property="og:url" content="https://seashell-rail-443729.hostingersite.com" />


    <!-- [Favicon] icon -->
    <link rel="icon" href="/tup-files/tup-logo-transparent.png" type="image/x-icon" />

    <!-- [Page specific CSS] -->
    <link rel="stylesheet" href="/assets/css/plugins/datepicker-bs5.min.css">

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

    <!-- [Template CSS Files] -->
    <script src="/assets/js/plugins/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="/assets/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="/assets/css/style-preset.css" />
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <!-- [ Header ] -->
                <?= $this->include('/Index/Components/header') ?>

                <!-- [ Content ] -->
                <?= $this->renderSection('content'); ?>

                <!-- [ Footer ] -->
                <?= $this->include('/Index/Components/footer') ?>
            </div>

            <!-- [ Side Content ] -->
            <?= $this->include('/Index/Components/side-content') ?>
        </div>
    </div>

    <?= $this->include('/Toast/sweet-alert') ?>
    <?= $this->include('/Toast/toast') ?>

    <!-- [ Custom Scripts ] -->

    <!-- [ Template Scipts ] -->
    <script src="/assets/js/plugins/sweetalert2.all.min.js"></script>
    <script src="/assets/js/plugins/popper.min.js"></script>
    <script src="/assets/js/plugins/simplebar.min.js"></script>
    <script src="/assets/js/plugins/bootstrap.min.js"></script>
    <script src="/assets/js/fonts/custom-font.js"></script>
    <script src="/assets/js/pcoded.js"></script>
    <script src="/assets/js/plugins/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>
        layout_change('false');
        layout_theme_contrast_change('false');
        change_box_container('false');
        layout_caption_change('true');
        layout_rtl_change('false');
        preset_change('preset-5');
    </script>
</body>

</html>