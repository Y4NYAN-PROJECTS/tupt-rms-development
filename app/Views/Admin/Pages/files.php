<?= $this->extend('/Admin/Components/main-layout'); ?>
<?= $this->section('content'); ?>

<!-- [ Header ] -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <!-- [ Breadcrumbs ] -->
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">My Files</li>
                    <li class="breadcrumb-item">Files</li>
                </ul>
            </div>
            <!-- [ Title ] -->
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Folders and Files</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row px-0">
    <div class="col-auto mb-3">
        <ul class="nav nav-pills nav-files" role="tablist">
            <li class="nav-item" role="presentation" data-bs-toggle="tooltip" data-bs-placement="bottom" title="New Folder">
                <button class="nav-link " id="pills-home-tab" data-bs-toggle="modal" data-bs-target="#createFolder">
                    <i class="ti ti-folders"></i>
                </button>
            </li>
            <li class="nav-item" role="presentation" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= $ishome ? 'Can\'t Upload Here' : 'Upload File/s' ?>">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="modal" data-bs-target="#uploadFile" <?= $ishome ? 'disabled' : '' ?>>
                    <i class="ti ti-files"></i>
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
            <li class="breadcrumb-item"><a href="/AdminController/FilesPage/0">Home</a></li>
            <?php foreach ($hierarchypath as $hierarchy): ?>
                <li class="breadcrumb-item"><a href="/AdminController/FilesPage/<?= $hierarchy['folder_code'] ?>"><?= $hierarchy['folder_name'] ?></a></li>
            <?php endforeach; ?>
        </ol>
    </nav>
<?php else: ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-default-icon">
            <li class="breadcrumb-item"><a href="/AdminController/FilesPage/0">Home</a></li>
        </ol>
    </nav>
<?php endif; ?>


<div class="row">
    <?php if ($ishome && empty($folders) && empty($folderfiles)): ?>
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="text-center fst-italic my-5">
                        <h1>Empty!</h1>
                        <p class="m-0">You currently don't have any folder and files.</p>
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
                            <p class="m-0">You don't have any folder or files on this folder.</p>
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
                                <a href="/AdminController/FilesPage/<?= $folder['folder_code'] ?>">
                                    <h5 class="mb-1 d-grid"><span class="text-truncate w-100"><?= $folder['folder_name'] ?></span></h5>
                                    <p class="mb-0"><small><?= $folder['access_level_title'] ?></small></p>
                                </a>
                            </div>
                            <div class="dropdown">
                                <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons-two-tone f-18">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editFolder" data-folder-id="<?= $folder['folder_id'] ?>" data-folder-parent="<?= $folder['parent_folder'] ?>" data-folder-name="<?= $folder['folder_name'] ?>" data-folder-accesslevel="<?= $folder['access_level'] ?>">Edit</a>

                                    <a class="dropdown-item <?= $folder['access_level_title'] != 'Public' ? 'disabled' : '' ?>" href="#" id="share-folder-button" data-bs-toggle="modal" data-bs-target="#shareFolder" data-folder-code="<?= $folder['folder_code'] ?>">Share</a>

                                    <a class="dropdown-item folder-delete-button" href="#" id="folder-delete" data-folder-id="<?= $folder['folder_id'] ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

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
                                                <a class="dropdown-item text-primary file-delete-button" href="#" data-file-id="<?= $file['file_id'] ?>">Delete</a>
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
</div>

<!-- [ Upload File/s ] -->
<div class="modal fade" id="uploadFile" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">Upload Files</h3>
                    <small>Select file/s to be uploaded.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/AdminController/SaveFile" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="file" class="image-crop-filepond" multiple data-allow-reorder="true" data-max-file-size="10MB" data-max-files="5" accept="application/pdf,
            application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" name="emp_files[]" multiple>

                    <!-- [ Hidden Input ] -->
                    <input type="hidden" name="emp_parentfoldercode" value="<?= $foldercode ?>">
                    <!-- [ Hidden Input ] -->
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary px-5" type="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- [ Create Folder ] -->
<div class="modal fade" id="createFolder" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">New Folder</h3>
                    <small>Fill the input to create folder.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/AdminController/SaveFolder" method="post" id="createFolderForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="createfolder-name">Folder Name</label>
                            <input type="text" class="form-control" id="createfolder-name" placeholder="Folder Name" name="emp_foldername" required />
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="access-level">Access Level</label><br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="emp_accesslevel" value="1" id="createfolder-accesslevel-public" checked required>
                                <label class="form-check-label" for="createfolder-accesslevel-public">Public</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="emp_accesslevel" value="2" id="createfolder-accesslevel-restricted">
                                <label class="form-check-label" for="createfolder-accesslevel-restricted">Restricted</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="emp_accesslevel" value="3" id="createfolder-accesslevel-private">
                                <label class="form-check-label" for="createfolder-accesslevel-private">Private</label>
                            </div>
                        </div>

                        <small class="fst-italic text-muted mt-1 note" id="createfolder-note">Note: Everyone can access this folder.</small>

                        <!-- [ Hidden Input ] -->
                        <input type="hidden" name="emp_parentfoldercode" value="<?= $foldercode ?>">
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

<!-- [ Edit Folder ] -->
<div class="modal fade" id="editFolder" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">Edit Folder</h3>
                    <small>You can rename and update access level of this folder.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/AdminController/SaveFolder" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="editfolder-foldername">Folder Name</label>
                            <input type="text" class="form-control" id="editfolder-foldername" placeholder="Folder Name" name="emp_foldername" required />
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="access-level">Access Level</label><br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="emp_accesslevel" value="1" id="editfolder-accesslevel-public" checked>
                                <label class="form-check-label" for="editfolder-accesslevel-public">Public</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="emp_accesslevel" value="2" id="editfolder-accesslevel-restricted">
                                <label class="form-check-label" for="editfolder-accesslevel-restricted">Restricted</label>
                            </div>

                            <div class="form-check form-check-inline" id="access-level">
                                <input class="form-check-input" type="radio" name="emp_accesslevel" value="3" id="editfolder-accesslevel-private">
                                <label class="form-check-label" for="editfolder-accesslevel-private">Private</label>
                            </div>
                        </div>

                        <small class="fst-italic text-muted mt-1 note" id="editfolder-note"></small>

                        <!-- [ Hidden Input ] -->
                        <input type="hidden" name="emp_folderid" id="editfolder-folderid">
                        <input type="hidden" name="emp_parentfolder" id="editfolder-folderparent">
                        <input type="hidden" name="emp_parentfoldercode" value="<?= $foldercode ?>">
                        <!-- [ Hidden Input ] -->
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn px-5 btn-primary" type="submit" data-bs-dismiss="modal">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- [ Share Folder ] -->
<div class="modal fade" id="shareFolder" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">Share Folder</h3>
                    <small>Send this code to people to view this folder.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="d-flex justify-content-center">
                    <p id="share-folder-code" class="display-4 user-select-all mt-3"></p>
                    <a href="#" onclick="copyToClipboard()">
                        <i class="ti ti-copy ms-3"></i>
                    </a>
                </div>
            </div>

            <div class="modal-footer justify-content-center">
                <button class="btn px-5 btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    // [ Radio Buttons ]
    document.addEventListener('DOMContentLoaded', function () {
        function setupRadioListeners(modalId) {
            const modal = document.getElementById(modalId);
            if (!modal) return;

            const accessRadioButtons = modal.querySelectorAll('[name="emp_accesslevel"]'); // Select radio buttons within the modal
            const noteText = modal.querySelector('.note'); // Select the note element within the modal

            if (accessRadioButtons && noteText) {
                accessRadioButtons.forEach((radio) => {
                    radio.addEventListener('change', function () {
                        if (this.value == 1) {
                            noteText.textContent = "Note: Everyone can access this folder.";
                        } else if (this.value == 2) {
                            noteText.textContent = "Note: This folder can be accessed by the administrator.";
                        } else if (this.value == 3) {
                            noteText.textContent = "Note: Only you can access this folder.";
                        }
                    });
                });
            }
        }

        setupRadioListeners('editFolder');
        setupRadioListeners('createFolder');

        document.querySelectorAll('a[data-folder-name]').forEach(function (anchor) {
            anchor.addEventListener('click', function (event) {
                event.preventDefault();

                const folderid = this.getAttribute('data-folder-id')
                const foldername = this.getAttribute('data-folder-name');
                const accesslevel = this.getAttribute('data-folder-accesslevel');
                const parentfolder = this.getAttribute('data-folder-parent');

                console.log('folderid:', folderid);
                console.log('foldername:', foldername);
                console.log('accesslevel:', accesslevel);
                console.log('parentfolder:', parentfolder);

                const inputFolderName = document.getElementById('editfolder-foldername');
                const radioButtonPublic = document.getElementById('editfolder-accesslevel-public');
                const radioButtonPrivate = document.getElementById('editfolder-accesslevel-private');
                const radioButtonRestricted = document.getElementById('editfolder-accesslevel-restricted');
                const hiddenFolderId = document.getElementById('editfolder-folderid');
                const hiddenParentFolder = document.getElementById('editfolder-folderparent');

                const noteText = document.getElementById('editfolder-note');

                if (hiddenFolderId) hiddenFolderId.value = folderid;
                if (hiddenParentFolder) hiddenParentFolder.value = parentfolder;
                if (inputFolderName) inputFolderName.value = foldername;
                if (accesslevel == 1) {
                    radioButtonPublic.checked = true;
                    if (noteText) noteText.textContent = "Note: Everyone can access this folder.";
                } else if (accesslevel == 2) {
                    radioButtonRestricted.checked = true;
                    if (noteText) noteText.textContent = "Note: This folder can be accessed by the administrator.";
                } else if (accesslevel == 3) {
                    radioButtonPrivate.checked = true;
                    if (noteText) noteText.textContent = "Note: Only you can access this folder.";
                }
            });
        });
    });

    // [ Share Folder ]
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('share-folder-button').addEventListener('click', function (event) {
            const foldercode = this.getAttribute('data-folder-code');
            const modalFolderCode = document.getElementById('share-folder-code');

            console.log('foldercode : ' + foldercode);

            if (modalFolderCode) modalFolderCode.textContent = foldercode;
        });
    });

    function copyToClipboard() {
        const folderCodeElement = document.getElementById('share-folder-code');
        const folderCodeText = folderCodeElement.textContent || folderCodeElement.innerText;

        navigator.clipboard.writeText(folderCodeText)
            .then(() => {
                alert('Copied to clipboard!');
            })
            .catch((err) => {
                alert('Failed to copy text: ' + err);
            });
    }
</script>

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
                modalIframe.src = filePath;
            });
        });
    });
</script>


<!-- [ Not Working ] -->
<div class="modal fade" id="assignFile" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="assignFileLabel">Share</h1>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <label class="input-group-text">Invite People</label>
                    <input type="text" class="form-control w-auto" placeholder="Email" />
                    <select class="form-select">
                        <option>Can view</option>
                        <option>Can Edit</option>
                    </select>
                </div>
                <div class="media align-items-center my-3">
                    <img class="rounded-circle img-fluid wid-40" src="/assets/images/user/avatar-2.jpg" alt="User image" />
                    <div class="media-body mx-2">
                        <p class="mb-0">Addie Bass</p>
                    </div>
                    <div class="text-primary">Owner</div>
                </div>
                <div class="media align-items-center my-3">
                    <img class="rounded-circle img-fluid wid-40" src="/assets/images/user/avatar-5.jpg" alt="User image" />
                    <div class="media-body mx-2">
                        <p class="mb-0">Mark E. Kinder</p>
                    </div>
                    <select class="form-select w-auto" disabled>
                        <option>Can view</option>
                        <option>Can Edit</option>
                    </select>
                </div>
                <div class="media align-items-center my-3">
                    <div class="avtar avtar-s bg-light-primary rounded-circle">
                        <span class="f-18">Q</span>
                    </div>
                    <div class="media-body mx-2">
                        <p class="mb-0">Quentin</p>
                    </div>
                    <select class="form-select w-auto">
                        <option>Can view</option>
                        <option>Can Edit</option>
                    </select>
                </div>
                <div class="media align-items-center my-3">
                    <img class="rounded-circle img-fluid wid-40" src="/assets/images/user/avatar-3.jpg" alt="User image" />
                    <div class="media-body mx-2">
                        <p class="mb-0">Richard J. Doran</p>
                    </div>
                    <select class="form-select w-auto">
                        <option>Can view</option>
                        <option>Can Edit</option>
                    </select>
                </div>
                <hr class="my-3 border border-secondary-subtle">
                <div class="input-group">
                    <button class="btn btn-outline-secondary">Copy link</button>
                    <input type="text" class="form-control" placeholder="Enter URL" value="https://www.figma.com/file/" />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasFileDesc">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">File Preview</h5>
        <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="offcanvas">
            <i class="ti ti-circle-x f-18"></i>
        </a>
    </div>
    <div class="offcanvas-body">
        <div class="my-3 text-center">
            <img src="/assets/images/application/img-file-doc.svg" alt="img" class="img-fluid wid-100" />
            <h5 class="mb-1 mt-4">Document-final.docx</h5>
            <p class="mb-0 text-muted">16 Nov 2022</p>
        </div>
        <hr class="my-4 border border-secondary-subtle" />
        <h5>File share with</h5>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="media align-items-center">
                    <img class="rounded-circle img-fluid wid-40" src="/assets/images/user/avatar-1.jpg" alt="User image" />
                    <div class="media-body ms-2">
                        <h6 class="mb-0">John Doe</h6>
                        <p class="mb-0 text-sm"><a class="link-secondary" href="mailto:John_Doe@ablepro.io">John_Doe@ablepro.io</a></p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="media align-items-center">
                    <img class="rounded-circle img-fluid wid-40" src="/assets/images/user/avatar-5.jpg" alt="User image" />
                    <div class="media-body ms-2">
                        <h6 class="mb-0">Addie Bass</h6>
                        <p class="mb-0 text-sm"><a class="link-secondary" href="mailto:Addie_B@ablepro.io">Addie_B@ablepro.io</a></p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="media align-items-center">
                    <img class="rounded-circle img-fluid wid-40" src="/assets/images/user/avatar-3.jpg" alt="User image" />
                    <div class="media-body ms-2">
                        <h6 class="mb-0">Alberta Robbins</h6>
                        <p class="mb-0 text-sm"><a class="link-secondary" href="mailto:Alberta@ablepro.io">Alberta@ablepro.io</a></p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="media align-items-center">
                    <img class="rounded-circle img-fluid wid-40" src="/assets/images/user/avatar-4.jpg" alt="User image" />
                    <div class="media-body ms-2">
                        <h6 class="mb-0">Agnes McGee</h6>
                        <p class="mb-0 text-sm"><a class="link-secondary" href="mailto:Agnes.Gee@ablepro.io">Agnes.Gee@ablepro.io</a></p>
                    </div>
                </div>
            </li>
        </ul>
        <hr class="my-4 border border-secondary-subtle" />
        <div class="row g-2">
            <div class="col-12">
                <div class="d-grid">
                    <button class="btn btn-primary">Share</button>
                </div>
            </div>
            <div class="col-6">
                <div class="d-grid">
                    <button class="btn btn-light-secondary">Edit</button>
                </div>
            </div>
            <div class="col-6">
                <div class="d-grid">
                    <button class="btn btn-light-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>