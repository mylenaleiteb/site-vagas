document.addEventListener('DOMContentLoaded', function () {
    var scrollingForm = document.getElementById('scrollingForm');
    var content = document.getElementById('content');
  
    window.addEventListener('scroll', function () {
      var scrollPosition = window.scrollY;
  
      // Ajuste o valor conforme necessário
      var triggerPoint = content.offsetTop;
  
      if (scrollPosition > triggerPoint) {
        scrollingForm.classList.add('scrolled');
      } else {
        scrollingForm.classList.remove('scrolled');
      }
    });
  });

  // Opcional: Adicionar efeito de rotação ao botão
document.getElementById('whatsapp-button').addEventListener('mouseover', function() {
  this.style.transform = 'rotate(360deg)';
});

document.getElementById('whatsapp-button').addEventListener('mouseout', function() {
  this.style.transform = 'rotate(0deg)';
});

  