
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/back/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/back/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>assets/back/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/back/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/back/dist/js/demo.js"></script>

<script src="<?php echo base_url() ?>assets/back/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
     // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>



<script src="<?php echo base_url() ?>assets/back/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>assets/back/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url() ?>assets/back/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/back/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm-dd-yyyy', { 'placeholder': 'mm-dd-yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
  //Date picker
    $('#reservationdate2').datetimepicker({
        format: 'L'
    });
    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });








    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'DD-MM-YYYY hh:mm A'
      }
    })
    //Date range as a button



  })
</script>


<!-- summernote -->
<link rel="stylesheet" href="<?= base_url() ?>assets/back/plugins/summernote/summernote-bs4.min.css">
<!-- Summernote -->
<script src="<?= base_url() ?>assets/back/plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed", 
      height: 400,
      focus: true,
      theme: "monokai"
    });
  })
</script>


<script type="text/javascript">
 $(document).ready(function() {
  var t = $('#summernote').summernote(
  {
  height: 150,
  focus: true
}
  );
  $("#btn").click(function(){
    $('div.note-editable').height(150);
  });
});
</script>