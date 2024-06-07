<?php
session_start();
include_once "../config/connect.php";
if (
  isset($_POST["submit"]) &&
  !empty($_POST["email"]) &&
  !empty($_POST["password"])
) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'";
  $result = mysqli_query($conexao, $query);

  if (mysqli_num_rows($result) > 0) {
    $usuario = mysqli_fetch_assoc($result);
    $nivel_acesso = $usuario["nivel_acesso"];

    if ($nivel_acesso == 1) {
      $_SESSION["email"] = $email;
      $_SESSION["password"] = $password;
      echo "
            <!DOCTYPE html>
            <html lang='pt-BR'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Usuário Deletado</title>
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
                        top: 20%;
                        text-align: center;
                        width: 100%;
                        font-size: 20px;
                        color: #000;
     
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
                <div class='msgSucess'>Redirecionando...</div>
                <script>
                    setTimeout(function() {
                        window.location.href = '../views/admin.php';
                    }, 2000);
                </script>
            </body>
            </html>
            ";
    } else {
      $_SESSION["email"] = $email;
      $_SESSION["password"] = $password;
      echo "
      <!DOCTYPE html>
      <html lang='pt-BR'>
      <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Cadastro Sucesso</title>
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
                        top: 20%;
                        text-align: center;
                        width: 100%;
                        font-size: 20px;
                        color: #000;
      
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
          <p class='msgSucess' style='text-align: center;'>Redirecionando...</p>
          <script>
              setTimeout(function() {
                  window.location.href = '../views/client.php';
              }, 1000);
          </script>
      </body>
      </html>
      ";
    }
  } else {
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    header("Location: ../views/tela-login.php");
  }
}
?>
