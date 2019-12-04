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
    $query = "SELECT DISTINCT(c.Nombre_Cliente), g.idCliente FROM Guia as g LEFT JOIN cliente as c ON g.idCliente = c.idCliente WHERE Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaFinal."' ORDER BY c.Nombre_Cliente";
    $query = mysqli_query($con, $query);

    $count_queryTR = mysqli_query($con, "SELECT COUNT(c.Nombre_Cliente) as numrows FROM Guia as g LEFT JOIN cliente as c ON g.idCliente = c.idCliente WHERE Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaFinal."'");
    if ($rowTR = mysqli_fetch_array($count_queryTR)){$numrowsTR = $rowTR['numrows'];}
    else {echo mysqli_error($con);}
    
    // Generate HTML of state options list 
    if($numrowsTR > 0){ 
        echo '<option value="">Selecciona Cliente</option>'; 
        while($row = mysqli_fetch_array($query)){  
            echo '<option value="'.$row['idCliente'].'">'.$row['Nombre_Cliente'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Cliente no disponibles</option>'; 
    } 
}
?>  