<!DOCTYPE html>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Consultas</title>
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
                 if($_SESSION["tipoUser"] == UTILIZADOR || $_SESSION["tipoUser"] == MEDICO){
        
                
                if($_SESSION["tipoUser"] == UTILIZADOR){
                    echo "<div class='btn-group float-right'>
                    <form method='post' action='./Consultas.php'><input type='Submit' class='btn-info btn-lg' value='Marcar Consulta' name='utilizadorMarcarConsulta'></form>
                    <form method='post' action='./Consultas.php'><input type='Submit' class='btn-info btn-lg' value='Ver Consultas Marcadas' name='utilizadorVerConsulta'></form>
                    </div>";

                    echo "<br>";

                    if(isset($_POST["utilizadorMarcarConsulta"])){

                        echo "<form method='POST' action='marcarConsulta.php?user=".$_SESSION["user"]."'><br><br>
                        
                        <p>Data de Consulta:</p><input type='datetime-local' required name='data'><br><br>
                        <p>Descrição:</p><input type='text' style='width: 50%;' required placeholder='Descrição da razão pela Consulta (Irá ser visto pelo médico)' name='descricao'><br><br>
                        <p>Selecionar Preferência de Médico:</p><select name='userMedico'>
                            <option value=''>(Nenhum)</option>";

                            $sql = "SELECT * FROM utilizador WHERE tipoUtilizador = ".MEDICO."";
                            $retval = mysqli_query( $conDB, $sql );
                            if(! $retval ){
                                die('Could not get data: ' . mysqli_error($conDB));
                            }
                            while($row = mysqli_fetch_array($retval)){
                                echo "<option value='".$row['utilizador']."'>".$row['utilizador']."</option>";
                            }
                        echo "</select><br>
                        <br><br><input type='submit' value='Marcar Consulta' class=' btn-primary'>
                        </form>";
                        

                    }

                    if(isset($_POST["utilizadorVerConsulta"])){
                        echo " <table class='table'>
                        <tr>
                            <th>Data da Consulta:</th>
                            <th>Descrição da Consulta:</th>
                            <th>Médico associado:</th>
                            <th>Cancelar Consulta:</th>
                        </tr>";

                        $selectUserConsultas = "SELECT * FROM consulta";
                        $resUserConsultas = mysqli_query($conDB, $selectUserConsultas);
                        if(! $resUserConsultas){
                            die('Could not get data: ' . mysqli_error($conDB));
                        }
                        while($row = mysqli_fetch_array($resUserConsultas)){
                            if($row["userPaciente"] == $_SESSION["user"]){
                                echo"
                                <tr>
                                <td>".$row["dataConsulta"]."</td>
                                <td>".$row["descricao"]."</td>
                                <td>".$row["userMedico"]."</td>
                                <td><a href='apagarConsulta.php?idConsulta=".$row["idConsulta"]."' ><img src='./img/desativar.png' width=50 height=50></a></td>
                                ";
                        }
                            }
                            

                        echo "</tr>
                            </table>";



                    }
                   


                }

                if($_SESSION["tipoUser"] == MEDICO){
                    echo "<div class='btn-group float-right'>
                    <form method='post' action='./Consultas.php'><input type='Submit' class='btn-info btn-lg' value='Consultar Horario Pessoal'  name='medicoPessoal'></form>
                    <form method='post' action='./Consultas.php'><input type='Submit' class='btn-info btn-lg' value='Consultar Horario sem Médico' name='medicoPublico'></form>
                    </div>";


                    if(isset($_POST["medicoPessoal"])){
                        echo " <table class='table'>
                        <tr>
                            <th>Data da Consulta:</th>
                            <th>Descrição da Consulta:</th>
                            <th>Paciente associado:</th>
                            <th>Desassociar-se da Consulta:</th>
                        </tr>";

                        $selectUserConsultas = "SELECT * FROM consulta";
                        $resUserConsultas = mysqli_query($conDB, $selectUserConsultas);
                        if(! $resUserConsultas){
                            die('Could not get data: ' . mysqli_error($conDB));
                        }
                        while($row = mysqli_fetch_array($resUserConsultas)){
                            if($row["userMedico"] == $_SESSION["user"]){
                                echo"
                                <tr>
                                <td>".$row["dataConsulta"]."</td>
                                <td>".$row["descricao"]."</td>
                                <td>".$row["userPaciente"]."</td>
                                <td><a href='associarConsulta.php?idConsulta=".$row["idConsulta"]."&userMedico=' ><img src='./img/desativar.png' width=50 height=50></a></td>
                                ";
                        }
                            }
                            

                        echo "</tr>
                            </table>";



                    }

                    if(isset($_POST["medicoPublico"])){
                        echo " <table class='table'>
                        <tr>
                            <th>Data da Consulta:</th>
                            <th>Descrição da Consulta:</th>
                            <th>Paciente associado:</th>
                            <th>Médico associado:</th>
                            <th>(Des)Associar-se à consulta:</th>
                        </tr>";

                        $selectUserConsultas = "SELECT * FROM consulta";
                        $resUserConsultas = mysqli_query($conDB, $selectUserConsultas);
                        if(! $resUserConsultas){
                            die('Could not get data: ' . mysqli_error($conDB));
                        }
                        while($row = mysqli_fetch_array($resUserConsultas)){
                            if($row["userMedico"] == $_SESSION["user"]){
                                echo"
                                <tr>
                                <td>".$row["dataConsulta"]."</td>
                                <td>".$row["descricao"]."</td>
                                <td>".$row["userPaciente"]."</td>
                                <td>".$row["userMedico"]."</td>
                                <td><a href='desassociarConsulta.php?idConsulta=".$row["idConsulta"]."&userMedico=' ><img src='./img/desativar.png' width=50 height=50></a></td>
                                ";
                        }
                            else if($row["userMedico"] == ""){
                                echo"
                                <tr>
                                <td>".$row["dataConsulta"]."</td>
                                <td>".$row["descricao"]."</td>
                                <td>".$row["userPaciente"]."</td>
                                <td>".$row["userMedico"]."</td>
                                <td><a href='associarConsulta.php?idConsulta=".$row["idConsulta"]."&userMedico=".$_SESSION["user"]."' ><img src='./img/validar.png' width=50 height=50></a></td>
                                ";
                            }
                            else{
                                echo"
                                <tr>
                                <td>".$row["dataConsulta"]."</td>
                                <td>".$row["descricao"]."</td>
                                <td>".$row["userPaciente"]."</td>
                                <td>".$row["userMedico"]."</td>
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
                    alert('Esta página está disponivel apenas para utilizadores e médicos.');
                    window.location.href = './index.php';
                    </script>";
            }
            
            ?>


            
            <br><br>
    
        </div>
    </div>



</body>
</html>