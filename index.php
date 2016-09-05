
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inicio | Lista Blanca</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="admin/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin/css/font-awesome.min.css">
  <link rel="stylesheet" href="admin/css/AdminLTE.min.css">
  <link rel="stylesheet" href="admin/css/_all-skins.min.css">
  <link rel="stylesheet" href="css/estilos.css">
 

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="http://localhost/lista.html/" title="Inicio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>idro</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Hidrocaribe</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-sign-in"></i></a>
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
<!--      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista Blanca
        <small></small>
      </h1>
    </section>
        
    <!-- Main content -->
    <section class="content" id="contenido">
        <!-- inicio -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
<!--                        <div class="box-tools">
                            <div style="width: 150px;" class="input-group input-group-sm">
                                <input type="text" placeholder="Search" class="form-control pull-right" name="table_search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    <!-- /.box-header -->
                    <div id="lista" class="box-body table-responsive no-padding">
                        <div class="container">
                        <div class = "jumbotron">
                            <h1>Bienvenidos!</h1>
                            <p>En este espacio encontrará las páginas web permitas, <br>las cuales podrá acceder desde el menú lateral izquierdo.</p>
<!--                            <h6>Para sugerir la incorporación de una nueva P&aacute;gina Web el
                                    <strong>Coordinador o Superintendente del departamento</strong>, debe solicitarla mediante un correo a Gerencia a travéz del
                                <a href="http://www.hidrocaribe.com.ve" target="_blank">Zimbra</a></h6>-->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#infModal"><i class="fa fa-exclamation  fa-lg"  style="font-size:30px; vertical-align: middle;"></i> Sugiere una nueva URL!</button>
                                <div id="infModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Sugiere una nueva URL!</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-justify">Para sugerir la incorporación de una nueva P&aacute;gina Web a la Lista Blanca el
                                    <strong>Coordinador o Superintendente</strong> del departamento, debe solicitarla mediante un correo a Gerencia a travéz del
                                    <a href="http://www.hidrocaribe.com.ve" target="_blank">Zimbra</a></p>
                                                <p class="text-justify">Una vez aprobada dicha solicitud, la Gerencia emitirá la aprobación a la Coord. de Tecnología de Información</p>
                                            </div>

<!--                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                         </div>
                        </div>
                    </div>
                  <!-- /.box-body -->
                </div>
              <!-- /.box -->
            </div>
      </div>
        <!-- fin -->
    </section>
    
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <!--<div class="container" id="container"></div>-->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
      <strong>Copyright &copy; <?php date('Y')?> <a target="blank" href="http://www.hidrocaribe.gob.ve">C.A. Hidrol&oacute;gica del Caribe</a>.</strong> Todos los derechos reservados.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="admin/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="admin/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/principal.js"></script>
</body>
</html>
