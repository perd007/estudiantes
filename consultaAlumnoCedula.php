<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>

<style type="text/css">
<!--
.blanco {
	color: #000000;
}
.negrita {
	font-weight: bold;
}
-->
</style>
</head>
<script>
function validar(){

		if(document.form1.cedula.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedula').value)){
				alert('Solo puede ingresar numeros en la cedula de alumno!!!');
				return false;
		   		}
				}
		
				
				if(document.form1.cedula.value==""){
						alert("Debe Ingresar la Cedula de alumno");
						return false;
				}
			
		}

</script>
<body>
<form id="form1" name="form1" onsubmit="return validar()" method="get" action="Principal.php">
  <p>&nbsp;</p>
  <table width="280" border="1" align="center">
    <tr valign="top">
      <th colspan="2" bgcolor="#EAEECA" scope="col"><span class="Estilo1"><span class="blanco">Consulta de Alumnos </span></span></th>
    </tr>
    <tr>
      <td width="98"><div align="right" class="Estilo2"><span class="negrita">Cedula:</span></div></td>
      <td width="166"><span class="Estilo3">
        <label>
        <input name="cedula" type="text" class="Estilo3" id="cedula" size="12" maxlength="8" />
        </label>
      </span></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#EAEECA">
          <div align="center" class="Estilo3">
            <input name="Submit" type="submit" class="Estilo3" value="Consultar" />
            <input type="hidden" name="link" value="link21" />
        </div>
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
