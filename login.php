<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">

</head>

<body style="background-color:whitesmoke; background-image: url(img/bg.jpg); background-size: 100%">
    
    <div class="container my-auto vertical-center">
        <div class="jumbotron align-items-center align-content-center text-center mx-auto " style="max-width: 20rem; margin-top: 3%;">
            <form action="validarLogin.php" method="POST">
                <h1 class="form-text">LOGIN</h1><br><br>

                <p class="form-text">Utilizador: </p>
                <br>
                <input type="text" name="user" required>
                <br><br>
                <p class=" form-text">Password:</p>
                <br>
                <input type="password" name="pass" required><br>
                <br><br>
                <input type="submit" class=" btn-primary" value="Login" >
            </form>
            <br><br>
            <p>Ainda não está registado?</p><a href="registar.php">Registe-se aqui.</a>
        
            


        </div>
    </div>

</body>
</html>