<html>
    <head>
        <title>Menu General</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Slide Down Box Menu with jQuery and CSS3" />
        <meta name="keywords" content="jquery, css3, sliding, box, menu, cube, navigation, portfolio, thumbnails"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
        <style>
			body{
				background:#333 url(bg.jpg) repeat top left;
				font-family:Arial;
			}
			span.reference{
				position:fixed;
				left:10px;
				bottom:10px;
				font-size:12px;
			}
			span.reference a{
				color:#aaa;
				text-transform:uppercase;
				text-decoration:none;
				text-shadow:1px 1px 1px #000;
				margin-right:30px;
			}
			span.reference a:hover{
				color:#ddd;
			}
			ul.sdt_menu{
				margin-top:150px;
			}
			h1.title{
				text-indent:-9000px;
				background:transparent url(title.png) no-repeat top left;
				width:633px;
				height:69px;
			}
		</style>
    </head>

    <body>
		<div class="content">
		<br>
			<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>TRANSPORTES EDGARDO CRISTIAN MORENO SOLIS E.I.R.L </b></font></p>
			<p style="font-size:30px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menú Principal</b></font></p>
			<ul id="sdt_menu" class="sdt_menu">
				<li>
					<a href="#">
						<img src="images/1.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Cotización</span>
							<span class="sdt_descr"></span>
						</span>
					</a>
					<div class="sdt_box">
					    	<a href="http://www.aridosmoreno.cl/sistema/Cotizacion.php">Ingresar</a>
						<a href="http://www.aridosmoreno.cl/sistema/EditaCotizacion.php">Modificar</a>
						<a href="http://www.aridosmoreno.cl/sistema/EliminaCoti.php">Eliminar</a>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/2.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Guía Despacho</span>
							<span class="sdt_descr"></span>
						</span>
					</a>
					<div class="sdt_box">
							<a href="http://www.aridosmoreno.cl/sistema/GuiaDespacho.php">Ingresar</a>
							<a href="http://www.aridosmoreno.cl/sistema/EditarGuiaDespacho.php">Modificar</a>
							<a href="http://www.aridosmoreno.cl/sistema/ActualizarGuiaDespacho.php">Actualizar</a>
							<a href="http://www.aridosmoreno.cl/sistema/AnulaGuiaDespacho.php">Anular</a>
							<a href="http://www.aridosmoreno.cl/sistema/ConsultarGuiaDespacho.php">Consultar</a>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/10.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Facturas</span>
							<span class="sdt_descr"></span>
						</span>
					</a>
					<div class="sdt_box">
							
							<a href="http://www.aridosmoreno.cl/sistema/FacturaEmitidas.php">Factura Emitida</a>
							<a href="http://www.aridosmoreno.cl/sistema/ActFacturaEmitida.php">Act Elim Factura E</a>
							<a href="http://www.aridosmoreno.cl/sistema/FacturaRecibida.php">Ingresar Factura R</a>
							<a href="http://www.aridosmoreno.cl/sistema/ActFacturaRecibida.php">Act Elim Factura R</a>
												</div>
				</li>
				<li>
					<a href="#">
						<img src="images/3.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Reportes</span>
							<span class="sdt_descr"></span>
						</span>
					</a>
					<div class="sdt_box">
							<a href="http://www.aridosmoreno.cl/sistema/ReporteCotiFolio.php">Cotización</a>
							<a href="http://www.aridosmoreno.cl/sistema/ReporteTranspFechas.php">Transporte</a>
							<a href="http://www.aridosmoreno.cl/sistema/ReporteGuiasFechas.php">Venta Aridos</a>
							<a href="http://www.aridosmoreno.cl/sistema/ReporteComision.php">Comisiones</a>	
							<a href="http://www.aridosmoreno.cl/sistema/ReporteProveedor.php">Proveedores</a>								
					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/8.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Informes</span>
							<span class="sdt_descr"></span>
						</span>
					</a>
					<div class="sdt_box">
							<a href="http://www.aridosmoreno.cl/sistema/InformeMensual.php">General Moreno</a>
							<a href="http://www.aridosmoreno.cl/sistema/InfFactCliente.php">Facturas Emitidas</a>
							<a href="http://www.aridosmoreno.cl/sistema/InfFactProv.php">Facturas Recibidas</a>
							<a href="http://www.aridosmoreno.cl/sistema/InfFactProvClie.php">Facturas Recibidas y Emitidas</a>
					</div>
				</li>
				<li>
					<a href="http://www.aridosmoreno.cl/sistema/VIstaMante.php">
						<img src="images/9.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Mantenedores</span>
							<span class="sdt_descr"></span>
						</span>
					</a>
					<div class="sdt_box">
							<a href="#"></a>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/Vales.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Vales</span>
							<span class="sdt_descr"></span>
						</span>
					</a>
					<div class="sdt_box">
							<a href="http://localhost/aridos/public_html/sistema/ingvale.php">Ingresar</a>
							<a href="http://localhost/aridos/public_html/sistema/Editavale.php">Modificar</a>
							<a href="http://localhost/aridos/public_html/sistema/Eliminavale.php">Eliminar</a>
							<a href="http://localhost/aridos/public_html/sistema/reportevale.php">Reporte</a>
					</div>
				</li>
			</ul>
		</div>
        <div>
            <span class="reference">
                <a href="#">Creado por ABSIC || 2016</a>
            </span>
		</div>

        <!-- The JavaScript -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
				/**
				* for each menu element, on mouseenter, 
				* we enlarge the image, and show both sdt_active span and 
				* sdt_wrap span. If the element has a sub menu (sdt_box),
				* then we slide it - if the element is the last one in the menu
				* we slide it to the left, otherwise to the right
				*/
                $('#sdt_menu > li').bind('mouseenter',function(){
					var $elem = $(this);
					$elem.find('img')
						 .stop(true)
						 .animate({
							'width':'170px',
							'height':'170px',
							'left':'0px'
						 },400,'easeOutBack')
						 .andSelf()
						 .find('.sdt_wrap')
					     .stop(true)
						 .animate({'top':'140px'},500,'easeOutBack')
						 .andSelf()
						 .find('.sdt_active')
					     .stop(true)
						 .animate({'height':'170px'},300,function(){
						var $sub_menu = $elem.find('.sdt_box');
						if($sub_menu.length){
							var left = '170px';
							if($elem.parent().children().length == $elem.index()+1)
								left = '-170px';
							$sub_menu.show().animate({'left':left},200);
						}	
					});
				}).bind('mouseleave',function(){
					var $elem = $(this);
					var $sub_menu = $elem.find('.sdt_box');
					if($sub_menu.length)
						$sub_menu.hide().css('left','0px');
					
					$elem.find('.sdt_active')
						 .stop(true)
						 .animate({'height':'0px'},300)
						 .andSelf().find('img')
						 .stop(true)
						 .animate({
							'width':'0px',
							'height':'0px',
							'left':'85px'},400)
						 .andSelf()
						 .find('.sdt_wrap')
						 .stop(true)
						 .animate({'top':'25px'},500);
				});
            });
        </script>
    </body>
</html>