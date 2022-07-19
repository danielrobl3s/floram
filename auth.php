<?php

include "connection.php";

session_start();

$user = $_POST["user"];
$pass = $_POST["pass"];

//$result = $mysql->query("SELECT username FROM users WHERE username = '$user' AND password = '$pass'");
$statement = $mysql->prepare("SELECT username, id FROM users WHERE username =? AND password =?");
$statement->bind_param("ss", $user, $pass);


$statement->execute();
$statement->bind_result($username, $id);

$statement->fetch();

//$rows = $result->fetch_all(MYSQLI_ASSOC);
//var_dump($username, $email);

if ($username != null){
    $_SESSION["name"] = $user;

    //valid user
    echo "Valid user";
}
else{

session_destroy();
//invalid user
echo "Invalid user";
}

?>
