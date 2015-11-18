<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="Everest Admin Panel" />
		<meta name="keywords" content="Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Wrapbootstrap, Bootstrap" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="vista/img/logo.png">
                <title>Intranet | USP</title>
		
		<!-- Bootstrap CSS -->
		<link href="vista/css/bootstrap.css" rel="stylesheet" media="screen">

		<!-- Animate CSS -->
		<link href="vista/css/animate.css" rel="stylesheet" media="screen">

		<!-- Main CSS -->
		<link href="vista/css/main.css" rel="stylesheet" media="screen">

		<!-- Main CSS -->
		<link href="vista/css/login.css" rel="stylesheet">

		<!-- Font Awesome -->
		<link href="vista/fonts/font-awesome.min.css" rel="stylesheet">

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->

	</head>  

	<body>
		<!-- Container Fluid starts -->
		<div class="container-fluid">
                    <div id="contenido" >
			<div class="row">
				<div class="col-md-push-4 col-md-4 col-sm-push-3 col-sm-6 col-sx-12">
					
					<!-- Header end -->
					<div class="login-container">
						<div class="login-wrapper animated flipInY">
							<div id="login" class="show">
								<div class="login-header">
									<h4>Iniciar sesión en su cuenta</h4>
								</div>
								<form  method="POST" action="manager.php?controller=usuario&action=logueo&modo=sis">
                                                                    <div class="form-group has-feedback">
                                                                        <label class="control-label" for="userName">Usuario</label>
                                                                        <input type="text" class="form-control" id="userName" name="txtusuario" placeholder="Nombre Usuario" autofocus>
                                                                        <i class="fa fa-user text-info form-control-feedback"></i>
                                                                    </div>
                                                                    <div class="form-group has-feedback">
                                                                        <label class="control-label" for="passWord">Contraseña</label>
                                                                        <input type="password" class="form-control" id="passWord" name="txtcontra" placeholder="••••••" >
                                                                        <i class="fa fa-key text-danger form-control-feedback"></i>
                                                                    </div>
                                                                    <input type="submit" value="Iniciar Sessión"  class="btn btn-danger btn-lg btn-block"><br>
                                                                    <!--<button value="Iniciar Sessión"  class="btn btn-danger btn-lg btn-block"></button>-->
                                                                    <label id="can_err" class="control-label">
                                                                        <?php
                                                                            if (isset($c_er)) {
                                                                                echo $c_er;
                                                                            }                                                                        
                                                                        ?>                                                                        
                                                                    </label>
                                                                       
								</form>
                                                            <!--<a  href="vista/v_login_recuperar.php"  >¿No puedes acceder a tu cuenta?</a>-->
								<a onclick ="load_div('contenido', 'vista/v_login_recuperar.php')"   href="#register">No puedes accerder atu cuenta  ?</a>
							</div>
						</div>
					</div>
				</div>
			</div>
                    </div>
		</div>
		<!-- Container Fluid ends -->
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="vista/js/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="vista/js/bootstrap.min.js"></script>
                <script src="vista/js/ajax_funciones.js"></script>	
		<script type="text/javascript">
			(function($) {
				// constants
				var SHOW_CLASS = 'show',
					HIDE_CLASS = 'hide',
					ACTIVE_CLASS = 'active';
				
				$('a').on('click', function(e){
					e.preventDefault();
					var a = $(this),
					href = a.attr('href');
				
					$('.active').removeClass(ACTIVE_CLASS);
					a.addClass(ACTIVE_CLASS);

					$('.show')
					.removeClass(SHOW_CLASS)
					.addClass(HIDE_CLASS)
					.hide();
					
					$(href)
					.removeClass(HIDE_CLASS)
					.addClass(SHOW_CLASS)
					.hide()
					.fadeIn(550);
				});
			})(jQuery);
		</script>
	</body>
</html>

