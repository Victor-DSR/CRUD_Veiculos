<?php
include_once("funcoes.php");
$data = json_decode(file_get_contents("php://input"), true);
if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "PUT") {
    $json = file_get_contents('php://input');
    $veiculo = json_decode($json, true);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "INSERT INTO veiculos (marca, modelo, ano, cor) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare(conectar(), $sql);
        mysqli_stmt_bind_param($stmt, "ssis", $veiculo['marca'], $veiculo['modelo'], $veiculo['ano'], $veiculo['cor']);
        header("Content-Type: application/json");
        echo json_encode($data);
    } elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
        // Atualizar um veículo existente
        $sql = "UPDATE veiculos SET marca=?, modelo=?, ano=?, cor=? WHERE id=?";
        $stmt = mysqli_prepare(conectar(), $sql);
        mysqli_stmt_bind_param($stmt, "ssisi", $veiculo['marca'], $veiculo['modelo'], $veiculo['ano'], $veiculo['cor'], $veiculo['id']);
    }


    if (mysqli_stmt_execute($stmt)) {
        $veiculo['id'] = ($_SERVER["REQUEST_METHOD"] == "POST") ? mysqli_insert_id(conectar()) : $veiculo['id'];
        echo json_encode($veiculo);
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Erro ao salvar o veículo."));
    }

    mysqli_stmt_close($stmt);
} else {
    http_response_code(400); // Bad Request
    echo json_encode(array("message" => "Método de solicitação não permitido."));
}
?>
