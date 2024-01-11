<?php require_once('Connections/conexion.php'); ?>
<?php 
//validar usuario

if($validacion==true){
	if($reg==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Registros');location.href='principal.php' </script>";
    exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido'); location.href='principal.php' </script>";
 exit;
}
?>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO actividades(ano, trimestre, nombre, estatus, responsable) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ano'], "int"),
					   GetSQLValueString($_POST['trimestre'], "text"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['estatus'], "text"),
					   GetSQLValueString($_POST['responsable'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
   if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados');  location.href='principal.php?link=link7' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='principal.php?link=link7' </script>";
  exit;
  }
}
?>

<html >
<head>

<title>Documento sin título</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jscalendar-1.0/calendar.js"></script>
    <script type="text/javascript" src="jscalendar-1.0/calendar-setup.js"></script>
    <script type="text/javascript" src="jscalendar-1.0/lang/calendar-es.js"></script>
    <style type="text/css"> 
    @import url("jscalendar-1.0/calendar-win2k-cold-1.css"); .Estilo7 {font-weight: bold}
    .Estilo10 {color: #FFFFFF}
   
    </style>
		<script type="text/JavaScript" language="javascript" src="calendario/calendar-setup.js"></script>
<style type="text/css">
<!--
.blanco {
	color: #000000;
}
.Estilo1 {font-size: 18px}
-->
</style>
</head>
<script language="javascript">
<!--

   
function validar(){

	
				
				if(document.form1.nombre.value==""){
						alert("Debe Ingresar el Nombre de la Actividad");
						return false;
				}
				if(document.form1.responsable.value==""){
						alert("Debe ingresar el responsable de la actividad");
						return false;
				}
				
}

</script>
<body>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" onSubmit="return validar()" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td colspan="2" align="center" nowrap="nowrap" bgcolor="#EAEECA" class="blanco">Registro de Actividades</td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap">Año de la Actividad:</td>
      <td><label>
        <select name="ano" id="ano">
          <option value="2012">2012</option>
          <option value="2013">2013</option>
          <option value="2014">2014</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap">Mes de la Actividad:</td>
      <td><label>
        <select name="trimestre" id="trimestre">
          <option value="Enero" selected="selected">Enero</option>
          <option value="Febrero">Febrero</option>
          <option value="Marzo">Marzo</option>
          <option value="Abril">Abril</option>
          <option value="Mayo">Mayo</option>
          <option value="Junio">Junio</option>
          <option value="Julio">Julio</option>
          <option value="Agosto">Agosto</option>
          <option value="Septiembre">Septiembre</option>
          <option value="Octubre">Octubre</option>
          <option value="Noviembre">Noviembre</option>
          <option value="Diciembre">Diciembre</option>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td width="194" align="right" nowrap="nowrap">Nombre de la Actividad:</td>
      <td width="248"><input name="nombre" type="text" value="" size="50" maxlength="50" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Responsable de la Actividad:</td>
      <td><input name="responsable" id="responsable" type="text" value="" size="50" maxlength="50" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Estatus:</td>
      <td><select name="estatus">
        <option value="Reliazada" <?php if (!(strcmp("Reliazada", ""))) {echo "SELECTED";} ?>>Reliazada</option>
        <option value="Por Realizar" <?php if (!(strcmp("Por Realizar", ""))) {echo "SELECTED";} ?>>Por Realizar</option>
        <option value="Cancelado" <?php if (!(strcmp("Cancelado", ""))) {echo "SELECTED";} ?>>Cancelado</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="center" nowrap="nowrap" bgcolor="#EAEECA"><input type="submit" value="Guardar Datos" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>