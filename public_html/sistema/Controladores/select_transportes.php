<?php 
// Include the database config file 
require_once ("../Controladores/conexion.php");
 
if(!empty($_POST["idTransp"])){
    // Fetch state data based on the specific country 
    $query = "SELECT DISTINCT(patente) FROM transchofer WHERE nombretrans = ".$_POST['idTransp'].""; 
    $query = mysqli_query($con, $query);

    $count_queryTR = mysqli_query($con,"SELECT count(*) AS numrows FROM transchofer WHERE nombretrans = ".$_POST['idTransp']."");
    if ($rowTR = mysqli_fetch_array($count_queryTR)){$numrowsTR = $rowTR['numrows'];}
    else {echo mysqli_error($con);}
    
    // Generate HTML of state options list 
    if($numrowsTR > 0){ 
        echo '<option value="">Selecciona Patente</option>'; 
        while($row = mysqli_fetch_array($query)){  
            echo '<option value="'.$row['patente'].'">'.$row['patente'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Patente no disponibles</option>'; 
    } 
}elseif(!empty($_POST["idTranspChof"])){ 
    $query = "SELECT DISTINCT(chofer) FROM transchofer WHERE nombretrans = ".$_POST['idTranspChof'].""; 
    $query = mysqli_query($con, $query);

    $count_queryTR = mysqli_query($con,"SELECT count(*) AS numrows FROM transchofer WHERE nombretrans = ".$_POST['idTranspChof']."");
    if ($rowTR = mysqli_fetch_array($count_queryTR)){$numrowsTR = $rowTR['numrows'];}
    else {echo mysqli_error($con);}
    
    // Generate HTML of state options list 
    if($numrowsTR > 0){ 
        echo '<option value="">Selecciona Chofer</option>'; 
        while($row = mysqli_fetch_array($query)){  
            echo '<option value="'.$row['chofer'].'">'.$row['chofer'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Chofer no disponibles</option>'; 
    }
} 
?>