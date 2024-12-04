<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div><img src="LOGO_Uai.png" alt="Logo"></div>
        <div class="search-bar">
            <input type="text" placeholder="Pesquisar produtos..." class="searchTerm">
            <button>🔍</button>
        </div>
        <div class="icons-menu">
            <a href="#">Login</a>
            <a href="#">Carrinho</a>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Ofertas</a></li>
            <li><a href="#">Vinhos</a></li>
            <li><a href="#">Whisky</a></li>
            <li><a href="#">Gin</a></li>
        </ul>
    </nav>

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
            <tbody id="carrinho-lista">
                <!-- Itens do carrinho vão aqui -->
            </tbody>
        </table>
        <h3>Total: R$ <span id="total">0,00</span></h3>
        <button class="back-to-home" onclick="window.location.href='index.html';">Voltar ao Início</button>
    </section>

    <script>
        function atualizarCarrinho() {
            const lista = document.getElementById('carrinho-lista');
            const totalEl = document.getElementById('total');
            lista.innerHTML = '';
            let total = 0;

            const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            carrinho.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>
                        <img src="${item.imagem}" alt="${item.nome}" style="width:50px; height:50px;">
                        ${item.nome}
                    </td>
                    <td>1</td>
                    <td>R$ ${item.preco.toFixed(2).replace('.', ',')}</td>
                    <td>
                        <button class="remover" data-index="${index}">Remover</button>
                    </td>
                `;
                lista.appendChild(row);
                total += item.preco;
            });

            totalEl.textContent = total.toFixed(2).replace('.', ',');

            document.querySelectorAll('.remover').forEach(button => {
                button.addEventListener('click', (e) => {
                    const index = e.target.getAttribute('data-index');
                    carrinho.splice(index, 1);
                    localStorage.setItem('carrinho', JSON.stringify(carrinho));
                    atualizarCarrinho();
                });
            });
        }

        atualizarCarrinho();
    </script>
</body>
</html>