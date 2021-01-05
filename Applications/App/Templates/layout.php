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
  <link rel="stylesheet" href="/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

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
                <span class="label label-danger"><?= $_SESSION['nbre_facture']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Factures impayées</li>
                <li class="footer"><a href="/Comptabilite/facture-non-reglee">Voir la liste des factures impayées</a></li>
              </ul>
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <!-- Tasks Menu -->
            <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-wrench"></i>
              <span class="label label-danger"><?= $_SESSION['nbre_maintenance']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Maintenance</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php foreach ($_SESSION['maintenance_prevu'] as $maintenance) { ?>
                  <li><!-- start message -->
                    <a href="#">
                      <h4 style="margin-left: 0px;">
                        <?= $maintenance['Prenom'].' '.$maintenance['Nom']; ?>
                        <small><i class="fa fa-clock-o"></i> <?= date('d/m/Y',strtotime($maintenance['Date'])) ?></small>
                      </h4>
                      <p style="margin-left: 0px;"><?= substr($maintenance['Description'],0,50); ?>...</p>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </li>
              <li class="footer"><a href="/Maintenance/prevues">Voir la liste des maintenances prévues</a></li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="/assets/#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="/assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?= $_SESSION['NomUsers']." ".$_SESSION['PrenomUsers'];?></span>
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
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="/assets/#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
          <p><?= $_SESSION['login'];?></p>
          <!-- Status -->
          <a href="/assets/#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li ><a href="/"><i class="fa fa-home"></i> <span>Accueil</span></a></li>
        <li><a href="/Reparation/add"><i class="fa fa-plus "></i> <span>Reparation</span></a></li>
        <li><a href="/Pieces/vente/liste"><i class="fa fa-plus "></i> <span>Vente de Pièce</span></a></li>
        <li><a href="/Reparation/liste"><i class="fa fa-table "></i> <span>Liste des  Reparations</span></a></li>
        <li><a href="/Maintenance/add"><i class="fa fa-plus"></i> <span>Maintenance</span></a></li>
        <li><a href="/Maintenance/liste"><i class="fa fa-table"></i> <span> Liste des maintenances</span></a></li>
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
        <li><a href="/Comptabilite/facture-reglee"><i class="fa fa-money"></i> Comptabilité</a></li>
        <li><a href="/Compte/liste"><i class="fa fa-users"></i> Utilisateurs</a></li>
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
    <strong>Copyright &copy; 2020 <a href="https://www.niangaly.ml">CONCEPTION BY NIANGALY</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="/assets/#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="/assets/#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="/assets/javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="/assets/javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
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
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>
<script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/dist/js/adminlte.min.js"></script>
<script src="/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
  $(function(){
    $('#vente_pieces').on('change',function(){
      var data = $('#vente_pieces').val();
      $('#quantite_piece').html('');
      console.log(data);
      for (var i=0;i<data.length;i++) {
        var id = data[i];
        $.get("/Pieces/get-pieces/"+data[i],function(response) {
          $('#quantite_piece').append('<div class="form-group"><label for="quantite'+response['RefPieces']+'" class="col-sm-2 control-label">'+response['NomPiece']+'</label><div class="col-sm-10"><input type="number" class="form-control" id="quantite'+response['RefPieces']+'" name="quantite['+response['RefPieces']+']" multiple="multiple" value="0"></div></div>');
        });
      }
    });
  });
</script>
</body>
</html>