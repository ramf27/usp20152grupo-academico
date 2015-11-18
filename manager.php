<?php
$controller = $_GET['controller'];
$action = $_GET['action'];
$modo = $_GET['modo'];
if ($modo=="sis_carga_horario") {
    $controllerfile='Sistemas/sis_carga_horario/Controlador/c_'.$controller.'.php';
}
else{
   if ($modo=="sis_matr_nota") {
    $controllerfile='Sistemas/sis_matr_nota/Controlador/c_'.$controller.'.php';
    }
    else{  
        if ($modo=="sis_tesoreria") {
            $controllerfile='Sistemas/sis_tesoreria/Controlador/c_'.$controller.'.php';
        }
        else{
            $controllerfile='Controlador/c_'.$controller.'.php';
        }
    }
}

if(is_file($controllerfile)){
    require_once $controllerfile;
    
}else{
    die('Controller Error. 404 not found');
}
$controllerc=$controller.'Controler';
$control=new $controllerc();
$control->$action();

//if(is_callable($action)){
//    $action();
//}else{
//    die('Action Error. 404 not found');
//}
?>


