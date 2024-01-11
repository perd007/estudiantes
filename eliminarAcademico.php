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



//eliminamos el alumno


mysql_select_db($database_conexion, $conexion);
$sql="delete  FROM academico where id=$id";
$verificar=mysql_query($sql,$conexion) or die(mysql_error());

if($verificar){
	echo"<script type=\"text/javascript\">alert ('Datos Eliminado'); location.href='principal.php?link=link4' </script>";
}
else{
	echo"<script type=\"text/javascript\">alert ('Error'); location.href='principal.php?link=link4' </script>";
	
}//fin de l primer else


?>