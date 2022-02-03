<?php 
include './basedados.h';
include './constUtilizadores.php';

session_start();

if (isset($_POST["user"]) && isset($_POST["pass"])){

$user = $_POST["user"];
$pass = $_POST["pass"];
$md5pass = md5($pass);

$check = "SELECT * FROM utilizador WHERE utilizador = '$user' AND password = '$md5pass';";
$runCheck = mysqli_query($conDB, $check);

if(!$runCheck){
    die('Dados não recebidos: '.mysqli_error($conDB));
}
$row = mysqli_fetch_array($runCheck);


if($row["tipoUtilizador"] == DESATIVADO){
    $_SESSION["user"] = $row["utilizador"];
    $_SESSION["tipoUser"] = $row["tipoUtilizador"];
}
else if(strcmp($row["utilizador"], $user) == 0 && strcmp($row["password"], md5($pass)) == 0){
    $_SESSION["user"] = $row["utilizador"];
    $_SESSION["tipoUser"] = $row["tipoUtilizador"];
}
else{
    $_SESSION["user"] = -1;
    $_SESSION["tipoUser"] = -1;
}
header('Location: ./atribuirUser.php');
}
else{
    session_destroy();
    header('Location: ./login.php');
}

?>