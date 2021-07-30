/*
---------------------------------------
    : Custom - Table Datatable js :
---------------------------------------
*/
// "use strict";
console.log('Custom DataTable Loaded');
$(document).ready(function() {
    /* -- Table - Datatable -- */
    console.log('Custom DataTable Loaded');
    $('#datatable').DataTable({
        responsive: true
    });
    $('#userTable').DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
    });
    $('#roleTable').DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
    });
    $('#postTable').DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
    });
    $('#categoryTable').DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
    });
    $('#tagTable').DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
    });
    $('#default-datatable').DataTable( {
        "order": [[ 3, "desc" ]],
        responsive: true
    } );    
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        responsive: true,
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });
    table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
});