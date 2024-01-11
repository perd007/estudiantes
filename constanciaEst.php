<?php require_once('Connections/conexion.php'); ?>
<?php
$cedula=$_POST["Alumno"];


//verificar si el alumno esta inscrito
mysql_select_db($database_conexion, $conexion);
$query_alumno = "SELECT * FROM alumno where cedula=$cedula";
$alumno = mysql_query($query_alumno, $conexion) or die(mysql_error());
$row_alumno = mysql_fetch_assoc($alumno);
$totalRows_alumno = mysql_num_rows($alumno);


if($row_alumno["cedula"]!=$cedula){
 		echo "<script type=\"text/javascript\">alert ('Este alumno no esta registrado '); location.href='Principal.php' </script>";
  		exit;
}
//fin de la verificacion
//verificamos so el alumno posee historial
mysql_select_db($database_conexion, $conexion);
$query_historialV = "SELECT * FROM academico where alumno=$cedula  ";
$historialV = mysql_query($query_historialV, $conexion) or die(mysql_error());
$row_historialV = mysql_fetch_assoc($historialV);
$totalRows_historialV = mysql_num_rows($historialV);


if($totalRows_historialV<=0 ){
echo "<script type=\"text/javascript\">alert ('Este alumno no posee registros Academicos '); location.href='Principal.php' </script>";
  		exit;

}
//fin de la verificacion

mysql_select_db($database_conexion, $conexion);
$query_estudiante = "SELECT * FROM alumno where cedula=$cedula";
$estudiante = mysql_query($query_estudiante, $conexion) or die(mysql_error());
$row_estudiante = mysql_fetch_assoc($estudiante);
$totalRows_estudiante = mysql_num_rows($estudiante);

mysql_select_db($database_conexion, $conexion);
$query_historial = "SELECT * FROM academico where alumno=$cedula ";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);

//asignamos la oracion correpondiente a la constancia
//si es primaria
if($row_historial["escolar"]>=1 and $row_historial["escolar"]<=6 ){
$oracion= "  </strong>titular de la c&eacute;dula N&ordm; V<strong>- </strong><strong><u>".$row_estudiante["cedula"]."</u></strong><strong><u>,</u></strong><strong> </strong>cursa en este Plantel el <strong><u>".$row_historial["escolar"]."</u></strong><strong><u>&ordm; GRADO</u></strong> &nbsp;&nbsp; </strong>secci&oacute;n:<strong> &ldquo; ".$row_historial["seccion"]." &rdquo; </strong> de Educaci&oacute;n primaria";
}

//si es educacion media
if($row_historial["escolar"]==7 or $row_historial["escolar"]==8 or $row_historial["escolar"]==9){
$oracion= "  </strong>titular de la c&eacute;dula de  identidad N&ordm; V<strong>- </strong><strong><u>".$row_estudiante["cedula"]."</u></strong><strong><u>,</u></strong><strong> </strong>cursa en este Plantel el <strong><u>".$row_historial["escolar"]."</u></strong><strong><u>&ordm; GRADO</u></strong>&ordm;</u></strong><strong>&nbsp; </strong>a&ntilde;o secci&oacute;n:<strong> &ldquo; ".$row_historial["seccion"]." &rdquo; </strong> de Educaci&oacute;n Media General";
}




?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Constancia de estudio</title>
<style type="text/css">
<!--
.interliniado {line-height: 0px;
}
-->
</style>
</head>
<script>
function imprimir(){
window.print()
window.close();
}
</script>

<body  <? if($_POST["ver"]==1){ 
	  echo "onload='imprimir();'";	
	  } ?>>
<form name="form1" method="post"  action="constanciaEst.php" />
<table width="607" border="0" align="center">
  <tr>
    <td width="601"><div class="interliniado" >
      <p align="center" >&nbsp;</p>
      <p align="center" >&nbsp;</p>
      <p align="center" >&nbsp;</p>
      <p align="center" ><em>Rep&uacute;blica  Bolivariana de Venezuela </em></p>
      <p align="center"  ><em>Ministerio  del Poder Popular para la Educaci&oacute;n </em>      </p>
      <p align="center"  ><em>U.E.  &ldquo;Andre Eloy Blanaco&rdquo;</em></p>
      <p align="center"  ><em> C&Oacute;DIGO:  PD-0000000 </em></p>
    </div></td>
  </tr>
  <tr>
    <td><p align="center">&nbsp;</p>
        <p align="center">&nbsp;</p>
      <p align="center"><strong><u>CONSTANCIA  DE ESTUDIO</u></strong></p>
      <p align="center">&nbsp;</p>
      <p align="justify">Quien suscribe, <strong>Msc. Ramon Salazar</strong>,&nbsp; titular de la C&eacute;dula de Identidad N&deg; <strong>V-6.307.017,</strong> venezolano mayor de edad, Director de la U.E.I.B. &ldquo;San Jos&eacute; de Mirabal&rdquo;, hace  constar por medio de la presente que el (a) alumno (a<strong>): </strong><strong><u><?php echo $row_estudiante["nombre"]; ?>, </u> </strong> titular de la cedula: <strong><u><?php echo $row_estudiante["cedula"]; ?></u></strong>, <?php echo $oracion; ?> durante el a&ntilde;o escolar<strong><u><?php echo $row_historial["academico"]; ?></u></strong>.- </p>
      <p align="justify">&nbsp;</p>
      <p align="justify">&nbsp; </p>
      <p align="justify">Constancia que se  expide a petici&oacute;n de la parte interesada para fines legales en Mirabal el&nbsp; <strong><u>____</u></strong> d&iacute;as del mes de&nbsp; <strong><u>______________</u></strong>&nbsp;del a&ntilde;o <strong><u>____. </u></strong></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p align="center">________________________________<br />
        <strong>Msc. Ramon Salazar</strong><br />
        Director</p>
      <p>&nbsp;</p>
      <div align="center">
    <input type="hidden" name="Alumno" value="<? echo $cedula; ?>"  >
	 <input type="hidden" name="ver" value="1"  >
	  <input type="submit" v name="imprimir" value="Imprimir" <? if($_POST["ver"]==1){ 
	  echo "style='visibility:hidden'";}?>
	 /> 
      </div></td>
  </tr>
</table>
</form>
</body>
</html>
