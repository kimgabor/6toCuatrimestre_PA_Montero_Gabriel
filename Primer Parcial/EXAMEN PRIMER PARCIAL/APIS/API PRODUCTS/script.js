const boton = document.getElementById("btnProductos");
const contenedor = document.getElementById("contenedor");

boton.addEventListener("click", function() {
    fetch("https://fakestoreapi.com/products")
    .then(response => response.json())
    .then(data => {
        contenedor.innerHTML = ""; 

        data.forEach(producto => {
            const card = document.createElement("div");
            card.classList.add("card");
            const imagen = document.createElement("img");
            imagen.src = producto.image;
            imagen.alt = producto.title; 
            const info = document.createElement("div");
            info.classList.add("info");
            const title = document.createElement("h2");
            title.textContent = " " + producto.title;
            const precio = document.createElement("p");
            precio.textContent = "Precio: $" + producto.price; 
            const categoria = document.createElement("p");
            categoria.textContent = "Categoría: " + producto.category; 

            info.appendChild(title);
            info.appendChild(precio);
            info.appendChild(categoria);

            card.appendChild(imagen);
            card.appendChild(info);

            contenedor.appendChild(card);
        });
    })
    .catch(error => console.error("Error al obtener los datos:", error)); 
});