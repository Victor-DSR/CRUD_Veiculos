<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>CRUD de Veículos</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">CRUD de Veículos</h2>

        <!-- Formulário -->
        <form id="veiculoForm" class="mb-4">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control" name="marca" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control" name="modelo" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="ano">Ano</label>
                    <input type="number" class="form-control" name="ano" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="cor">Cor</label>
                    <input type="text" class="form-control" name="cor" required>
                </div>
            </div>
            <div class="form-group col-md-4">
                    <label>ID: <input class="form-control" type="number" name="id" readonly></label></div>
            <button type="button" class="btn btn-primary" onclick="salvarVeiculo()">Salvar Veículo</button>
        </form>

        <!-- Tabela de Veículos -->
        <h2>Lista de Veículos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Cor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="veiculos"></tbody>
        </table>
    </div>
    </body>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        function editar(evt) {
            let id = evt.currentTarget.paramId;
            let tbody = document.getElementById("veiculos");
            for (const tr of tbody.children) {
                if (tr.children[0].innerHTML == id) {
                    let id = document.getElementsByName("id")[0];
                    let marca = document.getElementsByName("marca")[0];
                    let modelo = document.getElementsByName("modelo")[0];
                    let ano = document.getElementsByName("ano")[0];
                    let cor = document.getElementsByName("cor")[0];
                    id.value = tr.children[0].innerHTML;
                    marca.value = tr.children[1].innerHTML;
                    modelo.value = tr.children[2].innerHTML;
                    ano.value = tr.children[3].innerHTML;
                    cor.value = tr.children[4].innerHTML;
                }
            }
        }
        function excluir(evt) {
            let excluir = confirm("Tem certeza que deseja excluir esse veiculo?");
            if (excluir == true) {
                let id = evt.currentTarget.paramId;
                fetch("excluir.php",{
                method: "GET",
                headers: { 'Content-type': "application/json; charset=UTF-8" }
            })
                .then(response => response.json())
                .then(veiculo => excluirVeiculo(veiculo, id))
                .catch(error => console.log(error));

                let tbody = document.getElementById("veiculos");
                for (const tr of tbody.children) {
                    if (tr.children[0].innerHTML == id) {
                        tbody.removeChild(tr);
                    }
                }
            }
        }

        function excluirVeiculo(veiculoId) {
    let tbody = document.getElementByName("veiculos");
    for (const tr of tbody.children) {
        if (tr.children[0].innerText == veiculoId) {
            tbody.removeChild(tr);
            break;
        }
    }
}

        function salvarVeiculo(evt) {
            event.preventDefault();
            let form = document.getElementById("veiculoForm");
            let tbody = document.getElementById("veiculos");
            let veiculo = Object.fromEntries(new FormData(form).entries());

            if (veiculo.id == "") { 
                fetch("salvar.php", {
                    method: "POST", 
                    body: JSON.stringify(veiculo), 
                    headers: { 'Content-type': "application/json; charset=UTF-8" }
                })
                    .then(response => response.json())//converte para json
                    .then(veiculo => inserirVeiculo(veiculo))
                    .catch(error => console.log(error));
            } else { 
                fetch("salvar.php", {
                    method: "PUT",
                    body: JSON.stringify(veiculo),
                    headers: { 'Content-type': "application/json; charset=UTF-8" }
                })
                    .then(response => response.json())
                    .then(veiculo => alterarVeiculo(veiculo))
                    .catch(error => console.log(error));
            }
            form.reset();
            return false;
        }

        function inserirVeiculo(veiculo) {
            let tr = document.createElement("tr");
            let tdId = document.createElement("td");
            tdId.innerText = veiculo.id;
            let tdMarca = document.createElement("td");
            tdMarca.innerText = veiculo.marca;
            let tdModelo = document.createElement("td");
            tdModelo.innerText = veiculo.modelo;
            let tdAno = document.createElement("td");
            tdAno.innerText = veiculo.ano;
            let tdCor = document.createElement("td");
            tdCor.innerText = veiculo.cor;

            let tdEditar = document.createElement("td");
            let btnEditar = document.createElement("button");
            btnEditar.addEventListener("click", editar, false);
            btnEditar.paramId = veiculo.id;
            btnEditar.innerHTML = "Editar";
            tdEditar.appendChild(btnEditar);

            let tdExcluir = document.createElement("td");
            let btnExcluir = document.createElement("button");
            btnExcluir.addEventListener("click", excluir, false);
            btnExcluir.paramId = veiculo.id;
            btnExcluir.innerHTML = "Excluir";
            tdExcluir.appendChild(btnExcluir);

            tr.appendChild(tdId);
            tr.appendChild(tdMarca);
            tr.appendChild(tdModelo);
            tr.appendChild(tdAno);
            tr.appendChild(tdCor);
            tr.appendChild(tdEditar);
            tr.appendChild(tdExcluir);
            let tBody = document.getElementById("veiculos");
            tBody.appendChild(tr);
        }

        function alterarveiculo(veiculo) {
            let tbody = document.getElementById("veiculos");
            for (const tr of tbody.children) {
                if (tr.children[0].innerHTML == id) {
                    let id = document.getElementsByName("id")[0];
                    let marca = document.getElementsByName("marca")[0];
                    let modelo = document.getElementsByName("modelo")[0];
                    let ano = document.getElementsByName("ano")[0];
                    let cor = document.getElementsByName("cor")[0];
                }
            }
        }
        function listarTodos() {
            fetch("listar_veiculos.php", {
                method: "GET",
                headers: { 'Content-type': "application/json; charset=UTF-8" }
            })
                .then(response => response.json())
                .then(veiculo => inserirVeiculos(veiculo))
                .catch(error => console.log(error));
        }

        function inserirVeiculos(veiculos){
            for (const veiculo of veiculos){
                inserirVeiculo(veiculo);
            }
        }
        document.addEventListener("DOMContentLoaded", () => {listarTodos();});
    </script>
</html>
