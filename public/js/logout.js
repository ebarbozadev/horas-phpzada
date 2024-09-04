document.getElementById("logoutButton").addEventListener("click", function () {
    fetch("/logout", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({
            _method: "POST",
        }),
    })
        .then((response) => {
            if (response.ok) {
                localStorage.removeItem("authToken");
                window.location.href = "/login";
            }
        })
        .catch((error) => console.error("Erro:", error));
});
