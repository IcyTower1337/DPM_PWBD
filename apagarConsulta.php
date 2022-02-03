<?php 
include './basedados.h';
include './constUtilizadores.php';

if(!isset($_SESSION["user"])){
    
    

    if(isset($_GET["idConsulta"])){
        $consulta = $_GET["idConsulta"];

        $sql = "DELETE FROM consulta
                WHERE idConsulta = '$consulta'";
        mysqli_query($conDB, $sql);
        echo mysqli_error($conDB);
        header('location: ./Consultas.php');


    }
    else{
        echo "<script>
        alert('Erro!');
        window.location.href = './Consultas.php';
        </script>";
    }





}
else{
    echo "<script>
        alert('Efectue Login Primeiro.');
        window.location.href = './login.php';
        </script>";
}


?>