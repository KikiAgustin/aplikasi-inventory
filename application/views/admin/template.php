<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <!-- Bootstrap 3.3.7 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script src="<?= base_url() ?>assets/dist/js/daypilot-all.min.js"></script>


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">


</head>

<style type="text/css">
  .skin-blue .main-header .logo {
    background: #222d32;
    border-bottom: 0 solid transparent;
  }

  .main-header .logo {
    height: 80px
  }

  #calendar {
    max-width: 1000px;
    margin: 0 auto;
  }

  .fc-unthemed .fc-today {
    background-color: yellow
  }

  .scheduler_default_corner {
    display: none;
  }
</style>

<script>
  function showhide() {
    var div = document.getElementById("newpost");
    if (div.style.display !== "none") {
      div.style.display = "none";
    } else {
      div.style.display = "block";
    }
  }
</script>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

      <a href="#" href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>INV</b></span>
        <!-- logo for regular state and mobile devices -->
        <h3>INVENTORY</h3>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" onclick="showhide()" style="margin-top: 15px;">
          <span class="sr-only">Toggle navigation</span>
        </a>


        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <a href="<?= base_url() ?>auth/logout" class="btn btn-danger btn-lg" style="margin-top: 15px; margin-right:25px"><b>Logout</b></a>
        </div>

      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <a href="<?= base_url() ?>profile/">
          <div class="user-panel" style="margin-top: 50px;">
            <div class="pull-left image">
              <img src="<?= base_url() ?>uploads/male.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <br>
              <?php
              $username = $this->session->userdata('username');
              $nama = $this->db->query("SELECT * FROM users WHERE username = '$username'")->row()->nama;
              ?>
              <p> <?= $nama ?> </p>
            </div>
          </div>
        </a>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-home"></i> <span>Dashboard </span></a></li>
          <li><a href="<?= base_url() ?>kategori_barang"><i class="fa fa-book"></i> <span>Kategori Barang </span></a></li>
          <li><a href="<?= base_url() ?>suplayer"><i class="fa fa-book"></i> <span>Data Suplayer </span></a></li>
          <li><a href="<?= base_url() ?>barang"><i class="fa fa-book"></i> <span>Data Barang </span></a></li>
          <li><a href="<?= base_url() ?>barang_masuk"><i class="fa fa-sign-in"></i> <span>Barang Masuk </span></a></li>
          <li><a href="<?= base_url() ?>barang_keluar"><i class="fa fa-sign-out"></i> <span>Barang Keluar </span></a></li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i> <span>Rekap Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= base_url() ?>rekap_suplayer"><i class="fa fa-circle-o"></i> Rekap Data Suplayer</a></li>
              <li><a href="<?= base_url() ?>rekap_barang"><i class="fa fa-circle-o"></i> Rekap Data Barang</a></li>
              <li><a href="<?= base_url() ?>rekap_bm"><i class="fa fa-circle-o"></i> Rekap Barang Masuk </a></li>
              <li><a href="<?= base_url() ?>rekap_bk"><i class="fa fa-circle-o"></i> Rekap Barang Keluar</a></li>
            </ul>
          </li>

        </ul>
      </section>



      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <?php echo "$contents"; ?>


    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
      </div>
      <strong>Copyright &copy; <?php echo date('Y'); ?></strong></a>

    </footer>


    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->

  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $('.example1').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false
      })

    })
  </script>
  <script type="text/javascript">
    //Date picker
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    })

    //Date picker
    $('.datepickers').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    })
    //Date picker
    $('.datepicker-task').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    })
  </script>
</body>

</html>