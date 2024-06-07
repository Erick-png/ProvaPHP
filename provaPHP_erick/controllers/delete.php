<?php
session_start();
include_once "../config/connect.php";

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    
    $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";
    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        
        $sqlDelete = "DELETE FROM usuarios WHERE id=$id";
        if ($conexao->query($sqlDelete) === TRUE) {
            
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
                <div class='msgSucess'>Usuário deletado com sucesso! Redirecionando...</div>
                <script>
                    setTimeout(function() {
                        window.location.href = '../views/admin.php';
                    }, 2000);
                </script>
            </body>
            </html>
            ";
        } else {
            echo "Erro ao deletar usuário: " . $conexao->error;
        }
    } else {
        header("Location: ../views/admin.php");
        exit();
    }
} else {
    header("Location: ../views/admin.php");
    exit();
}
?>
