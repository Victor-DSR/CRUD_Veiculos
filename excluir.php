<?php
    include_once("funcoes.php");
    $conexao = conectar();
    $id = $_GET["id"];

    $sql = "DELETE FROM veiculos WHERE id=$id";
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado == TRUE){
        
    }

    if($resultado == true){
        echo json_encode(TRUE);
    } else {
        die("erro ao deletar pessoa" . mysqli_errno($conexao) . ": " . mysqli_error($conexao));
    }
    ?>