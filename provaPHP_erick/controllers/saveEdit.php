<?php
session_start();
include_once "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel_acesso = $_POST['nivel_acesso'];

    $query = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha', nivel_acesso='$nivel_acesso' WHERE id='$id'";
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
            <p class='msgSucess'>Operação realizada com sucesso! Redirecionando...</p>
            <script>
                setTimeout(function() {
                    window.location.href = '../views/admin.php';
                }, 2000);
            </script>
        </body>
        </html>
        ";
    } else {
        echo "<p>Erro ao atualizar os dados!</p>";
    }
}
?>
