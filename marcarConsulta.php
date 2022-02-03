<?php 
include './basedados.h';
include './constUtilizadores.php';

if(!isset($_SESSION["user"])){
    $user = $_GET["user"];

    $data = $_POST["data"];
    $descricao = $_POST["descricao"];
    $medico = $_POST["userMedico"];

    $verificarDisponibilidade = "SELECT * FROM consulta WHERE userMedico = '$medico' AND dataConsulta = '$data';";
    $retval = mysqli_query($conDB, $verificarDisponibilidade);

    if(mysqli_num_rows($retval) == 0){
        $sql = "INSERT INTO consulta(dataConsulta, userPaciente, userMedico, descricao)
        VALUES ('$data','$user','$medico','$descricao')";
        mysqli_query($conDB, $sql);
        echo mysqli_error($conDB);
        header('location: ./Consultas.php');


    }
    else{
        echo "<script>
        alert('Medico requisitado encontra-se indisponivel na data requisitada');
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