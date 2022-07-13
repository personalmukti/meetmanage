// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable(
    buttons:[
        {
            extend: 'csvHtml5',
            text: 'CSV',
            exportOptions: {
                stripHtml: false
            }
        },
        {
            extend: 'excelHtml5',
            text: 'Excel',
            exportOptions: {
                stripHtml: false
            }
        }
    ]
  );
});
