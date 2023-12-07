<?php
function conectar(){
    $host = "localhost";
    $user = "root";
    $password = "";
    $banco = "crud_veiculos";

    $conect = mysqli_connect($host, $user, $password, $banco);
    if ($conect) {
        return $conect;
    } else {
        die("Problemas ao acessar o banco de dados. Erro: " . mysqli_connect_errno() . "" . mysqli_connect_error());
    }
}
?>