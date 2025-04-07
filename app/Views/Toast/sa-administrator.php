<!-- [ Administrator Side Alerts ] -->
<script>
    // [ Accounts - Approve ]
    document.addEventListener('click', function (event) {
        if (event.target.closest('.approve-account-button')) {
            const approveButton = event.target.closest('.approve-account-button');
            const approveID = approveButton.dataset.accountId;

            Swal.fire({
                title: 'Approve Request',
                text: 'Are you sure you want to approve this request?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Approve Request!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/AdminController/RequestApprove',
                            type: 'POST',
                            data: {
                                account_id: approveID
                            },

                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Approved!',
                                        text: 'The account has been successfully approved.',
                                        icon: 'success',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Failed!',
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                }
                            },

                            error: function (xhr, status, error) {
                                console.error('AJAX Error:', error);
                                Swal.fire({
                                    title: 'Something went Wrong!',
                                    text: 'An issue occurred during the process.',
                                    icon: 'error',
                                    confirmButtonText: 'Close',

                                    ...timerConfig
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
        }
    });

    // [ Accounts - Decline ]
    document.addEventListener('click', function (event) {
        if (event.target.closest('.decline-account-button')) {
            const declineButton = event.target.closest('.decline-account-button');
            const declineID = declineButton.dataset.accountId;
            const logID = declineButton.dataset.logId;

            Swal.fire({
                title: 'Decline Request',
                text: 'Are you sure you want to decline this request?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Decline Request!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/AdminController/RequestDecline',
                            type: 'POST',
                            data: {
                                account_id: declineID,
                                log_id: logID,
                            },

                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Declined',
                                        text: 'The account request has been successfully declined.',
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Failed!',
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                }
                            },

                            error: function (xhr, status, error) {
                                console.error('AJAX Error:', error);
                                Swal.fire({
                                    title: 'Something went Wrong!',
                                    text: 'An issue occurred during the process.',
                                    icon: 'error',
                                    confirmButtonText: 'Close',

                                    ...timerConfig
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
        }
    });

    // [ Plantilla - Delete ]
    document.addEventListener('click', function (event) {
        if (event.target.closest('.delete-plantilla-button')) {
            const deleteButton = event.target.closest('.delete-plantilla-button');
            const deleteID = deleteButton.dataset.plantillaId;

            Swal.fire({
                title: 'Delete',
                text: 'Are you sure you want to delete this plantillia?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/AdminController/DeletePlantilla',
                            type: 'POST',
                            data: {
                                plantilla_id: deleteID
                            },

                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Deleted',
                                        text: 'The plantillia has been successfully deleted.',
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Failed!',
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                }
                            },

                            error: function (xhr, status, error) {
                                console.error('AJAX Error:', error);
                                Swal.fire({
                                    title: 'Something went Wrong!',
                                    text: 'An issue occurred during the process.',
                                    icon: 'error',
                                    confirmButtonText: 'Close',

                                    ...timerConfig
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
        }
    });

    // [Department - Delete]
    document.addEventListener('click', function (event) {
        if (event.target.closest('.delete-department-button')) {
            const deleteButton = event.target.closest('.delete-department-button');
            const deleteID = deleteButton.dataset.departmentId;

            Swal.fire({
                title: 'Delete',
                text: 'Are you sure you want to delete this department?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/AdminController/DeleteDepartment',
                            type: 'POST',
                            data: {
                                department_id: deleteID
                            },

                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Deleted',
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'Close',

                                        ...timerConfig
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Failed!',
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                }
                            },

                            error: function (xhr, status, error) {
                                console.error('AJAX Error:', error);
                                Swal.fire({
                                    title: 'Something went Wrong!',
                                    text: 'An issue occurred during the process.',
                                    icon: 'error',
                                    confirmButtonText: 'Close',

                                    ...timerConfig
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
        }
    });

    // [ Role - Delete ]
    document.addEventListener('click', function (event) {
        if (event.target.closest('.delete-role-button')) {
            const deleteButton = event.target.closest('.delete-role-button');
            const deleteID = deleteButton.dataset.roleId;

            Swal.fire({
                title: 'Delete',
                text: 'Are you sure you want to delete this role?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/AdminController/DeleteRole',
                            type: 'POST',
                            data: {
                                role_id: deleteID
                            },

                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Deleted',
                                        text: 'The role has been successfully deleted.',
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Failed!',
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                }
                            },

                            error: function (xhr, status, error) {
                                console.error('AJAX Error:', error);
                                Swal.fire({
                                    title: 'Something went Wrong!',
                                    text: 'An issue occurred during the process.',
                                    icon: 'error',
                                    confirmButtonText: 'Close',

                                    ...timerConfig
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
        }
    });

    // [ Folder - Delete ]
    document.addEventListener('click', function (event) {
        if (event.target.closest('.folder-delete-button')) {
            const deleteButton = event.target.closest('.folder-delete-button');
            const deleteID = deleteButton.dataset.folderId;

            Swal.fire({
                title: 'Confirm Delete!',
                text: 'All folder and files inside this folder will be permanently delete.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/AdminController/DeleteFolder',
                            type: 'POST',
                            data: {
                                folder_id: deleteID
                            },

                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Folder Deleted',
                                        text: 'Folder and files have been deleted permanently.',
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Failed!',
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                }
                            },

                            error: function (xhr, status, error) {
                                console.error('AJAX Error:', error);
                                Swal.fire({
                                    title: 'Something went Wrong!',
                                    text: 'An issue occurred during the process.',
                                    icon: 'error',
                                    confirmButtonText: 'Close',

                                    ...timerConfig
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
        }
    });

    // [ File - Delete ]
    document.addEventListener('click', function (event) {
        if (event.target.closest('.file-delete-button')) {
            const deleteButton = event.target.closest('.file-delete-button');
            const deleteID = deleteButton.dataset.fileId;

            console.log('file id:' + deleteID);

            Swal.fire({
                title: 'Confirm Delete!',
                text: 'This file will be permanently delete.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/AdminController/DeleteFile',
                            type: 'POST',
                            data: {
                                file_id: deleteID
                            },

                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'File Deleted',
                                        text: 'The file have been deleted permanently.',
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Failed!',
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                }
                            },

                            error: function (xhr, status, error) {
                                console.error('AJAX Error:', error);
                                Swal.fire({
                                    title: 'Something went Wrong!',
                                    text: 'An issue occurred during the process.',
                                    icon: 'error',
                                    confirmButtonText: 'Close',

                                    ...timerConfig
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
        }
    });

    // [ Promotion History - Delete ]
    document.addEventListener('click', function (event) {
        if (event.target.closest('.promotion-delete-button')) {
            const deleteButton = event.target.closest('.promotion-delete-button');
            const promotionId = deleteButton.dataset.promotionId;
            const accountId = deleteButton.dataset.accountId;

            console.log('promotion id:' + promotionId);
            console.log('account id:' + accountId);

            Swal.fire({
                title: 'Confirm Delete!',
                text: 'This promotion history will be permanently delete.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/AdminController/DeletePromotion',
                            type: 'POST',
                            data: {
                                promotion_id: promotionId,
                                account_id: accountId
                            },

                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'History Deleted',
                                        text: 'The promotion history have been deleted permanently.',
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Failed!',
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    }).then(() => {
                                        location.reload();
                                    });
                                }
                            },

                            error: function (xhr, status, error) {
                                console.error('AJAX Error:', error);
                                Swal.fire({
                                    title: 'Something went Wrong!',
                                    text: 'An issue occurred during the process.',
                                    icon: 'error',
                                    confirmButtonText: 'Close',

                                    ...timerConfig
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
        }
    });
</script>