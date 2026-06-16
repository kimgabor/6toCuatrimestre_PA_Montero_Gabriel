const botonPosts = document.getElementById("btnPosts");
const tablaCuerpo = document.getElementById("tablaCuerpo");

function capitalizarPalabras(texto) {
    return texto
        .split(" ") //se divide el texto 
        .map(palabra => palabra.charAt(0).toUpperCase() + palabra.slice(1)) // Esto me lo dio gem que hace que la primera palabra empiece en mayus
        .join(" "); // Se devuelve a unir las palabras con espacios
}

botonPosts.addEventListener("click", function() {
    fetch("https://jsonplaceholder.typicode.com/posts")
    .then(response => response.json())
    .then(data => {
        tablaCuerpo.innerHTML = "";
        const primerosDiez = data.slice(0, 10);
        primerosDiez.forEach(post => {
            const fila = document.createElement("tr");

            const celdaId = document.createElement("td");
            celdaId.textContent = post.id;

            const celdaTitulo = document.createElement("td");
            celdaTitulo.textContent = capitalizarPalabras(post.title);

            const celdaCuerpo = document.createElement("td");
            celdaCuerpo.textContent = post.body.length > 50 
                ? post.body.substring(0, 50) + "..." 
                : post.body;

            fila.appendChild(celdaId);
            fila.appendChild(celdaTitulo);
            fila.appendChild(celdaCuerpo);
            tablaCuerpo.appendChild(fila);
        });
    })
    .catch(error => console.error("Error al cargar los posts:", error));
});