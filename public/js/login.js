document
    .getElementById("loginForm")
    .addEventListener("submit", function (event) {
        event.preventDefault(); // Evita o comportamento padrão do formulário

        fetch("/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({
                email: document.getElementById("email").value,
                senha: document.getElementById("senha").value,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.token) {
                    // Armazenar o token no localStorage
                    localStorage.setItem("authToken", data.token);
                    window.location.href = "/painel"; // Redirecionar para o painel
                } else {
                    // Exibir mensagem de erro
                    alert(data.message);
                }
            })
            .catch((error) => console.error("Erro:", error));
    });
