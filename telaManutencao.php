<?php
include_once("funcoes.php");
$conecta = conectar();
$id = $_GET['idVeiculo'];
$sql = "SELECT * FROM manutencao";
$resultado = mysqli_query($conecta, $sql);
$registros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
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
                <label for="veiculo">Veículo</label>
                <input type="text" class="form-control" id="veiculo" name="veiculo" value="<?php echo $_GET["idVeiculo"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="tipo_servico">Tipo de Serviço</label>
                <input type="text" class="form-control" id="tipo_servico" name="tipo_servico" required>
            </div>
            <div class="form-group">
                <label for="data_servico">Data de Serviço</label>
                <input type="date" class="form-control" id="data_servico" name="data_servico" required>
            </div>
            <div class="form-group">
                <label for="descricao_servico">Descrição do Serviço</label>
                <textarea class="form-control" id="descricao_servico" name="descricao_servico" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="custo_servico">Custo do Serviço</label>
                <input type="text" class="form-control" id="custo_servico" name="custo_servico" required>
            </div>
            <button type="submit" class="btn btn-primary" name="cadManu">Salvar Registro de Manutenção</button>
        </form>

        <!-- Tabela de Registros de Manutenção -->
        <h2>Lista de Registros de Manutenção</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Veículo</th>
                    <th>Tipo de Serviço</th>
                    <th>Data de Serviço</th>
                    <th>Descrição do Serviço</th>
                    <th>Custo do Serviço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($registros as $registro) {
                    echo "<tr>";
                    echo "<td>" . $registro["id"] . "</td>";
                    echo "<td>" . $registro["veiculo_id"] . "</td>";
                    echo "<td>" . $registro["tipo_servico"] . "</td>";
                    echo "<td>" . $registro["data_servico"] . "</td>";
                    echo "<td>" . $registro["descricao_servico"] . "</td>";
                    echo "<td>R$" . $registro["custo_servico"] . "</td>";
                    echo "<td><a style='color: black' href='editManu.php?idEdit=" . $registro['id'] . "'> Editar </a></td>";
                    echo "<td><a style='color: black' href='funcoes.php?idExc=" . $registro['id'] . "'> Excluir </a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
