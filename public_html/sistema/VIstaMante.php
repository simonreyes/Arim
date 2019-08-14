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
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Menú Mantenedores </b></font></p>
			<a href="http://www.aridosmoreno.cl/sistema/VistaGral.php"><img src="http://www.aridosmoreno.cl/sistema/volver.png"style="width: 100px; height: 30px;"></a>
			<ul id="sdt_menu" class="sdt_menu">
				<li>
					<a href="#">
						<img src="images/4.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Clientes </span>
							<span class="sdt_descr"></span>
						</span>
					</a>
					<div class="sdt_box">
							<a href="http://www.aridosmoreno.cl/sistema/Cliente.php">Ingresar</a>
							<a href="http://www.aridosmoreno.cl/sistema/EditaCliente.php">Editar</a>
							<a href="http://www.aridosmoreno.cl/sistema/EliminaCliente.php">Eliminar</a>
							<a href="http://www.aridosmoreno.cl/sistema/ObraCliente.php">Obras Cliente</a>
							<a href="http://www.aridosmoreno.cl/sistema/EditarObra.php">Editar Obras</a>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/5.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Aridos </span>
							<span class="sdt_descr"></span>
						</span>
					</a>
					<div class="sdt_box">
							<a href="http://www.aridosmoreno.cl/sistema/Aridos.php">Ingresar</a>
							<a href="http://www.aridosmoreno.cl/sistema/ModificaAridos.php">Modificar</a>
							<a href="http://www.aridosmoreno.cl/sistema/EliminarAridos.php">Eliminar</a>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/6.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Proveedores </span>
							<span class="sdt_descr"></span>
						</span>						
					</a>
					<div class="sdt_box">
							<a href="http://www.aridosmoreno.cl/sistema/Proveedor.php">Ingresar</a>
							<a href="http://www.aridosmoreno.cl/sistema/EditaProveedor.php">Editar</a>
							<a href="#"></a>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/7.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Transporte </span>
							<span class="sdt_descr"></span>
						</span>						
					</a>
					<div class="sdt_box">
							<a href="http://www.aridosmoreno.cl/sistema/Transporte.php">Ingresar Emp. y Trans.</a>
							<a href="http://www.aridosmoreno.cl/sistema/EditaTransporte.php">Editar Trans.</a>
							<a href="http://www.aridosmoreno.cl/sistema/EliminaTransporte.php">Eliminar Trans.</a>
							<a href="http://www.aridosmoreno.cl/sistema/NuevoTransporte.php">Nuevo Trans.</a>
					</div>
				</li>
				<li>
					<a href="#">
						<img src="images/11.jpg" alt=""/>
						<span class="sdt_active"></span>
						<span class="sdt_wrap">
							<span class="sdt_link">Usuarios </span>
							<span class="sdt_descr"></span>
						</span>						
					</a>
					<div class="sdt_box">
							<a href="http://www.aridosmoreno.cl/sistema/Usuario.php">Crea Usuario</a>
							<a href="http://www.aridosmoreno.cl/sistema/EditaUsuario.php"> Edita Usuario</a>
							<a href="http://www.aridosmoreno.cl/sistema/EliminaUsuario.php">Elimina Usuario</a>
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