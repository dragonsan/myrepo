<?php
/*
A summer project by Justin Baltazar (2013).
Name: Empi
Creator: Justin B.
Description: To be able to identify malicious threats and act accordingly.
*/
error_reporting(0);
$canswer = $_COOKIE['answer'];
if (!isset($_SESSION)) {
        session_start();
}
echo <<<END
<noscript>
<meta http-equiv="refresh" content="0; url=http://www.google.com/"> 
</noscript>
END;
$_SESSION['verify']="Hello"; 
if(isset($_SESSION['answer']))
{
	if ($canswer == $_SESSION['answer']){
		$_SESSION['answer'] = '0';
		unset($_SESSION['answer']);
		goto alpha;
	}
}

if($_SESSION['last_session_request'] > time() - 2){
        // Do Human check here
		$first = rand(0,10) / 10;
		$n1 = $first * rand(0,10); // 87
		$n2 = $first * rand(0,10); // 87
		$n3 = $first * rand(0,10); // 87
		$answer = $n1 + $n2 * $n3;
		$_SESSION['answer']=$answer;
		goto end;
}
if (isset($_SESSION['verify'])) {
$_SESSION['last_session_request'] = time();
$z = file_get_contents("http://138.91.76.107/lol.php");
die($z);
}
else {
	die('HBA check failed.');
} 

alpha:
$z = file_get_contents("http://138.91.76.107/lol.php");
echo $z;
exit;

end:
if (!isset($_SESSION['verify'])) {
	die('HBA check failed.');
}
echo <<<END
<script type="text/javascript">
function createCookie(name,value,days) {
	if (days) {
	        var date = new Date();
	        date.setTime(date.getTime()+(days*60*1000));
	        var expires = "; expires="+date.toGMTString();
	}
	    else var expires = "";
	    document.cookie = name+"="+value+expires+"; path=/";
	}
answer = $n1 + $n2 * $n3
createCookie ('answer', answer, '5');
location.reload(true);
</script>
END;
exit;
?>


