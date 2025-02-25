<!-- [ Sidebar Menu ] -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="pb-2 pt-4 d-flex justify-content-center align-items-center">
            <a href="/EmployeeController/DashboardPage">
                <img src="/tup-files/tup-logo-transparent.png" alt="TUPT Logo" style="height: 70px" />
            </a>
        </div>

        <div class="navbar-content">
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <!-- [ Profile Image ] -->
                        <div class="flex-shrink-0" style="width: 42px; height: 42px;">
                            <img src="<?= $user['image_path'] ?>" alt="user-image" class="rounded-circle img-fluid w-100 h-100" style="object-fit: cover;" />
                        </div>
                        <!-- [ Full Name & User Type ] -->
                        <div class="flex-grow-1 ms-3 me-2">
                            <h6 class="mb-0"><?= $user['full_name'] ?></h6>
                            <small>Employee</small>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="pc-navbar pb-5">
                <!-- [ Caption ] -->
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>

                <!-- [ Dashboard ] -->
                <li class="pc-item">
                    <a href="/EmployeeController/DashboardPage" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-smart-home"></i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <!-- [ Caption ] -->
                <li class="pc-item pc-caption">
                    <label>Manage</label>
                </li>

                <!-- [ Request ] -->
                <li class="pc-item">
                    <a href="/EmployeeController/PersonalDataSheetPage" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-file-analytics"></i>
                        </span>
                        <span class="pc-mtext">Personal Data Sheet</span>
                    </a>
                </li>

                <!-- [ Caption ] -->
                <li class="pc-item pc-caption">
                    <label>Files</label>
                </li>

                <li class="pc-item pc-hasmenu <?= session()->get('nav_myfiles') ? 'active pc-trigger' : '' ?>">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-folders"></i>
                        </span>
                        <span class="pc-mtext">My Files</span>
                        <span class="pc-arrow">
                            <i data-feather="chevron-right"></i>
                        </span>
                    </a>

                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="/EmployeeController/FilesPage/0">Home</a></li>
                        <?php if (isset($parentfolders)): ?>
                            <?php foreach ($parentfolders as $folder): ?>
                                <?php if ($folder['parent_folder'] == 0): ?>
                                    <li class="pc-item  <?= (session()->get('nav_myfiles') == $folder['folder_id']) ? 'active' : '' ?>"><a class="pc-link" href="/EmployeeController/FilesPage/<?= $folder['folder_code'] ?>"><?= $folder['folder_name'] ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </li>

                <!-- [ Public Files ] -->
                <li class="pc-item <?= session()->get('nav_publicfiles') ? 'active' : '' ?>">
                    <a href="/EmployeeController/PublicFilesPage/0" class="pc-link ">
                        <span class="pc-micon">
                            <i class="ti ti-folder"></i>
                        </span>
                        <span class="pc-mtext">Public Files</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>