<?php
session_start();
include_once "../config/connect.php";

if (!empty($_GET["id"])) {
  $id = $_GET["id"];

  $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";
  $result = $conexao->query($sqlSelect);

  if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $nome = $row["nome"];
      $email = $row["email"];
      $senha = $row["senha"];
      $nivel_acesso = $row["nivel_acesso"];
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


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <style> body {
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
  color: #3F448C; 
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
</head>
<body>
            <div class="navbar">
            <h2>Sistema PHP | Editar Usuarios</h2>
          </div>
          <div>
    <div class="container">
        <h2>Editar</h2>
        <form action="saveEdit.php?id=<?php echo $id; ?>" method="post">
            <input type="hidden" name="id">
            <input type="text" name="nome" placeholder="Nome" required value="<?php echo $nome?>"/>
            <input type="email" name="email" placeholder="Email" required value="<?php echo $email?>"/>
            <input type="password" name="senha" placeholder="Senha" required value="<?php echo $senha?>"/>
            <select name="nivel_acesso" id="role" required>
                <option value="2" <?php echo $nivel_acesso == 2 ? "selected" : ""; ?>>Cliente</option>
                <option value="1" <?php echo $nivel_acesso == 1 ? "selected" : ""; ?>>Admin</option>
            </select>
            <button type="submit">Editar</button>
        </form>
    </div>
    </div>
</body>


</html>