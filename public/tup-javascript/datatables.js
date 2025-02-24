document.addEventListener("DOMContentLoaded", function () {
    // var newcs = $('.table-datatable').DataTable();
    // if (newcs) {
        $('.table-datatable').DataTable({
            scrollY: false,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            fixedColumns: {
            leftColumns: 0,
            rightColumns: 1,
            }
        });
    // }
    
    // const table1 = document.querySelector(".table-datatable");
    // if (table1) {
    //     new simpleDatatables.DataTable(table1, {
    //         sortable: true,
    //         searchable: true,
    //         fixedHeight: true,
    //         perPage: 15,
    //     });
    // }

    // const table2 = document.querySelector(".search-folder-table");
    // if (table2) {
    //     new simpleDatatables.DataTable(table2, {
    //         searchable: true,
    //         sortable: false,
    //         paging: true,
    //         perPage: 10,
    //     });
    // }

    // $('.search-folder-table').DataTable({
    //     scrollY: false,
    //     scrollX: true,
    //     scrollCollapse: true,
    //     paging: true,
    // });


    $(document).ready(function() {
        $('.search-folder-table').DataTable({
            scrollY: "400px",  // Set fixed height (adjust as needed)
            scrollCollapse: true, // Collapse extra space when less data is available
            paging: false,       // Enable pagination
            searching: true,    // Enable search box
            ordering: true,     // Enable column sorting
            info: true,      
            lengthChange: false,
            fixedHeader: true
        });
    });
    $('#findfolder').on('shown.bs.modal', function () {
        $('.search-folder-table').DataTable().columns.adjust().draw();
    });

});
