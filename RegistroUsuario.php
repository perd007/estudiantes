<?php require_once('Connections/conexion.php'); ?>
<?php 
//validar usuario
if($validacion==true){
	if($admin==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para registrar usuarios Registros');location.href='principal.php' </script>";
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

$m=$_POST["modificaciones"];
$c=$_POST["consultas"];
$e=$_POST["eliminaciones"];
$r=$_POST["registros"];
$a=$_POST["administrar"];

//validar permisos
if($m!=""){
$m=1;
}
else{
$m=0;
}
//
if($c!=""){
$c=1;
}
else{
$c=0;
}
//
if($e!=""){
$e=1;
}
else{
$e=0;
}
//
if($r!=""){
$r=1;
}
else{
$r=0;
}
//
if($a!=""){
$a=1;
}
else{
$a=0;
}


//chequear usuario
mysql_select_db($database_conexion, $conexion);
$sqlV="select usuario from seguridad where usuario='$_POST[login]'";
$resultadoV=mysql_query($sqlV, $conexion) or die(mysql_error());
$verificar=mysql_fetch_assoc($resultadoV);


if($verificar["usuario"]==$_POST['login']){
echo "<script type=\"text/javascript\">alert ('Usuario ya Registrado'); location.href='principal.php' </script>";
 exit;

}


  $insertSQL = sprintf("INSERT INTO seguridad ( usuario, clave, modificar, consultar, registrar, eliminar, administrar) VALUES ( %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString($_POST['clave'], "text"),
                       GetSQLValueString($m, "int"),
                       GetSQLValueString($c, "int"),
                       GetSQLValueString($r, "int"),
                       GetSQLValueString($e, "int"),
					   GetSQLValueString($a, "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
   if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados');  location.href='Principal.php' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='Principal.php' </script>";
  exit;
  }
}





/*
//validar usuario
include("login.php");
if($validacion==true){
	if($Admi==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar esta funcion'); </script>";
 exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido');  </script>";
 exit;

}
*/
?><html>
<head>

<title>Registro Usuarios</title>

<style type="text/css">
<!--
.Estilo1 {font-weight: bold}
.Estilo2 {color: #000000}
.blanco {
	color: #000000;
}

-->
</style>
</head>
<script language="javascript">
<!--
function validar(){



		   if(document.form1.login.value==""){
		   alert("DEBE INGRESAR UN LOGIN");
		   return false;
		   }
		    if(document.form1.clave.value==""){
		   alert("DEBE INGRESAR UNA CLAVE");
		   return false;
		   }
		 
		  
		 	  if(document.form1.modificaciones.checked==false) { 
			 	
			  		if(document.form1.eliminaciones.checked==false){
						
			 				if(document.form1.consultas.checked==false){ 
							
								if(document.form1.registros.checked==false){ 
			 					
		   						alert("DEBE INGRESAR ALGUN PERMISO PARA ESTE USUARIO");
		   						return false;
									}
								}
							
						}
					
				
			}
			
			
			
			
   }
   
//-->
</script>

<body>
<form id="form1" name="form1" method="post" onSubmit="return validar()"  action="<?php echo $editFormAction; ?>">
  <p>&nbsp;</p>
  <table width="504" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr bgcolor="#00CCFF" >
      <td colspan="2" align="center" bgcolor="#EAEECA" class="blanco" scope="row">Registro de Seguridad</td>
    </tr>
    <tr bgcolor="#00CCFF" >
      <td width="219" bgcolor="#FFFFFF" scope="row"><div align="right">Usuario</div></td>
      <td width="354" bgcolor="#FFFFFF"><label>
        <input name="login" type="text"  id="login" maxlength="10" />
      </label></td>
    </tr>
    <tr>
      <td scope="row"><div align="right">Contrase&ntilde;a</div></td>
      <td><input name="clave" type="text"  id="clave" maxlength="10" /></td>
    </tr>
    <tr>
      <td colspan="2" scope="row"><div align="right">
        <div align="center">Permisos de los Usuarios</div>
      </div></td>
    </tr>
    <tr >
      <td colspan="2"  scope="row"><label>
        <input type="checkbox" name="modificaciones" value="modificaciones" />
         Modificaciones
          <input type="checkbox" name="registros" value="registros" />
          Registros
          <input type="checkbox" name="eliminaciones" value="eliminaciones" />
          Eliminaciones
          <input type="checkbox" name="consultas" value="consultas" />
      Consultas 
      <input name="administrar" type="checkbox" id="administrar" value="administar" /> 
      Administar
</label></td>
    </tr>
    <tr>
      <th colspan="2" bgcolor="#EAEECA" scope="row"><label>
        <input name="Submit" type="submit" value="Guardar" />
      </label></th>
    </tr>
  </table>
<p>&nbsp;  </p>
   <p>
     <input type="hidden" name="MM_insert" value="form1" />
	 
      </p>
</form>

<p>&nbsp;</p>
</body>
</html>
