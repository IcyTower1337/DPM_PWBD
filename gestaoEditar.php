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
        <?php echo "<form action='setRank.php?User=".$_GET["User"]."' method='POST'>";
        ?>
                <h1 class="form-text">ESCOLHER RANK:</h1><br><br>
                <select class="custom-select" name="rank">
                    <option value="1">1 - ADMINISTRADOR</option>
                    <option value="2">2 - MEDICO</option>
                    <option value="3">3 - ENFERMEIRO</option>
                    <option value="4">4 - UTILIZADOR</option>
                    <option value="5">5 - UTILIZADOR NAO APROVADO</option>
                    <option value="6">7 - DESATIVADO</option>
                </select><br><br><br>
                <input type="submit" class="btn-primary" value="Promover/Despromover">

            </form>
        
            


        </div>
    </div>

</body>
</html>