window.addEventListener("DOMContentLoaded", () => {

    // Escuchador para enviar el formulario al darle click a una pizza
    document.querySelectorAll(".pizza-form").forEach(form => {
        form.addEventListener("click", () => { form.submit(); });

        if(Array.from(form.classList).includes("selected")) {
            processSVG(form, "checkmark.svg");
        }
    });
});

function processSVG(element, filename) {
    const fullPath = `../SVG/${filename}`;

    fetch(fullPath).then((res) => res.text()).then((text) => {
        const parser = new DOMParser();
        const svgData = parser.parseFromString(text, "image/svg+xml");

        const svgElement = svgData.querySelector("svg");
        const pathElement = svgData.querySelector("svg path");
        
        svgElement.appendChild(pathElement);
        element.appendChild(svgElement);
    }).catch((e) => console.error(e));
}