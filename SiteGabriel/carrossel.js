let index = 0;
    const carrosselImagens = document.querySelector('.carrossel-imagens');
    const totalImagens = carrosselImagens.children.length;

    function mudarImagem() {
        index = (index + 1) % totalImagens;
        carrosselImagens.style.transform = `translateX(-${index * 100}%)`;
    }

    setInterval(mudarImagem, 5000); // Muda a imagem a cada 3 segundos