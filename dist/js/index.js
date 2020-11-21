$(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd'
    });
    $('#datepickerSelesai').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd',
      minDate: 0
    });
  /*
    $("#datepicker").datepicker({
      dateFormat:'dd/M/yy',
      minDate: 'now',
      changeMonth:true,
      changeYear:true,
      showOn: "focus",
      //buttonImage: "YourImage",
      buttonImageOnly: true, 
      yearRange: "-100:+0",  
      }); 
   
     $( "datepicker" ).datepicker( "option", "disabled", true );

  */
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false,
      showMeridian: false,
      minuteStep: 1   
    });
    $(".timepickerSelesai").timepicker({
      showInputs: false,
      showMeridian: false,
      minuteStep: 15,
      defaultTime: false  
    });

    //Search di select option
    $('#kode_aset, #jenis_aset, #nama_unit, #nama_suplier, #kode_role #kode_kerusakan_aset, #kode_status').select2({
      
    });
  });



$(function() {
    $('#tabelAset').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      dom: "<'row'<'col-md-6'l><'col-md-6'f>>" + "<'row'<'col-md-6'><'col-md-6'>>" + "<'row'<'col-md-12't>><'row'<'col-md-6'iB><'col-md-6'p>>",
            buttons: [
              { 
              extend: 'print', 
              text: ' Print',
              title: 'Data Aset',
              className: 'btn glyphicon glyphicon-print',
              exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10] }
              },
              {
                extend: 'excel',
                text: ' Excel',
                title: 'Data Aset',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10] }
              },
              {
                extend: 'pdf',
                text: ' PDF',
                title: 'Data Aset',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10] }
              }
            ]
    });

    $('#tabelJenis').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      dom: "<'row'<'col-md-6'l><'col-md-6'f>>" + "<'row'<'col-md-6'><'col-md-6'>>" + "<'row'<'col-md-12't>><'row'<'col-md-6'iB><'col-md-6'p>>",
            buttons: [
              { extend: 'print', 
                text: ' Print',
                title: 'Data Jenis Aset',
                className: 'btn glyphicon glyphicon-print',
                exportOptions:
              { columns: [0,1,2] }
              },
            ]
    });

    $('#tabelSuplier').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      dom: "<'row'<'col-md-6'l><'col-md-6'f>>" + "<'row'<'col-md-6'><'col-md-6'>>" + "<'row'<'col-md-12't>><'row'<'col-md-6'iB><'col-md-6'p>>",
            buttons: [
              { extend: 'print', 
                text: ' Print',
                title: 'Data Suplier',
                className: 'btn glyphicon glyphicon-print',
                exportOptions:
              { columns: [0,1,2,3,4] }
              },
            ]
    });

    $('#tabelUnit').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      dom: "<'row'<'col-md-6'l><'col-md-6'f>>" + "<'row'<'col-md-6'><'col-md-6'>>" + "<'row'<'col-md-12't>><'row'<'col-md-6'iB><'col-md-6'p>>", 
      //'lfrtiBp'
            buttons: [
              { extend: 'print', 
                text: ' Print',
                title: 'Data Unit',
                className: 'btn glyphicon glyphicon-print',
                exportOptions:
              { columns: [0,1,2,3] }
              },
            ]
    });

    $('#tabelPemeriksaan').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      dom: "<'row'<'col-md-6'l><'col-md-6'f>>" + "<'row'<'col-md-6'><'col-md-6'>>" + "<'row'<'col-md-12't>><'row'<'col-md-6'iB><'col-md-6'p>>",
            buttons: [
              { 
              extend: 'print', 
              text: ' Print',
              title: 'Data Pemeriksaan Aset',
              className: 'btn glyphicon glyphicon-print',
              exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9] }
              },
              {
                extend: 'excel',
                text: ' Excel',
                title: 'Data Pemeriksaan Aset',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9] }
              },
              {
                extend: 'pdf',
                text: ' PDF',
                title: 'Data Pemeriksaan Aset',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9] }
              }
            ]
    });

    $('#tabelKerusakan').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      dom: "<'row'<'col-md-6'l><'col-md-6'f>>" + "<'row'<'col-md-6'><'col-md-6'>>" + "<'row'<'col-md-12't>><'row'<'col-md-6'iB><'col-md-6'p>>",
            buttons: [
              { 
              extend: 'print', 
              text: ' Print',
              title: 'Data Kerusakan Aset',
              className: 'btn glyphicon glyphicon-print',
              exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9] }
              },
              {
                extend: 'excel',
                text: ' Excel',
                title: 'Data Kerusakan Aset',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9] }
              },
              {
                extend: 'pdf',
                text: ' PDF',
                title: 'Data Kerusakan Aset',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9] }
              }
            ]
    });

    $('#tabelPerbaikan').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      dom: "<'row'<'col-md-6'l><'col-md-6'f>>" + "<'row'<'col-md-6'><'col-md-6'>>" + "<'row'<'col-md-12't>><'row'<'col-md-6'iB><'col-md-6'p>>",
            buttons: [
              { 
              extend: 'print', 
              text: ' Print',
              title: 'Data Perbaikan Aset',
              className: 'btn glyphicon glyphicon-print',
              orientation: 'landscape',
              exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15] }
              },
              {
                extend: 'excel',
                text: ' Excel',
                title: 'Data Perbaikan Aset',
                className: 'btn glyphicon glyphicon-file',
                orientation: 'landscape',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15] }
              },
              {
                extend: 'pdf',
                text: ' PDF',
                title: 'Data Perbaikan Aset',
                className: 'btn glyphicon glyphicon-file',
                orientation: 'landscape',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15] }
              }
            ]
    });
});

