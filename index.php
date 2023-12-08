<?php
include_once('funcoes.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario = verificarUsuarioSenha($email, $senha);

    if ($usuario) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        header("Location: telaVeiculo.php");
        exit();
    } else {
        echo '<div class="error-message">Usuário ou senha inválidos.</div>';
    }
}
function verificarUsuarioSenha($email, $senha) {
    $sql = "SELECT * FROM usuario WHERE email='$email'";
    $resultado = mysqli_query(conectar(), $sql);  
    $dados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    foreach ($dados as $usuario) {
        if ($usuario['email'] = $email) {
            if (password_verify($senha,$usuario['senha'])) {
                return $usuario;
            }
        }
    }
    return null;
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
        <h2>Logar</h2>
        <div class="form-group">
            <input type="text" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="password" name="senha" placeholder="Senha" required>
        </div>
        <button type="submit">Entrar</button><br>
        <div class="form-group" style="text-align:center;">
            <a href="formcadastro.php">Cadastrar</a>
        </div>
    </form>
</div>

</body>
</html>

<body>

