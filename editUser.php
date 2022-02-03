<?php
    include './basedados.h';
    include './constUtilizadores.php';
    session_start();

    if(isset($_POST["editado"])){

        //Verificar Dados não é necessário pois foi feito no login com o campo 'required'
        $user = $_SESSION["user"];
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
    
    
        $md5Password = md5($pass);
        $update = "UPDATE utilizador SET password='$md5Password', morada='$morada', telefone='$telefone' WHERE utilizador='$user'";
        mysqli_query($conDB, $update);
        echo mysqli_error($conDB);

        echo "<script>
            alert('Utilizador Editado!');
            window.location.href = './index.php';
            </script>";
    
    }
    else{
        session_destroy();
        echo "<script>
            alert('Um erro ocorreu, por favor tente novamente!');
            window.location.href = './registar.php';
            </script>";
        
    }



?>