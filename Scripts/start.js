window.addEventListener("DOMContentLoaded", () => {

    // Escuchador para enviar el formulario al darle click a "Continuar"
    document.querySelector("#submit-form").addEventListener("click", () => {
        document.querySelector("form").submit();
    });
});
