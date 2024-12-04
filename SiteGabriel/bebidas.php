<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAI Distribuidora</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>

        <main>
            <!-- Barra de título -->
            <section class="titulo">
                <h2>Catálogo de Bebidas</h2>
            </section>

            <!-- Grid de produtos dinâmico -->
            <div class="bebidas-grid" id="bebidasGrid"></div>

            <!-- Contêiner para os botões de paginação -->
            <div class="pagination" id="pagination"></div>
        </main>

        <?php include 'footer.php'; ?>
    </div>
    <script src="bebidas.js"></script>
</body>
</html>
