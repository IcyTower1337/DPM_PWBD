<!DOCTYPE html>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Tratamentos</title>
    <script src='bootstrap.min.js'></script>
    <link rel='stylesheet' href='bootstrap.min.css'>
</head>
<body style='background-image: url("./img/bg.jpg"); background-size: 100%;'>
    <?php
    include './navbar.php';
    include './basedados.h';
    include './constUtilizadores.php';

    if(!isset($_SESSION["tipoUser"])){
        echo "<script>
            alert('Inicie Sessão Primeiro.');
            window.location.href = './login.php';
            </script>";
    }

    if($_SESSION["tipoUser"]== UTILIZADOR_NAO_APROVADO){
        echo "<script>
            alert('Utilizador não aprovado. Tente mais tarde.');
            window.location.href = './index.php';
            </script>";
    }


    if($_SESSION["tipoUser"] == DESATIVADO){
        echo "<script>
        alert('Conta desativada.');
        window.location.href = './index.php';
        </script>";
    }

    ?>
      <div class='container my-auto vertical-center'>
        <div class='jumbotron align-items-center align-content-center text-center mx-auto ' style='margin-top: 3%; margin-bot: 3%;'>
            

            <?php 
                 if($_SESSION["tipoUser"] == UTILIZADOR || $_SESSION["tipoUser"] == ENFERMEIRO){
        
                
                if($_SESSION["tipoUser"] == UTILIZADOR){
                    echo "<div class='btn-group float-right'>
                    <form method='post' action='./Tratamentos.php'><input type='Submit' class='btn-info btn-lg' value='Marcar Tratamento' name='utilizadorMarcarTratamento'></form>
                    <form method='post' action='./Tratamentos.php'><input type='Submit' class='btn-info btn-lg' value='Ver Tratamentos Marcados' name='utilizadorVerTratamento'></form>
                    </div>";

                    echo "<br>";

                    if(isset($_POST["utilizadorMarcarTratamento"])){

                        echo "<form method='POST' action='marcarTratamento.php?user=".$_SESSION["user"]."'><br><br>
                        
                        <p>Data de Tratamento:</p><input type='datetime-local' required name='data'><br><br>
                        <p>Descrição:</p><input type='text' style='width: 50%;' required placeholder='Descrição do Tratamento (Irá ser visto pelo Enfermeiro)' name='descricao'><br><br>
                        <p>Selecionar Preferência de Enfermeiro:</p><select name='userEnfermeiro'>
                            <option value=''>(Nenhum)</option>";

                            $sql = "SELECT * FROM utilizador WHERE tipoUtilizador = ".ENFERMEIRO."";
                            $retval = mysqli_query( $conDB, $sql );
                            if(! $retval ){
                                die('Could not get data: ' . mysqli_error($conDB));
                            }
                            while($row = mysqli_fetch_array($retval)){
                                echo "<option value='".$row['utilizador']."'>".$row['utilizador']."</option>";
                            }
                        echo "</select><br>
                        <br><br><input type='submit' value='Marcar Tratamento' class=' btn-primary'>
                        </form>";
                        

                    }

                    if(isset($_POST["utilizadorVerTratamento"])){
                        echo " <table class='table'>
                        <tr>
                            <th>Data de Tratamento:</th>
                            <th>Descrição do Tratamento:</th>
                            <th>Enfermerio associado:</th>
                            <th>Cancelar Tratamento:</th>
                        </tr>";

                        $selectUserTratamentos = "SELECT * FROM tratamento";
                        $resUserTratamentos = mysqli_query($conDB, $selectUserTratamentos);
                        if(! $resUserTratamentos){
                            die('Could not get data: ' . mysqli_error($conDB));
                        }
                        while($row = mysqli_fetch_array($resUserTratamentos)){
                            if($row["userPaciente"] == $_SESSION["user"]){
                                echo"
                                <tr>
                                <td>".$row["dataTratamento"]."</td>
                                <td>".$row["descricao"]."</td>
                                <td>".$row["userEnfermeiro"]."</td>
                                <td><a href='apagarTratamento.php?idTratamento=".$row["idTratamento"]."' ><img src='./img/desativar.png' width=50 height=50></a></td>
                                ";
                        }
                            }
                            

                        echo "</tr>
                            </table>";



                    }
                   


                }

                if($_SESSION["tipoUser"] == ENFERMEIRO){
                    echo "<div class='btn-group float-right'>
                    <form method='post' action='./Tratamentos.php'><input type='Submit' class='btn-info btn-lg' value='Consultar Horario Pessoal'  name='enfermeiroPessoal'></form>
                    <form method='post' action='./Tratamentos.php'><input type='Submit' class='btn-info btn-lg' value='Consultar Horario sem Enfermeiro' name='enfermeiroPublico'></form>
                    </div>";


                    if(isset($_POST["enfermeiroPessoal"])){
                        echo " <table class='table'>
                        <tr>
                            <th>Data do Tratamento:</th>
                            <th>Descrição do Tratamento:</th>
                            <th>Paciente associado:</th>
                            <th>Desassociar-se do Tratamento:</th>
                        </tr>";

                        $selectUserTratamentos = "SELECT * FROM tratamento";
                        $resUserTratamentos = mysqli_query($conDB, $selectUserTratamentos);
                        if(! $resUserTratamentos){
                            die('Could not get data: ' . mysqli_error($conDB));
                        }
                        while($row = mysqli_fetch_array($resUserTratamentos)){
                            if($row["userEnfermeiro"] == $_SESSION["user"]){
                                echo"
                                <tr>
                                <td>".$row["dataTratamento"]."</td>
                                <td>".$row["descricao"]."</td>
                                <td>".$row["userPaciente"]."</td>
                                <td><a href='associarTratamento.php?idTratamento=".$row["idTratamento"]."&userEnfermeiro=' ><img src='./img/desativar.png' width=50 height=50></a></td>
                                ";
                        }
                            }
                            

                        echo "</tr>
                            </table>";



                    }

                    if(isset($_POST["enfermeiroPublico"])){
                        echo " <table class='table'>
                        <tr>
                            <th>Data do Tratamento:</th>
                            <th>Descrição do Tratamento:</th>
                            <th>Paciente associado:</th>
                            <th>Enfermeiro associado:</th>
                            <th>(Des)Associar-se do Tratamento:</th>
                        </tr>";

                        $selectUserTratamentos = "SELECT * FROM tratamento";
                        $resUserTratamentos = mysqli_query($conDB, $selectUserTratamentos);
                        if(! $resUserTratamentos){
                            die('Could not get data: ' . mysqli_error($conDB));
                        }
                        while($row = mysqli_fetch_array($resUserTratamentos)){
                            if($row["userEnfermeiro"] == $_SESSION["user"]){
                                echo"
                                <tr>
                                <td>".$row["dataTratamento"]."</td>
                                <td>".$row["descricao"]."</td>
                                <td>".$row["userPaciente"]."</td>
                                <td>".$row["userEnfermeiro"]."</td>
                                <td><a href='associarTratamento.php?idTratamento=".$row["idTratamento"]."&userEnfermeiro=' ><img src='./img/desativar.png' width=50 height=50></a></td>
                                ";
                        }
                            else if($row["userEnfermeiro"] == ""){
                                echo"
                                <tr>
                                <td>".$row["dataTratamento"]."</td>
                                <td>".$row["descricao"]."</td>
                                <td>".$row["userPaciente"]."</td>
                                <td>".$row["userEnfermeiro"]."</td>
                                <td><a href='associarTratamento.php?idTratamento=".$row["idTratamento"]."&userEnfermeiro=".$_SESSION["user"]."' ><img src='./img/validar.png' width=50 height=50></a></td>
                                ";
                            }
                            else{
                                echo"
                                <tr>
                                <td>".$row["dataTratamento"]."</td>
                                <td>".$row["descricao"]."</td>
                                <td>".$row["userPaciente"]."</td>
                                <td>".$row["userEnfermeiro"]."</td>
                                <td></td>
                                ";
                            }


                            }
                            

                        echo "</tr>
                            </table>";



                    }


                }

                





            }else{
                    echo "<script>
                    alert('Esta página está disponivel apenas para utilizadores e enfermeiros.');
                    window.location.href = './index.php';
                    </script>";
            }
            
            ?>


            
            <br><br>
    
        </div>
    </div>



</body>
</html>