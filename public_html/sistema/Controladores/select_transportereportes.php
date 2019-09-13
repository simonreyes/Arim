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
    $query = "SELECT DISTINCT(g.Transp_Guia) as nombretransp FROM guia as g WHERE Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaFinal."' ORDER BY nombretransp";
    $query = mysqli_query($con, $query);

    $count_queryTR = mysqli_query($con, "SELECT COUNT(t.nombre) as numrows FROM guia as g INNER JOIN transporte as t ON g.Transp_Guia = t.nombre WHERE Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaInicial."'");
    if ($rowTR = mysqli_fetch_array($count_queryTR)){$numrowsTR = $rowTR['numrows'];}
    else {echo mysqli_error($con);}
    
    // Generate HTML of state options list 
    if($numrowsTR > 0){ 
        echo '<option value="">Selecciona Transportista</option>'; 
        while($row = mysqli_fetch_array($query)){  
            echo '<option value="'.$row['idTransp'].'">'.$row['nombretransp'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Transportistas no disponibles</option>'; 
    } 
}
?>  