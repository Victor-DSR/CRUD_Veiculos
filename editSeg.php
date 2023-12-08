<?php
include_once("funcoes.php");
$conecta = conectar();
$id = $_GET['idEdit'];
$sql = "SELECT * FROM seguros WHERE id='$id'";
$resultado = mysqli_query($conecta, $sql);
$seguro = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>CRUD de Seguro</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Registros de Seguros de Veículos</h2>

        <!-- Formulário para editar registros -->
        <form action="funcoes.php" method="post" class="mb-4">
            <div class="form-group">
                <label for="idSeguro">ID do Seguro</label>
                <input type="text" class="form-control" id="idSeguro" name="idSeguro" value="<?php echo $seguro["id"]; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="veiculo">Veículo</label>
                <input type="text" class="form-control" id="veiculo" name="veiculo" value="<?php echo $seguro["veiculo_id"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="seguradora">Seguradora</label>
                <input type="text" class="form-control" id="seguradora" name="seguradora" value="<?php echo $seguro["seguradora"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="numero_apolice">Número da Apólice</label>
                <input type="text" class="form-control" id="numero_apolice" name="numero_apolice" value="<?php echo $seguro["numero_apolice"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="tipo_cobertura">Tipo de Cobertura</label>
                <input type="text" class="form-control" id="tipo_cobertura" name="tipo_cobertura" value="<?php echo $seguro["tipo_cobertura"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="data_inicio">Data de Início do Seguro</label>
                <input type="date" class="form-control" id="data_inicio" name="data_inicio" value="<?php echo $seguro["data_inicio"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="data_termino">Data de Término do Seguro</label>
                <input type="date" class="form-control" id="data_termino" name="data_termino" value="<?php echo $seguro["data_termino"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="valor_premio">Valor do Prêmio</label>
                <input type="text" class="form-control" id="valor_premio" name="valor_premio" value="<?php echo $seguro["valor_premio"]; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="editSeg">Editar Registro de Seguro</button>
        </form>
    </div>
</body>

</html>
