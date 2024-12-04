<?php
include 'conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Busca o usuário no banco
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['nome'] = $row['nome'];
            header('Location: plataforma.php'); // Redireciona para a plataforma
            exit;
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="">
            Usuário: <input type="text" name="usuario" required><br>
            Senha: <input type="password" name="senha" required><br>
            <button type="submit">Entrar</button>
        </form>
        <p>Não tem cadastro? <a href="cadastro.php">Clique aqui para se cadastrar</a>.</p>
    </div>
</body>
</html>
