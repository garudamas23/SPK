  <!-- footer content -->
  <footer>
      <div class="pull-right">
          &copy;2024 | Pemilihan Karir Siswa Berdasarkan Kepribadian
      </div>
      <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
  </div>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url(); ?>assets/backend/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url(); ?>assets/backend/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JS -->
  <?php if (isset($js)) {
        echo $js . "\n";
    } ?>
  <!-- FastClick -->
  <script src="<?= base_url(); ?>assets/backend/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="<?= base_url(); ?>assets/backend/vendors/nprogress/nprogress.js"></script>
  <!-- NProgress -->
  <script src="<?= base_url(); ?>assets/backend/vendors/select2/js/select2.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url(); ?>assets/backend/vendors/summernote/summernote.min.js"></script>
  <!-- jQuery Smart Wizard -->
  <script src="<?= base_url(); ?>assets/backend/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
  <!-- Datatables -->
  <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/jszip/dist/jszip.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/vendors/pdfmake/build/vfs_fonts.js"></script>
  <!-- jQuery custom content scroller -->
  <script src="<?= base_url(); ?>assets/backend/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="<?= base_url(); ?>assets/backend/js/custom.js"></script>
  <script type="text/javascript">
      var base_url = '<?php echo base_url(); ?>';
  </script>

  <script>
      $(document).ready(function() {
          $('.select2').select2({
              placeholder: 'Select an option'
          });

          $('#summernote,#summernote_edit').summernote({
              tabsize: 2,
              height: 200
          });
      });
  </script>

  </body>

  </html>