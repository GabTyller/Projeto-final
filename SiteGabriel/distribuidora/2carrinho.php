<?php
// Inicia a sessão para armazenar o carrinho
session_start();

// Se não existir o carrinho na sessão, inicializa
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Função para adicionar produto ao carrinho
if (isset($_GET['adicionar'])) {
    $produto = $_GET['adicionar'];
    $preco = $_GET['preco'];

    $_SESSION['carrinho'][] = ['nome' => $produto, 'preco' => $preco];
    header("Location: carrinho.php"); // Redireciona para a mesma página
    exit();
}

// Função para remover produto do carrinho
if (isset($_GET['remover'])) {
    $index = $_GET['remover'];
    array_splice($_SESSION['carrinho'], $index, 1);
    header("Location: carrinho.php"); // Redireciona para a mesma página
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Header -->
    <header>
        <div><img src="c:\Users\Aluno_Tarde\Desktop\distribuidora\LOGO_Uai.png" alt="Logo"></div>
        <div class="search-bar">
            <input type="text" placeholder="Pesquisar produtos...">
            <button>🔍</button>
        </div>
        <div class="icons-menu">
            <a href="#">Login</a>
            <a href="#">Carrinho</a>
        </div>
    </header>

    <!-- Menu -->
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Ofertas</a></li>
            <li><a href="#">Vinhos</a></li>
            <li><a href="#">Whisky</a></li>
            <li><a href="#">Gin</a></li>
        </ul>
    </nav>

    <!-- Carrinho -->
    <section class="carrinho">
        <h2>Carrinho de Compras</h2>
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody id="carrinho-body">
                <?php if (empty($_SESSION['carrinho'])): ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">Seu carrinho está vazio.</td>
                    </tr>
                <?php else: ?>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['carrinho'] as $index => $item): ?>
                        <tr>
                            <td><?php echo $item['nome']; ?></td>
                            <td>1</td>
                            <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
                            <td>
                                <a href="?remover=<?php echo $index; ?>">Remover</a>
                            </td>
                        </tr>
                        <?php $total += $item['preco']; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <h3 id="total-compra">Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h3>
    </section>

    <!-- Produtos -->
    <section class="bebidas">
        <h2>Combinam com seu pedido</h2>
        <div class="bebidas-grid">
    <div class="bebida-item">
        <img src="https://via.placeholder.com/120x150" alt="Vinho Mateus Rosé">
        <p>Vinho Mateus Rosé</p>
        <span>R$ 59,90</span>
        <button onclick="adicionarAoCarrinho('Vinho Mateus Rosé', 59.90)">Adicionar ao Carrinho</button>
    </div>
    <div class="bebida-item">
        <img src="https://via.placeholder.com/120x150" alt="Whisky Red Label">
        <p>Whisky Red Label</p>
        <span>R$ 119,90</span>
        <button onclick="adicionarAoCarrinho('Whisky Red Label', 119.90)">Adicionar ao Carrinho</button>
    </div>
    <div class="bebida-item">
        <img src="whisky.jpg" alt="Whisky Royal Salute">
        <p>Whisky Royal Salute 21 Anos 700ml</p>
        <span>R$ 707,84</span>
        <button onclick="adicionarAoCarrinho('Whisky Royal Salute 21 Anos', 707.84)">Adicionar ao Carrinho</button>
    </div>
    <div class="bebida-item">
        <img src="concha_y_toro.jpg" alt="Concha y Toro">
        <p>Concha y Toro Reservado Rosé 750ml</p>
        <span>R$ 39,89</span>
        <button onclick="adicionarAoCarrinho('Concha y Toro Reservado Rosé', 39.89)">Adicionar ao Carrinho</button>
    </div>
</div>

            <!-- Outras opções de bebidas -->
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Uai Distribuidora. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
