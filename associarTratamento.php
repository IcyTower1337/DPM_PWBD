<?php 
include './basedados.h';
include './constUtilizadores.php';

if(!isset($_SESSION["user"])){
    
    $enfermeiro = $_GET["userEnfermeiro"];    

    if(isset($_GET["idTratamento"])){
        $tratamento = $_GET["idTratamento"];

        $sql = "UPDATE tratamento
                SET userEnfermeiro='$enfermeiro'
                WHERE idTratamento = '$tratamento'";
        mysqli_query($conDB, $sql);
        echo mysqli_error($conDB);
        header('location: ./Tratamentos.php');


    }
    else{
        echo "<script>
        alert('Erro!');
        window.location.href = './Tratamentos.php';
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