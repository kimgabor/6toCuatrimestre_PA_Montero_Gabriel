<?php include_once "includes/header.php"; ?>
<?php include_once "includes/navbar.php"; ?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card shadow">
                <div class="card-header bg-warning">
                    <h3 class="mb-0 text-dark">
                        <i class="bi bi-pencil-square"></i>
                        Editar Videojuego
                    </h3>
                </div>
                <div class="card-body">
                    <form id="formEditar" enctype="multipart/form-data">
                        <input
                            type="hidden"
                            id="idVideojuego">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Título <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="titulo"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Precio <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="precio"
                                    step="0.01"
                                    required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Descripción <span class="text-danger">*</span>
                            </label>
                            <textarea
                                class="form-control"
                                id="descripcion"
                                rows="4"
                                required></textarea>
                        </div>
                        <div class="row">
                            <!-- Fecha -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    Fecha de lanzamiento
                                </label>
                                <input
                                    type="date"
                                    class="form-control"
                                    id="lanzamiento"
                                    required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    Calificación
                                </label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="calificacion"
                                    step="0.1"
                                    min="0"
                                    max="9.9"
                                    required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    Cambiar imagen
                                </label>
                                <input
                                    type="file"
                                    class="form-control"
                                    id="imagen"
                                    accept="image/*">
                            </div>
                        </div>
                        <div class="mb-4 text-center">
                            <img
                                src="assets/img/no-image.png"
                                id="previewImagen"
                                class="game-image">
                        </div>
                        <div class="row">
                            <div class="card shadow">
        <div class="col-md-4">
                    <label class="form-label">
                        Género
                    </label>
                    <select
                        id="genero"
                        class="form-select">
                        <option value="">
                            Todos los géneros disponibles
                        </option>

                    </select>
                </div>
    
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Plataforma
                                </label>
                                <select
                            id="plataforma"
                             class="form-select">

                             <option value="">
                                  Todas las plataformas
                             </option>

                         </select>
                            </div>
                        </div>
                        <hr>
                        <div class="text-end">
                            <a
                                href="index.php"
                                class="btn btn-secondary">
                                <i class="bi bi-arrow-left-circle"></i>
                                Cancelar
                            </a>
                            <button
                                type="submit"
                                class="btn btn-warning">
                                <i class="bi bi-floppy"></i>
                                Guardar cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "includes/footer.php"; ?>