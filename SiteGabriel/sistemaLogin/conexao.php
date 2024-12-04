<?php
    //criando variáveis para armazenar as informações do banco
    //de dados
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bancodedados =      "sistemaLogin";
    //criando conexão com o banco de dados
    $conexao = new  mysqli($host, $usuario, $senha, $bancodedados);

    //verificando se aconteceu algum erro na conexão com
    //o banco de dados
    if($conexao->connect_error){
        die("Falha na conexão" . $conexao->connect_error);
    }
?>