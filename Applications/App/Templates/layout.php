<?php
require __DIR__ . '/data_nav.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $titles; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/assets/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
      <link href="/assets/sweetalert2/sweetalert2.css" rel="stylesheet" type="text/css">


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="/" class="logo">
                <span class="logo-mini"><b>H</b>A</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Harlem </b>AUTO</span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">
                <a href="/assets/#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="/assets/#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-danger"><?= $countFctreImp; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Factures impayées</li>
                                <li class="footer"><a href="/Comptabilite/facture-non-reglee">Voir la liste des factures
                                        impayées</a></li>
                            </ul>
                        </li>
                        <!-- /.messages-menu -->

                        <!-- Notifications Menu -->
                        <!-- Tasks Menu -->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-wrench"></i>
                                <span class="label label-danger"><?= count($resultatMaintenance); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Maintenance</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <?php foreach ($resultatMaintenance as $maintenance) { ?>
                                        <li>
                                            <!-- start message -->
                                            <a href="#">
                                                <h4 style="margin-left: 0px;">
                                                    <?= $maintenance['Prenom'] . ' ' . $maintenance['Nom']; ?>
                                                    <small><i class="fa fa-clock-o"></i>
                                                        <?= date('d/m/Y', strtotime($maintenance['Date'])) ?></small>
                                                </h4>
                                                <p style="margin-left: 0px;">
                                                    <?= substr($maintenance['Description'], 0, 50); ?>...</p>
                                            </a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="footer"><a href="/Maintenance/prevues">Voir la liste des maintenances
                                        prévues</a></li>
                            </ul>
                        </li>
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="/assets/#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="/assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span
                                    class="hidden-xs"><?= $_SESSION['NomUsers'] . " " . $_SESSION['PrenomUsers']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="/Compte/profil" class="btn btn-default btn-flat">Mon profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/logout" class="btn btn-default btn-flat">Déconnexion</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $_SESSION['login']; ?></p>
                        <!-- Status -->
                        <a href="/assets/#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li><a href="/"><i class="fa fa-home"></i> <span>Accueil</span></a></li>
                    <li><a href="/Reparation/add"><i class="fa fa-plus "></i> <span>Reparation</span></a></li>
                    <li><a href="/Pieces/vente/add"><i class="fa fa-plus"></i> <span>Vente</span></a></li>
                    <li><a href="/Maintenance/add"><i class="fa fa-plus"></i> <span>Maintenance</span></a></li>
                    <li><a href="/Pieces/vente/liste"><i class="fa fa-table "></i> <span>Liste des Ventes</span></a>
                    </li>
                    <li><a href="/Reparation/liste"><i class="fa fa-table "></i> <span>Liste des Reparations</span></a>
                    </li>
                    <li><a href="/Maintenance/liste"><i class="fa fa-table"></i> <span> Liste des
                                Maintenances</span></a></li>
                    <li><a href="/Comptabilite/facture-reglee"><i class="fa fa-money"></i> Comptabilité</a></li>
                    <li class="treeview">
                        <a href="/assets/#"><i class="fa fa-link"></i> <span>Gestion du Stock</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/Pieces/liste">Liste des Pièces</a></li>
                        </ul>
                    </li>
                    <?php if ($_SESSION['statut']=='Admin') { ?>
                    <li><a href="/Compte/liste"><i class="fa fa-users"></i> Utilisateurs</a></li>
                    <?php } ?>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content">
                <?= $content; ?>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Harlem Auto Services
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020 <a href="https://www.niangaly.ml">CONCEPTION BY NIANGALY</a>.</strong> All
            rights reserved.
        </footer>
    </div>
    <script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/dist/js/adminlte.min.js"></script>
    <script src="/assets/sweetalert2/sweetalert2.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'print',
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
    </script>
    <script>
    function calculerMontant(piece, prix) {
        $('#montant' + piece).val($('#quantite' + piece).val() * prix);
    }
    </script>
    <script>
    $(function() {
        $('#vente_pieces').on('change', function() {
            var data = $('#vente_pieces').val();
            $('#quantite_piece').html('');

            for (var i = 0; i < data.length; i++) {
                var id = data[i];
                $.get("/Pieces/get-pieces/" + data[i], function(response) {
                    $('#quantite_piece').append('<div class="form-group"><label for="quantite' +
                        response['RefPieces'] + '" class="col-sm-2 control-label">' +
                        response['NomPiece'] +
                        '</label><div class="col-sm-4"><input type="number" class="form-control" id="quantite' +
                        response['RefPieces'] + '" name="quantite[' + response[
                            'RefPieces'] +
                        ']" multiple="multiple" value="0" onkeyup="calculerMontant(' +
                        response['RefPieces'] + ',' + response['Prix'] + ')" max="' +
                        response['QteRestante'] + '"></div><label for="montant' + response[
                            'RefPieces'] +
                        '" class="col-sm-2 control-label">Montant</label><div class="col-sm-4"><input type="number" class="form-control" id="montant' +
                        response['RefPieces'] + '" value="0" readonly></div></div>');
                });
            }
        });
    });
    </script>


        <?php if (!empty($_SESSION['message']) && $_SESSION['message']['number']>0) { ?>
    <script>
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 5000
        });

        Toast.fire({
          type: '<?= $_SESSION['message']['type']; ?>',
          title: '<?= $_SESSION['message']['text']; ?>'
        });
        });
    </script>
    <?php $_SESSION['message']['number']--; } ?>
</body>

</html>