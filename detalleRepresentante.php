<?php require_once('Connections/conexion.php'); ?>
<?php

$id=$_GET["id"];

mysql_select_db($database_conexion, $conexion);
$query_representantes = "SELECT * FROM representante where id_representante=$id";
$representantes = mysql_query($query_representantes, $conexion) or die(mysql_error());
$row_representantes = mysql_fetch_assoc($representantes);
$totalRows_representantes = mysql_num_rows($representantes);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
.Estilo3 {font-size: 12px; color: #000000; }
-->
</style>
</head>

<body>
<table width="326" border="0" align="center">
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2" bgcolor="#EAEECA" scope="row"><span class="Estilo3">Datos del Representante</span> </th>
  </tr>
  <tr>
    <th width="77" scope="row"><div align="right" class="Estilo1">Cedula:</div></th>
    <td width="233"><span class="Estilo1"><?php echo $row_representantes['cedula']; ?></span></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" class="Estilo1">Nombre:</div></th>
    <td><span class="Estilo1"><?php echo $row_representantes['nombre']; ?></span></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" class="Estilo1">Apellido:</div></th>
    <td><span class="Estilo1"><?php echo $row_representantes['apellido']; ?></span></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" class="Estilo1">Sexo:</div></th>
    <td><span class="Estilo1"><?php echo $row_representantes['sexo']; ?></span></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" class="Estilo1">Profesion:</div></th>
    <td><span class="Estilo1"><?php echo $row_representantes['profesion']; ?></span></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" class="Estilo1">Direccion:</div></th>
    <td><span class="Estilo1"><?php echo $row_representantes['direccion']; ?></span></td>
  </tr>
  <tr>
    <th colspan="2" bgcolor="#EAEECA" scope="row">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="2" scope="row"><form id="form1" name="form1" method="get" action="Principal.php">
      <label>
        <input name="Submit" type="submit" class="Estilo1" value="Regresar" />
		<input type="hidden" name="link" value="link22" />
        </label>
    </form>    </th>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($representantes);
?>
