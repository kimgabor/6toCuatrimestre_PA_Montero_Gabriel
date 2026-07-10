const URL_BASE = "http://192.168.1.140/videojuegos_app/";

// Mostrar videojuegos
function mostrarVideojuegos(videojuegos) {

     const tbody = document.getElementById("tablaVideojuegos");

console.log("Entró a mostrarVideojuegos");
console.log(tbody);
console.log(videojuegos);

   

    if (!tbody) {
        return;
    }

    tbody.innerHTML = "";

    videojuegos.forEach(videojuego => {

        const tr = document.createElement("tr");

        tr.innerHTML = `
            <td>${videojuego.id}</td>
            <td>${videojuego.titulo}</td>
            <td>${videojuego.descripcion}</td>
            <td>$${videojuego.precio}</td>
            <td>${videojuego.lanzamiento}</td>
            <td>${videojuego.calificacion}</td>
            <td>
                <img
                    src="${URL_BASE}api-imagen.php?nombre=${videojuego.imagen}"
                    class="img-thumbnail"
                    width="70"
                    onerror="imagenError(this)">
            </td>
            <td>${videojuego.id_genero}</td>
            <td>${videojuego.id_plataforma}</td>
            <td>

                <button
                    class="btn btn-warning btn-sm"
                    onclick="obtenerId(${videojuego.id})">

                    Editar

                </button>

                <button
                    class="btn btn-danger btn-sm"
                    onclick="eliminarVideojuego(${videojuego.id})">

                    Eliminar

                </button>

            </td>
        `;
console.log(tr);
        tbody.appendChild(tr);

    });

}

// GET api-videojuego.php
async function getVideojuegos() {

    console.log("Entró a getVideojuegos");

    try {

        const response = await fetch(`${URL_BASE}api-videojuego.php`);

        console.log("Status:", response.status);

        const data = await response.json();

        console.log("Datos:", data);

        mostrarVideojuegos(data);

    } catch (error) {

        console.error("Error:", error);

    }

}

// GET api-videojuego.php?id=1
async function getVideojuegoPorId(id) {

    try {

        const response = await fetch(`${URL_BASE}api-videojuego.php?id=${id}`);

        if (response.ok) {

            return await response.json();

        } else {

            console.log("No se encontró el videojuego.");

        }

    } catch (error) {

        console.error("Error al obtener el videojuego:", error);

    }

}

// Crear FormData
function obtenerFormData() {

    const formData = new FormData();

    formData.append("titulo", document.getElementById("titulo").value);
    formData.append("descripcion", document.getElementById("descripcion").value);
    formData.append("precio", document.getElementById("precio").value);
    formData.append("lanzamiento", document.getElementById("lanzamiento").value);
    formData.append("calificacion", document.getElementById("calificacion").value);
    formData.append("id_genero", document.getElementById("genero").value);
    formData.append("id_plataforma", document.getElementById("plataforma").value);

    const imagen = document.getElementById("imagen");

    if (imagen && imagen.files.length > 0) {

        formData.append("imagen", imagen.files[0]);

    }

    return formData;

}

// POST api-videojuego.php
async function crearVideojuego() {

    const formData = obtenerFormData();

    try {

        const response = await fetch(`${URL_BASE}api-videojuego.php`, {
            method: "POST",
            body: formData
        });

        const data = await response.json();

        if (response.ok) {

            alert("Videojuego registrado correctamente.");

            window.location.href = "index.php";

        } else {

            alert(data.message || "Error al registrar el videojuego.");

        }

    } catch (error) {

        console.error("Error:", error);

    }

}

// PUT api-videojuego.php?id=1
async function actualizarVideojuego(id) {

    const formData = obtenerFormData();

    console.log("ID:", id);

    try {

        const response = await fetch(`${URL_BASE}api-videojuego.php?id=${id}`, {
            method: "PUT",
            body: formData
        });

        const texto = await response.text();
console.log(texto);

        if (response.ok) {

    alert("Videojuego actualizado correctamente.");
    window.location.href = "index.php";

} else {

    alert(texto);

}

    } catch (error) {

        console.error("Error:", error); 
    }}

// DELETE api-videojuego.php?id=1
async function eliminarVideojuego(id) {

    if (!confirm("¿Desea eliminar este videojuego?")) {

        return;

    }

    try {

        const response = await fetch(`${URL_BASE}api-videojuego.php?id=${id}`, {
            method: "DELETE"
        });

        const data = await response.json();

        if (response.ok) {

            alert("Videojuego eliminado correctamente.");

            getVideojuegos();

        } else {

            alert(data.message || "No fue posible eliminar.");

        }

    } catch (error) {

        console.error("Error:", error);

    }

}

// Evento crear videojuego
function eventoCrearVideojuego(event) {

    event.preventDefault();

    crearVideojuego();

}

// Evento actualizar videojuego
function eventoActualizarVideojuego(event, id) {

    event.preventDefault();

    actualizarVideojuego(id);

}

// Buscar por título
async function buscarTitulo(titulo) {

    try {

        const response = await fetch(`${URL_BASE}api-videojuego.php?titulo=${titulo}`);

        const data = await response.json();

        mostrarVideojuegos(data);

    } catch (error) {

        console.error("Error al buscar:", error);

    }

}

// Buscar por género
async function buscarGenero(genero) {

    try {

        const response = await fetch(`${URL_BASE}api-videojuego.php?genero=${genero}`);

        const data = await response.json();

        mostrarVideojuegos(data);

    } catch (error) {

        console.error("Error al buscar:", error);

    }

}

// Buscar por plataforma
async function buscarPlataforma(plataforma) {

    try {

        const response = await fetch(`${URL_BASE}api-videojuego.php?plataforma=${plataforma}`);

        const data = await response.json();

        mostrarVideojuegos(data);

    } catch (error) {

        console.error("Error al buscar:", error);

    }

}

// Cargar géneros
async function cargarGeneros() {

    const select = document.getElementById("genero");

    if (!select) {
        return;
    }

    try {

        const response = await fetch(`${URL_BASE}api-genero.php`);

        const data = await response.json();

        select.innerHTML = '<option value="">Todos los géneros</option>';

        data.forEach(genero => {

            const option = document.createElement("option");

            option.value = genero.id;
            option.textContent = genero.nombre;

            select.appendChild(option);

        });

    } catch (error) {

        console.error("Error al cargar géneros:", error);

    }

}

// Cargar plataformas
async function cargarPlataformas() {

    const select = document.getElementById("plataforma");

    if (!select) {
        return;
    }

    try {

        const response = await fetch(`${URL_BASE}api-plataforma.php`);

        const data = await response.json();

        select.innerHTML = '<option value="">Todas las plataformas</option>';

        data.forEach(plataforma => {

            const option = document.createElement("option");

            option.value = plataforma.id;
            option.textContent = plataforma.nombre;

            select.appendChild(option);

        });

    } catch (error) {

        console.error("Error al cargar plataformas:", error);

    }

}

// PATCH api-videojuego.php?id=1
async function edicionRapida(id, precio, calificacion) {

    const datos = {
        precio: precio,
        calificacion: calificacion
    };

    try {

        const response = await fetch(`${URL_BASE}api-videojuego.php?id=${id}`, {
            method: "PATCH",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(datos)
        });

        if (response.ok) {

            alert("Videojuego actualizado correctamente.");

            getVideojuegos();

        } else {

            alert("No fue posible actualizar.");

        }

    } catch (error) {

        console.error(error);

    }

}

// Poblar formulario de edición
async function poblarFormularioEdicion(id) {

    const videojuego = await getVideojuegoPorId(id);

    if (!videojuego) {
        return;
    }

    document.getElementById("titulo").value = videojuego.titulo;
    document.getElementById("descripcion").value = videojuego.descripcion;
    document.getElementById("precio").value = videojuego.precio;
    document.getElementById("lanzamiento").value = videojuego.lanzamiento;
    document.getElementById("calificacion").value = videojuego.calificacion;
    document.getElementById("genero").value = videojuego.id_genero;
    document.getElementById("plataforma").value = videojuego.id_plataforma;

}

// Ir a editar
function obtenerId(id) {

    window.location.href = `editar.php?id=${id}`;

}

// Imagen por defecto
function imagenError(img) {

    img.src = "assets/img/no-image.png";

}

// DOMContentLoaded
const formularioEditar = document.getElementById("formEditar");

if (formularioEditar) {

    const id = new URLSearchParams(window.location.search).get("id");

    Promise.all([
        cargarGeneros(),
        cargarPlataformas()
    ]).then(() => {
        if (id) {
            poblarFormularioEdicion(id);
        }
    });

    formularioEditar.addEventListener("submit", function (event) {
        eventoActualizarVideojuego(event, id);
    });

}

    const generoBuscar = document.getElementById("generoBuscar");

    if (generoBuscar) {

        generoBuscar.addEventListener("change", function () {

            if (this.value === "") {

                getVideojuegos();

            } else {

                buscarGenero(this.value);

            }

        });

    }

    const plataformaBuscar = document.getElementById("plataformaBuscar");

    if (plataformaBuscar) {

        plataformaBuscar.addEventListener("change", function () {

            if (this.value === "") {

                getVideojuegos();

            } else {

                buscarPlataforma(this.value);

            }

        });

    }

    const formularioCrear = document.getElementById("formVideojuego");

    if (formularioCrear) {

        formularioCrear.addEventListener("submit", eventoCrearVideojuego);

    }

    const formularioEditar = document.getElementById("formEditar");

    if (formularioEditar) {

        const id = new URLSearchParams(window.location.search).get("id");

        if (id) {

            poblarFormularioEdicion(id);

        }

        formularioEditar.addEventListener("submit", function (event) {

            eventoActualizarVideojuego(event, id);

        });

    }

});