<?php include_once "includes/header.php"; ?>
<?php include_once "includes/navbar.php"; ?>
<div class="container py-4">
    <!-- Encabezado -->
    <div class="mb-4">
        <h1>
            <i class="bi bi-pc-display"></i>
            Plataformas
        </h1>
        <p class="text-muted">
            Consulta todas las plataformas registradas en el sistema.
        </p>
    </div>
    <!-- Card -->
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">
                <i class="bi bi-list-ul"></i>
                Lista de Plataformas
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th width="120">ID</th>
                            <th>Nombre de la Plataforma</th>
                        </tr>
                    </thead>
                    <tbody id="tablaPlataformas">
                        <!--
                            Los datos serán cargados
                            mediante plataformas.js
                        -->
                        <tr>
                            <td>1</td>
                            <td>PC</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>PlayStation 5</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Xbox Series X</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Nintendo Switch</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/plataformas.js"></script>
<?php include_once "includes/footer.php"; ?>