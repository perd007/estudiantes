<?php require_once('Connections/conexion.php'); ?>
<?php 
//validar usuario
if($validacion==true){
	if($cons==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Consultas'); location.href='principal.php' </script>";
    exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido');  location.href='principal.php'  </script>";
 exit;
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {	color: #000000;
	
}


-->
</style>
</head>
<script language="javascript">
function validar(){

		if(document.form2.Alumno.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('Alumno').value)){
				alert('Solo puede ingresar numeros en la cedula del Alumno!!!');
				return false;
		   		}
				}
		if(document.form2.Alumno.value==""){			
		   alert("DEBE INGRESAR LA CEDULA DE ALUMNO");
		   return false;
		  }
				
			
			
			
			
				
		}
</script>

<body>
<form method="post" name="form2" onSubmit="return validar()" action="constanciaEst.php" target="_blank">
  <p>&nbsp;</p>
  <table width="280" border="1" align="center">
       <tr>
         <th colspan="2" bgcolor="#EAEECA" scope="col"><span class="Estilo1">Constancia de Estudio </span></th>
       </tr>
       <tr>
         <td width="98"><div align="right" >Cedula:</div></td>
         <td width="166"><span class="Estilo3">
           <label>
           <input name="Alumno" type="text" class="Estilo3" id="Alumno" size="12" maxlength="8" />
           </label>
         </span></td>
       </tr>
       <tr>
         <td colspan="2" bgcolor="#EAEECA"><div align="center" class="Estilo3">
             <input name="Submit" type="submit" class="Estilo3" id="Submit" value="Buscar" />
             <input type="hidden" name="MM_insert" value="form1" />
         </div>
             </div></td>
       </tr>
     </table>
  <p>&nbsp;</p>
</form>


<p>&nbsp;</p>
</body>
</html>
