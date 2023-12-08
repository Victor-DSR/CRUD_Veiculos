<?php
include_once("funcoes.php");
$conecta = conectar();
$id = $_GET['idEdit'];
$sql = "SELECT * FROM manutencao WHERE id='$id'";
$resultado = mysqli_query($conecta, $sql);
$registros = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>CRUD de Manutenção de Veículos</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Registros de Manutenção de Veículos</h2>

        <!-- Formulário para inserir registros -->
        <form action="funcoes.php" method="post" class="mb-4">
            <div class="form-group">
                <label for="veiculo">ID do Registro</label>
                <input type="text" class="form-control" id="veiculo" name="id" value="<?php echo $registros["id"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="veiculo">Veículo</label>
                <input type="text" class="form-control" id="veiculo" name="veiculo" value="<?php echo $registros["veiculo_id"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="tipo_servico">Tipo de Serviço</label>
                <input type="text" class="form-control" id="tipo_servico" name="tipo_servico" value="<?php echo $registros["tipo_servico"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="data_servico">Data de Serviço</label>
                <input type="date" class="form-control" id="data_servico" name="data_servico" value="<?php echo $registros["data_servico"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="descricao_servico">Descrição do Serviço</label>
                <input type="text" class="form-control" id="descricao_servico" name="descricao_servico" rows="3" value="<?php echo $registros["descricao_servico"]; ?>" required></textarea>
            </div>
            <div class="form-group">
                <label for="custo_servico">Custo do Serviço</label>
                <input type="text" class="form-control" id="custo_servico" name="custo_servico" value="<?php echo $registros["custo_servico"]; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="editManu">Editar Registro de Manutenção</button>
        </form>
    </div>
</body>

</html>
