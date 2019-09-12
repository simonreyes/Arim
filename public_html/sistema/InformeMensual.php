<?php 
define('HOST_DB', 'localhost'); 
define('USER_DB', 'root'); 
define('PASS_DB', ''); 
define('NAME_DB', 'nikovald_aridos'); 
function conectar()
{global $conexion; 
//Definición global para poder utilizar en todo el contexto 
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB) or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS'); 
mysql_select_db(NAME_DB) or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . mysql_error()); 
} function desconectar(){ global $conexion; mysql_close($conexion); }  

$Nom_Cliente = "";
$RutClie = "";
$idcliente= ""; 

$NombreCli = "";


if($_POST){ 

$busqueda1 = trim($_POST['buscar1']);  
$busqueda2 = trim($_POST['buscar2']); 
$entero = 0;  

if (empty($busqueda))
{
$texto = 'Búsqueda sin resultados'; 
}
else { 

// Select Trae Datos Cotización

// Si hay información para buscar, abrimos la conexión
conectar(); mysql_set_charset('utf8'); 
$sql = "SELECT * FROM cliente ";  
$resultado = mysql_query($sql); 
if (mysql_num_rows($resultado) > 0){  
$registros = 'HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros '; 
// Se almacenan las cadenas de resultado 
while($fila = mysql_fetch_assoc($resultado))
{  
$Nom_Cliente .= $fila['Nombre_Cliente'];
}  
    
}else{ $texto = "NO HAY RESULTADOS EN LA BBDD";  } 
mysql_close($conexion); } 
}
?>


<!DOCTYPE html>
<html lang="en" style="width: 97vw">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Informe Mensual</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="resources/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="resources/css_mdb/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="resources/css_mdb/mdb.min.css" rel="stylesheet">
  <!-- DataTables CSS -->
  <link href="resources/css_mdb/addons/datatables.min.css" rel="stylesheet">
  <!-- DataTables CSS -->
  <link href="resources/buttons/css_mdb/buttons.dataTables.min.css" rel="stylesheet">
  <!-- DataTables Select CSS -->
  <link href="resources/css_mdb/addons/datatables-select.min.css" rel="stylesheet">
  <!-- Jquery UI-->
  <link href="resources/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" >
  <!-- Your custom styles (optional) -->
  <link href="resources/css/style.css" rel="stylesheet">

  <style type="text/css">
      .dtHorizontalVerticalExampleWrapper {
          margin: 0 auto;
      }

      #dtHorizontalVerticalExample th, td {
      white-space: nowrap;
      }

      table.dataTable thead .sorting:after,
      table.dataTable thead .sorting:before,
      table.dataTable thead .sorting_asc:after,
      table.dataTable thead .sorting_asc:before,
      table.dataTable thead .sorting_asc_disabled:after,
      table.dataTable thead .sorting_asc_disabled:before,
      table.dataTable thead .sorting_desc:after,
      table.dataTable thead .sorting_desc:before,
      table.dataTable thead .sorting_desc_disabled:after,
      table.dataTable thead .sorting_desc_disabled:before {
      bottom: .5em;
      }
  </style>
</head>

<body>

  <!-- Start your project here-->
<div class="flex-center flex-column">
  <h5 class="animated fadeIn mb-3">TRANSPORTES EDGARDO CRISTIAN MORENO SOLIS E.I.R.L</h5>

  <p class="animated fadeIn text-muted">Informe Moreno Fecha Desde - Hasta</p>
</div>

<div class="flex-center flex-column">
<form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
   <table class="table">
   <tbody>
    <tr>
      <td>Fecha Desde : </td>
      <td><input placeholder="20160501" id="buscar1" name="buscar1" type="text"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>Fecha Hasta </td>
      <td><input placeholder="20160501" id="buscar2" name="buscar2" type="text"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><input type="submit" name="buscador" class="boton peque aceptar" value="Buscar"></td>
    </tr>
  </tbody>  
 </table>
</form>
</div>

<div id="dvData">
<form method="post"> 
<div>   
   <table class="table" id="dvData">
  <tbody>
    <tr>
      <td><font color="red">Fecha Inicial: 
      <?php 
        if($_POST){ 
        ?> 
        <?php echo $busqueda1; ?>
      <?php 
        }
      ?> 
      <font></td> 
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><font color="red">Fecha Final: 
      <?php 
        if($_POST){ 
        ?> 
        <?php echo $busqueda2; ?>
      <?php 
        }
      ?> 
      <font></td>       
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr> 
    </tbody>  
   </table>
 </div>

<div>
  <table class="table table-striped table-bordered table-sm w-auto" id="dtHorizontalExample" 
         width="100%">
  <thead class="black white-text">   
    <tr>
        <th class="th-sm">Fecha</th>
        <th class="th-sm">EIRL</th>
        <th class="th-sm">Guía Manual</th>
        <th class="th-sm">Proveedor</th>
        <th class="th-sm">Cliente</th>
        <th class="th-sm">Destino</th>
        <th class="th-sm">Producto</th>
        <th class="th-sm">MT3</th>
        <th class="th-sm">Transporte</th>
        <th class="th-sm">Patente</th>
        <th class="th-sm">Chofer</th>
        <th class="th-sm">Tarifa</th>
        <th class="th-sm">Valor</th>
        <th class="th-sm">Arido</th>
        <th class="th-sm">Valor</th>
        <th class="th-sm">Comisión</th>
        <th class="th-sm">Valor</th>
        <th class="th-sm">Venta Final</th>
        <th class="th-sm">Valor</th>
        <th class="th-sm">Total</th>
        <th class="th-sm">Porcentaje</th>
        <th class="th-sm">Guía Prov</th>    
      </tr>
    </thead>
    <tbody>
    <?php 
    if($_POST){ 
    
    $busqueda1 = $_POST['buscar1'];  
    $busqueda2 = $_POST['buscar2']; 
      
    $num_fact = "";  
    $FechaCreacion = ""; 
    $num_guia = ""; 
    $Proveedor = "Pendiente";
    $destino = "";  
    $detalle = "";
    $cantidad = "";
    $transporte = "";
    $patente = "";
    $chofer = "";

    conectar(); mysql_set_charset('utf8'); 
    $sql = "SELECT * FROM Guia WHERE Fecha_Guia  >=  '" .$busqueda1. "' and Fecha_Guia  <=  '" .$busqueda2. "'  and Status <> 'Anulada' order by iguia ASC";  
    $resultado = mysql_query($sql);     
    while($fila = mysql_fetch_assoc($resultado))
    {  
     
    $FechaCreacion = ""; 
    $num_guia = ""; 
    $MT3 = "";
    $transporte = "";
    $patente = "";
    $chofer = "";
    $destino = ""; 
    $Prod = "";
    $Proveedor = "";
    $cliente = "";
    $Comision = "";
    $VFinal = "";
    
    $FechaCreacion = $fila['Fecha_Guia']; 
    $num_guia = $fila['Num_Guia'];
    $guiamanual = $fila['guia_manual'];
    $guiaprov = $fila['guia_prov'];
    $Proveedor = $fila['Proveedor']; 
    $cliente = $fila['idCliente']; 
    $destino = $fila['idobra']; 
    $Prod = $fila['idAridos'];
    $MT3 = $fila['Cantidad'];
    $transporte = $fila['Transp_Guia'];
    $patente = $fila['Patente_Guia'];
    $chofer = $fila['Chofer_Guia'];   
    $Cubo = $fila['Cubo'];
    $KM = $fila['Km'];
    $VArido = $fila['ValorArido'];
    $Comision = $fila['Comision'];
    $VFinal = $fila['VentaFinal'];
    
    $sql4 = "SELECT * FROM aridos WHERE idAridos  =  '" .$Prod. "'";  
    $resultado4 = mysql_query($sql4);     
    while($fila4 = mysql_fetch_assoc($resultado4))
    {  
    $Nom_aridos = "";
    $Nom_aridos .= $fila4['glosa'];
    }
    
    $sql5 = "SELECT * FROM proveedores WHERE IdProveedor  =  '" .$Proveedor. "'";  
    $resultado5 = mysql_query($sql5);     
    while($fila5 = mysql_fetch_assoc($resultado5))
    {  
    $Nom_Prov = "";
    $Nom_Prov .= $fila5['Proveedor'];
    }
    
    $sql6 = "SELECT * FROM cliente WHERE idCliente  =  '" .$cliente. "'";  
    $resultado6 = mysql_query($sql6);     
    while($fila6 = mysql_fetch_assoc($resultado6))
    {  
    $Nom_Clie = "";
    $Nom_Clie .= $fila6['Nombre_Cliente'];
    }
     
    $sql7 = "SELECT * FROM clienteobras WHERE idobra =  '" .$destino. "'";  
    $resultado7 = mysql_query($sql7);     
    while($fila7 = mysql_fetch_assoc($resultado7))
    {  
    $Nom_obra = "";
    $Nom_obra .= $fila7['nombreobra'];
    } 
     
     
    $valor_trans = 0;
    $valor_trans = $Cubo * $KM ;
      
      
      IF ($transporte == "EUGENIO ROJAS QUEZADA"){      
        $Cubo = 0;
        $Cubo = 120;
        $valor_trans = 0;
        $valor_trans = $Cubo * $KM ;        
      }
      
      IF ($cliente == 58 or $cliente == 50 and $destino == 47){
        $Cubo = 0;
        $valor_trans = 0;
        $valor_trans = 2500 ;
      }
      
      IF ($cliente == 58 or $cliente == 50 and $destino == 69){
        $Cubo = 0;
        $valor_trans = 0;
        $valor_trans = 2000 ;
      }
      
      IF ($cliente == 58 or $cliente == 50 and $Prod == 70) 
        {
          $Cubo = 0;
          $valor_trans = 0;
        }   
        
    $total_tarifa = 0;
    $total_tarifa = $valor_trans * $MT3;
    $total_Arido = 0;
    $total_Arido = $VArido * $MT3;
    $total_Comi = 0;
    $total_Comi = $Comision * $MT3;
    $total_VF = 0;
    $total_VF = $VFinal * $MT3;
    $Total = 0;
    $Total = ($total_tarifa + $total_Arido + $total_Comi);
    $Total1 = 0;
    $Total1 = $total_VF - $Total;
    $porcetaje = 0;
    $porcetaje = round(($Total1 * 100)/ $total_VF);
    $porcetaje2 = "";
    $porcetaje2 = $porcetaje ."%";
    
    ?> 
    <tr>
      <td><?php echo $FechaCreacion; ?></td>
      <td><?php echo $num_guia; ?></td>
      <td><?php echo $guiamanual; ?></td>
      <td><?php echo $Nom_Prov; ?></td>
      <td><?php echo $Nom_Clie; ?></td>
      <td><?php echo $Nom_obra; ?></td>   
      <td><?php echo $Nom_aridos; ?></td>
      <td><?php echo $MT3; ?></td>
      <td><?php echo $transporte; ?></td>
      <td><?php echo $patente; ?></td>
      <td><?php echo $chofer; ?></td>
      <td><?php echo $valor_trans; ?></td>
      <td><?php echo $total_tarifa; ?></td>
      <td><?php echo $VArido; ?></td>
      <td><?php echo $total_Arido; ?></td>
      <td><?php echo $Comision; ?></td>
      <td><?php echo $total_Comi; ?></td>
      <td><?php echo $VFinal; ?></td>
      <td><?php echo $total_VF; ?></td>
      <td><?php echo $Total1; ?></td>
      <td><?php echo $porcetaje2; ?></td>
      <td><?php echo $guiaprov; ?></td>     
    </tr>
    <?php     
     }  
    }
    ?>    
    </tbody>
  </table>
</div>
</div>

<div>
  <table class="table">
  <tr>
    <td size="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;</td> 
    <td size="40"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" id="btnExport" value=" Export Excel " />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VistaGral.php'"></td> 
   </tr>
</table>

</div>
<!-- Start your project here-->

<!-- SCRIPTS -->
<!-- JQuery 3.4.1 -->
<script type="text/javascript" src="resources/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="resources/js/popper.min.js"></script>
<!-- Bootstrap 4.3.1 core JavaScript -->
<script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="resources/js/mdb.min.js"></script>
<!-- Jquery UI -->
<script type="text/javascript" src="resources/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<!-- Datepicker Jquery Ui -->
<script type="text/javascript" src="resources/jquery-ui-1.12.1/datepicker-es.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" src="resources/js/addons/datatables.min.js" ></script>
<!-- DataTables Button -->
<script type="text/javascript" href="resources/buttons/js/dataTables.buttons.min.js"></script>
<!-- Button Flash -->
<script type="text/javascript" href="resources/buttons/js/buttons.flash.min.js"></script>
<!-- Button HTML5 -->
<script type="text/javascript" href="resources/buttons/js/buttons.html5.min.js"></script>
<!-- DataTables Select JS -->
<script type="text/javascript" href="resources/js/addons/datatables-select.min.js"></script>

<!-- Javascript Functions -->
<script>
$(document).ready( function () {
    $('#dtHorizontalExample').DataTable({
      //dom: 'Blfrtip',
      //buttons: ['csv','excel'],
      "scrollX": true,
      "scrollY": "70vh",
      "scrollCollapse": true,
      "language": {"url": "../sistema/resources/Spanish.json"},
      "lengthMenu": [[-1, 50, 100, 200], ["Todos", 50, 100, 200]],
      
      initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value="">Mostrar todos</option></select>')
                   .appendTo( $(column.header()) )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );

                          $( select ).click( function(e) {
                 e.stopPropagation();
           });
            } );
        }
    });

    $('.dataTables_length').addClass('bs-select');


    $("#btnExport").click(function(e) {
      window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvData').html()));
      e.preventDefault();
    });

    $(function () {
      $.datepicker.setDefaults($.datepicker.regional["es"]);

      $("#buscar1").datepicker({
      firstDay: 1,
      dateFormat: "yymmdd"
    });

    $("#buscar2").datepicker({
      firstDay: 1,
      dateFormat: "yymmdd"
    });

    });
});
</script>
</body>

</html>