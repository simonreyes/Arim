<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$sucursal = new selects();
$sucursal->code = $_GET["code"];
$sucursal = $sucursal->cargarSucursal();
foreach($sucursal as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>