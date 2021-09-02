<?php require('db/database.php');
$date = date('Y-m-d');
$rep=$db->query("SELECT * FROM attendance LEFT JOIN student ON attendance.STUDENTID=student.STUDENTID WHERE LOGDATE='$date'");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ATT_MANAGER || RAPPORTS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="shortcut icon" href="img/undraw_time_management_30iu.svg" type="image/x-icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <!-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
    <style>
    .jj {
        margin-top: 10px;
    }
    </style>
</head>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xl-12">
                    <h2 class="page-header">

                        <img src="img/v.PNG" alt="">

                        <p style="text-align:center">RAPPORT JOURNALIER DU : <?php 
      
$today = new DateTime('today');
echo $today->format('d - F - Y'), '.<br>', PHP_EOL;
     ?> </p>
                        <small class="pull-right"> <b> </b></small>
                    </h2>
                </div>

                <!-- /.col -->
            </div>
            <!-- info row -->

            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
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
                        <?php while ($g = $rep->fetch()) { ?>
                        <tbody>
                            <tr>
                                <td><?= $g['LASTNAME'].' '.$g['FIRSTNAME'].' '.$g['MNAME']; ?></td>
                                <td><?= $g['FONCTION']; ?></td>
                                <td><?= $g['TIMEIN']; ?></td>
                                <td> <?= $g['TIMEOUT']; ?></td>
                                <td><?= $g['LOGDATE']; ?></td>
                            </tr>
                        </tbody>
                        <?php } ?>
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
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-4 col-lg-offset-2 jj">
                    pour visa chef d'antene
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>