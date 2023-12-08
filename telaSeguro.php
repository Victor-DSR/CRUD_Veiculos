<?php
include_once("funcoes.php");
$conecta = conectar();
$id = $_GET['idVeiculo'];
$sql = "SELECT * FROM seguros";
$resultado = mysqli_query($conecta, $sql);
$seguros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>CRUD de Seguros para Veículos</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Contratos de Seguros para Veículos</h2>

        <!-- Formulário para inserir contratos de seguro -->
        <form action="funcoes.php" method="post" class="mb-4">
            <div class="form-group">
                <label for="veiculo">Veículo</label>
                <input type="text" class="form-control" id="veiculo" name="veiculo" value="<?php echo $_GET["idVeiculo"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="seguradora">Seguradora</label>
                <input type="text" class="form-control" id="seguradora" name="seguradora" required>
            </div>
            <div class="form-group">
                <label for="numero_apolice">Número da Apólice</label>
                <input type="text" class="form-control" id="numero_apolice" name="numero_apolice" required>
            </div>
            <div class="form-group">
                <label for="tipo_cobertura">Tipo de Cobertura</label>
                <input type="text" class="form-control" id="tipo_cobertura" name="tipo_cobertura" required>
            </div>
            <div class="form-group">
                <label for="data_inicio">Data de Início do Seguro</label>
                <input type="date" class="form-control" id="data_inicio" name="data_inicio" required>
            </div>
            <div class="form-group">
                <label for="data_termino">Data de Término do Seguro</label>
                <input type="date" class="form-control" id="data_termino" name="data_termino" required>
            </div>
            <div class="form-group">
                <label for="valor_premio">Valor do Prêmio</label>
                <input type="text" class="form-control" id="valor_premio" name="valor_premio" required>
            </div>
            <button type="submit" class="btn btn-primary" name="cadSeg">Salvar Contrato de Seguro</button>
        </form>

        <!-- Tabela de Contratos de Seguro -->
        <h2>Lista de Contratos de Seguro</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Veículo</th>
                    <th>Seguradora</th>
                    <th>Número da Apólice</th>
                    <th>Tipo de Cobertura</th>
                    <th>Data de Início</th>
                    <th>Data de Término</th>
                    <th>Valor do Prêmio</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($seguros as $seguro) {
                    echo "<tr>";
                    echo "<td>" . $seguro["id"] . "</td>";
                    echo "<td>" . $seguro["veiculo_id"] . "</td>";
                    echo "<td>" . $seguro["seguradora"] . "</td>";
                    echo "<td>" . $seguro["numero_apolice"] . "</td>";
                    echo "<td>" . $seguro["tipo_cobertura"] . "</td>";
                    echo "<td>" . $seguro["data_inicio"] . "</td>";
                    echo "<td>" . $seguro["data_termino"] . "</td>";
                    echo "<td>R$" . $seguro["valor_premio"] . "</td>";
                    echo "<td><a style='color: black' href='editSeg.php?idEdit=" . $seguro['id'] . "'> Editar </a></td>";
                    echo "<td><a style='color: black' href='funcoes.php?excSeg=" . $seguro['id'] . "'> Excluir </a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
