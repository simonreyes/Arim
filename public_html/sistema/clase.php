<?php
class Conexion  // se declara una clase para hacer la conexion con la base de datos
{
	var $con;
	function Conexion()
	{
		// se definen los datos del servidor de base de datos 
		$conection['server']="localhost";  //host
		$conection['user']="aridosem_tems";         //  usuario
		$conection['pass']="aritrans2020";             //password
		$conection['base']="aridosem_bd";           //base de datos
		
		// crea la conexion pasandole el servidor , usuario y clave
		$conect= mysql_connect($conection['server'],$conection['user'],$conection['pass']);

		if ($conect) // si la conexion fue exitosa , selecciona la base
		{
			mysql_select_db($conection['base']);			
			$this->con=$conect;
		}
	}
	function getConexion() // devuelve la conexion
	{
		return $this->con;
	}
	function Close()  // cierra la conexion
	{
		mysql_close($this->con);
	}	

}
class sQuery   // se declara una clase para poder ejecutar las consultas, esta clase llama a la clase anterior
{

	var $coneccion;
	var $consulta;
	var $resultados;
	function sQuery()  // constructor, solo crea una conexion usando la clase "Conexion"
	{
		$this->coneccion= new Conexion();
	}
	function executeQuery($cons)  // metodo que ejecuta una consulta y la guarda en el atributo $pconsulta
	{
		$this->consulta= mysql_query($cons,$this->coneccion->getConexion());
		return $this->consulta;
	}	
	function getResults()   // retorna la consulta en forma de result.
	{return $this->consulta;}
	
	function Close()		// cierra la conexion
	{$this->coneccion->Close();}	
	
	function Clean() // libera la consulta
	{mysql_free_result($this->consulta);}
	
	function getResultados() // debuelve la cantidad de registros encontrados
	{return mysql_affected_rows($this->coneccion->getConexion()) ;}
	
	function getAffect() // devuelve las cantidad de filas afectadas
	{return mysql_affected_rows($this->coneccion->getConexion()) ;}

    function fetchAll()
    {
        $rows=array();
		if ($this->consulta)
		{
			while($row=  mysql_fetch_array($this->consulta))
			{
				$rows[]=$row;
			}
		}
        return $rows;
    }
}




class Cliente
{
	var $nombre;     //se declaran los atributos de la clase, que son los atributos del cliente
	var $km;
	var $cubo;
	Var $tarifa;
	Var $varido;
	Var $ganancia;
	Var $arido;
	Var $valor;
	Var $peaje;
	Var $venta;
	Var $ventaf;
	Var $cantidad;
	Var $cantidad2;
	Var $id;
	
	Var $numero = "";
	Var $folio = "";

    public static function getClientes() 
		{
			$obj_cliente1=new sQuery();
			$result1=$obj_cliente1->executeQuery("SELECT numero FROM folios where letra = 'CT00'"); // ejecuta la consulta para traer al cliente 
			$row1=mysql_fetch_array($result1);
			$numero=$row1['numero'];
			$folio = "CT00" . $numero;
			
			
			$obj_cliente=new sQuery();
			$obj_cliente->executeQuery("select * from cotizacion cot INNER JOIN aridos ar ON cot.idaridos = ar.idaridos where folio = '".$folio."'"); // ejecuta la consulta para traer al cliente

			return $obj_cliente->fetchAll(); // retorna todos los clientes
		}

	function Cliente($nro=0) // declara el constructor, si trae el numero de cliente lo busca , si no, trae todos los clientes
	{
		if ($nro!=0)
		{
			$obj_cliente=new sQuery();
			$result=$obj_cliente->executeQuery("select * from cotizacion where id_user = $nro"); // ejecuta la consulta para traer al cliente 
			$row=mysql_fetch_array($result);
			$this->id=$row['id_user'];
			$this->nombre=$row['Proveedor'];
			$this->km=$row['Km'];
			$this->cubo=$row['Cubo'];
			$this->tarifa=$row['Tarifa'];
			$this->varido=$row['ValorArido'];
			$this->ganancia=$row['Ganancia'];
			$this->arido=$row['idAridos'];
			$this->valor=$row['Valor'];
			$this->peaje=$row['Peaje'];
			$this->venta=$row['Venta'];
			$this->cantidad=$row['Comision'];
			$this->ventaf=$row['VentaFinal'];
			$this->cantidad2=$row['Cantidad'];
		}
	}
		
		// metodos que devuelven valores
	function getID()
	 { return $this->id;}
	function getNombre()
	 { return $this->nombre;}
	function getKm()
	 { return $this->km;}
	function getCubo()
	 { return $this->cubo;}
	function getTarifa()
	 { return $this->tarifa;}
	function getVarido()
	 { return $this->varido;} 
	function getGanancia()
	 { return $this->ganancia;}  
	function getArido()
	 { return $this->arido;}
	function getValor()
	 { return $this->valor;}
	function getPeaje()
	 { return $this->peaje;}
	function getVenta()
	 { return $this->venta;}
	function getCantidad()
	 { return $this->cantidad;}	 
	function getVentaf()
	 { return $this->ventaf;} 
	function getCantidad2()
	 { return $this->cantidad2;} 
	 
		// metodos que setean los valores
	function setNombre($val)
	 { $this->nombre=$val;}
	function setKm($val)
	 {  $this->km=$val;}
	function setCubo($val)
	 {  $this->cubo=$val;}
	function setTarifa($val)
	 {  $this->tarifa=$val;}
	function setVarido($val)
	 {  $this->varido=$val;} 
	function setGanancia($val)
	 {  $this->ganancia=$val;}  
	function setArido($val)
	 {  $this->arido=$val;}
	function setValor($val)
	 {  $this->valor=$val;}	
	function setPeaje($val)
	 {  $this->peaje=$val;}
	function setVenta($val)
	 {  $this->venta=$val;} 
	function setCantidad($val)
	 {  $this->cantidad=$val;}
	function setVentaf($val)
	 {  $this->ventaf=$val;} 
	function setCantidad2($val)
	 {  $this->cantidad2=$val;} 

    function save()
    {
        if($this->id)
        {$this->updateCliente();}
        else
        {$this->insertCliente();}
    }
	private function updateCliente()	// actualiza el cliente cargado en los atributos
	{
			$obj_cliente=new sQuery();
			$query="update cotizacion 
					set Km='$this->km',
					Cubo='$this->cubo',
					Tarifa='$this->tarifa', 
					ValorArido='$this->varido',
					Ganancia='$this->ganancia',
					idAridos='$this->arido',
					Valor='$this->valor',
					Peaje='$this->peaje',
					Venta='$this->venta',
					Comision='$this->cantidad',
					VentaFinal='$this->ventaf',
					Cantidad='$this->cantidad2'	
					where id_user = $this->id";
			$obj_cliente->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return $obj_cliente->getAffect(); // retorna todos los registros afectados
	
	}
	private function insertCliente()	// inserta el cliente cargado en los atributos
	{
						
			$obj_cliente1=new sQuery();
			$result1=$obj_cliente1->executeQuery("SELECT numero FROM folios where letra = 'CT00'"); // ejecuta la consulta para traer al cliente 
			$row1=mysql_fetch_array($result1);
			$numero=$row1['numero'];
			$folio = "CT00" . $numero;
				
			$fecha = date('Ymd');
				
			$obj_cliente=new sQuery();
			$query="insert into cotizacion( Proveedor, 
											Km, 
											Cubo,
											Tarifa,
											ValorArido,
											Ganancia,
											idAridos,
											Valor,
											Peaje,
											Venta,
											Status,
											Folio,
											Fecha,
											IdCliente,
											Comision,
											VentaFinal,
											Cantidad)
			values(	'$this->nombre', 
					'$this->km',
					'$this->cubo',
					'$this->tarifa',
					'$this->varido',
					'$this->ganancia',
					'$this->arido',
					'$this->valor',
					'$this->peaje',
					'$this->venta',
					'Abierta',
					'".$folio."',
					'".$fecha."',
					'9',
					'$this->cantidad',
					'$this->ventaf',
					'$this->cantidad2')";
			
			$obj_cliente->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return $obj_cliente->getAffect(); // retorna todos los registros afectados
			
	}	
	function delete()	// elimina el cliente
	{
			$obj_cliente=new sQuery();
			$query="delete from cotizacion where id_user=$this->id";
			$obj_cliente->executeQuery($query); // ejecuta la consulta para  borrar el cliente
			return $obj_cliente->getAffect(); // retorna todos los registros afectados
	
	}	
	
}
function cleanString($string)
{
    $string=trim($string);
    $string=mysql_escape_string($string);
	$string=htmlspecialchars($string);
	
    return $string;
}