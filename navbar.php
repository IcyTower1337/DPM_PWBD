<?php 
    session_start();

    if(isset($_SESSION["user"]) && isset($_SESSION["tipoUser"])){
        echo "
        <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <div class='collapse navbar-collapse' id='navbarTogglerDemo01'>
          <a class='navbar-brand' href='index.php'><img src='./img/logo.png' width='30' height='30' class='d-inline-block align-top'>
            Saude</a>
          <ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
            <li class='nav-item active'>
              <a class='nav-link' href='index.php'>Informação</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='Consultas.php'>Consulta</a>
            </li>
          </ul>
          <form class='form-inline my-2 my-lg-0' action='PgUtilizador.php'>
            <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Gestão</button>
          </form>   
          <form class='form-inline my-2 my-lg-0' action='logout.php'>
            <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Logout</button>
          </form> 
        </div>
      </nav>
        ";

    }
    else{
        echo "
        <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <div class='collapse navbar-collapse' id='navbarTogglerDemo01'>
          <a class='navbar-brand' href='#'><img src='./img/logo.png' width='30' height='30' class='d-inline-block align-top'>
            Saude</a>
          <ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
            <li class='nav-item active'>
              <a class='nav-link' href='index.php'>Informação</a>
            </li>
          </ul>
          <form class='form-inline my-2 my-lg-0' action='login.php'>
            <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Login / Registo</button>
          </form> 
        </div>
      </nav>
        
        ";
        
    }


?>