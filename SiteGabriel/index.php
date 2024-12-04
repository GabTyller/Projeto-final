<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAI Distribuidora</title>
    <link rel="stylesheet" href="css/estilo.css">
    <style>
.banner {
    position: relative;
    width: 100%;
    height: auto; /* Ajusta automaticamente à imagem */
}

.banner-imagem {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Mostra toda a imagem */
    background-color: #000; /* Fundo para áreas não preenchidas */
}

.banner-texto {
    position: absolute;
    top: 50%; /* Centraliza verticalmente */
    left: 50px; /* Alinha à esquerda */
    transform: translateY(-50%); /* Ajuste vertical */
    color: #fff; /* Texto branco */
    font-size: 2.8rem;
    font-weight: bold;
    line-height: 1.3; /* Espaçamento entre linhas */
    text-align: left;
    font-family: Arial, sans-serif;
    letter-spacing: 1px;
    width: 480px;
    padding: 20px;

}

.banner-texto span {
    font-weight: bold;
    color: #ffcc00; /* Amarelo para destaque */
}

    </style>
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>

        <main>
            <!-- Seção com imagem de fundo e texto -->
            <section class="banner">
                <img src="fundo.png" alt="Imagem de banner" class="banner-imagem">
                <div class="banner-texto">
                    Ganhe 20% de desconto com o cupom 
                    <span>da primeira compra</span> ou pagamento com o pix
                </div>
            </section>
        </main>

        <?php include 'footer.php'; ?>
    </div>
</body>
</html>


