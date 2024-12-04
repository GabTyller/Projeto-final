const spreadsheetId = "1a1NkegchK69eG8B0sg2kzYZg4TOf3k2salA4bbDXaYs";
const apiKey = "AIzaSyDoxlOv0YGQWQ7L3pJUP9eGZOKC_kV6SSs";
const apiUrl = `https://sheets.googleapis.com/v4/spreadsheets/${spreadsheetId}/values/Página1?key=${apiKey}`;

let bebidas = [];
let filteredBebidas = [];
let currentPage = 1;
const itemsPerPage = 12; // Ajuste para exibir 12 itens por página

// Função para buscar dados da planilha
async function fetchBebidas() {
    try {
        const response = await fetch(apiUrl);
        const data = await response.json();
        bebidas = data.values.slice(1).map(row => ({
            imageUrl: row[0],
            name: row[1],
            price: row[2]
        }));
        filteredBebidas = [...bebidas]; // Inicialmente, mostrar todos os produtos
        renderPage(currentPage);
    } catch (error) {
        console.error("Erro ao buscar dados da planilha:", error);
    }
}

// Função para renderizar a página atual
function renderPage(page) {
    const bebidaContainer = document.querySelector(".bebidas-grid");
    bebidaContainer.innerHTML = "";
    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const itemsToDisplay = filteredBebidas.slice(startIndex, endIndex);

    itemsToDisplay.forEach(bebida => {
        const bebidaItem = document.createElement("div");
        bebidaItem.classList.add("bebida-item");
        bebidaItem.innerHTML = `
            <img src="${bebida.imageUrl}" alt="${bebida.name}">
            <p>${bebida.name}</p>
            <span>${bebida.price}</span>
            <button>Comprar</button>
        `;
        bebidaContainer.appendChild(bebidaItem);
    });
    updatePagination();
}

// Função para atualizar a paginação
function updatePagination() {
    const totalPages = Math.ceil(filteredBebidas.length / itemsPerPage);
    const paginationContainer = document.querySelector(".pagination");
    paginationContainer.innerHTML = "";

    for (let i = 1; i <= totalPages; i++) {
        const pageButton = document.createElement("button");
        pageButton.innerText = i;
        pageButton.classList.add("page-button");
        if (i === currentPage) pageButton.classList.add("active");
        pageButton.addEventListener("click", () => {
            currentPage = i;
            renderPage(currentPage);
        });
        paginationContainer.appendChild(pageButton);
    }
}

// Função para filtrar os produtos com base na pesquisa
function searchBebidas(query) {
    filteredBebidas = bebidas.filter(bebida => 
        bebida.name.toLowerCase().includes(query.toLowerCase())
    );
    currentPage = 1; // Resetar para a primeira página
    renderPage(currentPage);
}

// Adicionar evento à barra de pesquisa
document.querySelector(".searchTerm").addEventListener("input", (e) => {
    searchBebidas(e.target.value);
});

// Carrega os dados na inicialização
fetchBebidas();
