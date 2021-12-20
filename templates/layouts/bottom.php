        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php load_templates('layouts/footer') ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url() ?>/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- Plugin js for this page-->
  <script src="<?= base_url() ?>/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?= base_url() ?>/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?= base_url() ?>/vendors/select2/select2.min.js"></script>
  
  <script src="<?= base_url() ?>/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url() ?>/js/dashboard.js"></script>
  <!-- End custom js for this page-->

  <script>
    $('.datatable').dataTable()
    $('.notifdatatable').dataTable({
      processing: true,
      search: {
          return: true
      },
      serverSide: true,
      ajax: "index.php?r=api/datatable-notif-lists&type=<?=isset($_GET['type'])?$_GET['type']:''?>"
    })
    $('.select2').select2({
      allowClear: true
    })
    // $('#tags').tagsInput({
    //   'width': '100%',
    //   'height': '75%',
    //   'interactive': true,
    //   'defaultText': 'Tag',
    //   'removeWithBackspace': true,
    //   'minChars': 0,
    //   // 'maxChars': 20, // if not provided there is no limit
    //   'placeholderColor': '#666666'
    // });
    // if ($("#summernoteExample").length) {
    //   $('#summernoteExample').summernote({
    //     height: 300,
    //     tabsize: 2
    //   });
    // }
  </script>
</body>

</html>