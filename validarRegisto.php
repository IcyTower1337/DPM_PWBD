<?php
include './basedados.h';
include './constUtilizadores.php';
session_start();


if(isset($_POST["registo"])){

    //Verificar Dados não é necessário pois foi feito no login com o campo 'required'
    $user = $_POST["user"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $confirmPassword = $_POST["confirmPassword"];
    $morada = $_POST["morada"];
    $telefone = $_POST["telefone"];

    if($pass != $confirmPassword)
        {
            echo "<script>
            alert('Palavra Passes Diferentes, tente novamente!');
            window.location.href = './registar.php';
            </script>";
        }

    $checkUserQuery = "SELECT * FROM utilizador WHERE utilizador='$user' OR email='$email' LIMIT 1";
    $resultado = mysqli_query($conDB, $checkUserQuery);
    $userBD = mysqli_fetch_assoc($resultado);

    if($userBD){
        if($userBD['utilizador'] === $user){
            echo "<script>
            alert('Utilizador já existe, tente novamente!');
            window.location.href = './registar.php';
            </script>";
        }

        if($userBD['email'] === $email){
            echo "<script>
            alert('E-mail já existe, tente novamente!');
            window.location.href = './registar.php';
            </script>";
        }

        

    }

    $md5Password = md5($pass);
    $insert = "INSERT INTO utilizador(utilizador, password, email, telefone, morada, tipoUtilizador)
                VALUES('$user','$md5Password','$email','$telefone','$morada','5')";
    mysqli_query($conDB, $insert);
    echo mysqli_error($conDB);
    $_SESSION['user'] = $user;
    $_SESSION['tipoUser'] = 5;

    header("location: ./index.php");
    




}
else{
    session_destroy();
    echo "<script>
        alert('Um erro ocorreu, por favor tente novamente!');
        window.location.href = './registar.php';
        </script>";
    
}


?>