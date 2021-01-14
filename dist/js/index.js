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
    $('#kode_aset, #kode_kategori, #kode_unit, #jenis_aset, #tahun_aset, #nama_suplier, #kode_role, #kode_kerusakan_aset, #kode_status, #status_pemeriksaan_aset').select2({});
    $('#multi_label').select2({
      maximumSelectionLength: 12,
    });
  });


/*
//Filter Data Aset
  (function($){
  
    var dataTable;
    
    var select2Init = function(){
      $('#kode_jenis').select2({
        dropdownAutoWidth : true,
        allowClear: true,
        placeholder: "Jenis",
      });
      $('#kode_unit').select2({
        dropdownAutoWidth : true,
        allowClear: true,
        placeholder: "Unit",
      });
      $('#kode_suplier').select2({
        dropdownAutoWidth : true,
        allowClear: true,
        placeholder: "Suplier",
      });
    };
    
    var dataTableInit = function(){
      dataTable = $('tabelAset').dataTable({
        "columnDefs" : [{
          "targets": 8,
          "type": 'char',
        },{
          "targets": 9,
          "type": 'char',
        },{
          "targets": 10,
          "type": 'char',
        }],
      });
    };
    
    var dtSearchInit = function(){
      
      $('#kode_jenis').change(function(){
        dtSearchAction( $(this) , 8)
      });
      $('#kode_unit').change(function(){
        dtSearchAction( $(this) , 9);
      });
      $('#kode_suplier').change(function(){
        dtSearchAction( $(this) , 10);
      });
      
    }; 
    
    dtSearchAction = function(selector,columnId){
        var fv = selector.val();
        if( (fv == '') || (fv == null) ){
          dataTable.api().column(columnId).search('', true, false).draw();
        } else {
          dataTable.api().column(columnId).search(fv, true, false).draw();
        }
    };
    
    
    $(document).ready(function(){
      select2Init();
      dataTableInit();
      dtSearchInit();
    });
  
  })(jQuery);
*/

// Motong STRING
function strtrunc(str, max, add){
  add = add || '...';
  return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
};

$(document).ready(function() {
  //TABEL ASET
    var tblAset = $('#tabelAset').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      header: false,
      footer: false,
      dom: "<'row'<'col-md-12'S>>" +"<'row'<'col-md-6'l><'col-md-6'f>>" + "<'row'<'col-md-6'><'col-md-6'>>" + "<'row'<'col-md-12't>><'row'<'col-md-6'iB><'col-md-6'p>>",
      //'lfrtiBp'
            buttons: [
              { 
              extend: 'print', 
              text: ' Print',
              title: 'Data Aset',
              className: 'btn glyphicon glyphicon-print',
              exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11] },
                customize: function (win) {
                    $(win.document.body).find('table').addClass('display').css('font-size', '10pt');
                    $(win.document.body).find('table').addClass('display').css('font-family', '"Times New Roman", Times, serif');
                    $(win.document.body).find('table').addClass('display').css('max-width', '60px');
                    $(win.document.body).find('table').addClass('display').css('min-width', '5px');
                    $(win.document.body).find('th, td').addClass('display').css('border-width', '1px');
                    $(win.document.body).find('th, td').addClass('display').css('padding', '1px');
                    $(win.document.body).find('th, td').addClass('display').css('min-width', '5px');
                    $(win.document.body).find('th, td').addClass('display').css('max-width', '60px');
                    $(win.document.body).find('th, td').addClass('display').css('white-space','nowrap');
                    $(win.document.body).find('th, td').addClass('display').css('overflow','hidden');
                    $(win.document.body).find('th, td').addClass('display').css('text-overflow', 'ellipsis');
                    $(win.document.body).find('h1').addClass('display').css('font-size', '18pt');

                    var last = null;
                    var current = null;
                    var bod = [];
    
                    var css = '@page { size: landscape;}',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');
    
                    style.type = 'text/css';
                    style.media = 'print';
    
                    if (style.styleSheet)
                    {
                      style.styleSheet.cssText = css;
                    }
                    else
                    {
                      style.appendChild(win.document.createTextNode(css));
                    }
    
                    head.appendChild(style);
                }
              },
              {
                extend: 'excelHtml5',
                text: ' Excel',
                title: 'Data Aset',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11] }
              },

              /*
              {
                extend: 'pdf',
                text: ' PDF',
                orientation: 'landscape',
                pageSize: 'A4',
                title: 'Data Aset',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10] }
              }
              */
              
            ], //filter select option
            initComplete: function () {
              this.api().columns([2,4,6,8,9,10,11]).every( function () {
                  var column = this;
                  var select = $('<select style="min-width:5px; max-width:60px;"><option value=""></option></select>')
                      //.appendTo( $(column.footer()).empty() )
                      .appendTo( $("#tabelAset thead tr:eq(0) th").eq(column.index()).empty() )
                      .on( 'change', function () {
                          var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );
      
                          column
                              .search( val ? '^'+val+'$' : '', true, false )
                              .draw();
                      } );
      
                  column.data().unique().sort().each( function ( d, j ) {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                  } );
              } );
          }, 
          //numbering 1/2
          "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
          } ],
          "order": [[ 1, 'desc' ]]
    });
    //numbering 2/2
    tblAset.on( 'order.dt search.dt', function () {
      tblAset.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
          tblAset.cell(cell).invalidate('dom');
      } );
    } ).draw();

    /* V2 - CEK NANTI PAS DATA BANYAK :*
    tblAset.on( 'draw.dt', function () {
    var PageInfoAset = $('#tabelAset').DataTable().page.info();
         tblAset.column(0, { page: 'current' }).nodes().each( function (cell, i) {
            cell.innerHTML = i + 1 + PageInfoAset.start;
            tblAset.cell(cell).invalidate('dom');
        } );
    } );
    */

  //TABEL KATEGORI
  var tblKategori = $('#tabelKategori').DataTable({
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
              title: 'Data Kategori Aset',
              className: 'btn glyphicon glyphicon-print',
              exportOptions: { columns: [0,1,2] },
              customize: function (win) {
                $(win.document.body).find('table').addClass('display').css('font-size', '12pt');
                $(win.document.body).find('table').addClass('display').css('font-family', '"Times New Roman", Times, serif');
                $(win.document.body).find('table').addClass('display').css('max-width', '200px');
                $(win.document.body).find('table').addClass('display').css('min-width', '5px');
                $(win.document.body).find('th, td').addClass('display').css('border-width', '1px');
                $(win.document.body).find('th, td').addClass('display').css('padding', '1px');
                $(win.document.body).find('th, td').addClass('display').css('min-width', '5px');
                $(win.document.body).find('th, td').addClass('display').css('max-width', '60px');
                $(win.document.body).find('th, td').addClass('display').css('white-space','nowrap');
                $(win.document.body).find('th, td').addClass('display').css('overflow','hidden');
                $(win.document.body).find('th, td').addClass('display').css('text-overflow', 'ellipsis');
                $(win.document.body).find('h1').addClass('display').css('font-size', '18pt');
              
              }
            },
            {
              extend: 'excelHtml5',
              text: ' Excel',
              title: 'Data Kategori Aset',
              className: 'btn glyphicon glyphicon-file',
              exportOptions: { columns: [0,1,2] }
            }
          ], 
    //numbering 1/2
    "columnDefs": [ {
      "searchable": false,
      "orderable": false,
      "targets": 0
    } ],
    "order": [[ 2, 'asc' ]]
  });
  //numbering 2/2
  tblKategori.on( 'order.dt search.dt', function () {
    tblKategori.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
        tblKategori.cell(cell).invalidate('dom');
    } );
  } ).draw();


  //TABEL JENIS
    var tblJenis = $('#tabelJenis').DataTable({
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
                exportOptions: { columns: [0,1,2] },
                customize: function (win) {
                  $(win.document.body).find('table').addClass('display').css('font-size', '12pt');
                  $(win.document.body).find('table').addClass('display').css('font-family', '"Times New Roman", Times, serif');
                  $(win.document.body).find('table').addClass('display').css('max-width', '200px');
                  $(win.document.body).find('table').addClass('display').css('min-width', '5px');
                  $(win.document.body).find('th, td').addClass('display').css('border-width', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('padding', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('min-width', '5px');
                  $(win.document.body).find('th, td').addClass('display').css('max-width', '60px');
                  $(win.document.body).find('th, td').addClass('display').css('white-space','nowrap');
                  $(win.document.body).find('th, td').addClass('display').css('overflow','hidden');
                  $(win.document.body).find('th, td').addClass('display').css('text-overflow', 'ellipsis');
                  $(win.document.body).find('h1').addClass('display').css('font-size', '18pt');
                
                }
              },
              {
                extend: 'excelHtml5',
                text: ' Excel',
                title: 'Data Jenis Aset',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2] }
              }
            ], 
      //numbering 1/2
      "columnDefs": [ {
        "searchable": false,
        "orderable": false,
        "targets": 0
      } ],
      "order": [[ 1, 'asc' ]]
    });
    //numbering 2/2
    tblJenis.on( 'order.dt search.dt', function () {
      tblJenis.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
          tblJenis.cell(cell).invalidate('dom');
      } );
    } ).draw();


    //TABEL SUPLIER
    var tblSuplier = $('#tabelSuplier').DataTable({
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
                exportOptions: { columns: [0,1,2,3,4] },
                customize: function (win) {
                  $(win.document.body).find('table').addClass('display').css('font-size', '12pt');
                  $(win.document.body).find('table').addClass('display').css('font-family', '"Times New Roman", Times, serif');
                  $(win.document.body).find('table').addClass('display').css('max-width', '200px');
                  $(win.document.body).find('table').addClass('display').css('min-width', '5px');
                  $(win.document.body).find('th, td').addClass('display').css('border-width', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('padding', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('min-width', '5px');
                  $(win.document.body).find('th, td').addClass('display').css('max-width', '60px');
                  $(win.document.body).find('th, td').addClass('display').css('white-space','nowrap');
                  $(win.document.body).find('th, td').addClass('display').css('overflow','hidden');
                  $(win.document.body).find('th, td').addClass('display').css('text-overflow', 'ellipsis');
                  $(win.document.body).find('h1').addClass('display').css('font-size', '18pt');
                
                }
              },
              {
                extend: 'excelHtml5',
                text: ' Excel',
                title: 'Data Suplier',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3,4] }
              }
            ],
      //numbering 1/2
      "columnDefs": [ {
        "searchable": false,
        "orderable": false,
        "targets": 0
      } ],
      "order": [[ 2, 'asc' ]]
    });
    //numbering 2/2
    tblSuplier.on( 'order.dt search.dt', function () {
      tblSuplier.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
          tblSuplier.cell(cell).invalidate('dom');
      } );
    } ).draw();


    //TABEL UNIT
    var tblUnit = $('#tabelUnit').DataTable({
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
                exportOptions:{ columns: [0,1,2,3] },
                customize: function (win) {
                  $(win.document.body).find('table').addClass('display').css('font-size', '12pt');
                  $(win.document.body).find('table').addClass('display').css('font-family', '"Times New Roman", Times, serif');
                  $(win.document.body).find('table').addClass('display').css('max-width', '200px');
                  $(win.document.body).find('table').addClass('display').css('min-width', '5px');
                  $(win.document.body).find('th, td').addClass('display').css('border-width', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('padding', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('min-width', '5px');
                  $(win.document.body).find('th, td').addClass('display').css('max-width', '60px');
                  $(win.document.body).find('th, td').addClass('display').css('white-space','nowrap');
                  $(win.document.body).find('th, td').addClass('display').css('overflow','hidden');
                  $(win.document.body).find('th, td').addClass('display').css('text-overflow', 'ellipsis');
                  $(win.document.body).find('h1').addClass('display').css('font-size', '18pt');
                }
              },
              {
                extend: 'excelHtml5',
                text: ' Excel',
                title: 'Data Unit',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3] }
              }
            ],
      //numbering 1/2
      "columnDefs": [ {
        "searchable": false,
        "orderable": false,
        "targets": 0
      } ],
      "order": [[ 2, 'asc' ]]
    });
    //numbering 2/2
    tblUnit.on( 'order.dt search.dt', function () {
      tblUnit.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
          tblUnit.cell(cell).invalidate('dom');
      } );
    } ).draw();


    //TABEL RUANGAN
    var tblRuangan = $('#tabelRuangan').DataTable({
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
                title: 'Data Ruangan',
                className: 'btn glyphicon glyphicon-print',
                exportOptions:{ columns: [0,1,2,3] },
                customize: function (win) {
                  $(win.document.body).find('table').addClass('display').css('font-size', '12pt');
                  $(win.document.body).find('table').addClass('display').css('font-family', '"Times New Roman", Times, serif');
                  $(win.document.body).find('table').addClass('display').css('max-width', '200px');
                  $(win.document.body).find('table').addClass('display').css('min-width', '5px');
                  $(win.document.body).find('th, td').addClass('display').css('border-width', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('padding', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('min-width', '5px');
                  $(win.document.body).find('th, td').addClass('display').css('max-width', '60px');
                  $(win.document.body).find('th, td').addClass('display').css('white-space','nowrap');
                  $(win.document.body).find('th, td').addClass('display').css('overflow','hidden');
                  $(win.document.body).find('th, td').addClass('display').css('text-overflow', 'ellipsis');
                  $(win.document.body).find('h1').addClass('display').css('font-size', '18pt');
                }
              },
              {
                extend: 'excelHtml5',
                text: ' Excel',
                title: 'Data Ruangan',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3] }
              }
            ],
      //numbering 1/2
      "columnDefs": [ {
        "searchable": false,
        "orderable": false,
        "targets": 0
      } ],
      "order": [[ 2, 'asc' ],[3,'asc']]
    });
    //numbering 2/2
    tblRuangan.on( 'order.dt search.dt', function () {
      tblRuangan.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
          tblRuangan.cell(cell).invalidate('dom');
      } );
    } ).draw();


    //TABEL PEMERIKSAAN
    var tblPemeriksaan = $('#tabelPemeriksaan').DataTable({
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
              exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10] },
                customize: function (win) {
                  $(win.document.body).find('table').addClass('display').css('font-size', '8pt');
                  $(win.document.body).find('table').addClass('display').css('font-family', '"Times New Roman", Times, serif');
                  $(win.document.body).find('table').addClass('display').css('max-width', '60px');
                  $(win.document.body).find('table').addClass('display').css('min-width', '5px');
                  $(win.document.body).find('th, td').addClass('display').css('border-width', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('padding', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('min-width', '5px');
                  $(win.document.body).find('th, td').addClass('display').css('max-width', '60px');
                  $(win.document.body).find('th, td').addClass('display').css('white-space','nowrap');
                  $(win.document.body).find('th, td').addClass('display').css('overflow','hidden');
                  $(win.document.body).find('th, td').addClass('display').css('text-overflow', 'ellipsis');
                  $(win.document.body).find('h1').addClass('display').css('font-size', '18pt');
                }
              },
              {
                extend: 'excelHtml5',
                text: ' Excel',
                title: 'Data Pemeriksaan Aset',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10] }
              },

              /*
              {
                extend: 'pdf',
                text: ' PDF',
                title: 'Data Pemeriksaan Aset',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9] }
              }
              */
            ],//filter select option
            initComplete: function () {
              this.api().columns([3,5,6,7,8,10]).every( function () {
                  var column = this;
                  var select = $('<select style="min-width:5px; max-width:60px;"><option value=""></option></select>')
                      .appendTo( $("#tabelPemeriksaan thead tr:eq(0) th").eq(column.index()).empty() )
                      .on( 'change', function () {
                          var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );
      
                          column
                              .search( val ? '^'+val+'$' : '', true, false )
                              .draw();
                      } );
      
                  column.data().unique().sort().each( function ( d, j ) {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                  } );
              } );
          }, 
      //numbering 1/2
      "columnDefs": [ {
        "searchable": false,
        "orderable": false,
        "targets": 0
      } ],
      "order": [[ 1, 'desc' ]]
    });
    //numbering 2/2
    tblPemeriksaan.on( 'order.dt search.dt', function () {
      tblPemeriksaan.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
          tblPemeriksaan.cell(cell).invalidate('dom');
      } );
    } ).draw();


    //TABEL KERUSAKAN
    var tblKerusakan = $('#tabelKerusakan').DataTable({
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
              exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10] },
                customize: function (win) {
                  $(win.document.body).find('table').addClass('display').css('font-size', '7.5pt');
                  $(win.document.body).find('table').addClass('display').css('font-family', '"Times New Roman", Times, serif');
                  $(win.document.body).find('table').addClass('display').css('max-width', '60px');
                  $(win.document.body).find('table').addClass('display').css('min-width', '5px');
                  $(win.document.body).find('th, td').addClass('display').css('border-width', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('padding', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('min-width', '5px');
                  $(win.document.body).find('th, td').addClass('display').css('max-width', '60px');
                  $(win.document.body).find('th, td').addClass('display').css('white-space','nowrap');
                  $(win.document.body).find('th, td').addClass('display').css('overflow','hidden');
                  $(win.document.body).find('th, td').addClass('display').css('text-overflow', 'ellipsis');
                  $(win.document.body).find('h1').addClass('display').css('font-size', '18pt');
                }
              },
              {
                extend: 'excelHtml5',
                text: ' Excel',
                title: 'Data Kerusakan Aset',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10] }
              },
              /*
              {
                extend: 'pdf',
                text: ' PDF',
                title: 'Data Kerusakan Aset',
                className: 'btn glyphicon glyphicon-file',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9] },
              }
              */

            ],//filter select option
            initComplete: function () {
              this.api().columns([3,5,6,10]).every( function () {
                  var column = this;
                  var select = $('<select style="min-width:5px; max-width:60px;"><option value=""></option></select>')
                      .appendTo( $("#tabelKerusakan thead tr:eq(0) th").eq(column.index()).empty() )
                      .on( 'change', function () {
                          var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );
      
                          column
                              .search( val ? '^'+val+'$' : '', true, false )
                              .draw();
                      } );
      
                  column.data().unique().sort().each( function ( d, j ) {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                  } );
              } );
          },
      //numbering 1/2
      "columnDefs": [ {
        "searchable": false,
        "orderable": false,
        "targets": 0
      } ],
      "order": [[ 1, 'desc' ]]
    });
    //numbering 2/2
    tblKerusakan.on( 'order.dt search.dt', function () {
      tblKerusakan.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
          tblKerusakan.cell(cell).invalidate('dom');
      } );
    } ).draw();


    //TABEL PERBAIKAN
    var tblPerbaikan = $('#tabelPerbaikan').DataTable({
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
              exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16] },
              customize: function(win)
                {
                  //$(win.document.body).find('table thead tr th:eq(0)').addClass('display').css('width', '5px');
                  //$(win.document.body).find('table').addClass('display').css('table-layout', 'fixed');
                  //$(win.document.body).find('th, td').addClass('display').css('display','inline');
                  $(win.document.body).find('table').addClass('display').css('font-family', '"Times New Roman", Times, serif');
                  $(win.document.body).find('table').addClass('display').css('font-size', '7.5pt');
                  $(win.document.body).find('table').addClass('display').css('max-width', '60px');
                  $(win.document.body).find('table').addClass('display').css('min-width', '10px');
                  $(win.document.body).find('th, td').addClass('display').css('border-width', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('padding', '1px');
                  $(win.document.body).find('th, td').addClass('display').css('min-width', '5px');
                  $(win.document.body).find('th, td').addClass('display').css('max-width', '60px');
                  $(win.document.body).find('th, td').addClass('display').css('white-space','nowrap');
                  $(win.document.body).find('th, td').addClass('display').css('overflow','hidden');
                  $(win.document.body).find('th, td').addClass('display').css('text-overflow', 'ellipsis');
                  $(win.document.body).find('h1').addClass('display').css('font-size', '18pt');

                  var last = null;
                  var current = null;
                  var bod = [];
  
                  var css = '@page { size: landscape;}',
                      head = win.document.head || win.document.getElementsByTagName('head')[0],
                      style = win.document.createElement('style');
  
                  style.type = 'text/css';
                  style.media = 'print';
  
                  if (style.styleSheet)
                  {
                    style.styleSheet.cssText = css;
                  }
                  else
                  {
                    style.appendChild(win.document.createTextNode(css));
                  }
  
                  head.appendChild(style);
                }
              },
              {
                extend: 'excelHtml5',
                text: ' Excel',
                title: 'Data Perbaikan Aset',
                className: 'btn glyphicon glyphicon-file',
                orientation: 'landscape',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16] },
              },
              /*
              {
                extend: 'pdf',
                text: ' PDF',
                title: 'Data Perbaikan Aset',
                className: 'btn glyphicon glyphicon-file',
                orientation: 'landscape',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15] }
              }
              */
            ],//filter select option
            initComplete: function () {
              this.api().columns([1,2,3,4, 5,6,7,8,11,13]).every( function () {
                  var column = this;
                  var select = $('<select style="min-width:5px; max-width:60px;"><option value=""></option></select>')
                      .appendTo( $("#tabelPerbaikan thead tr:eq(0) th").eq(column.index()).empty() )
                      .on( 'change', function () {
                          var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );
      
                          column
                              .search( val ? '^'+val+'$' : '', true, false )
                              .draw();
                      } );
      
                  column.data().unique().sort().each( function ( d, j ) {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                  } );
              } );
          },
      //numbering 1/2
      "columnDefs": [ {
        "searchable": false,
        "orderable": false,
        "targets": 0
      },//{
        //targets: 12,
        //render: function ( data, type, row ) {
        //    return data.substr( 0, 10 );
        //}
        //} 
      ],
      "order": [[ 1, 'desc' ]]
    });
    //numbering 2/2
    tblPerbaikan.on( 'order.dt search.dt', function () {
      tblPerbaikan.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
          tblPerbaikan.cell(cell).invalidate('dom');
      } );
    } ).draw();


    //TABEL PETUGAS
    var tblPetugas = $('#tabelPetugas').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      dom: "<'row'<'col-md-6'l><'col-md-6'f>>" + "<'row'<'col-md-6'><'col-md-6'>>" + "<'row'<'col-md-12't>><'row'<'col-md-6'iB><'col-md-6'p>>",
            buttons: [
              /*
              { 
              extend: 'print', 
              text: ' Print',
              title: 'Data Petugas',
              className: 'btn glyphicon glyphicon-print',
              orientation: 'landscape',
              exportOptions: { columns: [0,1,2,3,4,5,6,7] },
              customize: function(win)
                {
                  
                  $(win.document.body).find('table').addClass('display').css('font-size', '10pt');
                  $(win.document.body).find('table').addClass('display').css('font-family', '"Times New Roman", Times, serif');

                  var last = null;
                  var current = null;
                  var bod = [];
  
                  var css = '@page { size: landscape; }',
                      head = win.document.head || win.document.getElementsByTagName('head')[0],
                      style = win.document.createElement('style');
  
                  style.type = 'text/css';
                  style.media = 'print';
  
                  if (style.styleSheet)
                  {
                    style.styleSheet.cssText = css;
                  }
                  else
                  {
                    style.appendChild(win.document.createTextNode(css));
                  }
  
                  head.appendChild(style);
                }
              },
              {
                extend: 'excelHtml5',
                text: ' Excel',
                title: 'Data Petugas',
                className: 'btn glyphicon glyphicon-file',
                orientation: 'landscape',
                exportOptions: { columns: [0,1,2,3,4,5,6,7] },
              },
              
              {
                extend: 'pdf',
                text: ' PDF',
                title: 'Data Petugas',
                className: 'btn glyphicon glyphicon-file',
                orientation: 'landscape',
                exportOptions: { columns: [0,1,2,3,4,5,6,7] }
              }
              */
            ],
      //numbering 1/2
      "columnDefs": [ {
        "searchable": false,
        "orderable": false,
        "targets": 0
      } ],
      "order": [[ 1, 'desc' ]]
    });
    //numbering 2/2
    tblPetugas.on( 'order.dt search.dt', function () {
      tblPetugas.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
          tblPetugas.cell(cell).invalidate('dom');
      } );
    } ).draw();


});

/* DEPENDENT SELECT UNIT-RUANGAN
$("select[name='unit_list']").change(function(){
  var kodeUnit=$(this).val();

  if(kodeUnit){
      $.ajax({
          url:"/../../pages/aset/load_ruangan.php",
          datatype:'json',
          data:{'kode_unit':kodeUnit},
          success:function(data){
              $('select[name="ruangan_list"]').empty();
              $.each(data, function(key, value){
                  $('select[name="ruangan_list"]').append('<option value="'+key+'">'+value+'</option>');
              });
          }
      });
  }else{
      $('select[name="ruangan_list"]').empty();
  }
});
*/