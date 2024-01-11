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



//verificar que el alumno no este registrado
mysql_select_db($database_conexion, $conexion);
$query_alumno = "SELECT * FROM alumno where cedula='$_POST[cedula]'";
$alumno = mysql_query($query_alumno, $conexion) or die(mysql_error());
$row_alumno = mysql_fetch_assoc($alumno); 

if($_POST['cedula']==$row_alumno["cedula"]){
 		echo "<script type=\"text/javascript\">alert ('Este alumno ya esta registrado'); location.href='Principal.php?link=link111&representante=$repre&representante2=$repre2' </script>";
  		exit;
}
// fin de la verificacion

//verificar que LA CEDULA NO SEA LA MISMA DEL REPRESENTANTE
mysql_select_db($database_conexion, $conexion);
$query_representantes2 = "SELECT * FROM alumno where cedulaR='$_POST[cedula]' or cedulaR2='$_POST[cedula]'";
$representantes2 = mysql_query($query_representantes2, $conexion) or die(mysql_error());
$row_representantes2 = mysql_fetch_assoc($representantes2);
$totalRows_representantes2 = mysql_num_rows($representantes2);

if($_POST['cedula']==$row_representantes2["cedula"]){
 		echo "<script type=\"text/javascript\">alert ('La cedula alumno es igual a la de un representante'); location.href='Principal.php?link=link111&representante=$repre&representante2=$repre2' </script>";
  		exit;
}


// fin de la verificacion



$insertSQL = sprintf("INSERT INTO alumno (cedula, nombre, sexo, edad, fecha_nac, lugarNac, nacionalidad, procedencia, camisa, pantalon, zapato, nombreR, cedulaR, direccionR, existeR, edadR, nacionalidadR, ingresoR, nombreR2, cedulaR2, existeR2, edadR2, nacionalidadR2, nivelR2, ocupacionR2, direccionR2, ingresoR2, nombreR3, cedulaR3, edadR3, nacionalidadR3, nivelR3, direccionR3, ingresoR3, vive, parientes, hermanos, zonav, enfer1, enfer2, impedimento, vacunas) VALUES ( %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cedula'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['sexo'], "text"),
                       GetSQLValueString($_POST['edad'], "int"),
                       GetSQLValueString($_POST['fecha'], "date"),
                       GetSQLValueString($_POST['lugarNac'], "date"),
                       GetSQLValueString($_POST['nacionalidad'], "text"),
                       GetSQLValueString($_POST['procedencia'], "text"),
                       GetSQLValueString($_POST['camisa'], "text"),
                       GetSQLValueString($_POST['pantalon'], "text"),
                       GetSQLValueString($_POST['zapato'], "text"),
                       GetSQLValueString($_POST['nombreR'], "text"),
                       GetSQLValueString($_POST['cedulaR'], "int"),
                       GetSQLValueString($_POST['direccionR'], "text"),
                       GetSQLValueString($_POST['existeR'], "text"),
                       GetSQLValueString($_POST['edadR'], "text"),
                       GetSQLValueString($_POST['nacionalidadR'], "text"),
                       GetSQLValueString($_POST['ingresoR'], "text"),
                       GetSQLValueString($_POST['nombreR2'], "text"),
                       GetSQLValueString($_POST['cedulaR2'], "int"),
                       GetSQLValueString($_POST['existeR2'], "text"),
                       GetSQLValueString($_POST['edadR2'], "text"),
                       GetSQLValueString($_POST['nacionalidadR2'], "text"),
                       GetSQLValueString($_POST['nivelR2'], "text"),
                       GetSQLValueString($_POST['ocupacionR2'], "text"),
                       GetSQLValueString($_POST['direccionR2'], "text"),
                       GetSQLValueString($_POST['ingresoR2'], "text"),
                       GetSQLValueString($_POST['nombreR3'], "text"),
                       GetSQLValueString($_POST['cedulaR3'], "int"),
                       GetSQLValueString($_POST['edadR3'], "text"),
                       GetSQLValueString($_POST['nacionalidadR3'], "text"),
                       GetSQLValueString($_POST['nivelR3'], "text"),
                       GetSQLValueString($_POST['direccionR3'], "text"),
                       GetSQLValueString($_POST['ingresoR3'], "text"),
                       GetSQLValueString($_POST['vive'], "text"),
                       GetSQLValueString($_POST['parientes'], "text"),
                       GetSQLValueString($_POST['hermanos'], "text"),
                       GetSQLValueString($_POST['zonav'], "text"),
                       GetSQLValueString($_POST['enfer1'], "text"),
                       GetSQLValueString($_POST['enfer2'], "text"),
                       GetSQLValueString($_POST['impedimento'], "text"),
                       GetSQLValueString($_POST['vacunas'], "text"));
					   




  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
  if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados');  location.href='principal.php' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='principal.php' </script>";
  exit;
  }
  

}




?>
<html>
<head>
<title>Documento sin t&iacute;tulo</title>

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
.Estilo6 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo7 {	color: #000000;
	font-style: italic;
	font-weight: bold;
}
-->
</style>
</head>

<script language="javascript">

function validar(){
		if(document.form1.cedula.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedula').value)){
				alert('Solo puede ingresar numeros en la cedula de alumno!!!');
				return false;
		   		}
				}
				
				
		if(document.form1.edad.value!=""){
			 var filtro = /^(\d)+$/i;
		   	  if (!filtro.test(document.getElementById('edad').value)){
				alert('Solo puede ingresar numeros en la edad de alumno!!!');
				return false;
		   		}
				}
				if(document.form1.edadR.value!=""){
			 var filtro = /^(\d)+$/i;
		   	  if (!filtro.test(document.getElementById('edadR').value)){
				alert('Solo puede ingresar numeros en la edad del padre!!!');
				return false;
		   		}
				}
				if(document.form1.edadR2.value!=""){
			 var filtro = /^(\d)+$/i;
		   	  if (!filtro.test(document.getElementById('edadR2').value)){
				alert('Solo puede ingresar numeros en la edad de la madre!!!');
				return false;
		   		}
				}
				if(document.form1.edadR3.value!=""){
			 var filtro = /^(\d)+$/i;
		   	  if (!filtro.test(document.getElementById('edadR3').value)){
				alert('Solo puede ingresar numeros en la edad del representante legal!!!');
				return false;
		   		}
				}
		if(document.form1.cedulaR.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedulaR').value)){
				alert('Solo puede ingresar numeros en la cedula del padre!!!');
				return false;
		   		}
				}
				if(document.form1.cedulaR2.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedulaR2').value)){
				alert('Solo puede ingresar numeros en la cedula de la madre!!!');
				return false;
		   		}
				}
				
			if(document.form1.cedulaR3.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedulaR3').value)){
				alert('Solo puede ingresar numeros en la cedula del representante legal!!!');
				return false;
		   		}
				}
				
	
				if(document.form1.cedula.value==""){
						alert("Debe Ingresar la Cedula de alumno");
						return false;
				}
				
				
				if(document.form1.edad.value==""){
						alert("Debe Ingresar la Edad del Alumno");
						return false;
				}
				if(document.form1.nombre.value==""){
						alert("Debe Ingresar el Nombre del Alumno");
						return false;
				}
			
				if(document.form1.apellido.value==""){
						alert("Debe Ingresar el Apellido del Alumno");
						return false;
				}
				
				if(document.form1.direccion.value==""){
						alert("Debe Ingresar la Direccion del Alumno");
						return false;
				}
				
					
				
				if(document.form1.cedulaR.value==""){
						alert("Debe Ingresar la Cedula del Padre");
						return false;
				}
				
				if(document.form1.nombreR.value==""){
						alert("Debe Ingresar el Nombre del Padre");
						return false;
				}

				if(document.form1.direccionR.value==""){
						alert("Debe Ingresar la Direccion del Padre");
						return false;
				}
				
				
				if(document.form1.cedulaR2.value==""){
						alert("Debe Ingresar la Cedula de la Madre");
						return false;
				}
				
				if(document.form1.nombreR2.value==""){
						alert("Debe Ingresar el Nombre de la Madre");
						return false;
				}
			
				
				if(document.form1.direccionR2.value==""){
						alert("Debe Ingresar la Direccion de la Madre");
						return false;
				}
				
				
				
				if(document.form1.cedulaR3.value==""){
						alert("Debe Ingresar la Cedula del Representante Legal");
						return false;
				}
				
				if(document.form1.nombreR3.value==""){
						alert("Debe Ingresar el Nombre del Representante Legal");
						return false;
				}
			
				
				if(document.form1.direccionR3.value==""){
						alert("Debe Ingresar la Direccion del Representante Legal");
						return false;
				}
				
				}
			
			
</script>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" onSubmit="return validar()">

<table align="center"  width="600"  >
     
  </table>


  <table width="526" align="center" cellpadding="3">
    
     <tr valign="baseline">
       <td width="514" colspan="2" align="right" nowrap="nowrap"><div align="center"><em><strong>Registro de Estudiantes </strong></em></div></td>
     </tr>
     <tr valign="baseline">
       <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><div align="center" class="Estilo7">Datos de Estudiante </div></td>
     </tr> 
	
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><div align="left">Cedula:
          <input name="cedula" id="cedula" type="text" value="" size="8" maxlength="8" />
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;Nombre:
<input name="nombre" type="text" value="" size="32" maxlength="50" />
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Sexo:
          <select name="sexo" id="sexo">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;Nacionalidad:
<select name="nacionalidad" id="nacionalidad">
  <option value="Venezolano">Venezolano</option>
  <option value="Extranjero">Extranjero</option>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edad:
<input name="edad" id="edad" type="text" value="" size="2" maxlength="2" />
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Procedencia:
          <input name="procedencia" type="text" value="" size="50" maxlength="50">
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><div align="left">Tallas:
&nbsp;&nbsp;&nbsp;
          <label>Camisa:
          <input name="camisa" type="text" value="" size="5" maxlength="5">
          </label>
&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;Pantalon:
<input name="pantalon" type="text" value="" size="5" maxlength="5">
&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zapato:
<input name="zapato" type="text" value="" size="5" maxlength="5">
      </div>      </td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Fecha de Naciento:
          <input name="fecha" type="text" class="Estilo6" id="fecha" value="2012-01-01" size="15" readonly>
          <button type="button" id="cal-button-1" title="Clic Para Escoger la fecha">Fecha</button>
      <script type="text/javascript">
							Calendar.setup({
							  inputField    : "fecha",
							  ifFormat   : "%Y-%m-%d",
							  button        : "cal-button-1",
							  align         : "Tr"
							});
						  </script>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap"><div align="left">Lugar de Nacimiento: 
          <input name="lugarNac" type="text" value="" size="30" maxlength="50">
      </div></td>
    </tr>
    
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><div align="center" class="Estilo7">Ingrese los Datos del Padre </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap bgcolor="#CCCCCC"><div align="left">Cedula :
          <input name="cedulaR" type="text" id="cedulaR" value="" size="9" maxlength="9">
&nbsp;&nbsp;&nbsp;Nombre y Apellido:
<input name="nombreR" type="text" id="nombreR" value="" size="40" maxlength="50">
      </div>
      <div align="left"></div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap><div align="left">Existe:&nbsp;Si<input name="existeR" type="radio" value="si">
No<input name="existeR" type="radio" value="no">
&nbsp;
&nbsp;&nbsp;&nbsp;edad
<input name="edadR" type="text" id="edadR" value="" size="2" maxlength="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nacionalidad:
<select name="nacionalidadR" id="nacionalidadR">
  <option value="Venezolano">Venezolano</option>
  <option value="Extranjero">Extranjero</option>
</select>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap bgcolor="#CCCCCC"><div align="left">Ingreso Economico: 
        <input name="ingresoR" type="text" value="" size="5" maxlength="10">
      &nbsp;&nbsp; Direccion:
      <input name="direccionR" type="text" id="direccionR" onKeyDown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }" value="" size="45" maxlength="200">
</div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap bgcolor="#EAEECA"><div align="center" class="Estilo7">Ingrese los Datos de la Madre </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap bgcolor="#FFFFFF"><div align="left">Cedula :
          <input name="cedulaR2" type="text" id="cedulaR2" value="" size="9" maxlength="9">
&nbsp;&nbsp;&nbsp;&nbsp;Nombre y Apellido:
          <input name="nombreR2" type="text" value="" size="40" maxlength="50">
       </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap bgcolor="#CCCCCC"><div align="left">Existe:&nbsp;Si
          <input name="existeR2" type="radio" value="si">
No
<input name="existeR2" type="radio" value="no">
&nbsp;
&nbsp;&nbsp;&nbsp;edad
<input name="edadR2" type="text" id="edadR2" value="" size="2" maxlength="2">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nacionalidad:
<select name="nacionalidadR2" id="nacionalidadR2">
  <option value="Venezolano">Venezolano</option>
  <option value="Extranjero">Extranjero</option>
</select>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap bgcolor="#FFFFFF"><div align="left">Ingreso Economico:
        <input name="ingresoR2" type="text" value="" size="5" maxlength="10">
  &nbsp;&nbsp; Direccion:
  <input name="direccionR2" type="text" id="direccionR2" onKeyDown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }" value="" size="45" maxlength="200">
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap bgcolor="#CCCCCC"><div align="left">Nivel de Instruccion:
          <input name="nivelR2" type="text" value="" size="20" maxlength="20">
  &nbsp;&nbsp; Ocupacion: 
  <input name="ocupacionR2" type="text" value="" size="30" maxlength="50">
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap bgcolor="#EAEECA"><div align="center"><span class="Estilo7">Ingrese los Datos del Representante Legal </span></div></td>
    </tr>
    
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><div align="left">Cedula :
          <input name="cedulaR3" type="text" id="cedulaR3" value="" size="9" maxlength="9">
&nbsp;&nbsp;&nbsp;Nombre y Apellido:
<input name="nombreR3" type="text" id="nombreR2" value="" size="40" maxlength="50">
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Edad:
          <input name="edadR3" type="text" id="edadR3" value="" size="2" maxlength="2">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nacionalidad:
  <select name="nacionalidadR3" id="nacionalidadR3">
    <option value="Venezolano">Venezolano</option>
    <option value="Extranjero">Extranjero</option>
  </select>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><div align="left">Ingreso Economico:
        <input name="ingresoR3" type="text" value="" size="5" maxlength="10">
  &nbsp;&nbsp; Direccion:
  <input name="direccionR3" type="text" id="direccionR3" onKeyDown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }" value="" size="45" maxlength="200">
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Nivel de Instruccion:
          <input name="nivelR3" type="text" id="nivelR3" value="" size="20" maxlength="20">
&nbsp;
   Ocupacion:
   <input name="ocupacionR3" type="text" id="ocupacionR3" value="" size="30" maxlength="50">
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><div align="center"><span class="Estilo7">Situacion de la Pareja </span></div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><div align="left">El ni&ntilde;o vive con: &nbsp;
&nbsp; Padre
          <input name="vive" type="radio" value="padre">
&nbsp;
&nbsp;  Madre
          <input name="vive" type="radio" value="madre">
&nbsp;&nbsp; Ambos
       <input name="vive" type="radio" value="ambos"> 
&nbsp;&nbsp; Otro Familiar
       <input name="vive" type="radio" value="Otro Familiar">
</div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">N&ordm; de parientes que viven en la familia:
          <input name="parientes" type="text" value="" size="3" maxlength="2">
      &nbsp;&nbsp; N&ordm; de hermanos: 
      <input name="hermanos" type="text" value="" size="3" maxlength="2">
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><div align="center"><span class="Estilo7">Ubicacion de la Vivienda </span></div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"> <div align="left">Zona Rural 
          <input name="zonav" type="radio" value="Zona Rural">
&nbsp;
&nbsp;Zona Urbana 
<input name="zonav" type="radio" value="Zona Urbana">
&nbsp;&nbsp; Rancho
<input name="zonav" type="radio" value="Rancho">
&nbsp;&nbsp; Casa
<input name="zonav" type="radio" value="Casa">
&nbsp;&nbsp; Quinta
<input name="zonav" type="radio" value="Quinta ">
</div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><div align="center"><span class="Estilo7">Aspectos Medicos</span></div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Alguna enfermedad que padece: 
          <input name="enfer1" type="text" value="" size="50" maxlength="50">
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><div align="left">Alguna enfermedad que ha padecido: 
        <input name="enfer2" type="text" value="" size="45" maxlength="50">
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#CCCCCC"><div align="left">Impedimento Fisico Diagnosticado:
          <input name="impedimento" type="text" value="" size="50" maxlength="50">
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><div align="left">Vacunas recibidas: 
        <label></label>
        <label>
        <input name="vacunas" type="text" id="vacunas" size="50" maxlength="100">
        </label>
      </div></td>
    </tr>
    
    
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#EAEECA"><div align="center">
        <input name="submit" type="submit" value="Guardar Datos" />
      </div></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />

</form>
</body>
</html>

