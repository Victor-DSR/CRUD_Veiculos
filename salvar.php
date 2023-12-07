<?php
include "conectar.php";
$conexao = conectar();
$veiculos = json_decode(file_get_contents("php://input"));

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "INSERT INTO veiculos (marca, modelo, ano,cor) VALUES ('$veiculos->marca', '$veiculos->modelo', '$veiculos->ano','$veiculos->cor')";
    $result = mysqli_query($conexao, $sql);

    if ($result == true) {
        $veiculos->id = mysqli_insert_id($conexao); //retorna o último id gerado
        echo json_encode($veiculos);
    } else {
        die("Problemas ao inserir um veiculo. Erro: " . mysqli_errno($conexao) . " " . mysqli_error($conexao));
    }
} else if ($_SERVER['REQUEST_METHOD'] == "PUT"){
    $sql = "UPDATE veiculos SET marca='$veiculos->marca', modelo='$veiculos->modelo', cor='$veiculos->ano', tamanho='$veiculos->cor' WHERE id='$veiculos->id'";
    $result = mysqli_query($conexao, $sql);

    if ($result == true) {
        echo json_encode($veiculos);
    } else {
        die("Problemas ao inser uma veiculos. Erro: " . mysqli_errno($conexao) . " " . mysqli_error($conexao));
    }
}
