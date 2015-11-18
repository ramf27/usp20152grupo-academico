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
    $contra=$_SESSION['contra'];
   $sistema = $_SESSION['sistema'];
        $foto=$_SESSION['foto'];
    ?>

    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="box box-primary">
            <div class="box-header with-border" style="text-align:center">
                <h3 class="box-title"  >Modificar Usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" method="POST" action="../manager.php?controller=usuario&action=update_usuario&modo=sis">
                <center>
                    <div class="box-body col-sm-2"></div>
                    <div class="box-body col-sm-8">
                        <div class="form-group">
                            <img class="profile-user-img img-responsive img-circle" src="<?php if($foto!=""){ echo '../Vista/'.$foto ; ?>"  alt="User profile picture"> <?php  }else{ ?>
                                     ../Vista/img/x.png"  alt="User profile picture">
                                <?php } ?>
                                
                            <h3 class="profile-username text-center"><?php echo $nombres . ' ' . $apellidos ?></h3>
                            <p class="text-muted text-center"><?php echo $cargo; ?></p>
                        </div>	
                        <table>
                            <tr>
                                <td >
                                    <center>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-university" style="width:10px"></i>
                                        </div>
                                        <?php if ($sistema==2) { ?>
                                           
                                        <input type="text" value="<?php echo $escuela; ?>" class=" form-control text"  readonly aria-describedby="basic-addon1">
                                 
                                    <?php } else{ ?>
                                        <span class="input-group-addon" id="basic-addon1" style="width:140px">Escuela</span>
                                        <input type="text" value="<?php echo $escuela; ?>" class=" form-control text"  readonly aria-describedby="basic-addon1">
                                     <?php } ?>
                                    </div>
                                    </center>
                                    <div style="height:5px"></div>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope" style="width:10px"></i>
                                        </div>
                                        <span class="input-group-addon" id="basic-addon1" style="width:140px">Correo Electronico</span>
                                        <input type="text" value="<?php echo $correo; ?>" class=" form-control text"  readonly aria-describedby="basic-addon1">
                                    </div>
                                    <div style="height:5px"></div>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user" style="width:10px"></i>
                                        </div>
                                        <span class="input-group-addon" id="basic-addon1" style="width:140px">Usuario</span>
                                        <input type="text" value="<?php echo $usuario; ?>" class=" form-control text" readonly aria-describedby="basic-addon1">
                                    </div>
                                    <div style="height:5px"></div>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key" style="width:10px"></i>
                                        </div>
                                        <span class="input-group-addon" id="basic-addon1" style="width:140px">Contraseña Actual</span>
                                        <input type="text" 
                                               <?php if($contra!=''){
                                                   ?> value="<?php   echo $contra;  ?>"
                                               <?php }?>
                                               class=" form-control text"  name="txtcontra" placeholder="Ingrese Contraseña" aria-describedby="basic-addon1">
                                    </div>
                                    <div style="height:5px"></div>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key" style="width:10px"></i>
                                        </div>
                                        <span class="input-group-addon" id="basic-addon1" style="width:140px">Contraseña Nueva</span>
                                        <input  type="text" class=" form-control text"  name="txtcontran" placeholder="Ingrese Contraseña" aria-describedby="basic-addon1"  >
                                    </div>
                                    <div style="height:5px"></div>
                                </td>

                            </tr>
                           
                        </table>
                    </div>
                    <div class="box-body"></div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <center>
                            <table style="border-spacing:20px 0px;; border-collapse: separate">
                                <tr>
                                    <td>
                                        
                                        <button type="submit" class="btn btn-primary" style="width:130px">Modificar<i class="fa fa-edit" style="float:right;margin: 5px 0px"></i></button>
                                        
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#myModal"class="btn btn-primary" style="width:130px">Limpiar<i class="fa fa-edit" style="float:right;margin: 5px 0px"></i></button>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </div>
                </center>
            </form>

        </div>
    </div>
    </div>	
    <div class="col-sm-2"></div>
    <?php
    $_SESSION['contra']="";
} else {
    header('Location:../index.php');
}
?>

<script>
    $('#content-wrapper').css('min-height', '800px');
</script>