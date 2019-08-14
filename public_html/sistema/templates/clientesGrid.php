<div class="bar">
    <a id="new" class="button" href="javascript:void(0);">Agregar Items</a>
</div>
<table>
    <thead>
        <tr>
            <th>PROVEEDOR</th>
            <th>KM</th>
            <th>CUBO/KM</th>
            <th>TARIFA</th>
			<th>VALOR ARIDO</th>
			<th>GANANCIA</th>
			<th>ARIDO</th>
			<th>VALOR</th>
			<th>PEAJE</th>
			<th>COMISION</th>
			<th>VENTA</th>
			<th>VENTA FINAL</th>
			<th>CANTIDAD</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->clientes as $cliente):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $cliente['Proveedor'];?></td>
                <td><?php echo $cliente['Km'];?></td>
                <td><?php echo $cliente['Cubo'];?></td>
                <td><?php echo $cliente['Tarifa'];?></td>
				<td><?php echo $cliente['ValorArido'];?></td>
				<td><?php echo $cliente['Ganancia'];?></td>
				<td><?php echo $cliente['glosa'];?></td>
				<td><?php echo $cliente['Valor'];?></td>
				<td><?php echo $cliente['Peaje'];?></td>
				<td><?php echo $cliente['Comision'];?></td>
				<td><?php echo $cliente['Venta'];?></td>
				<td><?php echo $cliente['VentaFinal'];?></td>
				<td><?php echo $cliente['Cantidad'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $cliente['id_user'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $cliente['id_user'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
