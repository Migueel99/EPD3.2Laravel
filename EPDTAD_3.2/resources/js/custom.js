function mostrarPopup(imagen) {
    // Crear el popup
    var popup = document.createElement("div");
    popup.classList.add("popup");

    // Crear la imagen
    var imagenPopup = document.createElement("img");
    imagenPopup.src = imagen.src;
    imagenPopup.classList.add("imagen-popup");

    // Agregar la imagen al popup
    popup.appendChild(imagenPopup);

    // Agregar el popup al cuerpo del documento
    document.body.appendChild(popup);

    // Agregar un evento click al popup para cerrarlo
    popup.addEventListener("click", function() {
        document.body.removeChild(popup);
    });
}
