var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector("#signup");

var body = document.querySelector("body");


btnSignin.addEventListener("click", function () {
   body.className = "sign-in-js"; 
});

btnSignup.addEventListener("click", function () {
    body.className = "sign-up-js";
})

var btnlogout = document.querySelector("logout");
var btnlogoutup = document.querySelector("logoutup");

var body = document.querySelector("body");


btnlogout.addEventListener("click", function () {
   body.className = "sign-in-js"; 
});

btnlogoutup.addEventListener("click", function () {
    body.className = "sign-up-js";
})

// código de validação do login
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.querySelector('.second-content .form');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        const email = loginForm.querySelector('input[type="email"]').value;
        const password = loginForm.querySelector('input[type="password"]').value;

        // Validação básica no cliente (opcional, mas recomendado)
        if (!email || !password) {
            alert('Por favor, preencha email e senha.');
            return;
        }

        // Envia os dados para o servidor usando AJAX (fetch API)
        fetch('sistema.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded' // Importante para dados de formulário
            },
            body: `email=${encodeURIComponent(email)}&senha=${encodeURIComponent(password)}` // Envia os dados como um formulário
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`); // Trata erros de rede
            }
            return response.text(); // Ou response.json() se o servidor retornar JSON
        })
        .then(data => {
            // Aqui você trata a resposta do servidor
            console.log(data); // Exibe a resposta no console (para depuração)

            if (data === "success") { // Ou outra mensagem que seu sistema.php retornar em caso de sucesso
                // Redireciona para a página desejada após o login
                window.location.href = "pagina_de_sucesso.php"; // Substitua pelo URL correto
            } else {
                alert(data); // Exibe a mensagem de erro retornada pelo servidor
            }


        })
        .catch(error => {
            console.error('Erro na requisição:', error);
            alert('Ocorreu um erro ao tentar fazer login. Tente novamente mais tarde.');
        });
    });
});