<?php
session_start();
include_once "../config/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $nivel_acesso = $_POST["nivel_acesso"];

  $verifica_email = "SELECT * FROM usuarios WHERE email = '$email'";
  $result_validate = mysqli_query($conexao, $verifica_email);

  if (mysqli_num_rows($result_validate) > 0) {
    echo "<p class='temEmail' >EMAIL JA CADASTRADO!</p>";
  } else {
    $query = "INSERT INTO usuarios (nome, email, senha, nivel_acesso) VALUES ('$nome', '$email', '$senha', '$nivel_acesso')";
    $result = mysqli_query($conexao, $query);

    if ($result) {
      echo "
            <!DOCTYPE html>
            <html lang='pt-BR'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Sucesso</title>
                <style>
                    .loader-container {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(255, 255, 255, 0.5);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .loader {
                    border: 16px solid #f3f3f3;
                    border-radius: 50%;
                    border-top: 16px solid #3498db;
                    width: 60px;
                    height: 60px;
                    animation: spin 2s linear infinite;
                }
                .msgSucess {
                  position: absolute;
                  top: 50%;
                  width: 100%;
                  text-align: center;
                  font-size: 18px;
                  color: #000;
                  margin: -80px 0px;
                }

                @keyframes spin {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
                </style>
            </head>
            <body>
                <div class='loader-container'>
                    <div class='loader'></div>
                </div>
                <p class='msgSucess'>Adicionando......</p>
                <script>
                    setTimeout(function() {
                        window.location.href = '../views/admin.php';
                    }, 3000);
                </script>
            </body>
            </html>
            ";
    } else {
      echo "<p>Erro ao atualizar os dados!</p>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <style>
    body {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
      height: 90vh;
    }
    
    .navbar {
    background-color: #3f448c;
    color: #fff;
    padding: 10px;
    text-align: center;
   margin-bottom: 40px;
}

.navbar > h2 {
  color: #fff;
}

    
    .container {
  width: 300px;
  margin: 0 auto;
  text-align: center;
  text-align: center;
    background: #fff;
    padding: 30px 50px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
  color: #3F448C; /* Cor da paletra */
}

form {
  margin-top: 20px;
}

input[type="text"],
input[type="email"],
input[type="password"],
select {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #5a61bd; 
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #7178df; 
}

option {
  background-color: #9ca2ef; 
}

option:selected {
  background-color: #bbbeef; 
}

</style>
        <body>
            <div class="navbar">
            <h2>Sistema PHP | Adicionar</h2>
          </div>
          <div>
    <div class="container">
        <h2>Adicionar</h2>
        <form action="add.php" method="post">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <select name="nivel_acesso" id="role" required>
                <option value="2">Cliente</option>
                <option value="1">Admin</option>
            </select>
            <button type="submit">Adicionar</button>
        </form>
    </div>
    </div>
</body>
</html>
