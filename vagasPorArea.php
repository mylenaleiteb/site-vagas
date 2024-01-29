<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon"    href="imagens/we-removebg-preview.png">
    <title>Vagas por Área</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
            max-width: 1200px;
        }

        .text-container {
            width: 50%;
            padding: 20px;
            text-align: left;
        }

        .image-container {
            width: 50%;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 48px;
            color: #333;
        }

        p {
            font-size: 18px;
            color: #666;
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #241f66;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 18px;
            margin-top: 20px;
        }

        a.button:hover {
            background-color: #080444;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .cabecalho-fixo {
            background-color: #080444;
            color: #fff;
            width: 100%;
            padding: 10px;
            text-align: center;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        .imagem-logo {
            width: 130px;
            height: auto;
            margin-right: 20px;
            margin-left: 0;
            margin-top: 0;
        }

    </style>
</head>
<body>
    <div class="cabecalho-fixo">
        <div class="imagem-logo">
            <a href="https://werecruiter.tech/" target="_blank" rel="noopener noreferr">
                <img src="imagens/64f10902585b69001725fa6f_optimized_341.webp" alt="logo">
            </a>
        </div>
    </div>
    <div class="container">
        <div class="text-container">
            <h1>Vagas por Área</h1>
            <p>Escolha a área que você quer ver as vagas disponíveis:</p>
            <a class="button" href="vagasFrontEnd.php">Front-end</a>
            <a class="button" href="vagasBackEnd.php">Back-end</a>
            <a class="button" href="vagasDados.php">Dados</a>
            <a class="button" href="vagasDevOps.php">DevOps</a> <br> <br>
            <a class="button" href="index.php">Voltar</a>
        </div>
        <div class="image-container">
            <img src="imagens/annie-spratt-dWYU3i-mqEo-unsplash.jpg" alt="Coworking Image">
        </div>
    </div>
    
</body>
</html>