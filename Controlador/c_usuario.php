<?php

session_start();
class UsuarioControler{

    function logueo(){ 
        
        if($_POST){
           require ('Modelo/m_usuario.php');
        $usuario = new UsuarioModel();
            $usuario->setUsuario($_POST['txtusuario']);
            $usuario->setContra($_POST['txtcontra']);
            $usuario->select();
            if( $usuario->getError()!="OK"){
                $c_er=$usuario->getError();
               
                require('index.php');   
            }else{
                $_SESSION['idusuario'] =$usuario->getIdusuario();
                $_SESSION['nombres'] =$usuario->getNombre();
                $_SESSION['apellidos'] =$usuario->getApellido();
                $_SESSION['escuela'] =$usuario->getEscuela();
                $_SESSION['cargo'] =$usuario->getCargo();
                $_SESSION['correo'] =$usuario->getCorreo(); 
                $_SESSION['usuario'] =$usuario->getUsuario();
                $_SESSION['sistema'] =$usuario->getSistema();
                $_SESSION['idescu'] =$usuario->getIdescu();
                $_SESSION['foto'] =$usuario->getFoto();
                $_SESSION['table']='';
                $_SESSION['ruta'] ='';
                $_SESSION['tablemo']='';
                $_SESSION['contra']="";
                header('Location: Sistemas/menu.php');
                        
            }
        }else{     
           require('index.php');      
        }
    }
    
     function update_recup(){    
        if($_POST){
           require ('Modelo/m_usuario.php');
            $usuario = new UsuarioModel();
            $usuario->setCorreo($_POST['txtemail']);
            $usuario->update_recup();
            if( $usuario->getContador()==0){
                $c_er=$usuario->getError();
               require('index.php');  
            }else{
                $c_er=$usuario->getError();
                require('index.php');   
            }
        }else{     
           require('index.php');      
        }
    }
    function update_usuario(){    
        if($_POST){
           require ('Modelo/m_usuario.php');
            $usuario = new UsuarioModel();
            $usuario->setContra($_POST['txtcontra']);
            $usuario->setContran($_POST['txtcontran']);
             $usuario->setIdusuario($_SESSION['idusuario']);             
            $usuario->update_usuario();
            $_SESSION['contra']=$usuario->getContra();
                $c_er=$usuario->getError();               
              $_SESSION['ruta']='../Vista/v_usuario_modificar.php';
            echo "<script>";
               echo "alert('$c_er')";               
                echo "</script>";
                
                 echo "<script>";
               echo "document.location.href='Sistemas/menu.php'";               
                echo "</script>";
        }else{     
           require('index.php');      
        }
    }
    
    function cerrar_sesion(){
        
	session_start();
	unset($_SESSION['idUsuario']);
	header('Location: ../index.php'); 

    }
    
    
    
    
    
    
    
}


?>