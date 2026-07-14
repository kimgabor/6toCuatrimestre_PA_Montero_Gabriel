<?php include_once "includes/header.php"; ?>
<?php include_once "includes/navbar.php"; ?>
<div class="container py-4">
    <div class="mb-4">
        <h1>
            <i class="bi bi-tags-fill"></i>
            Géneros
        </h1>
        <p class="text-muted">
            Consulta todos los géneros registrados en el sistema.
        </p>
    </div>
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">
                <i class="bi bi-list-ul"></i>
                Lista de Géneros
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th width="120">ID</th>
                            <th>Nombre del Género</th>
                        </tr>
                    </thead>
                    <tbody id="tablaGeneros">                      
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/generos.js"></script>
<?php include_once "includes/footer.php"; ?>