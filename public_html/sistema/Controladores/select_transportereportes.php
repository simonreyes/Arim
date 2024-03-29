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
    $query = "SELECT DISTINCT(g.Transp_Guia) as nombretransp FROM Guia as g WHERE Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaFinal."' ORDER BY nombretransp";
    $query = mysqli_query($con, $query);
   
 $queryc = "SELECT COUNT(*) as numrows FROM Guia WHERE Fecha_Guia >= '".$FechaInicial."' AND Fecha_Guia <= '".$FechaFinal."'";
    $count_queryTR = mysqli_query($con, $queryc);
    if ($rowTR = mysqli_fetch_array($count_queryTR)){$numrowsTR = $rowTR['numrows'];}
    else {echo mysqli_error($con);}
    // Generate HTML of state options list 
    if($numrowsTR > 0){ 
        echo '<option value="">Selecciona Transportista</option>';
        echo '<option value="ALL">*SELECCIONA TODOS*</option>';
        while($row = mysqli_fetch_array($query)){  
            echo '<option value="'.$row['nombretransp'].'">'.$row['nombretransp'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Transportistas no disponibles</option>'; 
    } 
}
?>  