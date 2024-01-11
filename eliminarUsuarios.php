<?php require_once('Connections/conexion.php'); ?>
<?php
if($validacion==true){
	if($admin==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos Administrativos'); location.href='principal.php' </script>";
 exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido'); location.href='principal.php' </script>";
 exit;
 }

//recibimos la id
$id=$_GET["id"];



$sql="delete from seguridad where id_seg='$id'";
$verificar=mysql_query($sql,$conexion) or die(mysql_error());

if($verificar){
if($HTTP_COOKIE_VARS["usr"]==$row_verificar2['usuario']){
 echo "<script type=\"text/javascript\">alert ('Debe volver a iniciar sesion');  location.href='cerrarSesion.php' </script>";

 }else{
	echo"<script type=\"text/javascript\">alert ('usuario Eliminada'); location.href='principal.php?link=link6' </script>";
}}
else{
	echo"<script type=\"text/javascript\">alert ('Error'); location.href='principal.php?link=link6' </script>";
	
}//fin de l primer else

?>