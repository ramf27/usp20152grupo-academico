<?php
require ('BD/conexion.php');
 require 'phpmailer/PHPMailerAutoload.php';
    include("phpmailer/class.smtp.php");
    include("phpmailer/class.phpmailer.php");
class UsuarioModel{
    
  
    public $usuario,$contra,$link,$cont,$cont1,$sistema,$cargo,$correo,$nombres,$apellidos,$escuela,$merror;
    public $idusuario,$cerror,$condi,$tiem,$contran,$rol,$foto,$idescu;
    
    function __construct() {
        $this->link= new conexion();     
    }
  
    public function getIdusuario(){return $this->idusuario;}
    public function setIdusuario($idusuario){$this->idusuario = $idusuario;}  
    
    public function getIdescu(){return $this->idescu;}
    public function setIdescu($idescu){$this->idescu = $idescu;}  
    
    public function getUsuario(){return $this->usuario;}
    public function setUsuario($usuario){$this->usuario = $usuario;}    
    
    public function getContra(){return $this->contra;}
    public function setContra($contra){$this->contra=$contra;}
    
     public function getContran(){return $this->contran;}
    public function setContran($contran){$this->contran=$contran;}
    
    public function getSistema(){return $this->sistema;}
    public function setSistema($sistema){$this->sistema=$sistema;}
    
    public function getCargo(){return $this->cargo;}
    public function setCargo($cargo){$this->cargo=$cargo;}
    
    public function getCorreo(){return $this->correo;}
    public function setCorreo($correo){$this->correo=$correo;}
    
     public function getNombre(){return $this->nombres;}
    public function setNombre($nombres){$this->nombres=$nombres;}
    
     public function getApellido(){return $this->apellidos;}
    public function setApellido($apellidos){$this->apellidos=$apellidos;}
    
     public function getEscuela(){return $this->escuela;}
    public function setEscuela($escuela){$this->escuela=$escuela;}
    
    public function getError(){return $this->merror;}
    public function setError($merror){$this->merror=$merror;}
    
   public function getFoto(){return $this->foto;}
    public function setFoto($foto){$this->foto=$foto;}
    
    public function getContador(){return $this->cont;}
    
    public function select(){
        $sql = "SELECT * FROM acad_seg_usuario WHERE usua_nombre= '$this->usuario' ";
        $logueo = $this->link->select($sql);
         $this->merror="OK";
        foreach ($logueo as $data){     
            $this->idusuario=$data["usua_codigo"];
            $this->cerror=$data['usua_intentos'];
            $this->condi=$data['usua_condicion'];
            $this->cont= count($data);  
        }
        if ($this->cont>0) {
           $sql2 = "select   acad_seg_usuario.usua_codigo ,
                    acad_seg_usuario.usua_nombre,acad_seg_rol.rol_codigo
                    from  acad_seg_usuario
                    inner join acad_seg_permiso on acad_seg_permiso.usua_codigo=acad_seg_usuario.usua_codigo
                    inner join acad_seg_sistema on acad_seg_sistema.sist_codigo=acad_seg_permiso.sist_codigo
                    inner join acad_seg_rol on acad_seg_rol.rol_codigo=acad_seg_permiso.rol_codigo
                      where acad_seg_usuario.usua_nombre='$this->usuario'  
                    and acad_seg_usuario.usua_password='$this->contra'
                     and acad_seg_usuario.usua_condicion='1'";
            $logueo2 = $this->link->select($sql2);             
            foreach ($logueo2 as $data2){     
                $this->rol=$data2["rol_codigo"];               
                $this->cont1= count($data2);  
            }
             if ($this->cont1==0) {
                 $canti=  $this->cerror+1;
                 if ($canti<3) {
                    $this->merror="Error  en la contraseña, cantidad de intentos ".$canti;
                    $sql= "UPDATE acad_seg_usuario SET usua_intentos='$canti'  WHERE usua_codigo='$this->idusuario' ";
                    $logueo = $this->link->execute($sql);
                 }          
                 else{
                    $this->merror="Tu cuenta a sido Bloqueda";
                    if ($canti==3)
                    {
                    $sql = "UPDATE acad_seg_usuario SET usua_intentos='$canti',usua_condicion='0',usua_fechbloq=now() WHERE usua_codigo='$this->idusuario' ";
                    $logueo = $this->link->execute($sql);
                    }
                    else{
                    $sql = "SELECT TIMESTAMPDIFF(MINUTE,usua_fechbloq,now()) as tiempo FROM `acad_seg_usuario` WHERE usua_codigo='$this->idusuario' ";
                    $logueo = $this->link->select($sql);
                        foreach ($logueo as $data1){
                            $this->tiem=$data1["tiempo"];
                        }
                        if( $this->tiem>=1){
                            $sql = "UPDATE acad_seg_usuario SET usua_intentos='0',usua_condicion='1' WHERE usua_codigo='$this->idusuario' ";
                            $logueo = $this->link->execute($sql);
                        }
                    }
                 }    
            }
            else
            {
                 if ($this->rol == '1') {
                     $sql1 = "select acad_matr_persona.pers_nombres as Nombres,
                      CONCAT(acad_matr_persona.pers_apepaterno,' ', acad_matr_persona.pers_apematerno) as Apellidos
                      ,
                      acad_matr_detperstipomedio.dptm_descripcion as Correo,                     
                      acad_seg_usuario.usua_codigo ,
                      acad_seg_usuario.usua_nombre ,
                      acad_seg_sistema.sist_codigo,
                      acad_matr_persona.pers_foto
                      from  acad_matr_persona
                      inner join acad_seg_usuario on acad_seg_usuario.pers_codigo = acad_matr_persona.pers_codigo
                      inner join acad_matr_detperstipomedio on acad_matr_detperstipomedio.pers_codigo = acad_matr_persona.pers_codigo
                      inner join acad_matr_tipomedio on acad_matr_tipomedio.time_codigo = acad_matr_detperstipomedio.time_codigo                     
                      inner join acad_seg_permiso on acad_seg_permiso.usua_codigo=acad_seg_usuario.usua_codigo
                      inner join acad_seg_sistema on acad_seg_sistema.sist_codigo=acad_seg_permiso.sist_codigo
                      inner join acad_seg_rol on acad_seg_rol.rol_codigo=acad_seg_permiso.rol_codigo
                      where acad_matr_tipomedio.time_codigo='6' and acad_seg_usuario.usua_nombre='$this->usuario'  
                      and acad_seg_usuario.usua_password='$this->contra' and acad_seg_rol.rol_codigo=1
                       and acad_seg_usuario.usua_condicion='1'";
                      $logueo1 = $this->link->select($sql1);
                      foreach ($logueo1 as $data1){
                        $this->usuario=$data1["usua_nombre"];
                         $this->correo=$data1['Correo'];
                         $this->nombres=$data1['Nombres'];
                         $this->apellidos=$data1['Apellidos'];
                      $this->sistema=$data1['sist_codigo'];
                      $this->foto=$data1['pers_foto'];
//                        $this->cont1= count($data1);  
                      }
                       $this->cargo="Estudiante";
                 }else{
                    $sql1 = "select acad_matr_persona.pers_nombres as Nombres,
                      CONCAT(acad_matr_persona.pers_apepaterno,' ', acad_matr_persona.pers_apematerno) as Apellidos
                      ,
                      acad_matr_detperstipomedio.dptm_descripcion as Correo,
                      acad_cgl_escuela.escu_nombre as Escuela,
                      acad_tes_cargo.car_descripcion as Cargo, 
                      acad_seg_usuario.usua_codigo ,
                      acad_seg_usuario.usua_nombre ,
                      acad_cgl_escuela.escu_codigo,
                      acad_seg_sistema.sist_codigo,
                      acad_matr_persona.pers_foto
                      from acad_tes_contrato
                      inner join acad_tes_empleado on acad_tes_empleado.emp_codigo = acad_tes_contrato.emp_codigo
                      inner join acad_matr_persona on acad_matr_persona.pers_codigo = acad_tes_empleado.pers_codigo
                      inner join acad_seg_usuario on acad_seg_usuario.pers_codigo = acad_matr_persona.pers_codigo
                      inner join acad_matr_detperstipomedio on acad_matr_detperstipomedio.pers_codigo = acad_matr_persona.pers_codigo
                      inner join acad_matr_tipomedio on acad_matr_tipomedio.time_codigo = acad_matr_detperstipomedio.time_codigo
                      inner join acad_cgl_escuela on acad_cgl_escuela.escu_codigo = acad_tes_contrato.escu_codigo
                      inner join acad_tes_cargo on acad_tes_cargo.car_codigo = acad_tes_contrato.car_codigo 
                      inner join acad_seg_permiso on acad_seg_permiso.usua_codigo=acad_seg_usuario.usua_codigo
                      inner join acad_seg_sistema on acad_seg_sistema.sist_codigo=acad_seg_permiso.sist_codigo 
                      where acad_matr_tipomedio.time_codigo='6' and acad_seg_usuario.usua_nombre='$this->usuario'  
                      and acad_seg_usuario.usua_password='$this->contra'
                       and acad_seg_usuario.usua_condicion='1'";
                      $logueo1 = $this->link->select($sql1);
                      foreach ($logueo1 as $data1){
                        $this->usuario=$data1["usua_nombre"];
                         $this->correo=$data1['Correo'];
                        $this->cargo=$data1['Cargo']; 
                         $this->escuela=$data1['Escuela']; 
                         $this->idescu=$data1['escu_codigo']; 
                         $this->nombres=$data1['Nombres'];
                         $this->apellidos=$data1['Apellidos'];
                        $this->sistema=$data1['sist_codigo'];
                        $this->foto=$data1['pers_foto'];
//                        $this->cont1= count($data1);  
                      }
                 }
                 $sql = "UPDATE acad_seg_usuario SET usua_intentos='0',usua_condicion='1' WHERE usua_codigo='$this->idusuario' ";
                  $logueo = $this->link->execute($sql);
            }
                       
        }
        else{
              $this->merror="Error  En el Usuario";
        }
        
    }
    
    
    public function update_usuario(){         
        
        $sql = "SELECT * FROM acad_seg_usuario WHERE usua_password= '$this->contra'"
                . " and usua_codigo='$this->idusuario'";
         $logueo = $this->link->select($sql);
        $this->merror="OK";
        foreach ($logueo as $data){                  
            $this->cont= count($data);  
        }
        if ($this->cont>0) {
            if (strlen($this->contran)>=4) {
                 $sql = "UPDATE acad_seg_usuario SET usua_password = '$this->contran' "
                         . "WHERE usua_codigo = '$this->idusuario';";
                $logueo = $this->link->execute($sql);
                 $this->merror="Contraseña Cambiada";
                 $this->contra="";
            }else{
                 $this->merror="Error La contraseña nueva debe tener 6 caracteres o mas";
            }
            
        }else
        {
             $this->merror="Error Ingrese Su contraseña Correcta";
             $this->contra="";
        }
          
    }
    
    public function update_recup(){
        $sql = "SELECT usua_codigo FROM acad_seg_usuario u
                        INNER JOIN acad_matr_persona p ON u.pers_codigo = p.pers_codigo
                        INNER JOIN acad_matr_detperstipomedio d ON p.pers_codigo = d.pers_codigo
                        WHERE d.time_codigo = 6 AND d.dptm_descripcion = '$this->correo';";
        $logueo = $this->link->select($sql);
        foreach ($logueo as $data){    
             $this->idusuario=$data["usua_codigo"];
            $this->cont= count($data);  
        }
        if ($this->cont==0) {
            $this->merror="Error Correo Invalido";
        }  else {
            //AYALA 
            $this->merror="";
            $clave = "";
            $aleatorio = "";
            for ($i = 0; $i < 10; $i++) {
                $aleatorio = rand(0, 1) ? chr(rand(97, 122)) : chr(rand(65, 90));
                $clave .= $aleatorio;
            }
                $mail = new PHPMailer();
                $mail->SMTPSecure = 'tls';
                $mail->Username = "academicousp_electivoII@hotmail.com";
                $mail->Password = "electivoII2015";
                $mail->AddAddress($this->correo);
                $mail->FromName = "Academico";
                $mail->Subject = "Recuperar contraseña";
                $mail->Body = "Tu nueva contraseña es: " . $clave;
                $mail->Host = "smtp.live.com";
                $mail->Port = 587;
                $mail->IsSMTP();
                $mail->SMTPAuth = true;  
                $mail->From = $mail->Username;
                $mail->Send();                
                $sql = "UPDATE acad_seg_usuario SET usua_password = '$clave' WHERE usua_codigo = '$this->idusuario';";
                $logueo = $this->link->execute($sql);
                 $this->merror="Mensaje Enviado Correctamente";
        }
    }
    
    
     
    
    public function update_bloq(){
        $sql = "select * from usuario where usuario='$this->usuario' and contra='$this->contra';";
        $this->link->select($sql);
    }
    
    
}
?>
