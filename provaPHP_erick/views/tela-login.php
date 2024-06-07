<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/tela-login.css">
</head>
<body>
    <div class="login-container">
        <header>
            <h1>Login</h1>
        </header>
        <form class="login-form" action="../controllers/validateLogin.php" method="post">
            <div class="form-group">
                <label for="email">Usuário</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" class="btn btn-login" name="submit" value="Login" />
            <p>
              Não tem conta ? <a href="./tela-cadastro.php">Criar uma </a>
            </p>
        </form>
    </div>
</body>
</html>
