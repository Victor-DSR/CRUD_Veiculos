<?php
include "conectar.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($conect->connect_error) {
        die("Connection falhou: " . $conect->connect_error);
    }
    
    $nome_usuario = $_POST['nome'];
    $senha = $_POST['senha'];

    // Check user credentials
    $sql = "SELECT id_usuario, senha FROM usuario WHERE nome = '$nome_usuario' and senha = $senha";
    $result = $conect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_senha = $row['senha'];

        // Verify senha
        if (password_verify($senha, $hashed_senha)) {
            // senha is correct, set session variables or redirect to dashboard
            $_SESSION['id_usuario'] = $row['id'];
            header("Location: telaVeiculo.php.php");
            exit();
        } else {
            echo "senha invalida";
        }
    } else {
        echo "Usuario não encontrado";
    }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>

<div class="container">
    <div class="image-container"></div>
    <form class="login-form" method="post" action="">
        <h2>Login</h2>
        <div class="form-group">
            <input type="text" name="nome" placeholder="Usuário" required>
        </div>
        <div class="form-group">
            <input type="password" name="senha" placeholder="Senha" required>
        </div>
        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>

<body>

