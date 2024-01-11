<?php require_once('Connections/conexion.php'); ?>
<?php
if($validacion==true){
	if($modi==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Modificaciones'); location.href='principal.php' </script>";
 exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido'); location.href='principal.php' </script>";
 exit;
 }

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	
		//verificar si el alumno esta inscrito
mysql_select_db($database_conexion, $conexion);
$query_alumno = "SELECT * FROM alumno where cedula='$_POST[alumno]'";
$alumno = mysql_query($query_alumno, $conexion) or die(mysql_error());
$row_alumno = mysql_fetch_assoc($alumno);
$totalRows_alumno = mysql_num_rows($alumno);

if($totalRows_alumno==0){
 		echo "<script type=\"text/javascript\">alert ('Esta cedula no esta registrado '); location.href='Principal.php' </script>";
  		exit;
}


//verificar que no se inscriba 2 veces el alumno en un mismo grado
mysql_select_db($database_conexion, $conexion);
$query_historial = "SELECT * FROM academico where alumno='$_POST[alumno]' and escolar='$_POST[escolar]'  and id!='$_POST[id]'";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);

if($totalRows_historial>0){
 		echo "<script type=\"text/javascript\">alert ('Este alumno ya tiene un registro en este Año Escolar'); location.href='Principal.php' </script>";
  		exit;
}

	
	
	
  $updateSQL = sprintf("UPDATE academico SET alumno=%s, representante=%s,  academico=%s,  seccion=%s, escolar=%s, evaluacion=%s, condicion=%s, habilidad=%s WHERE id=%s",
                       GetSQLValueString($_POST['alumno'], "int"),
                       GetSQLValueString($_POST['representante'], "int"),
                       GetSQLValueString($_POST['academico'], "text"),
                       GetSQLValueString($_POST['seccion'], "text"),
                       GetSQLValueString($_POST['escolar'], "text"),
                       GetSQLValueString($_POST['evaluacion'], "text"),
                       GetSQLValueString($_POST['condicion'], "text"),
                       GetSQLValueString($_POST['habilidad'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
     if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Modificados');  location.href='principal.php?link=link4' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='principal.php?link=link4' </script>";
  exit;
  }
}
$alu=$_GET["cedula"];
mysql_select_db($database_conexion, $conexion);
$query_academico = "SELECT * FROM academico where alumno=$alu";
$academico = mysql_query($query_academico, $conexion) or die(mysql_error());
$row_academico = mysql_fetch_assoc($academico);
$totalRows_academico = mysql_num_rows($academico);

if($totalRows_academico==0){
 		echo "<script type=\"text/javascript\">alert (' Este Alumno no posee datos academicos'); location.href='Principal.php?link=link4' </script>";
  		exit;
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
<!--
.Estilo1 {font-size: 14px;
	color: #000000;
}
.Estilo4 {font-size: 14px}
-->
</style>
</head>
<script language="javascript">
<!--


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
				
				if(document.form1.cedula.value==""){
						alert("Debe Ingresar la Cedula de alumno");
						return false;
				}
				if(document.form1.escolar.value=="-"){
						alert("Debe Seleccionar un  un Grado");
						return false;
				}
				if(document.form1.seccion.value=="-"){
						alert("Debe Seleccionar una Seccion");
						return false;
				}
				
				
		
				
				
				if(document.form1.escolar.value==4 || document.form1.escolar.value==5 || document.form1.grado.value==6){
					if(document.form1.mencion.value=="-"){
						alert("Debe Seleccionar una mencion");
						return false;
					}
				}
			
				
		}

</script>
<body>
<form action="<?php echo $editFormAction; ?>" onsubmit="return validar()" method="post" name="form1" id="form1">
  <p>&nbsp;</p>
  <table border="0" class="border" align="center" cellpadding="2" cellspacing="0">
    <tr valign="baseline">
      <td colspan="2" align="right" bgcolor="#EAEECA"><div align="center" class="Estilo1">Datos Academicos </div></td>
    </tr>
    <tr valign="baseline">
      <td width="141" align="right" nowrap="nowrap" class="Estilo4">Cedula del Alumno:</td>
      <td width="317" class="Estilo4"><label>
        <input name="alumno" type="text" id="alumno" value="<?php echo $row_academico['alumno']; ?>" size="9" maxlength="9" />
      </label>
        <label></label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4">Cedula del Representante</td>
      <td class="Estilo4"><input name="representante" type="text" value="<?php echo $row_academico['representante']; ?>" size="9" maxlength="9" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4">Año Escolar: </td>
      <td class="Estilo4"><label>
        <select name="academico" class="Estilo4" id="academico">
          <?php 
	  switch ($row_academico['academico']){
			case "2002 - 2005":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2005 - 2006":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006' selected=selected>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2006 - 2007":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007' selected=selected>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2007 - 2008":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008' selected=selected>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2008 - 2009":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009' selected=selected>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2009 - 2010":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010' selected=selected>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2010 - 2011":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011' selected=selected>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2011 - 2012":
			echo " 
		  <option value='2002 - 2005>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'  selected=selected>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>

          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2012 - 2013":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013' selected=selected>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2013 - 2014":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014' selected=selected>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2014 - 2015":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015' selected=selected>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2015 - 2016":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016' selected=selected>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2016 - 2017":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'  selected=selected>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2017 - 2018":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018' selected=selected>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2018 - 2019":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019' selected=selected>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2019 - 2020":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020' selected=selected>2019 - 2020</option>";
			break;
			
			
		
		}
	  
	  ?>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4"> Grado: </td>
      <td class="Estilo4"><label>
        <select name="escolar" class="Estilo4" id="escolar" onchange="cambiar()">
	      
          <?php 
	  switch ($row_academico['escolar']){
			case 1:
			echo " 
		<option value=1>1er  Grado</option>
        <option value=2>2do  Grado</option>
        <option value=3>3er Grado</option>
        <option value=4>4to  Grado</option>
        <option value=5>5to  Grado</option>
        <option value=6>6to Grado</option>
			<option value=7>7mo Grado</option>
        <option value=8 >8vo  Grado</option>
        <option value=9 >9no Grado</option>
       ";
			break;
			case 2:
			echo " 
		 <option value=2>2do  Grado</option>
	<option value=1>1er  Grado</option>
        <option value=3>3er Grado</option>
        <option value=4>4to  Grado</option>
        <option value=5>5to  Grado</option>
        <option value=6>6to Grado</option>
			<option value=7>7mo Grado</option>
        <option value=8 >8vo  Grado</option>
        <option value=9 >9no Grado</option>
        ";
			break;
			case 3:
			echo " 
			<option value=3>3er Grado</option>
		<option value=1>1er  Grado</option>
        <option value=2>2do  Grado</option>
        <option value=4>4to  Grado</option>
        <option value=5>5to  Grado</option>
        <option value=6>6to Grado</option>
			<option value=7>7mo Grado</option>
        <option value=8 >8vo  Grado</option>
        <option value=9 >9no Grado</option>
     ";
			break;
			case 4:
			echo " 
		<option value=1>1er  Grado</option>
        <option value=2>2do  Grado</option>
        <option value=3>3er Grado</option>
        <option value=4 selected=selected>4to  Grado</option>
        <option value=5>5to  Grado</option>
        <option value=6>6to Grado</option>
			<option value=7>7mo Grado</option>
        <option value=8 >8vo  Grado</option>
        <option value=9 >9no Grado</option>
       ";
			break;
			case 5:
			echo " 
		<option value=1>1er  Grado</option>
        <option value=2>2do  Grado</option>
        <option value=3>3er Grado</option>
        <option value=4>4to  Grado</option>
        <option value=5 selected=selected>5to  Grado</option>
        <option value=6>6to Grado</option>
			<option value=7>7mo Grado</option>
        <option value=8 >8vo  Grado</option>
        <option value=9 >9no Grado</option>
        ";
			break;
			case 6:
			echo " 
		<option value=1>1er  Grado</option>
        <option value=2>2do  Grado</option>
        <option value=3>3er Grado</option>
        <option value=4>4to  Grado</option>
        <option value=5>5to  Grado</option>
        <option value=6 selected=selected>6to Grado</option>
		<option value=7>7mo Grado</option>
        <option value=8 >8vo  Grado</option>
        <option value=9 >9no Grado</option>
        ";
			break;
			case 7:
			echo " 
		<option value=1>1er  Grado</option>
        <option value=2>2do  Grado</option>
        <option value=3>3er Grado</option>
        <option value=4>4to  Grado</option>
        <option value=5>5to  Grado</option>
        <option value=6>6to Grado</option>
		<option value=7 selected=selected>7mo Grado</option>
        <option value=8 >8vo  Grado</option>
        <option value=9 >9no Grado</option>
       ";
			break;
			case 8:
			echo " 
		 <option value=2>2do  Grado</option>
	<option value=1>1er  Grado</option>
        <option value=3>3er Grado</option>
        <option value=4>4to  Grado</option>
        <option value=5>5to  Grado</option>
        <option value=6>6to Grado</option>
		<option value=7>7mo Grado</option>
        <option value=8 selected=selected>8vo  Grado</option>
        <option value=9 >9no Grado</option>
       ";
			break;
			case 9:
			echo " 
			<option value=3>3er Grado</option>
		<option value=1>1er  Grado</option>
        <option value=2>2do  Grado</option>
        <option value=4>4to  Grado</option>
        <option value=5>5to  Grado</option>
        <option value=6>6to Grado</option>
		<option value=7>7mo Grado</option>
        <option value=8>8vo  Grado</option>
        <option value=9 selected=selected>9no Grado</option>
     ";
			break;
	
	  }
	  ?>
          </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4">Seccion:</td>
      <td class="Estilo4"><label>
        <select name="seccion"  id="seccion">
          
          <?php 
	  switch ($row_academico['seccion']){
			case "A":
			echo " 
		  <option value=A>A</option>
          <option value=B>B</option>
          <option value=C>C</option>
          <option value=D>D</option>
          <option value=E>E</option>";
			break;
			case "B":
			echo "
		  <option value=B>B</option> 
		  <option value=A>A</option>
          <option value=C>C</option>
          <option value=D>D</option>
          <option value=E>E</option>";
			break;
			case "C":
			echo " 
		  <option value=C>C</option>
		  <option value=A>A</option>
          <option value=B>B</option>
          <option value=D>D</option>
          <option value=E>E</option>";
			break;
			case "D":
			echo " 
		  <option value=D>D</option>
		  <option value=A>A</option>
		  <option value=B>B</option>
		  <option value=C>C</option>
          <option value=E>E</option>";
			break;
			case "5to A&ntilde;o":
			echo " 
		  <option value=E>E</option>
		  <option value=A>A</option>
		  <option value=B>B</option>
		  <option value=C>C</option>
		  <option value=D>D</option>";
			break;
		
		}
	  
	  ?>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4">Evaluacion Cualitativa:</td>
      <td><label>
        <select name="evaluacion" id="evaluacion">
                <?php 
	  switch ($row_academico['evaluacion']){
			case "A":
			echo " 
		  <option value=A>A</option>
          <option value=B>B</option>
          <option value=C>C</option>
          <option value=D>D</option>
          <option value=E>E</option>";
			break;
			case "B":
			echo "
			<option value=B>B</option>
		   <option value=A>A</option>
          <option value=C>C</option>
          <option value=D>D</option>
          <option value=E>E</option>";
			break;
			case "C":
			echo " 
			 <option value=A>A</option>
          <option value=B>B</option>
          <option value=C>C</option>
          <option value=D>D</option>
          <option value=E>E</option>
         ";
			break;
			case "D":
			echo " 
		  <option value=D>D</option>
		  <option value=A>A</option>
          <option value=B>B</option>
          <option value=C>C</option>
          <option value=E>E</option>
         ";
			break;
			case "E":
			echo " 
			<option value=E>E</option>
			 <option value=A>A</option>
          <option value=B>B</option>
          <option value=C>C</option>
          <option value=D>D</option>
          
         ";
			break;
			
		} ?>
         
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4">Condicion Academica:</td>
      <td><label>
        <select name="condicion" id="condicion">
          <?php 
	  switch ($row_academico['condicion']){
			case "APROBADO":
			echo " 
		  <option value=APROBADO>APROBADO</option>
          <option value=REPROBADO>REPROBADO</option>
          <option value=PROMOVIDO CON ACTA COMPROMISO>PROMOVIDO CON ACTA COMPROMISO</option>";
			break;
			case "REPROBADO":
			echo "
		   <option value=REPROBADO>REPROBADO</option>
		  <option value=APROBADO>APROBADO</option>
          <option value=PROMOVIDO CON ACTA COMPROMISO>PROMOVIDO CON ACTA COMPROMISO</option>";
			break;
			case "PROMOVIDO CON ACTA COMPROMISO":
			echo " 
			 <option value=PROMOVIDO CON ACTA COMPROMISO>PROMOVIDO CON ACTA COMPROMISO</option>
			 <option value=APROBADO>APROBADO</option>
		   <option value=REPROBADO>REPROBADO</option>
		  
         ";
			break;
			
		}
	  
	  ?>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo4">Habilidad y Potencial:</td>
      <td>
      <select name="habilidad" id="habilidad">
          <?php 
	  switch ($row_academico['habilidad']){
			case "CORALISTA":
			echo " 
		 <option value=CORALISTA>CORALISTA</option>
            <option value=DEPORTISTA>DEPORTISTA</option>
            <option value=MUSICO>MUSICO</option>
            <option value=ARTESANO>ARTESANO</option>";
			break;
			case "DEPORTISTA":
			echo "
			<option value=DEPORTISTA>DEPORTISTA</option>
		    <option value=CORALISTA>CORALISTA</option>
            <option value=MUSICO>MUSICO</option>
            <option value=ARTESANO>ARTESANO</option>";
			break;
			case "MUSICO":
			echo " 
			<option value=MUSICO>MUSICO</option>
			<option value=DEPORTISTA>DEPORTISTA</option>
		    <option value=CORALISTA>CORALISTA</option>
            <option value=ARTESANO>ARTESANO</option>
         ";
			break;
			case "ARTESANO":
			echo " 
			<option value=ARTESANO>ARTESANO</option>
		 	<option value=CORALISTA>CORALISTA</option>
            <option value=DEPORTISTA>DEPORTISTA</option>
            <option value=MUSICO>MUSICO</option>
            ";
			break;
			default:
			echo " 
		 <option value=CORALISTA>CORALISTA</option>
            <option value=DEPORTISTA>DEPORTISTA</option>
            <option value=MUSICO>MUSICO</option>
            <option value=ARTESANO>ARTESANO</option>";
			break;
		}
	  
	  ?>
        </select> </td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA" class="Estilo4"><div align="center">
        <input name="submit" type="submit" class="Estilo4" value="Modificar" />
        <a href="principal.php?link=link42&id=<?php echo $row_academico['id']; ?>"><input name="submit2" type="button" class="Estilo4" value="Eliminar" /></a>
      </div></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_academico['id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($academico);
?>
