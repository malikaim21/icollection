  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">AimCoolKidz</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="resources/css/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- jQuery 3 -->
<script src="resources/css/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="resources/css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="resources/css/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="resources/css/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="resources/css/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="resources/css/dist/js/adminlte.min.js"></script>

    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
  </script>

</body>
</html>