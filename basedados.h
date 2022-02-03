<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'paulosantos');

$conDB = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

if(!($conDB )){
    echo "Erro a conectar à Base de Dados.";
    exit;
}

if(!($selDB = mysqli_select_db($conDB, DB_NAME))){
    echo "Erro a selecionar a tabela. <br>";
    echo mysqli_error($conDB);
    exit;
}

?>