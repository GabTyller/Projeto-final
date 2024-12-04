<?php
    include 'conexao.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuario = $_POST['usuario'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $sqlCadastro = "INSERT INTO usuarios (usuario, senha) values('$usuario', '$senha');";

        if($conexao->query($sqlCadastro) == TRUE){
            header("Location: index.php");
            exit();
        }else{
                       echo "Erro: " . $sqlCadastro .  "</br>" . $conexao->error;
        }
    }

?>









<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
    <div class="login-container">
        <h2>Cadastro</h2>
        <form action="cadastro.php" method="POST">
            <div class="input-group">
                <label for="usuario">Nome de Usuário:</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="input-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
