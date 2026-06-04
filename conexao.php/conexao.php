<?php
$servername = "localhost"; 
$database   = "projeto site"; 
$username   = "root"; 
$password   = "root"; 
$port       = "8889"; 

 
$conexao = mysqli_connect($servername, $username, $password, $database, $port);
if (!$conexao) {
    die("falha na conexao:". mysqli_connect_error());
    
}
?>