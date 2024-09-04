fetch("/painel/some-endpoint", {
    method: "GET",
    headers: {
        Authorization: "Bearer " + localStorage.getItem("authToken"),
    },
})
    .then((response) => response.json())
    .then((data) => console.log(data))
    .catch((error) => console.error("Erro:", error));
