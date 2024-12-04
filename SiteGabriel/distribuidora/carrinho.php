<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    session_start();
    // Inicializa o carrinho na sessão
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    // Adicionar produto ao carrinho
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
        $produto = $_POST['produto'];
        $preco = floatval($_POST['preco']);
        $_SESSION['carrinho'][] = ['nome' => $produto, 'preco' => $preco];
    }

    // Remover produto do carrinho
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remover'])) {
        $index = intval($_POST['index']);
        unset($_SESSION['carrinho'][$index]);
        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']); // Reorganiza os índices
    }

    // Total do carrinho
    $total = array_sum(array_column($_SESSION['carrinho'], 'preco'));
    ?>

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
            <tbody>
                <?php if (empty($_SESSION['carrinho'])): ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">Seu carrinho está vazio.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($_SESSION['carrinho'] as $index => $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['nome']) ?></td>
                            <td>1</td>
                            <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="index" value="<?= $index ?>">
                                    <button type="submit" name="remover">Remover</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <h3>Total: R$ <?= number_format($total, 2, ',', '.') ?></h3>
        <button class="back-to-home" onclick="window.location.href='index.php';">Voltar ao Início</button>
    </section>

    <!-- Produtos -->
    <section class="bebidas">
        <h2>Combinam com seu pedido</h2>
        <div class="bebidas-grid">
            <!-- Lista de produtos -->
            <?php
            $produtos = [
                ['nome' => 'Vinho Rosé Provence', 'preco' => 89.90, 'img' => 'Captura de tela 2024-11-27 163841.png'],
                ['nome' => 'Vodka Absolut', 'preco' => 109.90, 'img' => 'Captura de tela 2024-11-27 163929.png'],
                ['nome' => 'Rum Bacardi Carta Blanca', 'preco' => 79.90, 'img' => 'Captura de tela 2024-11-27 164004.png'],
                ['nome' => 'Cerveja Corona Extra', 'preco' => 16.90, 'img' => 'Captura de tela 2024-11-27 164054.png'],
                ['nome' => 'Espumante Chandon Brut', 'preco' => 119.90, 'img' => 'Captura de tela 2024-11-27 164129.png'],
                ['nome' => 'Tequila José Cuervo Especial', 'preco' => 139.90, 'img' => 'Captura de tela 2024-11-27 164623.png'],
                ['nome' => 'Whisky Johnnie Walker Black Label', 'preco' => 179.90, 'img' => 'Captura de tela 2024-11-28 134701.png'],
                ['nome' => 'Licor Baileys Irish Cream', 'preco' => 89.90, 'img' => 'Captura de tela 2024-11-28 134740.png'],
            ];

            foreach ($produtos as $produto): ?>
                <div class="bebida-item">
                    <img src="<?= htmlspecialchars($produto['img']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
                    <p><?= htmlspecialchars($produto['nome']) ?></p>
                    <span>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></span>
                    <form method="POST">
                        <input type="hidden" name="produto" value="<?= htmlspecialchars($produto['nome']) ?>">
                        <input type="hidden" name="preco" value="<?= $produto['preco'] ?>">
                        <button type="submit" name="adicionar">Adicionar ao Carrinho</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Uai Distribuidora. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
