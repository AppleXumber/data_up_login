<?php
$conexao = mysqli_connect("localhost", "root", "", "login");

if(!$conexao) {
    die("Conexão não efetuada".mysqli_error());
}

?>