<?php

$host = "localhost";
$user = "root";
$password = "root";
$db = "firma_de_curierat";

session_start();

$data = mysqli_connect($host, $user, $password, $db);
if($data === false){
  die("connection_error");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "select * from user where username = '".$username."' AND
  password = '".$password."'";

  $result = mysqli_query($data, $sql);

  $row = mysqli_fetch_array($result);

  if($row >0){

  if($row["usertype"] == "user"){
    $_SESSION["username"] = $username;
    header("location:userhome.php");
  }
  else if($row["usertype"] == "admin"){
    $_SESSION["username"] = $username;
    header("location:adminhome.php");
  }
  }else {
    echo "email sau parola gresita";
  }
}

?>