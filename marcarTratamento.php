<?php 
include './basedados.h';
include './constUtilizadores.php';

if(!isset($_SESSION["user"])){
    $user = $_GET["user"];

    $data = $_POST["data"];
    $descricao = $_POST["descricao"];
    $enfermeiro = $_POST["userEnfermeiro"];

    $verificarDisponibilidade = "SELECT * FROM tratamento WHERE userEnfermeiro = '$enfermeiro' AND dataTratamento = '$data';";
    $retval = mysqli_query($conDB, $verificarDisponibilidade);

    if(mysqli_num_rows($retval) == 0){
        $sql = "INSERT INTO tratamento(dataTratamento, userPaciente, userEnfermeiro, descricao)
        VALUES ('$data','$user','$enfermeiro','$descricao')";
        mysqli_query($conDB, $sql);
        echo mysqli_error($conDB);
        header('location: ./Tratamentos.php');


    }
    else{
        echo "<script>
        alert('Enfermeiro requisitado encontra-se indisponivel na data requisitada');
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