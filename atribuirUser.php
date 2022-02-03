<?php 

session_start();

if(!isset($_SESSION["user"]) || !isset($_SESSION["tipoUser"])){
    echo "<script>
    alert('Um erro ocorreu, por favor volte a fazer login');
    window.location.href = './login.php';
</script>";

}
else{
    include "./constUtilizadores.php";
    if($_SESSION["tipoUser"] == UTILIZADOR_NAO_APROVADO){
        echo "<script>
        alert('A sua conta ainda não foi aprovada por um Administrador. Por favor tente mais tarde.');
        window.location.href = './index.php';
        </script>";
    }
    if($_SESSION["tipoUser"] == DESATIVADO){
        session_destroy();
        echo "<script>
        alert('Conta Desativada.');
        window.location.href = './index.php';
        </script>";
    }
    if ($_SESSION["user"] == -1 && $_SESSION["tipoUser"] == -1){
        echo "<script>
        alert('Dados incorretos! Tente Novamente.');
        window.location.href = './login.php';
        </script>";
    }
    else{
        echo "<script>window.location.href = './PgUtilizador.php';</script>";
    }


}


?>