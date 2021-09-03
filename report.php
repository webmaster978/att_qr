<?php require('db/database.php');
$date = date('Y-m-d');
$rep=$db->query("SELECT * FROM attendance LEFT JOIN student ON attendance.STUDENTID=student.STUDENTID WHERE LOGDATE='$date'");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ATT_MANAGER || RAPPORT</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="shortcut icon" href="img/undraw_time_management_30iu.svg" type="image/x-icon">



    <!-- Google Font -->
    <!-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">

        <?php include'part/_header.php' ?>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="img/user.PNG" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php
                                            if ($_SESSION['user']['username'] !== array()) {
                                                $users = $_SESSION['user']['username'];

                                                echo "$users";
                                            }
                                            ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="#">
                        <a href="dashboard">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

                        </a>

                    </li>



                    <li class="#">
                        <a href="qr/">
                            <i class="fa fa-calendar"></i>
                            <span>Presence</span>
                            <!-- <span class="pull-right-container">

                            </span> -->
                        </a>

                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Agent</span>
                            <span class="pull-right-container">

                            </span>
                        </a>

                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Rapport</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="rapport"><i class="fa fa-circle-o"></i> Rapport journalier</a>
                            </li>
                            <li><a href="#"><i class="fa fa-circle-o"></i>Rapports</a>
                            </li>

                        </ul>
                    </li>

                </ul>


            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Rapport des presences journaliere

                </h1>
                <ol class="breadcrumb">
                    <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dachboard</a></li>

                    <li class="active">Rapport</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">

                        <!-- /.box -->

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">
                                    <a class="btn btn-primary" href="rap" target="_blank"><span
                                            class="glyphicon glyphicon-print"></span>
                                        Imprimer</a>
                                </h3>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Fonction</th>
                                            <th>Heure d'entree</th>
                                            <th>Heure de sortie</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while ($g = $rep->fetch()) { ?>
                                        <tr>
                                            <td><?= $g['LASTNAME'].' '.$g['FIRSTNAME'].' '.$g['MNAME']; ?></td>
                                            <td><?= $g['FONCTION']; ?></td>
                                            <td><?= $g['TIMEIN']; ?></td>
                                            <td> <?= $g['TIMEOUT']; ?></td>
                                            <td><?= $g['LOGDATE']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Fonction</th>
                                            <th>Heure d'entree</th>
                                            <th>Heure de sortie</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include'part/_foot.php'; ?>

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
    </script>
</body>

</html>