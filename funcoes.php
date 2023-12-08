<?php
function conectar()
{
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
if (isset($_POST['cadManu'])) {
    $veiculo = $_POST['veiculo'];
    $tipoServico = $_POST['tipo_servico'];
    $dataServico = $_POST['data_servico'];
    $descricaoServico = $_POST['descricao_servico'];
    $custoServico = $_POST['custo_servico'];

    $sql = "INSERT INTO manutencao (veiculo_id, tipo_servico, data_servico, descricao_servico, custo_servico) 
            VALUES ('$veiculo', '$tipoServico', '$dataServico', '$descricaoServico', '$custoServico')";
    mysqli_query(conectar(), $sql);
    header("location:telaVeiculo.php");
}
if (isset($_POST['cadUsu'])) {
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); 
$sql = "INSERT INTO usuario (nome, email, senha) 
        VALUES ('$nome', '$email', '$senha')";
mysqli_query(conectar(), $sql);
header("location:index.php");
}
if (isset($_POST['cadSeg'])) {
    $idVeiculo = $_POST['veiculo'];
    $seguradora = $_POST['seguradora'];
    $numeroApolice = $_POST['numero_apolice'];
    $tipoCobertura = $_POST['tipo_cobertura'];
    $dataInicio = $_POST['data_inicio'];
    $dataTermino = $_POST['data_termino'];
    $valorPremio = $_POST['valor_premio'];

    $sql = "INSERT INTO seguros (veiculo_id, seguradora, numero_apolice, tipo_cobertura, data_inicio, data_termino, valor_premio) 
        VALUES ('$idVeiculo', '$seguradora', '$numeroApolice', '$tipoCobertura', '$dataInicio', '$dataTermino', '$valorPremio')";
    mysqli_query(conectar(), $sql);
    header("location:telaVeiculo.php");
}
if (isset($_POST['editManu'])) {
    $id = $_POST['id'];
    $veiculo = $_POST['veiculo'];
    $tipoServico = $_POST['tipo_servico'];
    $dataServico = $_POST['data_servico'];
    $descricaoServico = $_POST['descricao_servico'];
    $custoServico = $_POST['custo_servico'];

    $sql = "UPDATE manutencao SET `veiculo_id`='$veiculo',`tipo_servico`='$tipoServico',`data_servico`='$dataServico',`descricao_servico`='$descricaoServico',`custo_servico`='$custoServico' 
            WHERE `id`='$id'";
    mysqli_query(conectar(), $sql);
    header("location:telaVeiculo.php");
}
if (isset($_POST['editSeg'])) {
    $id = $_POST['idSeguro'];
    $veiculo = $_POST['veiculo'];
    $seguradora = $_POST['seguradora'];
    $numeroApolice = $_POST['numero_apolice'];
    $tipoCobertura = $_POST['tipo_cobertura'];
    $dataInicio = $_POST['data_inicio'];
    $dataTermino = $_POST['data_termino'];
    $valorPremio = $_POST['valor_premio'];

    $sql = "UPDATE seguros SET `veiculo_id`='$veiculo',`seguradora`='$seguradora',`numero_apolice`='$numeroApolice',`tipo_cobertura`='$tipoCobertura',`data_inicio`='$dataInicio',`data_termino`='$dataTermino',`valor_premio`='$valorPremio' 
        WHERE `id`='$id'";
    mysqli_query(conectar(), $sql);
    header("location:telaVeiculo.php");
}
if (isset($_GET['idExc'])) {
    $id = $_GET['idExc'];

    $sql = "DELETE FROM manutencao WHERE id=$id";
    mysqli_query(conectar(), $sql);
    header("Location:telaVeiculo.php");
}
if (isset($_GET['excSeg'])) {
    $idSeguro = $_GET['excSeg'];

    $sql = "DELETE FROM seguros WHERE id=$idSeguro";
    mysqli_query(conectar(), $sql);
    header("Location:telaVeiculo.php");
}
?>
