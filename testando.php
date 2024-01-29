<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Scrolling Form Block</title>
</head>
<body>

  <div id="scrollingForm" class="fixed">
    <form method="POST" action="processar_form.php">
      <!-- Seu formulário HTML aqui -->
      <label for="name">Nome:</label>
      <input type="text" id="name" name="name" required> </br></br>

      <label for="telefone">Telefone/Whatsapp:</label>
      <input type="telefone" id="telefone" name="telefone" required> </br></br>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required> </br></br>
      

      <label for="empresa">Sua empresa:</label>
      <input type="empresa" id="empresa" name="empresa" required> </br></br>
      

      <label for="cargo">Seu cargo:</label>
      <input type="cargo" id="cargo" name="cargo" required> </br></br>
      
      <label for="funcionarios">Total de funcionários:</label>
      <input type="funcionarios" id="funcionarios" name="funcionarios" required> </br></br>
      
      <input type="checkbox" id="termos" name="termos" required> 
      <label for="email">Concordo com os termos de uso e proteção de privacidade da Werecruiter.</label> </br></br>

      <button type="submit">Enviar</button>
    </form>
  </div>

  <div id="content">
    <!-- Conteúdo da página -->
    <p>Outro conteúdo da página...</p>
  </div>

  <!-- Botão do WhatsApp -->
<div id="whatsapp-button">
      <a href="https://wa.me//5511998493738?text=Olá%20Rodrigo!%20Gostaria%20de%20saber%20mais%20informações%20sobre%20os%20serviços%20da%20Werecruiter" target="_blank" rel="noopener noreferrer">
          <img src="https://imagepng.org/wp-content/uploads/2017/08/WhatsApp-icone.png" alt="WhatsApp">
      </a>
</div>
  <script src="script.js"></script>
</body>
</html>
