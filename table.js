
    document.addEventListener('DOMContentLoaded', function() {
        const jsonTables = document.getElementById('jsonTables');
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const tablesContainers = document.getElementsByClassName('table-container');
        
        function arrayToHtmlTables(data) {
            let tablesHTML = '';

            function parseDate(dateString) {
            // Extrai o dia, mês e ano da string
            const parts = dateString.replace('Publicada em: ', '').split('/');
            // A data é representada como mês-dia-ano no JavaScript, então precisamos inverter a ordem
            return new Date(parts[2], parts[1] - 1, parts[0]);
        }
            // Classifica os objetos com base na data
            data.sort((a, b) => parseDate(b.Data) - parseDate(a.Data));

            data.forEach((row, index) => {
                tablesHTML += `<div class="table-container" id="table${index}"><table border="1">`;
                for (const key in row) {
                    if (row.hasOwnProperty(key)) {
                        if (key === 'Link') {
                            tablesHTML += `<tr><td class="linhaLink" colspan="2"><a class="link" href="${row[key]}" target="_blank"> Quero me candidatar! </a></td></tr>`;
                            tablesHTML += `<tr> <td style="width: 6px;"><img src="imagens/vaga.png" alt="logoVaga"></td> <td>${row['Vaga']}</td> </tr>`;
                            tablesHTML += `<tr> <td style="width: 6px;"><img src="imagens/empresa.png" alt="logoEmpresa"></td> <td>${row['Empresa']}</td> </tr>`;
                            tablesHTML += `<tr> <td style="width: 6px;"><img src="imagens/data.png" alt="logoData"></td> <td>${row['Data']}</td> </tr>`;
                        } else if (key !== 'Vaga' && key !== 'Empresa' && key !== 'Data') {
                            tablesHTML += `<tr><td>${key}: ${row[key]}</td></tr>`;
                        }
                    }
                }
                tablesHTML += '</table></div>';
            });

            return tablesHTML;
        }

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

        searchButton.addEventListener('click', search);

        fetch('arquivosJson/busca_geral.json')
            .then(response => response.json())
            .then(data => {
                const tableData = arrayToHtmlTables(data);
                jsonTables.innerHTML = tableData;
            })
            .catch(error => {
                console.error('Erro ao carregar o arquivo JSON:', error);
            });
        });