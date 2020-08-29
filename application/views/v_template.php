<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('vendor/AdminLTE-3.0.5') ?>/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.dataTables.min.css">



</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('Dashboard') ?>" class="nav-link">Home</a>
                </li>

            </ul>



            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url('assets/img/') . $this->session->userdata('foto') ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $this->session->userdata('user') ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= base_url('assets/img/') . $this->session->userdata('foto') ?>" class="img-circle" alt="User Image">

                            <p>
                                <?= $this->session->userdata('nama') ?>
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="float-left">
                                <a href="#" class="btn btn-block btn-outline-primary">Profile</a>
                            </div>
                            <div class="float-right">
                                <a href="" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#ModalKeluar">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('Dashboard') ?>" class="brand-link">
                <img src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">siKEMBAR</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/img/') . $this->fungsi->user_login()->foto ?>" class="img-circle elevation-2" alt="User Image">
                    </div>

                    <div class="info">
                        <a href="#" class="d-block"><?= "Faridl Muzaky" ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">

                        </li>

                        <li class="nav-item has-treeview" id="menu-tree">
                            <a href="#" class="nav-link" id="menu">
                                <i class="fas fa-edit nav-icon"></i>
                                <p>
                                    Kinerja Pegawai
                                    <i class="fas fa-angle-left right "></i>
                                    <!-- <span class="badge badge-info right">6</span> -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../layout/top-nav.html" class="nav-link" id="menu">
                                        <i class="fas fa-bullseye nav-icon"></i>
                                        <p>Sasaran Kinerja</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../layout/top-nav-sidebar.html" class="nav-link" id="menu">
                                        <i class="fas fa-poll nav-icon"></i>
                                        <p>Capaian Kinerja</p>
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a href="../layout/top-nav-sidebar.html" class="nav-link" id="menu">
                                        <!-- <i class="fas fa-poll nav-icon"></i> -->
                                        <i class="fas fa-theater-masks nav-icon"></i>
                                        <p>Penilaian Perilaku</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../layout/top-nav-sidebar.html" class="nav-link" id="menu">
                                        <!-- <i class="fas fa-poll nav-icon"></i> -->
                                        <i class="fas fa-award nav-icon"></i>
                                        <p>Penilaian Prestasi Kerja</p>
                                    </a>
                                </li>



                            </ul>
                        </li>


                        </li>

                        <?php if ($this->session->userdata('level') == 1) { ?>
                            <li class="nav-header">REFERENSI</li>

                            <?php
                            if ($this->uri->segment(1) == "pegawai") {
                                $activeut = "active";
                            } else {
                                $activeut = "";
                            }
                            ?>
                            <li class="nav-item">
                                <a href=" <?= base_url('pegawai') ?>" class="nav-link <?= $activeut ?>" id="menu">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>Pegawai</p>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <?php
                                if ($this->uri->segment(1) == "tugas") {
                                    $activeut = "active";
                                } else {
                                    $activeut = "";
                                }
                                ?>
                                <a href="<?= base_url('tugas') ?>" class="nav-link <?= $activeut ?>" id="menu">
                                    <i class="fa fa-tasks nav-icon"></i>
                                    <p>Uraian Tugas</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <?php
                                if ($this->uri->segment(1) == "kategoritugas") {
                                    $activeut = "active";
                                } else {
                                    $activeut = "";
                                }
                                ?>
                                <a href="<?= base_url('kategoritugas') ?>" class="nav-link <?= $activeut ?>" id="menu">
                                    <i class="fa fa-list-ul nav-icon"></i>
                                    <p>Kategori Tugas</p>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="../gallery.html" class="nav-link" id="menu">
                                    <i class="nav-icon fa fa-user"></i>
                                    <p>
                                        User
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-header">KELUAR</li>
                        <li class="nav-item">
                            <a href="" class="nav-link" data-toggle="modal" data-target="#ModalKeluar">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Sign out
                                </p>
                            </a>
                        </li>

                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- <h1>Judul</h1> -->
                            <h1><?= $title ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- jQuery -->
            <script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- DataTables -->
            <script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
            <script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>


            <!-- AdminLTE App -->
            <script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/dist/js/demo.js"></script>
            <!-- <script src="<?= base_url('assets/js') ?>/sweetalert2.all.min.js"></script> -->
            <!-- Select2 -->
            <script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/select2/js/select2.full.min.js"></script>
            <!-- SweetAlert2 -->
            <script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

            <?php echo $contents ?>
            <script src="<?= base_url('assets/js') ?>/myscript.js"></script>
            <!-- sweet alert -->

            <!-- <script>
                $(document).on('click', '#menu', function(e) {
                    $(this).addClass('active').siblings().removeClass('active');
                    e.preventDefault();
                });
            </script> -->

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; <?= date('Y') ?> <a href="#">PTA Jawa Barat</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->



    <!-- Modal keluar -->
    <div class="modal fade" id="ModalKeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign out</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a type="button" class="btn btn-primary" href="<?= base_url('Auth/logout') ?>">Sign Out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Sign out sampai sini -->

</body>

</html>