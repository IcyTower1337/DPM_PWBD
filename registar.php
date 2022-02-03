<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registar</title>
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body style="background-color:whitesmoke; background-image: url(img/bg.jpg); background-size: 100%">
    
    <div class="container my-auto vertical-center">
        <div class="jumbotron align-items-center align-content-center text-center mx-auto " style="max-width: 20rem; margin-top: 3%;">
            <form action="validarRegisto.php" method="POST">
                <h1 class="form-text">REGISTO</h1><br><br>
                <p class="form-text">Utilizador: <input type="text" placeholder="Utilizador" name="user" required></p>
                <p class=" form-text">Password: <input type="password" placeholder="********" name="pass" required></p>
                <p class=" form-text">Confirmar: <input type="password" placeholder="********" name="confirmPassword" required></p>
                <p class=" form-text">E-mail: <input type="email" placeholder="email@domain.com" name="email" required></p>
                <p class=" form-text">Morada: <input type="text" placeholder="Morada" name="morada" required></p>
                <p class=" form-text">Telefone: <input type="tel" pattern="[0-9]{9}" placeholder="999999999" name="telefone" required></p>
                <p><input type="checkbox" required> Aceito os Termos de Serviço.</p>
                <br><br>
                <input type="submit" class=" btn-primary" value="Registo" name="registo">
            </form>
            <br><br>
            <p>Já se encontra registado?</p><a href="login.php">Faça o Login aqui.</a>
        </div>
    </div>

</body>
</html>