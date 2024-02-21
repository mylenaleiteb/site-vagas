document.addEventListener('DOMContentLoaded', function() {
    const jsonTables = document.getElementById('jsonTables');
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    const tablesContainers = document.getElementsByClassName('table-container');
    /*const modal = document.getElementById('myModal');
    const closeButton = modal.querySelector('.close');
    const modalContent = modal.querySelector('.modal-content')
    let targetLinkHref = null; // Variável para armazenar o href do link clicado

    // Adiciona evento de clique aos links "Quero me candidatar!"
    function addLinkClickEvent() {
        const links = document.querySelectorAll('.link');
        for (const link of links) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Impede o comportamento padrão do link
                modal.style.display = 'block'; // Exibe o modal
                targetLinkHref = this.href; // Ao clicar no link, armazena o href do link clicado, que é o da linha ${row[key]}
            });
        }
    }

    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Adiciona evento de envio ao formulário dentro do modal
    const candidateForm = document.getElementById('candidateForm');
    candidateForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Impede o comportamento padrão do formulário
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        
        modal.style.display = 'none'; // Fecha o modal
        
        // Redireciona o usuário para o link clicado
        if (targetLinkHref) {
            window.location.href = targetLinkHref;
        }
    });*/

    // Função para renderizar as tabelas com base nos dados recebidos
    function renderTables(data) {
        let tablesHTML = '';

        // Função para classificar as vagas com base na data de publicação, da mais recente para a mais antiga
        function parseDate(dateString) {
            const parts = dateString.replace('Publicada em: ', '').split('/');
            return new Date(parts[2], parts[1] - 1, parts[0]);
        }

        // Classifica os objetos com base na data
        data.sort((a, b) => parseDate(b.Data) - parseDate(a.Data));

        // Monta as tabelas com os dados
        data.forEach((row, index) => {
            tablesHTML += `<div class="table-container" id="table${index}"><table border="1">`;
            for (const key in row) {
                if (row.hasOwnProperty(key)) {
                    if (key === 'Link') {
                        tablesHTML += `<tr><td class="linhaLink" colspan="2"><a class="link" href="${row[key]}" target="_blank"> Quero me candidatar! </a></td></tr>`;
                    } else if (key !== 'Vaga' && key !== 'Empresa' && key !== 'Data') {
                        tablesHTML += `<tr><td>${key}: ${row[key]}</td></tr>`;
                    }
                }
            }
            tablesHTML += `<tr> <td style="width: 6px;"><img src="imagens/vaga.png" alt="logoVaga"></td> <td>${row['Vaga']}</td> </tr>`;
            tablesHTML += `<tr> <td style="width: 6px;"><img src="imagens/empresa.png" alt="logoEmpresa"></td> <td>${row['Empresa']}</td> </tr>`;
            tablesHTML += `<tr> <td style="width: 6px;"><img src="imagens/data.png" alt="logoData"></td> <td>${row['Data']}</td> </tr>`;
            tablesHTML += '</table></div>';
        });

        return tablesHTML;
    }

    // Função para pesquisar e exibir as tabelas com base no termo de busca
    function search() {
        const searchTerm = searchInput.value.toLowerCase();

        for (const container of tablesContainers) {
            let found = false;
            const cells = container.querySelectorAll('td');

            for (const cell of cells) {
                const content = cell.textContent.toLowerCase();

                if (searchTerm === '' || content.includes(searchTerm)) {
                    found = true;
                    break;
                }
            }

            if (found) {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        }
    }

    // Adiciona o evento de clique ao botão de pesquisa
    searchButton.addEventListener('click', search);

    // Carrega os dados das tabelas a partir do arquivo JSON
    fetch('arquivosJson/busca_geral.json')
        .then(response => response.json())
        .then(data => {
            const tableData = renderTables(data);
            jsonTables.innerHTML = tableData;
            addLinkClickEvent(); // Adiciona eventos de clique aos links após carregar os dados
        })
        .catch(error => {
            console.error('Erro ao carregar o arquivo JSON:', error);
        });
});
