<div class="col-md-push-4 col-md-4 col-sm-push-3 col-sm-6 col-sx-12">
    <div class="login-container">
        <div class="login-wrapper animated flipInY">
            <div id="login" class="show">
                <div class="login-header">
                    <h4>Recuperar Contraseña</h4>
                        </div>
                            <form method="POST" action="manager.php?controller=usuario&action=update_recup&modo=sis">
                                <div class="form-group has-feedback">
                                    <label class="control-label" for="password3">Email</label>
                                    <input type="text" class="form-control" name="txtemail" id="userName" placeholder="Nombre Usuario" autofocus>
                                    <i class="fa fa-envelope text-info form-control-feedback"></i>
                                </div>
                                    <input type="submit" value="Recuperar" class="btn btn-danger btn-lg btn-block">
                         </form>
                               <label id="env_msj" class="control-label">
                                    <?php
                                            if (isset($c_er)) {
                                                echo $c_er;
                                            }                                                                        
                                            ?> 
                                </label>
                                <a href="#" onclick ="load_div('contenido','index.php')"><span class="text-danger">Iniciar Sessión</span></a>					
                </div>
        </div>
    </div>
</div>