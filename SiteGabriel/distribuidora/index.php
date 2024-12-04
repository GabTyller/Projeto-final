<?php
// Inclui o arquivo de cabeçalho
include 'header.php';

// Função para carregar as bebidas (simulação de um banco de dados ou API)
$bebidas = [
    ['imageUrl' => 'https://via.placeholder.com/120x150', 'name' => 'Vinho Mateus Rosé', 'price' => 59.90],
    ['imageUrl' => 'https://via.placeholder.com/120x150', 'name' => 'Whisky Red Label', 'price' => 119.90],
    // Adicione mais bebidas aqui conforme necessário
];

// Função para carregar os itens do carrinho da sessão (exemplo simples)
session_start();
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    // Adiciona o item ao carrinho
    $item = $_POST['item'];
    $price = $_POST['price'];
    $_SESSION['carrinho'][] = ['item' => $item, 'price' => $price];
}

// Função para calcular o total do carrinho
$totalCarrinho = 0;
foreach ($_SESSION['carrinho'] as $produto) {
    $totalCarrinho += $produto['price'];
}
?>

