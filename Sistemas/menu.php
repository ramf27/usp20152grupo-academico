<?php
session_start();
if (isset($_SESSION['idusuario'])) {
    
    $idusuario = $_SESSION['idusuario'];
    $nombres = $_SESSION['nombres'];
    $apellidos = $_SESSION['apellidos'];
    $escuela = $_SESSION['escuela'];
    $cargo = $_SESSION['cargo'];
    $correo = $_SESSION['correo'];
    $usuario = $_SESSION['usuario'];
    $sistema = $_SESSION['sistema'];
    $ruta=$_SESSION['ruta'];
    $foto=$_SESSION['foto'];
    
    ?>
     <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="shortcut icon" href="../vista/img/logo.png">
            <title>Intranet | USP</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

            <!-- PARTE DEL TRABAJO-->
            <!-- Bootstrap 3.3.5 -->
            <link rel="stylesheet" href="../vista/css/bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="../vista/css/font-awesome.min.css">
            <!-- Ionicons -->
            <link rel="stylesheet" href="../vista/css/ionicons.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="../vista/css/AdminLTE.css">
            <!-- AdminLTE Skins. Choose a skin from the css/skins
                 folder instead of downloading all of them to reduce the load. -->
            <link rel="stylesheet" href="../vista/css/skins/_all-skins.min.css">
              <!-- DataTableBoostrap -->
            <link rel="stylesheet" href="../vista/css/dataTables.bootstrap.css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>
        <body class="hold-transition skin-blue sidebar-mini">
            <div class="wrapper">

                <header class="main-header">
                    <!-- Logo -->
                    <a href="menu.php" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"><b>A</b>LT</span>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg"><b>Intranet</b> | USP</span>
                    </a>
                    <!-- Header Navbar: style can be found in header.less -->
                    <nav class="navbar navbar-static-top" role="navigation">
                        <!-- Sidebar toggle button-->
                        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!-- User Account: style can be found in dropdown.less -->
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?php if($foto!=""){ echo '../Vista/'.$foto ; ?>"class="user-image" alt="User Image" >  <?php  }else{ ?>
                                            ../vista/img/x.png" class="user-image" alt="User Image" >
                                       <?php } ?>
                                        <span class="hidden-xs"><?php echo $nombres.' '.$apellidos; ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- User image -->
                                        <li class="user-header">
                                            <img src="<?php if($foto!=""){ echo '../Vista/'.$foto ; ?>"class="img-circle" alt="User Image" > <?php  }else{ ?>
                                            ../vista/img/x.png" class="img-circle" alt="User Image" >
                                       <?php } ?>
                                            <p>
                                                <?php echo $nombres; ?>
                                                <small><?php echo date('l jS \of F Y h:i:s A'); ?></small>
                                            </p>
                                        </li>
                                        <!-- Menu Body -->
                                        <li class="user-body">
                                            <a href="#" onclick ="load_div('contenido', '../vista/v_usuario_modificar.php')" class="btn btn-default btn-flat">Modificar Perfil</a>
                                        </li>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <!--<div class="pull-left">
                                              <a href="#" onclick ="load_div('contenido', '../vista/v_usuario_modificar.php')" class="btn btn-default btn-flat">Modificar Perfil</a>
                                            </div>-->
                                            <!--<div class="pull-center">
                                            </div>-->
                                        <center><a href="../Controlador/logout.php" ><i class="fa fa-power-off btn btn-default btn-flat" style="width:100px"></i></a></center>
                                              <!--<center><a method="POST" action="../manager.php?controller=usuario&action=cerrar_sesion" ><i class="fa fa-power-off btn btn-default btn-flat" style="width:100px"></i></a></center>-->
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
                        <!-- Sidebar user panel -->
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="<?php if($foto!=""){ echo '../Vista/'.$foto ; ?>" class="img-circle" alt="User Image">> <?php  }else{ ?>
                                     ../vista/img/x.png" class="img-circle" alt="User Image">
                                <?php } ?>
                                
                            </div>
                            <div class="pull-left info">
                                <p><?php echo $nombres ?></p>
                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                        </div>
                        <ul class="sidebar-menu">
                            <li class="header">MENÚ NAVEGACIÓN</li>
                            
                            <?php if($sistema==3 or $cargo=="Administrador")  {
                                if($cargo=="Administrador"){
                               ?>
                            
                           <li class="active treeview">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> <span>Persona</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Persona</a></li>
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Alumno</a></li>
                                    <li class="active"><a  href="#" onclick ="load_div('contenido', 'sis_matr_nota/Vista/v_apoderado.php')"><i class="fa fa-circle-o"></i>Registrar Apoderado</a></li>
                                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Asignar Tipo Medio</a></li>
                                </ul>
                            </li>
                            <?php  }if($cargo=="Secretaria de escuela"){?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Matricula</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>Registrar Matricula</a></li>
                                                                        <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Asignar Matricula-Asig.</a></li>
                                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i>Registrar Convalidacion</a></li>
                                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i>Asignar Convalidacion-Asig.</a></li>
                                </ul>
                            </li>
                              <?php } if($cargo=="Docente"){?>
                            <li>
                                <a href="pages/widgets.html">
                                    <i class="fa fa-th"></i> <span>Docente</span><i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Registrar Formula</a></li>
                                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Registrar Registrrar Temario</a></li>
                                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i>Registrar Notas</a></li>
                                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Registrar Asistencia</a></li>
                                </ul>
                            </li>
                             <?php } if($cargo=="Estudiante"){?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Alumno</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i>Notas</a></li>
                                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i>Asistencias</a></li>
                                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i>Horario Clases</a></li>
                                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i>Kardex Notas</a></li>
                                </ul>
                            </li>
                             <?php } if($cargo=="Administrador"){?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>M. Notas-Matricula</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i>Registrar Categoria</a></li>
                                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i>Registrar Parametro</a></li>
                                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Registrar Tipo Medio</a></li>
                                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Registrar Tipo Documento</a></li>
                                </ul>
                            </li>
                          
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Reportes</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                   
                                </ul>
                            </li>
                            
                            <?php
                            }
                            $nomsis="Matricula Nota";
                            }
                             if($sistema==1){
                                $nomsis="Carga Lectiva - Horario";
                                
                             if($cargo=="Administrador"){
                            ?>
                            <!-- /.carga lectiva-horario -->
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Filial-Escuela</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#" onclick ="load_div('contenido', 'sis_carga_horario/Vista/v_filial.php')"><i class="fa fa-circle-o"></i>Registrar Filial</a></li>
                                    <li><a href="#" onclick ="load_div('contenido', 'sis_carga_horario/Vista/v_facultad.php')"><i class="fa fa-circle-o"></i>Registrar Facultad</a></li>
                                    <li><a href="#" onclick ="load_div('contenido', 'sis_carga_horario/Vista/v_escuela.php')"><i class="fa fa-circle-o"></i>Registrar Escuela</a></li>
                                    <li><a href="#" onclick ="load_div('contenido', 'sis_carga_horario/Vista/v_asigfiliescu.php')"><i class="fa fa-circle-o"></i>Asignar Filial-Escuela</a></li>
                                </ul>
                            </li>
                            <?php
                             }
                             else{
                            ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Plan de Estudios</span><i class="fa fa-angle-left pull-right"></i>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a onclick ="load_div('contenido', 'sis_carga_horario/Vista/v_asignatura.php')"><i class="fa fa-circle-o"></i>Registrar Asignatura</a></li>
                                    <li><a href="#" onclick ="load_div('contenido', 'sis_carga_horario/Vista/v_plandeestudio.php')"><i class="fa fa-circle-o"></i>Registrar Plan de Estudios</a></li>
                                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i>Registrar Selectivo</a></li>
                                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i>Registrar Sumilla</a></li>
                                    <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Asignar Plan-Asignatura</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Carga Lectiva</span><i class="fa fa-angle-left pull-right"></i>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>Registrar Carga Lectiva</a></li>
                                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>Ver Carga x Docente</a></li>
                                </ul>
                            </li>
                             <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Docente</span><i class="fa fa-angle-left pull-right"></i>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>Horario Docente</a></li>
                                </ul>
                            </li>
                             <?php
                                    }
                                   ?> 
                             <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>M. Carga-Horario</span><i class="fa fa-angle-left pull-right"></i>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php
                                     if($cargo=="Administrador"){
                                    ?>
                                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>Registrar Ciclo</a></li>
                                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>Registrar Semestre</a></li>
                                    <?php
                                    }
                                   else{
                                   ?>                   
                                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>Registrar Grupo</a></li>
                                   <?php }?>
                                 </ul>
                            </li>
                            <?php
                                    
                                    if($cargo=="Administrador"){
                            ?>
                             <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Locaciones</span><i class="fa fa-angle-left pull-right"></i>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>Registrar Locacion</a></li>
                                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>Registrar Tipo Locacion</a></li>
                                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>Asignarcion Aula</a></li>
                                </ul>
                            </li>
                               <?php
                                    } else{
                            ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Horario</span><i class="fa fa-angle-left pull-right"></i>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>Registrar Horario x Ciclo</a></li>
                                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i>Ver Horario x Ciclo</a></li>
                                 </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Reportes</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                                    <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                                    <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                                  
                                </ul>
                            </li>
                            
                             <?php }
                             
                                    }
                               if($sistema==2 or $cargo=="Administrador")  {
                                 $nomsis="Tesoreria";
                                 if($cargo=="Cajero"){
                            ?>
                            <li class="active treeview">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> <span>Ingreso</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Ingreso</a></li>
                                  </ul>
                            </li>                           
                            <?php
                                 }
                              if($cargo=="Asistente de area"){
                            ?>
                            <li class="active treeview">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> <span>Egreso</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Egreso</a></li>
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Compromiso Egreso</a></li>
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Pago Egreso</a></li>
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Adelanto</a></li>
                                  
                                </ul>
                            </li> 
                           <li class=" treeview">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> <span>Producto</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Producto</a></li>
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Tipo Producto</a></li>
                                </ul>
                            </li> 
                            <li class=" treeview">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> <span>Proveedor</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Proveedor</a></li>
                                </ul>
                            </li> 
                            <?php
                                 }
                              if($cargo=="Jefe de Area"){
                            ?>
                            <li class="active treeview">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> <span>Movimiento Caja</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Verificar Mov. Caja</a></li>
                               </ul>
                            </li>
                            <li class=" treeview">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Reporte</a></li>
                               </ul>
                            </li>
                            <?php
                                 }
                              if($cargo=="Administrador"){
                                    $nomsis="Administrador";
                            ?>
                            <li class=" treeview">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> <span>Pago</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    
                                     <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Tarifa Pension</a></li>
                                     <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Modalidad de Pago</a></li>
                                     <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Tipo Pago</a></li>
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Moneda</a></li>
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Comprobante</a></li>
                      
                                 </ul>
                            </li>
                            
                            <li class=" treeview">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> <span>M. Tesoreria</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Concepto</a></li>
                                     <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Tipo Concepto</a></li>
                                     <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Caja</a></li>
                                     <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Tipo Movimiento</a></li>
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Cargo</a></li>
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Area</a></li>
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Empleado</a></li>
                                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Registrar Contrato</a></li>
                                 </ul>
                            </li>
                            
                                 <?php  }
                            
                                 }   ?>
                        </ul>
                    </section>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div id='content-wrapper' class="content-wrapper" >
                    <!-- Main content -->
                    <section class="content" >
                        <div id="contenido"  >
                            &nbsp;
                            <?php  
                            echo "Bienvenidos al Sistema de ".$nomsis;
                            ?>
                        </div>
                    </section><!-- /.content -->
                   
                </div><!-- /.content-wrapper -->
                <div style="clear: both;"></div>
                <footer class="main-footer">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 1.0
                    </div>
                    <strong>Copyright &copy; 2015</strong> Autor: RWRAGM
                </footer>

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    
                </aside><!-- /.control-sidebar -->
            </div><!-- ./wrapper -->
            <table>
                <!-- Modal dialog -->
                <tr><td>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">		
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel"></h4>
                                    </div>
                                    <!-- Modal body: aqui se mostraran las ventanas emergentes -->
                                    <center><div id="modal_body" class="modal-body"></div></center>	
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
                                    </div>		  
                                </div>		
                            </div>
                        </div>
                    </td>
                </tr>                         
            </table>
            <!-- PARTE DEL TRABAJO-->
            <!-- jQuery 2.1.4 -->
            <script src="../vista/js/jQuery-2.1.4.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                                                $.widget.bridge('uibutton', $.ui.button);
            </script>
            <!-- Bootstrap 3.3.5 -->
            <script src="../vista/js/bootstrap.min.js"></script>
            <!-- PARTE DEL TRABAJO-->
            <script src="../vista/js/app.min.js"></script>
           
            <!-- AdminLTE for demo purposes -->
            <script src="../vista/js/demo.js"></script>
            
            <script src="../Vista/js/jquery.dataTables.js"></script>
            <script src="../Vista/js/dataTables.bootstrap.js"></script>
            <!-- -->
            <script src="../vista/js/ajax_funciones.js"></script>
        </body>
    </html>
    <?php
        if ($ruta!='') {
            echo "<script>";
//          echo " load_div('contenido', '../Vista/v_usuario_modificar.php');";   
            echo " load_div('contenido', '$ruta');";   
            echo "</script>";
        }
     $_SESSION['ruta']="";
    
} else {
    header('Location:../index.php');
}
?>

    