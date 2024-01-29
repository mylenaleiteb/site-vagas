<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Vagas Back-end</title>
    <link rel="stylesheet" type="text/css" href="novoestilo.css">
    <link rel="icon" type="image/x-icon"    href="imagens/we-removebg-preview.png">
</head>
<body>
    <?php
    $name = "área de Dados";
    include_once 'cabecalho.php';
    ?>
    
    <div id="jsonTable"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jsonTable = document.getElementById('jsonTable');
            const fileName = 'arquivosJson/scrapping_vagas_dados.json'; // Nome do seu arquivo JSON

            fetch(fileName)
                .then(response => response.json())
                .then(data => {
                    const limitedData = data.slice(0, 20); // Limita a 12 linhas
                    const tableData = arrayToHtmlTable(limitedData);

                    jsonTable.innerHTML = tableData;
                })
                .catch(error => {
                    console.error('Erro ao carregar o arquivo JSON:', error);
                });

            function arrayToHtmlTable(data) {
                let tableHTML = '<table border="1">';
                tableHTML += '<thead><tr>';

                // Cabeçalho da tabela
                for (const key in data[0]) {
                    if (data[0].hasOwnProperty(key)) {
                        // Títulos personalizados de cada coluna
                        let titulo = '';
                        switch (key) {
                            case 'Link':
                                titulo = 'Link';
                                break;
                            case 'Nome':
                                titulo = 'Nome da Vaga';
                                break;
                            case 'Empresa':
                                titulo = 'Nome da Empresa';
                                break;
                            case 'Publicação':
                                titulo = 'Data de Publicação';
                                break;
                            default:
                                titulo = key;
                        }
                        tableHTML += `<th>${titulo}</th>`;
                    }
                }

                tableHTML += '</tr></thead><tbody>';

                // Linhas da tabela
                data.forEach(row => {
                    if (  // Validação dos campos da tabela: verifica se todos os campos tem conteúdo para serem exibidos, se caso alguma info não seja puxada por exemplo, a linha não aparece
                        row['Link'] !== null && row['Link'] !== undefined && row['Link'] !== '' &&  
                        row['Nome'] !== null && row['Nome'] !== undefined && row['Nome'] !== '' &&
                        row['Empresa'] !== null && row['Empresa'] !== undefined && row['Empresa'] !== '' &&
                        row['Publicação'] !== null && row['Publicação'] !== undefined && row['Publicação'] !== ''
                    ) {
                    tableHTML += '<tr>';
                    for (const key in row) {
                        if (row.hasOwnProperty(key)) {
                            // Verificar se a chave é 'Link' para preservar a formatação
                            if (key === 'Link') {
                                tableHTML += `<td><a href="${row[key]}" target="_blank"> Quero me candidatar!  </a></td>`;  // Personalizar texto do link da coluna Link
                            } else {
                                tableHTML += `<td>${row[key]}</td>`;
                            }
                        }
                    }
                    tableHTML += '</tr>';
                }
                });

                tableHTML += '</tbody></table>';

                return tableHTML;
            }
        });
    </script>

    <?php
    include_once 'footerArea.php';
    ?>

</body>
</html>