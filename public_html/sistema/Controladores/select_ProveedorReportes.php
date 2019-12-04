<?php 
// Include the database config file 
require_once ("../Controladores/conexion.php");
 
if(!empty($_POST["FechaInicial"])){
    $dateInicial = str_replace('/', '-',$_POST["FechaInicial"]);
    $phpdate = strtotime($dateInicial);
    $FechaInicial = date('Ymd', $phpdate);

    $dateFinal = str_replace('/', '-', $_POST["FechaFinal"]);
    $phpdate = strtotime($dateFinal);
    $FechaFinal = date('Ymd', $phpdate);

    // Fetch state data based on the specific country 
    $query = "SELECT DISTINCT(p.Proveedor) as nombreprov, g.Proveedor as idProv FROM Guia as g INNER JOIN proveedores as p ON g.Proveedor = p.idProveedor WHERE Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaFinal."' ORDER BY p.Proveedor";
    $query = mysqli_query($con, $query);

    $count_queryTR = mysqli_query($con, "SELECT COUNT(p.Proveedor) as numrows FROM Guia as g INNER JOIN proveedores as p ON g.Proveedor = p.idProveedor WHERE Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaFinal."'");
    if ($rowTR = mysqli_fetch_array($count_queryTR)){$numrowsTR = $rowTR['numrows'];}
    else {echo mysqli_error($con);}
    
    // Generate HTML of state options list 
    if($numrowsTR > 0){ 
        echo '<option value="">Selecciona Proveedor</option>'; 
        while($row = mysqli_fetch_array($query)){  
            echo '<option value="'.$row['idProv'].'">'.$row['nombreprov'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Proveedores no disponibles</option>'; 
    } 
}
?>  