

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Cadastro</title>
</head>
<body>

<div class="container">
    <div class="image-container"></div>
    <form class="login-form" method="post" action="funcoes.php">
        <h2>Login</h2>
        <div class="form-group">
            <input type="text" name="nome" placeholder="Usuário" required>
        </div>
        <div class="form-group">
            <input type="password" name="senha" placeholder="Senha" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <button type="submit" name="cadUsu">Entrar</button>
    </form>
</div>

</body>
</html>

<body>

