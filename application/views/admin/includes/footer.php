 </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.1.0
        </div>
        <strong>Copyright &copy; 2015-2016 <a href="http://yesinfomedia.com">Yes Infomedia</a>.</strong> All rights reserved.
      </footer>
    <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    
    
    <!-- Bootstrap 3.3.5 -->
    <!-- <script src="<?php echo site_url('assets/admin/bootstrap/js/bootstrap.min.js');?>"></script> -->
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <!--script src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js"></script-->
    <!-- Sparkline -->
    <script src="<?php echo site_url('assets/admin/plugins/datatables/jquery.dataTables.js');?>" type="text/javascript"></script>
    <script src="<?php echo site_url('assets/admin/plugins/sparkline/jquery.sparkline.min.js');?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo site_url('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
    <script src="<?php echo site_url('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo site_url('assets/admin/plugins/knob/jquery.knob.js');?>"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo site_url('assets/admin/plugins/daterangepicker/daterangepicker.js');?>"></script>
    <!-- datepicker -->
    <script src="<?php echo site_url('assets/admin/plugins/datepicker/bootstrap-datepicker.js');?>"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo site_url('assets/admin/plugins/timepicker/bootstrap-timepicker.min.js');?>"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo site_url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
    <!-- Slimscroll -->
    <script src="<?php echo site_url('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo site_url('assets/admin/plugins/fastclick/fastclick.min.js');?>"></script>
     <script src="<?php echo site_url('assets/admin/plugins/ckeditor/ckeditor.js');?>"></script>
    
    <!-- AdminLTE App -->
    <script src="<?php echo site_url('assets/admin/dist/js/app.min.js');?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo site_url('assets/admin/dist/js/pages/dashboard.js');?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo site_url('assets/admin/dist/js/demo.js');?>"></script>
    <script>
      $(function () {
        $(".dtable").DataTable();
       /* $('.dtable').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });*/
      });
        $(".datepicker").datepicker();
        $('textarea.form-control').each(function(){
            $(this).addClass('ckeditor')
        });
        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
    </script>
  </body>
</html>