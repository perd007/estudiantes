<?php require_once('Connections/conexion.php'); ?>
<?php
if($validacion==true){
	if($eli==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Eliminaciones'); location.href='principal.php' </script>";
 exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido'); location.href='principal.php' </script>";
 exit;
 }
?>
<?php

//recibimos los datos
$id=$_GET["id"];
$cedula=$_GET["cedula"];

if($_GET["link2"]=="link1116"){
$rut="link2";
}else{
$rut="link21&id=$id";
}

//eliminamos el alumno


mysql_select_db($database_conexion, $conexion);
$sql="delete  FROM alumno where id='$id' and cedula='$cedula'";
$verificar=mysql_query($sql,$conexion) or die(mysql_error());

if($verificar){
	echo"<script type=\"text/javascript\">alert ('Datos Eliminado'); location.href='principal.php?link=$rut' </script>";
}
else{
	echo"<script type=\"text/javascript\">alert ('Error'); location.href='principal.php?link=$rut' </script>";
	
}//fin de l primer else


?>