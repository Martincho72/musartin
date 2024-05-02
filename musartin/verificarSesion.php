<?php
if(!session_start()){
    header('Location:iniciarSesion.html')
} else{
$_SESSION['usuario']=$_REQUEST['usuario'];
$_SESSION['pwd']=$_REQUEST['clave'];
header('Location:index.html')
}

?>