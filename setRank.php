<?php 
    include './basedados.h';
    include './constUtilizadores.php';

    session_start();

    $rank = $_POST["rank"];

    if($_SESSION["tipoUser"] == ADMINISTRADOR){
        $user = $_GET["User"];

        $sql = "UPDATE utilizador SET tipoUtilizador = '$rank' WHERE utilizador = '$user'";

        mysqli_query($conDB, $sql);

        echo mysqli_error($conDB);
        header('location: ./gerirUsers.php');

        

        

    }

?>