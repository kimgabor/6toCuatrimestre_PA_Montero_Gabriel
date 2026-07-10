<?php include_once "includes/header.php"; ?>
<?php include_once "includes/navbar.php"; ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>
                <i class="bi bi-controller"></i>
                Sistema Gestor de Videojuegos
            </h1>
            <p class="text-muted">
                Administra todos los videojuegos registrados.
            </p>
        </div>
        <a href="crear.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Nuevo Videojuego
        </a>
   </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">
                        Buscar videojuego
                    </label>
                    <input
                        type="text"
                        id="buscar"
                        class="form-control"
                        placeholder="Ingrese el título...">
                </div>
                <div class="col-md-4">
                    <label class="form-label">
                        Género
                    </label>
                    <select
                        id="generoBuscar"
                        class="form-select">
                        <option value="">
                            Todos los géneros disponibles
                        </option>

                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">
                        Plataformas
                    </label>
                    <select
                            id="plataformaBuscar"
                             class="form-select">

                             <option value="">
                                  Todas las plataformas
                             </option>

                         </select>
                </div>
            </div>
        </div>
    </div>
    <!-- Tabla -->

    <div class="table-container" id="tabla-categorias">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>





    <div class="card">
        <div class="card-body table-responsive ">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Lanzamiento</th>
                        <th>Calificación</th>
                        <th>Imagen</th>
                        <th>Género</th>
                        <th>Plataforma</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaVideojuegos"> 
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once "includes/footer.php"; ?>