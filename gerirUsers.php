<!DOCTYPE html>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Gestão de Utilizadores</title>
    <script src='bootstrap.min.js'></script>
    <link rel='stylesheet' href='bootstrap.min.css'>
</head>
<body style='background-image: url("./img/bg.jpg"); background-size: 100%;'>
    <?php
    include './navbar.php';
    include './basedados.h';
    include './constUtilizadores.php';

    if($_SESSION["tipoUser"]!=ADMINISTRADOR){
        echo "<script>
            alert('Apenas Administradores têm acesso a esta Pagina.');
            window.location.href = './index.php';
            </script>";
    }
    ?>
      <div class='container my-auto vertical-center'>
        <div class='jumbotron align-items-center align-content-center text-center mx-auto ' style='margin-top: 3%; margin-bot: 3%;'>
            <table class="table">
                <tr>
                    <th>Nome Utilizador:</th>
                    <th>Tipo:</th>
                    <th>Telemóvel:</th>
                    <th>Validar/Desativar:</th>
                    <th>Editar Tipo de Utilizador:</th>
                </tr>
                <?php 
                $sql = "SELECT * FROM utilizador";
                $retval = mysqli_query( $conDB, $sql );
                if(! $retval ){
                    die('Could not get data: ' . mysqli_error($conDB));
                }
                while($row = mysqli_fetch_array($retval)){
                    echo"
                        <tr>
                        <td>".$row["utilizador"]."</td>
                        <td>".getDescricaoUtilizador($row["tipoUtilizador"])."</td>
                        <td>".$row["telefone"]."</td>
                        ";
                    
                    if($row["tipoUtilizador"] == UTILIZADOR_NAO_APROVADO || $row["tipoUtilizador"] == DESATIVADO){
                        echo"	<td><a href='gestaoValidar.php?User=".$row["utilizador"]."' ><img src='./img/validar.png' width=50 height=50></a></td>";
                    }
                    else
                    echo"	<td><a href='gestaoDesativar.php?User=".$row["utilizador"]."' ><img src='./img/desativar.png' width=50 height=50></a></td>";;
                    
                    if($row["tipoUtilizador"] != DESATIVADO){
                        echo"	<td><a href='gestaoEditar.php?User=".$row["utilizador"]."' ><img src='./img/editContact.png' width=50 height=50></a></td>";
                    }else
                        echo"<td></td>";
                            
                        
                        echo "</tr>";
					}
					echo"</table>";

			
			function getDescricaoUtilizador($tipoNumerico){
				
				switch($tipoNumerico){
					case ADMINISTRADOR:
						return "Administrador";
					break;
					case MEDICO:
						return "Médico";
					break;
					case ENFERMEIRO:
						return "Enfermeiro";
					break;
					case UTILIZADOR:
						return "Utilizador";
					break;
					case UTILIZADOR_NAO_APROVADO:
						return "Utilizador não Aprovado";
					break;
					case DESATIVADO:
						return "Conta Desativada";
					break;
					default:
						return "Desconhecido";
					break;
				}
				
			}
			
		?>

            
    
        </div>
    </div>



</body>
</html>