<?= $this->extend('/Employee/Components/main-layout'); ?>
<?= $this->section('content'); ?>

<!-- [ Header ] -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <!-- [ Breadcrumbs ] -->
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Public Files</li>
                </ul>
            </div>
            <!-- [ Title ] -->
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Public Folders and Files</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row px-0">
    <div class="col-auto mb-3">
        <ul class="nav nav-pills nav-files" role="tablist">
            <li class="nav-item" role="presentation" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Find Folder">
                <button class="nav-link " id="pills-home-tab" data-bs-toggle="modal" data-bs-target="#findfolder">
                    <i class="ti ti-search"></i>
                </button>
            </li>
        </ul>
    </div>

    <div class="col mb-3"></div>

    <div class="col-auto mb-3">
        <ul class="nav nav-pills nav-files" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Grid View">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                    <i class="ti ti-layout-grid"></i>
                </button>
            </li>
            <li class="nav-item" role="presentation" data-bs-toggle="tooltip" data-bs-placement="bottom" title="List View">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <i class="ti ti-layout-list"></i>
                </button>
            </li>
        </ul>
    </div>
</div>

<?php if ($foldercode != 0): ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-default-icon">
            <li class="breadcrumb-item"><a href="/EmployeeController/PublicFilesPage/0">Home</a></li>
            <?php foreach ($hierarchypath as $hierarchy): ?>
                <li class="breadcrumb-item"><a href="/EmployeeController/PublicFilesPage/<?= $hierarchy['folder_code'] ?>"><?= $hierarchy['folder_name'] ?></a></li>
            <?php endforeach; ?>
        </ol>
    </nav>
<?php else: ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-default-icon">
            <li class="breadcrumb-item"><a href="/EmployeeController/PublicFilesPage/0">Home</a></li>
        </ol>
    </nav>
<?php endif; ?>


<div class="row">
    <?php if ($foldercode == 0 && empty($folders) && empty($folderfiles)): ?>
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="text-center fst-italic my-5">
                        <h1>Empty!</h1>
                        <p class="m-0">No public files available.</p>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php if (empty($folders) && empty($folderfiles)): ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <div class="text-center fst-italic my-5">
                            <h1>This folder is empty.</h1>
                            <p class="m-0">This folder don't have any folder or files.</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <!-- [ Folders ] -->
        <?php foreach ($folders as $folder): ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <svg class="pc-icon wid-40 hei-40 text-warning">
                                    <use xlink:href="#custom-folder-open"></use>
                                </svg>
                            </div>
                            <div class="flex-grow-1 mx-3">
                                <a href="/EmployeeController/PublicFilesPage/<?= $folder['folder_code'] ?>">
                                    <h5 class="mb-1 d-grid"><span class="text-truncate w-100"><?= $folder['folder_name'] ?></span></h5>
                                    <p class="mb-0"><small><?= $folder['id_number'] ?></small></p>
                                </a>
                            </div>
                            <div class="d-flex">
                                <span class="pc-micon me-1">
                                    <i class="ti ti-eye"></i>
                                </span>
                                <?= $folder['visits'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if (!empty($folderfiles)): ?>
            <!-- [ Files ] -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" tabindex="0">
                    <div class="row">
                        <?php foreach ($folderfiles as $file): ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xxl-3">
                                <div class="card file-card cursor-pointer shadow-sm hover-shadow-lg">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class=""></div>
                                            <div class="dropdown">
                                                <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons-two-tone f-18">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item <?= $file['file_type'] != 'pdf' ? 'disabled' : '' ?>" href="#" data-bs-toggle="modal" data-bs-target="#viewPDF" data-path="<?= $file['file_path'] ?>">View</a>
                                                    <a class="dropdown-item" href="<?= $file['file_path'] ?>" download>Download</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#">
                                            <div class="my-2 text-center">
                                                <img src="/assets/images/application/img-file-<?= $file['file_type'] ?>.svg" alt="img" class="img-fluid" />
                                            </div>
                                            <div class="mt-4">
                                                <div>
                                                    <h6 class="mb-0">
                                                        <span class="text-truncate d-block w-100" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= $file['file_name'] ?>">
                                                            <?= $file['file_name'] ?>
                                                        </span>
                                                    </h6>
                                                    <p class="mb-0 text-muted">
                                                        <small>
                                                            <?= $file['file_size'] ?> -
                                                            <?= $file['date_created'] ?>
                                                        </small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" tabindex="0">
                    <div class="table-responsive card bg-transparent border-0 shadow-none">
                        <table class="table table-borderless file-card">
                            <tbody>
                                <?php foreach ($folderfiles as $file): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/assets/images/application/img-file-<?= $file['file_type'] ?>.svg" alt="user-image" class="wid-35" />
                                                <h6 class="mb-0 ms-5 text-truncate d-block w-100">
                                                    <?= $file['file_name'] ?>
                                                </h6>
                                            </div>
                                        </td>
                                        <td><?= $file['file_size'] ?></td>
                                        <td><?= $file['date_created'] ?></td>
                                        <td>
                                            <ul class="list-inline text-end">
                                                <li class="list-inline-item">
                                                    <div class="dropdown">
                                                        <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons-two-tone f-18">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">View</a>
                                                            <a class="dropdown-item" href="#">Download</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<!-- [ Create Folder ] -->
<div class="modal fade" id="findfolder-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">New Folder</h3>
                    <small>Fill the input to create folder.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/EmployeeController/SaveFolder" method="post" id="findfolderForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="f-name">Folder Name</label>
                            <input type="text" class="form-control" id="f-name" placeholder="Folder Name" name="emp_foldername" required />
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="access-level">Access Level</label><br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="emp_accesslevel" value="1" id="f-accesslevel-public" checked required>
                                <label class="form-check-label" for="f-accesslevel-public">Public</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="emp_accesslevel" value="2" id="f-accesslevel-restricted">
                                <label class="form-check-label" for="f-accesslevel-restricted">Restricted</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="emp_accesslevel" value="3" id="f-accesslevel-private">
                                <label class="form-check-label" for="f-accesslevel-private">Private</label>
                            </div>
                        </div>

                        <small class="fst-italic text-muted mt-1 note" id="f-note">Note: Everyone can access this folder.</small>

                        <!-- [ Hidden Input ] -->
                        <input type="hidden" name="emp_parentfolder" value="<?= $foldercode ?>">
                        <!-- [ Hidden Input ] -->
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn px-5 btn-primary" type="submit" data-bs-dismiss="modal">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- [ Find Folder ] -->
<div class="modal fade" id="findfolder" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">Find Folder</h3>
                    <small>Type in folder code or folder name.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <table class="table table-hover mb-0 search-folder-table">
                    <thead>
                        <tr>
                            <th class="d-none">Folder Code</th>
                            <th>Folder Name</th>
                            <th>Creator</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($folders as $folder): ?>
                            <tr>
                                <td class="d-none"><?= $folder['folder_code'] ?></td>
                                <td>
                                    <a href="/EmployeeController/PublicFilesPage/<?= $folder['folder_code'] ?>">
                                        <?= $folder['folder_name'] ?></a>
                                </td>
                                <td><?= $folder['id_number'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- [ View PDF File ] -->
<div class="modal fade" id="viewPDF" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">View File</h3>
                    <small>You can rename and update access level of this folder.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <iframe id="modal-pdf-file" src="" width="100%" style="height: calc(100vh - 200px);"></iframe>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const viewLinks = document.querySelectorAll('[data-bs-target="#viewPDF"]');
        const modalIframe = document.getElementById('modal-pdf-file');

        viewLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const filePath = this.getAttribute('data-path');
                console.log(filePath);
                modalIframe.src = filePath;
            });
        });
    });
</script>

<?= $this->endSection(); ?>