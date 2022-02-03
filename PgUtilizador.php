<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Painel de Utilizador</title>
  <script src="bootstrap.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body style="background-color:whitesmoke; background-image: url(img/bg.jpg); background-size: 100%">
<?php
include './navbar.php';
?>
<div class='container my-auto vertical-center'>
        <div class='jumbotron align-items-center align-content-center text-center mx-auto ' style='max-width: 20rem; margin-top: 3%;'>
            <h1>Gestão</h1><br>
            
          <?php
            include './constUtilizadores.php';

            switch($_SESSION["tipoUser"]){

              case UTILIZADOR_NAO_APROVADO:
                echo "<script>
                alert('A sua conta ainda não foi aprovada por um Administrador. Por favor tente mais tarde.');
                window.location.href = './index.php';
                </script>";
              break;
              case DESATIVADO:
                echo "<script>
                alert('Conta Desativada.');
                window.location.href = './index.php';
                </script>";
              break;
              case UTILIZADOR:
                echo "
                <form action='User.php' ><button type='submit' class=' btn-primary'>Editar Dados <img src='./img/editContact.png' width='50' height='50'></button></form><br>
                <form action='Consultas.php' ><button type='submit' class=' btn-primary'>Consultas <img src='./img/check.png' width='50' height='50'></button></form><br>
                <form action='Tratamentos.php' ><button type='submit' class=' btn-primary'>Tratamentos <img src='./img/treatment.png' width='50' height='50'></button></form><br>
                ";
              break;
              case ENFERMEIRO:
                echo "
                <form action='User.php' ><button type='submit' class=' btn-primary'>Editar Dados <img src='./img/editContact.png' width='50' height='50'></button></form><br>
                <form action='Tratamentos.php' ><button type='submit' class=' btn-primary'>Tratamentos <img src='./img/treatment.png' width='50' height='50'></button></form><br>
                ";
              break;
              case MEDICO:
                echo "
                <form action='User.php' ><button type='submit' class=' btn-primary'>Editar Dados <img src='./img/editContact.png' width='50' height='50'></button></form><br>
                <form action='Consultas.php' ><button type='submit' class=' btn-primary'>Consultas <img src='./img/check.png' width='50' height='50'></button></form><br>
                ";
              break;
              case ADMINISTRADOR:
                echo "
                <form action='User.php' ><button type='submit' class=' btn-primary'>Editar Dados <img src='./img/editContact.png' width='50' height='50'></button></form><br>
                <form action='gerirUsers.php' ><button type='submit' class=' btn-primary'>Editar Utilizadores <img src='./img/userlist.png' width='50' height='50'></button></form><br>
                ";
              break;

            }
          
          ?>
          
          
          
          
          </div>
    </div>

    

</body>
</html>