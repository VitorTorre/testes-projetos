// assets/js/main.js (ou o nome do seu arquivo JS)

  // Chama a função recarregarImagens quando a página for carregada
  window.addEventListener('load', recarregarImagens);
  
  // Opcional: Chama a função recarregarImagens em um intervalo regular para continuar tentando carregar imagens que possam ter falhado
  let intervaloId; // Variável para armazenar o ID do intervalo
  
  function iniciarRecarregamentoContinuo() {
    intervaloId = setInterval(recarregarImagens, 3000); // Recarrega as imagens a cada 3 segundos
  }
  
  function pararRecarregamentoContinuo() {
    if (intervaloId) {
      clearInterval(intervaloId);
    }
  }
  
  // Inicia o recarregamento contínuo quando a página é carregada
  window.addEventListener('load', iniciarRecarregamentoContinuo);

  // Para o recarregamento contínuo quando todas as imagens são carregadas
  window.addEventListener('load', () => {
    const imagens = document.querySelectorAll('img');
  
    function verificarImagensCarregadas() {
      let todasCarregadas = true;
      imagens.forEach(imagem => {
        if (!imagem.complete) {
          todasCarregadas = false;
          return; // Sai do loop forEach
        }
      });
  
      if (todasCarregadas) {
        pararRecarregamentoContinuo();
        console.log('Todas as imagens foram carregadas.');
      } else {
        setTimeout(verificarImagensCarregadas, 1000); // Verifica novamente em 1 segundo
      }
    }
  
    verificarImagensCarregadas(); // Chama a função para verificar inicialmente
  });

  const logout = Response.redirect('index.php');

document.addEventListener('DOMContentLoaded', function() {
    const logoutButton = document.querySelector('.logouf');

    if (logoutButton) {
        logoutButton.addEventListener('click', function(event) {
            event.preventDefault(); // Impede o comportamento padrão do botão (navegação)

            // Opção 1: Redirecionamento direto (menos recomendado)
            // window.location.href = 'login.php';

            // Opção 2: Envio para um script de logout (recomendado)
            fetch('logout.php', { // Crie um arquivo logout.php
                method: 'POST' // Ou GET, dependendo da sua preferência
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = 'login.php'; // Redireciona após o logout no servidor
                } else {
                    console.error('Erro ao fazer logout.');
                    alert('Ocorreu um erro ao fazer logout. Tente novamente.');
                }
            })
            .catch(error => {
                console.error('Erro na requisição de logout:', error);
                alert('Ocorreu um erro ao fazer logout. Tente novamente.');
            });
        });
    }


    // Código para o carrossel (se você ainda não tiver)
    const carousel = document.getElementById('carouselExampleIndicators');
    if (carousel) {
        new bootstrap.Carousel(carousel); // Assumindo que você incluiu o Bootstrap JS
        const myCarousel = document.getElementById('myCarousel');
        const carousel = new bootstrarp.carousel.circle(myCarouselElement,);
        myCarousel.addEventListener('slide.bd.carousel', event => {
            interval: 2000;
            touch: false;
        })
    }

    // Código para o dropdown (se você ainda não tiver)
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('shown.bs.dropdown', () => {
            // Evento disparado quando o dropdown é aberto
        });

        dropdown.addEventListener('hidden.bs.dropdown', () => {
            // Evento disparado quando o dropdown é fechado
        });
    });
});



function recarregarImagens() {
    const imagens = document.querySelectorAll('img');
  
    imagens.forEach(imagem => {
      if (!imagem.complete) {
        const novaImagem = new Image();
        novaImagem.src = imagem.src;
  
        novaImagem.onload = () => {
          imagem.src = novaImagem.src;
        };
  
        novaImagem.onerror = () => {
          console.error('Falha ao carregar a imagem:', imagem.src);
          // Aqui você pode adicionar uma imagem substituta ou outra ação para lidar com erros de carregamento
        };
      }
    });
  }
  