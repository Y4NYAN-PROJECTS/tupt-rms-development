<!-- [ Employee Side Alerts ] -->
<script>
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
                            url: '/EmployeeController/DeleteFolder',
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
                            url: '/EmployeeController/DeleteFile',
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



</script>