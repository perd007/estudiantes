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
  $updateSQL = sprintf("UPDATE actividades SET nombre=%s, responsable=%s, estatus=%s, ano=%s, trimestre=%s WHERE id=%s",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['responsable'], "text"),
                       GetSQLValueString($_POST['estatus'], "text"),
                       GetSQLValueString($_POST['ano'], "int"),
					   GetSQLValueString($_POST['trimestre'], "text"),
					   GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
    if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Modificados');  location.href='principal.php?link=link8' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='principal.php?link=link8' </script>";
  exit;
  }
}

$id=$_GET["id"];
mysql_select_db($database_conexion, $conexion);
$query_actividad = "SELECT * FROM actividades where id=$id";
$actividad = mysql_query($query_actividad, $conexion) or die(mysql_error());
$row_actividad = mysql_fetch_assoc($actividad);
$totalRows_actividad = mysql_num_rows($actividad);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
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
.blanco {	color: #000000;
}
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
      <td colspan="2" align="center" nowrap="nowrap" bgcolor="#EAEECA" class="blanco">Modificacion de Actividades</td>
    </tr>
    <tr valign="baseline">
      <td width="194" align="right" nowrap="nowrap">Año de la Actividad:</td>
      <td width="352"><label>
        <select name="ano" id="ano">
          <?php 
	  switch ($row_actividad['ano']){
			case "2012":
			echo " 
		 <option value=2012>2012</option>
          <option value=2013>2013</option>
          <option value=2014>2014</option>
          <option value=2015>2015</option>
          <option value=2016>2016</option>
          <option value=2017>2017</option>
          <option value=2018>2018</option>
          <option value=2019>2019</option>
          <option value=2020>2020</option>
          <option value=2021>2021</option>";
			break;
			case "2013":
			echo " 
			 <option value=2013>2013</option>
		 <option value=2012>2012</option>
          <option value=2014>2014</option>
          <option value=2015>2015</option>
          <option value=2016>2016</option>
          <option value=2017>2017</option>
          <option value=2018>2018</option>
          <option value=2019>2019</option>
          <option value=2020>2020</option>
          <option value=2021>2021</option>";
			break;
			case "2014":
			echo " 
		<option value=2014>2014</option>
		 <option value=2012>2012</option>
          <option value=2013>2013</option>
          <option value=2015>2015</option>
          <option value=2016>2016</option>
          <option value=2017>2017</option>
          <option value=2018>2018</option>
          <option value=2019>2019</option>
          <option value=2020>2020</option>
          <option value=2021>2021</option>";
			break;
			case "2015":
			echo " 
			 <option value=2015>2015</option>
		 <option value=2012>2012</option>
          <option value=2013>2013</option>
          <option value=2014>2014</option>
          <option value=2016>2016</option>
          <option value=2017>2017</option>
          <option value=2018>2018</option>
          <option value=2019>2019</option>
          <option value=2020>2020</option>
          <option value=2021>2021</option>";
			break;
			case "2016":
			echo " 
		  <option value=2016>2016</option>
		  <option value=2012>2012</option>
          <option value=2013>2013</option>
          <option value=2014>2014</option>
          <option value=2015>2015</option>
          <option value=2017>2017</option>
          <option value=2018>2018</option>
          <option value=2019>2019</option>
          <option value=2020>2020</option>
          <option value=2021>2021</option>";
			break;
			case "2017":
			echo " 
		  <option value=2017>2017</option>
		  <option value=2012>2012</option>
          <option value=2013>2013</option>
          <option value=2014>2014</option>
          <option value=2015>2015</option>
          <option value=2016>2016</option>
          <option value=2018>2018</option>
          <option value=2019>2019</option>
          <option value=2020>2020</option>
          <option value=2021>2021</option>";
			break;
			case "2018":
			echo " 
		  <option value=2018>2018</option>
		  <option value=2012>2012</option>
          <option value=2013>2013</option>
          <option value=2014>2014</option>
          <option value=2015>2015</option>
          <option value=2016>2016</option>
          <option value=2017>2017</option>
          <option value=2019>2019</option>
          <option value=2020>2020</option>
          <option value=2021>2021</option>";
			break;
			case "2019":
			echo " 
		  <option value=2019>2019</option>
		  <option value=2012>2012</option>
          <option value=2013>2013</option>
          <option value=2014>2014</option>
          <option value=2015>2015</option>
          <option value=2016>2016</option>
          <option value=2017>2017</option>
          <option value=2018>2018</option>
          <option value=2020>2020</option>
          <option value=2021>2021</option>";
			break;
			case "2020":
			echo " 
			<option value=2020>2020</option>
		 <option value=2012>2012</option>
          <option value=2013>2013</option>
          <option value=2014>2014</option>
          <option value=2015>2015</option>
          <option value=2016>2016</option>
          <option value=2017>2017</option>
          <option value=2018>2018</option>
          <option value=2019>2019</option>
          <option value=2021>2021</option>";
			break;
			case "2021":
			echo " 
		  <option value=2021>2021</option>
		  <option value=2012>2012</option>
          <option value=2013>2013</option>
          <option value=2014>2014</option>
          <option value=2015>2015</option>
          <option value=2016>2016</option>
          <option value=2017>2017</option>
          <option value=2018>2018</option>
          <option value=2019>2019</option>
          <option value=2020>2020</option>
         ";
			break;
			
			
			
		} ?>
          
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap">Mes de la Actividad:</td>
      <td><label>
        <select name="trimestre" id="trimestre">
        <?php 
	  switch ($row_actividad['trimestre']){
			case "Enero":
			echo " 
		
          <option value=Enero selected=selected>Enero</option>
          <option value=Febrero>Febrero</option>
          <option value=Marzo>Marzo</option>
          <option value=Abril>Abril</option>
          <option value=Mayo>Mayo</option>
          <option value=Junio>Junio</option>
          <option value=Julio>Julio</option>
          <option value=Agosto>Agosto</option>
          <option value=Septiembre>Septiembre</option>
          <option value=Octubre>Octubre</option>
          <option value=Noviembre>Noviembre</option>
          <option value=Diciembre>Diciembre</option>";
			break;
				
				case "Febrero":
			echo " 
		
          <option value=Enero >Enero</option>
          <option value=Febrero selected=selected>Febrero</option>
          <option value=Marzo>Marzo</option>
          <option value=Abril>Abril</option>
          <option value=Mayo>Mayo</option>
          <option value=Junio>Junio</option>
          <option value=Julio>Julio</option>
          <option value=Agosto>Agosto</option>
          <option value=Septiembre>Septiembre</option>
          <option value=Octubre>Octubre</option>
          <option value=Noviembre>Noviembre</option>
          <option value=Diciembre>Diciembre</option>";
			break;	
			
			case "Marzo":
			echo " 
		
          <option value=Enero>Enero</option>
          <option value=Febrero>Febrero</option>
          <option value=Marzo selected=selected >Marzo</option>
          <option value=Abril>Abril</option>
          <option value=Mayo>Mayo</option>
          <option value=Junio>Junio</option>
          <option value=Julio>Julio</option>
          <option value=Agosto>Agosto</option>
          <option value=Septiembre>Septiembre</option>
          <option value=Octubre>Octubre</option>
          <option value=Noviembre>Noviembre</option>
          <option value=Diciembre>Diciembre</option>";
			break;	
			
			
			case "Abril":
			echo " 
		
          <option value=Enero>Enero</option>
          <option value=Febrero>Febrero</option>
          <option value=Marzo>Marzo</option>
          <option value=Abril selected=selected>Abril</option>
          <option value=Mayo>Mayo</option>
          <option value=Junio>Junio</option>
          <option value=Julio>Julio</option>
          <option value=Agosto>Agosto</option>
          <option value=Septiembre>Septiembre</option>
          <option value=Octubre>Octubre</option>
          <option value=Noviembre>Noviembre</option>
          <option value=Diciembre>Diciembre</option>";
			break;
			
			case "Mayo":
			echo " 
		
          <option value=Enero >Enero</option>
          <option value=Febrero>Febrero</option>
          <option value=Marzo>Marzo</option>
          <option value=Abril>Abril</option>
          <option value=Mayo selected=selected>Mayo</option>
          <option value=Junio>Junio</option>
          <option value=Julio>Julio</option>
          <option value=Agosto>Agosto</option>
          <option value=Septiembre>Septiembre</option>
          <option value=Octubre>Octubre</option>
          <option value=Noviembre>Noviembre</option>
          <option value=Diciembre>Diciembre</option>";
			break;
				case "Junio":
			echo " 
		
          <option value=Enero >Enero</option>
          <option value=Febrero>Febrero</option>
          <option value=Marzo>Marzo</option>
          <option value=Abril>Abril</option>
          <option value=Mayo>Mayo</option>
          <option value=Junio selected=selected>Junio</option>
          <option value=Julio>Julio</option>
          <option value=Agosto>Agosto</option>
          <option value=Septiembre>Septiembre</option>
          <option value=Octubre>Octubre</option>
          <option value=Noviembre>Noviembre</option>
          <option value=Diciembre>Diciembre</option>";
			break;
			
			case "Julio":
			echo " 
		
          <option value=Enero >Enero</option>
          <option value=Febrero>Febrero</option>
          <option value=Marzo>Marzo</option>
          <option value=Abril>Abril</option>
          <option value=Mayo>Mayo</option>
          <option value=Junio>Junio</option>
          <option value=Julio selected=selected>Julio</option>
          <option value=Agosto>Agosto</option>
          <option value=Septiembre>Septiembre</option>
          <option value=Octubre>Octubre</option>
          <option value=Noviembre>Noviembre</option>
          <option value=Diciembre>Diciembre</option>";
			break;
			
			case "Agosto":
			echo " 
		
          <option value=Enero >Enero</option>
          <option value=Febrero>Febrero</option>
          <option value=Marzo>Marzo</option>
          <option value=Abril>Abril</option>
          <option value=Mayo>Mayo</option>
          <option value=Junio>Junio</option>
          <option value=Julio >Julio</option>
          <option value=Agosto selected=selected >Agosto</option>
          <option value=Septiembre>Septiembre</option>
          <option value=Octubre>Octubre</option>
          <option value=Noviembre>Noviembre</option>
          <option value=Diciembre>Diciembre</option>";
			break;
				case "Septiembre":
			echo " 
		
          <option value=Enero >Enero</option>
          <option value=Febrero>Febrero</option>
          <option value=Marzo>Marzo</option>
          <option value=Abril>Abril</option>
          <option value=Mayo>Mayo</option>
          <option value=Junio>Junio</option>
          <option value=Julio>Julio</option>
          <option value=Agosto>Agosto</option>
          <option value=Septiembre selected=selected>Septiembre</option>
          <option value=Octubre>Octubre</option>
          <option value=Noviembre>Noviembre</option>
          <option value=Diciembre>Diciembre</option>";
			break;
			
			case "Octubre":
			echo " 
		
          <option value=Enero >Enero</option>
          <option value=Febrero>Febrero</option>
          <option value=Marzo>Marzo</option>
          <option value=Abril>Abril</option>
          <option value=Mayo>Mayo</option>
          <option value=Junio>Junio</option>
          <option value=Julio>Julio</option>
          <option value=Agosto>Agosto</option>
          <option value=Septiembre>Septiembre</option>
          <option value=Octubre selected=selected>Octubre</option>
          <option value=Noviembre>Noviembre</option>
          <option value=Diciembre>Diciembre</option>";
			break;
			
			
			case "Noviembre":
			echo " 
		
          <option value=Enero >Enero</option>
          <option value=Febrero>Febrero</option>
          <option value=Marzo>Marzo</option>
          <option value=Abril>Abril</option>
          <option value=Mayo>Mayo</option>
          <option value=Junio>Junio</option>
          <option value=Julio>Julio</option>
          <option value=Agosto>Agosto</option>
          <option value=Septiembre>Septiembre</option>
          <option value=Octubre>Octubre</option>
          <option value=Noviembre selected=selected>Noviembre</option>
          <option value=Diciembre>Diciembre</option>";
			break;
				case "Diciembre":
			echo " 
		
          <option value=Enero>Enero</option>
          <option value=Febrero>Febrero</option>
          <option value=Marzo>Marzo</option>
          <option value=Abril>Abril</option>
          <option value=Mayo>Mayo</option>
          <option value=Junio>Junio</option>
          <option value=Julio>Julio</option>
          <option value=Agosto>Agosto</option>
          <option value=Septiembre>Septiembre</option>
          <option value=Octubre>Octubre</option>
          <option value=Noviembre>Noviembre</option>
          <option value=Diciembre selected=selected>Diciembre</option>";
			break;
			
			
			
			
			
		} ?>
         
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombre de la Actividad:</td>
      <td><input name="nombre" type="text" value="<?php echo $row_actividad['nombre']; ?>" size="50" maxlength="50" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Responsable de la Actividad:</td>
      <td><input name="responsable" type="text" value="<?php echo $row_actividad['responsable']; ?>" size="50" maxlength="50" /></td>
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
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_actividad['id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($actividad);
?>
