<!DOCTYPE html>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
    <script src='bootstrap.min.js'></script>
    <link rel='stylesheet' href='bootstrap.min.css'>
</head>
<body style='background-image: url("./img/bg.jpg"); background-size: 100%;'>
    <?php
    include './navbar.php';
    include './basedados.h';
    include './constUtilizadores.php';
    ?>
      <div class='container my-auto vertical-center'>
        <div class='jumbotron align-items-center align-content-center text-center mx-auto ' style='margin-top: 3%; margin-bot: 3%;'>
            <form action="editUser.php" method="POST">
                <h1 class="form-text">EDITAR</h1><br><br>
                <?php echo "<p class='form-text'> Utilizador: ".$_SESSION['user']."</p>";?>
                <p class=" form-text">Password: <input type="password" placeholder="********" name="pass" required></p>
                <p class=" form-text">Confirmar: <input type="password" placeholder="********" name="confirmPassword" required></p>
                <p class=" form-text">Morada: <input type="text" placeholder="Morada" name="morada" required></p>
                <p class=" form-text">Telefone: <input type="tel" pattern="[0-9]{9}" placeholder="999999999" name="telefone" required></p>
                <br><br>
                <input type="submit" class=" btn-primary" value="Confirmar Edição" name="editado">
            </form>
    
        </div>
    </div>



</body>
</html>