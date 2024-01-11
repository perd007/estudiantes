<?php require_once('Connections/conexion.php'); ?>
<?php

$cedula=$_GET["cedula"];
mysql_select_db($database_conexion, $conexion);
$query_alumno = "SELECT * FROM alumno where cedula=$cedula ";
$alumno = mysql_query($query_alumno, $conexion) or die(mysql_error());
$row_alumno = mysql_fetch_assoc($alumno);
$totalRows_alumno = mysql_num_rows($alumno);



if($totalRows_alumno<=0){
echo "<script type=\"text/javascript\">alert ('Este Alumno no esta Registrado'); location.href='principal.php?link=link2' </script>";
exit;
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo4 {font-size: 12px}
.Estilo67 {color: #000000;
font-weight: bold;}
-->
</style>
</head>
<script language="javascript">
<!--

function validar(){

			var valor=confirm('¿Esta seguro de Eliminar este Alumno?');
			if(valor==false){
			return false;
			}
			else{
			return true;
			}
		
}
//-->
</script>
<body>
<table width="485" align="center" cellpadding="3">
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap">&nbsp;</td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><div align="center" class="Estilo67">Datos de Estudiante </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap"><div align="left">Cedula:<?php echo $row_alumno['cedula']; ?>      &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;Nombre:<?php echo $row_alumno['nombre']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Sexo:<?php echo $row_alumno['sexo']; ?>      &nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;Nacionalidad:<?php echo $row_alumno['nacionalidad']; ?>      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edad:<?php echo $row_alumno['edad']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Procedencia:<?php echo $row_alumno['procedencia']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap"><div align="left">Tallas:
      &nbsp;&nbsp;&nbsp;
      <label>Camisa:<?php echo $row_alumno['camisa']; ?> </label>
      &nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;Pantalon:<?php echo $row_alumno['pantalon']; ?>      &nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zapato:<?php echo $row_alumno['zapato']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Fecha de Naciento:<?php echo $row_alumno['fecha_nac']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap"><div align="left">Lugar de Nacimiento:<?php echo $row_alumno['lugarNac']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><div align="center" class="Estilo67">Ingrese los Datos del Padre </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap"><div align="left">Cedula :<?php echo $row_alumno['cedulaR']; ?>      &nbsp;&nbsp;&nbsp;Nombre y Apellido:<?php echo $row_alumno['nombreR']; ?>    </div>
        <div align="left"></div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Existe:<?php echo $row_alumno['existeR']; ?>&nbsp;&nbsp;&nbsp;&nbsp;Edad:      <?php echo $row_alumno['edadR']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nacionalidad:<?php echo $row_alumno['nacionalidadR']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap"><div align="left">Ingreso Economico:<?php echo $row_alumno['ingresoR']; ?>      &nbsp;&nbsp; Direccion:<?php echo $row_alumno['direccionR']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><div align="center" class="Estilo67">Ingrese los Datos de la Madre </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#FFFFFF"><div align="left">Cedula :<?php echo $row_alumno['cedulaR2']; ?>      &nbsp;&nbsp;&nbsp;&nbsp;Nombre y Apellido:<?php echo $row_alumno['nombreR2']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Existe:<?php echo $row_alumno['existeR2']; ?>&nbsp;      &nbsp;
      &nbsp;&nbsp;&nbsp;Edad:<?php echo $row_alumno['edadR2']; ?>      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nacionalidad:<?php echo $row_alumno['nacionalidadR2']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#FFFFFF"><div align="left">Ingreso Economico:<?php echo $row_alumno['ingresoR2']; ?>      &nbsp;&nbsp; Direccion:<?php echo $row_alumno['direccionR2']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Nivel de Instruccion:<?php echo $row_alumno['nivelR2']; ?>      &nbsp;&nbsp; Ocupacion:
      
        <?php echo $row_alumno['ocupacionR2']; ?></div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><div align="center"><span class="Estilo67">Ingrese los Datos del Representante Legal </span></div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap"><div align="left">Cedula :<?php echo $row_alumno['cedulaR3']; ?>      &nbsp;&nbsp;&nbsp;Nombre y Apellido:<?php echo $row_alumno['nombreR3']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">&nbsp;Edad:<?php echo $row_alumno['edadR3']; ?>      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nacionalidad:<?php echo $row_alumno['nacionalidadR3']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap"><div align="left">Ingreso Economico:      &nbsp;&nbsp; Direccion:<?php echo $row_alumno['direccionR3']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Nivel de Instruccion:<?php echo $row_alumno['nivelR3']; ?>      &nbsp;
      Ocupacion:<?php echo $row_alumno['ocupacionR3']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><div align="center"><span class="Estilo7 Estilo67">Situacion de la Pareja </span></div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap"><div align="left">El ni&ntilde;o vive con: <?php echo $row_alumno['vive']; ?>&nbsp;
      &nbsp;</div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">N&ordm; de parientes que viven en la familia:<?php echo $row_alumno['parientes']; ?>      &nbsp;&nbsp; N&ordm; de hermanos:<?php echo $row_alumno['hermanos']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><div align="center"><span class="Estilo67">Ubicacion de la Vivienda </span></div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap"><div align="center"><?php echo $row_alumno['zonav']; ?></div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><div align="center"><span class="Estilo67">Aspectos Medicos</span></div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Alguna enfermedad que padece:
      
        <?php echo $row_alumno['enfer1']; ?></div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap"><div align="left">Alguna enfermedad que ha padecido:<?php echo $row_alumno['enfer2']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Impedimento Fisico Diagnosticado:<?php echo $row_alumno['impedimento']; ?>    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap"><div align="left">Vacunas recibidas:<?php echo $row_alumno['vacunas']; ?>
      <label></label>
    </div></td>
  </tr>
  <tr valign="baseline">
    <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><table width="273" height="23" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="47" height="21" scope="col"> <label> <? echo "<a href='principal.php?id=$row_alumno[id]&link=link22&link2=1116'> <input type=submit name=Submit22  class='Estilo4' value=Modificar /></a>";?> </label></th>
        <th width="164" scope="col"><form id="form1" name="form1" method="get" action="Principal.php">
            <label>
            <input name="Submit" type="submit" class="Estilo67" value="Regresar" />
            <input type="hidden" name="link" value="link2" />
            </label>
        </form></th>
        <th width="62" scope="col"> <label> <? echo "<a onClick='return validar()' href='principal.php?id=$row_alumno[id]&cedula=$row_alumno[cedula]&link=link23&link2=link1116'><input type=submit name=Submit2 class='Estilo4' value=Elinimar /></a>"; ?> </label></th>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
