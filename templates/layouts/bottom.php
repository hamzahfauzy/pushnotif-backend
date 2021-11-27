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
    $('.select2').select2({
      allowClear: true
    })
    $('#tags').tagsInput({
      'width': '100%',
      'height': '75%',
      'interactive': true,
      'defaultText': 'Tag',
      'removeWithBackspace': true,
      'minChars': 0,
      // 'maxChars': 20, // if not provided there is no limit
      'placeholderColor': '#666666'
    });
    if ($("#summernoteExample").length) {
      $('#summernoteExample').summernote({
        height: 300,
        tabsize: 2
      });
    }
  </script>
  <script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.5.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.5.0/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyDIG52G89itVsVrw80527LsiTf-TWU9xXc",
        authDomain: "egovtest-3c158.firebaseapp.com",
        projectId: "egovtest-3c158",
        storageBucket: "egovtest-3c158.appspot.com",
        messagingSenderId: "238445636375",
        appId: "1:238445636375:web:490ec62058418614226552",
        measurementId: "G-1ZP7C31QQL"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
    </script>
</body>

</html>