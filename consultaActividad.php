<?php require_once('Connections/conexion.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];



$maxRows_act = 10;
$pageNum_act = 0;
if (isset($_GET['pageNum_act'])) {
  $pageNum_act = $_GET['pageNum_act'];
}
$startRow_act = $pageNum_act * $maxRows_act;

mysql_select_db($database_conexion, $conexion);
$query_act = "SELECT * FROM actividades";
$query_limit_act = sprintf("%s LIMIT %d, %d", $query_act, $startRow_act, $maxRows_act);
$act = mysql_query($query_limit_act, $conexion) or die(mysql_error());
$row_act = mysql_fetch_assoc($act);

if (isset($_GET['totalRows_act'])) {
  $totalRows_act = $_GET['totalRows_act'];
} else {
  $all_act = mysql_query($query_act);
  $totalRows_act = mysql_num_rows($all_act);
}
$totalPages_act = ceil($totalRows_act/$maxRows_act)-1;

$queryString_act = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_act") == false && 
        stristr($param, "totalRows_act") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_act = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_act = sprintf("&totalRows_act=%d%s", $totalRows_act, $queryString_act);


if($totalRows_act<=0){
echo "<script type=\"text/javascript\">alert ('No existen Actividades registradas'); location.href='principal.php?link=link7' </script>";
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
.blanco {
	color: #000000;
}
.centro {
	text-align: center;
}
.centro {
	text-align: center;
}
-->
</style>
</head>
<script language="javascript">
<!--

function validar(){

			var valor=confirm('¿Esta seguro de Eliminar esta Actividad?');
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
<p>&nbsp;</p>
<table width="548" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr class="blanco">
    <th colspan="7" bgcolor="#EAEECA" scope="col">Consulta de Actividades</th>
  </tr>
  <tr class="blanco">
    <th width="59" bgcolor="#EAEECA" scope="col">Año</th>
    <th width="111" bgcolor="#EAEECA" scope="col">Mes</th>
    <th width="83" bgcolor="#EAEECA" scope="col">Actividad</th>
    <th width="109" bgcolor="#EAEECA" scope="col">Responsable</th>
    <th width="78" bgcolor="#EAEECA" scope="col">Estatus</th>
    <th width="47" bgcolor="#EAEECA" scope="col">Opcion</th>
    <th width="45" bgcolor="#EAEECA" scope="col">Opcion</th>
  </tr>
  <?php do { ?>
    <tr class="centro">
      <td><?php echo $row_act['ano']; ?></td>
      <td><?php echo $row_act['trimestre']; ?></td>
      <td><?php echo $row_act['nombre']; ?></td>
      <td><?php echo $row_act['responsable']; ?></td>
      <td><?php echo $row_act['estatus']; ?></td>
      <td bgcolor="<?php echo $color; ?>" class="centro"><?php echo "<a href='Principal.php?link=link81&id=$row_act[id]'>Modificar</a>"; ?></td>
      <td bgcolor="<?php echo $color; ?>" class="centro"><?php echo "<a onClick='return validar()' href='Principal.php?link=link82&id=$row_act[id]'>Eliminar</a>"; ?></td>
    </tr>
    <?php } while ($row_act = mysql_fetch_assoc($act)); ?>
</table>
<table border="0" align="center">
  <tr>
    <td><?php if ($pageNum_act > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_act=%d%s", $currentPage, 0, $queryString_act); ?>"><img src="./First.gif" /></a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_act > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_act=%d%s", $currentPage, max(0, $pageNum_act - 1), $queryString_act); ?>"><img src="./Previous.gif" /></a>
    <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_act < $totalPages_act) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_act=%d%s", $currentPage, min($totalPages_act, $pageNum_act + 1), $queryString_act); ?>"><img src="./Next.gif" /></a>
    <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_act < $totalPages_act) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_act=%d%s", $currentPage, $totalPages_act, $queryString_act); ?>"><img src="./Last.gif" /></a>
    <?php } // Show if not last page ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($act);
?>
