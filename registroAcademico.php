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
	
	//verificar si el alumno esta inscrito
mysql_select_db($database_conexion, $conexion);
$query_alumno = "SELECT * FROM alumno where cedula='$_POST[alumno]'";
$alumno = mysql_query($query_alumno, $conexion) or die(mysql_error());
$row_alumno = mysql_fetch_assoc($alumno);
$totalRows_alumno = mysql_num_rows($alumno);

if($totalRows_alumno==0){
 		echo "<script type=\"text/javascript\">alert ('Este alumno no esta registrado '); location.href='Principal.php?link=link3' </script>";
  		exit;
}


//verificar que no se inscriba 2 veces el alumno en un mismo grado
mysql_select_db($database_conexion, $conexion);
$query_historial = "SELECT * FROM academico where alumno='$_POST[alumno]' and escolar='$_POST[escolar]' ";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);

if($totalRows_historial>0){
 		echo "<script type=\"text/javascript\">alert ('Este alumno ya tiene un registro en este Año Escolar'); location.href='Principal.php?link=link3' </script>";
  		exit;
}

//verificar repre
mysql_select_db($database_conexion, $conexion);
$query_rep = "SELECT * FROM alumno where cedula='$_POST[alumno]' and cedulaR3='$_POST[representante]' ";
$rep = mysql_query($query_rep, $conexion) or die(mysql_error());
$row_rep = mysql_fetch_assoc($rep);
$totalRows_rep = mysql_num_rows($rep);

if($totalRows_rep==0){
 		echo "<script type=\"text/javascript\">alert ('Debe ingresar correctamente la cedula del representante'); location.href='Principal.php?link=link3' </script>";
  		exit;
}



  $insertSQL = sprintf("INSERT INTO academico (alumno, representante,  academico, seccion, escolar, evaluacion, condicion, habilidad) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                      
                       GetSQLValueString($_POST['alumno'], "int"),
                       GetSQLValueString($_POST['representante'], "int"),
                       GetSQLValueString($_POST['academico'], "text"),
                       GetSQLValueString($_POST['seccion'], "text"),
                       GetSQLValueString($_POST['escolar'], "text"),
                       GetSQLValueString($_POST['evaluacion'], "text"),
                       GetSQLValueString($_POST['condicion'], "text"),
                       GetSQLValueString($_POST['habilidad'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
    if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados');  location.href='principal.php?link=link3' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='principal.php?link=link3' </script>";
  exit;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
<!--
.Estilo1 {	font-size: 14px;
	color: #000000;
}
.Estilo4 {font-size: 14px}
-->
</style>
</head>
<script language="javascript">
<!--


function cambiar(){
	
	if(document.form1.escolar.value==9){
		   document.form1.mencion.disabled=true;
	 document.form1.mencion.value="-";
		   return true;
		   }
	if(document.form1.escolar.value==8){
		   document.form1.mencion.disabled=true;
	 document.form1.mencion.value="-";
		   return true;
		   }
		   
if(document.form1.escolar.value==7){
		   document.form1.mencion.disabled=true;
	 document.form1.mencion.value="-";
		   return true;
		   
		   }if(document.form1.escolar.value==6){
		   document.form1.mencion.disabled=true;
	 document.form1.mencion.value="-";
		   return true;
		   
		   }if(document.form1.escolar.value==5){
		   document.form1.mencion.disabled=true;
	 document.form1.mencion.value="-";
		   return true;
		   }
   	     
			if(document.form1.escolar.value==4){
		   document.form1.mencion.disabled=true;
	 document.form1.mencion.value="-";
		   return true;
		   }
	if(document.form1.escolar.value==2){
		  document.form1.mencion.disabled=true;
		 document.form1.mencion.value="-";
		   return true;
		   }
	
		   	     
			if(document.form1.escolar.value==1){
		  document.form1.mencion.disabled=true;
		 document.form1.mencion.value="-";
		   return true;
		   }
	
	
		    if(document.form1.escolar.value==10){
		   document.form1.mencion.disabled=false;
		   
		   return true;
		   }
		   	     
			if(document.form1.escolar.value==11){
		   document.form1.mencion.disabled=false;
		   
		   return true;
		   }
		
		   	     
		   	     
		      
   }
   
function validar(){

		if(document.form1.alumno.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('alumno').value)){
				alert('Solo puede ingresar numeros en la cedula de alumno!!!');
				return false;
		   		}
				}
			if(document.form1.representante.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('representante').value)){
				alert('Solo puede ingresar numeros en la cedula del Representante!!!');
				return false;
		   		}
				}
				
				if(document.form1.alumno.value==""){
						alert("Debe Ingresar la Cedula de alumno");
						return false;
				}
				if(document.form1.escolar.value=="-"){
						alert("Debe Seleccionar un Grado");
						return false;
				}
				if(document.form1.seccion.value=="-"){
						alert("Debe Seleccionar una Seccion");
						return false;
				}
}

</script>
<body>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" onsubmit="return validar()" method="post" name="form1" id="form1">
  <table border="0" class="border" align="center" cellpadding="2" cellspacing="0">
    <tr valign="baseline">
      <td colspan="2" align="right" bgcolor="#EAEECA"><div align="center" class="Estilo1">Inscripcion de Alumnos </div></td>
    </tr>
    <tr valign="baseline">
      <td width="141" align="right" nowrap="nowrap" class="Estilo4">Cedula del Alumno:</td>
      <td width="317" class="Estilo4"><label>
        <input name="alumno" type="text" id="alumno" size="8" maxlength="8" />
      </label>
        <label></label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4">Cedula del Representante</td>
      <td class="Estilo4"><input name="representante" id="representante" type="text" value="" size="9" maxlength="9" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4">Año Escolar: </td>
      <td class="Estilo4"><label>
        <select name="academico" class="Estilo4" id="academico">
          <option value="2002 - 2005" >2002 - 2005</option>
          <option value="2005 - 2006">2005 - 2006</option>
          <option value="2006 - 2007">2006 - 2007</option>
          <option value="2007 - 2008">2007 - 2008</option>
          <option value="2008 - 2009">2008 - 2009</option>
          <option value="2009 - 2010">2009 - 2010</option>
          <option value="2010 - 2011">2010 - 2011</option>
          <option value="2011 - 2012">2011 - 2012</option>
          <option value="2012 - 2013">2012 - 2013</option>
          <option value="2013 - 2014">2013 - 2014</option>
          <option value="2014 - 2015">2014 - 2015</option>
          <option value="2015 - 2016">2015 - 2016</option>
          <option value="2016 - 2017">2016 - 2017</option>
          <option value="2017 - 2018">2017 - 2018</option>
          <option value="2018 - 2019">2018 - 2019</option>
          <option value="2019 - 2020">2019 - 2020</option>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4">Grado: </td>
      <td class="Estilo4"><label>
        <select name="escolar" class="Estilo4" id="escolar" onchange="cambiar()">
          <option value="-">Seleccione un A&ntilde;o</option>
          <option value="1">1er Grado</option>
          <option value="2">2do Grado</option>
          <option value="3">3er Grado</option>
          <option value="4">4to Grado</option>
          <option value="5">5to Grado</option>
          <option value="6">6to Grado</option>
           <option value="7">7mo Grado</option>
          <option value="8">8vo Grado</option>
          <option value="9">9no Grado</option>
          <
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4">Seccion:</td>
      <td class="Estilo4"><label>
        <select name="seccion" class="Estilo4" id="seccion">
          <option value="-">Seleccione una Seccion</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="E">E</option>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4">Evaluacion Cualitativa:</td>
      <td><label>
          <select name="evaluacion" id="evaluacion">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
          </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4">Condicion Academica:</td>
      <td><label>
          <select name="condicion" id="condicion">
            <option value="APROBADO">APROBADO</option>
            <option value="REPROBADO">REPROBADO</option>
            <option value="PROMOVIDO CON ACTA COMPROMISO">PROMOVIDO CON ACTA COMPROMISO</option>
          </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4">Habilidad y Potencial:</td>
      <td><label>
          <select name="habilidad" id="habilidad">
            <option value="CORALISTA">CORALISTA</option>
            <option value="DEPORTISTA">DEPORTISTA</option>
            <option value="MUSICO">MUSICO</option>
            <option value="ARTESANO">ARTESANO</option>
          </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA" class="Estilo4"><div align="center">
        <input name="submit" type="submit" class="Estilo4" value="Guardar Datos" />
      </div></td>
    </tr>
  </table>
<input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>