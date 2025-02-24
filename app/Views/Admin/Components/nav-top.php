<!-- [ Topbar ] -->
<header class="pc-header">
    <div class="header-wrapper">
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- [ Collapse Icon ] -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>

                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>

                <!-- [ Searchbar ] -->
                <!-- <li class="pc-h-item d-none d-md-inline-flex">
                    <form class="form-search">
                        <i class="search-icon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-search-normal-1"></use>
                            </svg>
                        </i>
                        <input type="search" class="form-control" placeholder="Search here" />
                    </form>
                </li> -->
            </ul>
        </div>

        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <svg class="pc-icon">
                            <use xlink:href="#custom-notification"></use>
                        </svg>
                        <?php if (isset($notifcount) && $notifcount): ?>
                            <span class="badge bg-primary pc-h-badge"><?= $notifcount ?></span>
                        <?php endif; ?>
                    </a>

                    <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-header d-flex align-items-center justify-content-between border-bottom">
                            <h5 class="m-0">Notifications</h5>
                        </div>

                        <div class="dropdown-body text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">
                            <?php if (isset($hasnotif) && !$hasnotif): ?>
                                <div class="text-center fst-italic py-5">
                                    <h6 class="mb-0">No Available Notification</h6>
                                    <small>Check it later!</small>
                                </div>
                            <?php else: ?>
                                <p class="text-span">Latest Notification</p>
                                <?php if (!empty($requests)): ?>
                                    <?php foreach ($requests as $index => $request): ?>
                                        <div class="card mb-2 request-card <?= $index > 0 && $index < 4 ? 'd-none' : '' ?>">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="float-end text-sm text-muted">
                                                            <i class="ph-duotone ph-user-plus f-26 text-primary"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h5><?= $request['title'] ?></h5>
                                                        <p class="mb-2">
                                                            <span class="text-dark"><?= $request['description'] ?></span>
                                                        </p>

                                                        <div class="mt-3">
                                                            <button class="btn btn-shadow btn-sm px-3 btn-outline-secondary decline-account-button" data-account-id="<?= $request['account_id'] ?>" data-log-id="<?= $request['logs_id'] ?>">Decline</button>
                                                            <button class="btn btn-shadow btn-sm px-3 btn-primary approve-account-button" data-account-id="<?= $request['account_id'] ?>">Accept</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                    <div class="text-center">
                                        <p id="show-more-request" style="cursor: pointer;">See more</p>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const notificationDropdown = document.querySelector(".dropdown-notification");

                        notificationDropdown.addEventListener("click", function (event) {
                            if (!event.target.closest("button")) {
                                event.stopPropagation();
                            }
                        });

                        const requestCards = document.querySelectorAll(".request-card");
                        const requestShowButton = document.getElementById("show-more-request");
                        let showMoreClicked = false;

                        if (requestShowButton) {
                            requestShowButton.addEventListener("click", function () {
                                console.log('clicked');

                                if (!showMoreClicked) {
                                    requestShowButton.textContent = "Show Less";
                                    showMoreClicked = true;
                                    requestCards.forEach((card, index) => {
                                        if (index > 0) card.classList.remove("d-none"); // Show all except the first one
                                    });
                                } else {
                                    requestShowButton.textContent = "Show More";
                                    showMoreClicked = false;
                                    requestCards.forEach((card, index) => {
                                        if (index > 0) card.classList.add("d-none"); // Hide all except the first one
                                    });
                                }
                            });
                        }
                    });
                </script>


                <!-- [ Profile Avatar ] -->
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="<?= $user['image_path'] ?>" alt="user-image" class="user-avtar" />
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h5 class="m-0">Profile</h5>
                        </div>
                        <div class="dropdown-body">
                            <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                                <div class="d-flex mb-1">
                                    <div class="flex-shrink-0">
                                        <img src="<?= $user['image_path'] ?>" alt="user-image" class="user-avtar wid-35" />
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1"><?= $user['full_name'] ?></h6>
                                        <span><?= $user['email_address'] ?></span>
                                    </div>
                                </div>
                                <hr class="border-secondary border-opacity-50" />

                                <p class="text-span">Manage</p>

                                <a href="/AdminController/AccountProfilePage" class="dropdown-item">
                                    <span>
                                        <svg class="pc-icon text-muted me-2">
                                            <use xlink:href="#custom-user"></use>
                                        </svg>
                                        <span>Profile</span>
                                    </span>
                                </a>

                                <a href="/AdminController/RedirectToChangeEmail" class="dropdown-item">
                                    <span>
                                        <svg class="pc-icon text-muted me-2">
                                            <use xlink:href="#custom-share-bold"></use>
                                        </svg>
                                        <span>Change Email</span>
                                    </span>
                                </a>

                                <a href="/AdminController/RedirectToChangePassword" class="dropdown-item">
                                    <span>
                                        <svg class="pc-icon text-muted me-2">
                                            <use xlink:href="#custom-lock-outline"></use>
                                        </svg>
                                        <span>Change Password</span>
                                    </span>
                                </a>

                                <hr class="border-secondary border-opacity-50" />
                                <div class="d-grid mb-3">
                                    <a href="/MainController/logout" class="btn btn-primary">
                                        <svg class="pc-icon me-2">
                                            <use xlink:href="#custom-logout-1-outline"></use>
                                        </svg>Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>