<?php
include_once ("conectar.php");
$conexao = conectar();

$sql = "SELECT * FROM veiculos";
$resultado = mysqli_query($conexao, $sql);

if($resultado == true){
    $jaqueta = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    echo json_encode($jaqueta);
} else {
    die("Erro ao listar" . mysqli_errno($conexao) . ": " . mysqli_error($conexao));
}
?>