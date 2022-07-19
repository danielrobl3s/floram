<?php 

include "code/class.email.php";
$obj = new Email();

$message  = "Me gustas mucho bebé";
$obj->sendEmail("hermosaduranvaz@gmail.com", "Tu novio", "Me encantas", $message);

?>