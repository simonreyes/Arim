<?php 
// Include the database config file 
require_once ("../Controladores/conexion.php");
 
if(!empty($_POST["Arido"])){
    // Fetch state data based on the specific country 
    //$query = "SELECT DISTINCT(p.Proveedor), a.idProveedor FROM aridos as a LEFT JOIN proveedores as p ON a.idProveedor = p.idProveedor WHERE a.glosa = '".$_POST["Arido"]."' ORDER BY p.Proveedor";
    //Selecciona Todos los proveedores (POr ahora, en espera de posibles correcciones)
    $query = "SELECT DISTINCT(p.Proveedor), a.idProveedor FROM aridos as a LEFT JOIN proveedores as p ON a.idProveedor = p.idProveedor ORDER BY p.Proveedor";

    $query = mysqli_query($con, $query);

    //$count_queryTR = mysqli_query($con,"SELECT count(*) AS numrows FROM aridos as a LEFT JOIN proveedores as p ON a.idProveedor = p.idProveedor WHERE a.glosa = '".$_POST["Arido"]."'");
    $count_queryTR = mysqli_query($con,"SELECT count(*) AS numrows FROM aridos as a LEFT JOIN proveedores as p ON a.idProveedor = p.idProveedor");
    if ($rowTR = mysqli_fetch_array($count_queryTR)){$numrowsTR = $rowTR['numrows'];}
    else {echo mysqli_error($con);}
    
    // Generate HTML of state options list 
    if($numrowsTR > 0){ 
        echo '<option value="">Selecciona Proveedor</option>'; 
        while($row = mysqli_fetch_array($query)){  
            echo '<option value="'.$row['idProveedor'].'">'.$row['Proveedor'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Proveedores no disponibles</option>'; 
    } 
}elseif(!empty($_POST["idProv"])){
    //$query = "SELECT sucursal FROM aridos WHERE idProveedor = ".$_POST['idProv']." AND glosa = '".$_POST['ari']."'";
    $query = "SELECT DISTINCT(sucursal) FROM aridos WHERE idProveedor = ".$_POST['idProv']."";
    $query = mysqli_query($con, $query);

    //$count_queryTR = mysqli_query($con,"SELECT COUNT(*) as numrows FROM aridos WHERE idProveedor = ".$_POST['idProv']." AND glosa = '".$_POST['ari']."'");
    $count_queryTR = mysqli_query($con,"SELECT COUNT(*) as numrows FROM aridos WHERE idProveedor = ".$_POST['idProv']."");
    if ($rowTR = mysqli_fetch_array($count_queryTR)){$numrowsTR = $rowTR['numrows'];}
    else {echo mysqli_error($con);}
    
    // Generate HTML of state options list 
    if($numrowsTR > 0){ 
        echo '<option value="">Selecciona Sucursal</option>'; 
        while($row = mysqli_fetch_array($query)){  
            echo '<option value="'.$row['sucursal'].'">'.$row['sucursal'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Sucursales no disponibles</option>'; 
    }
} 
?>