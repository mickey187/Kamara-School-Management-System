$("#unpaid_bill_table").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#unpaid_bill_table_wrapper .col-md-6:eq(0)');