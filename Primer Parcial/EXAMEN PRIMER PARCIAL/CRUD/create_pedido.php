<?php
require __DIR__ . '/config/connection.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Pedido - Gestor Restaurante</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container" style="max-width: 800px; margin: 40px auto; padding: 20px; font-family: Arial, sans-serif;">
    
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1><i class="fas fa-plus"></i> Registrar Nuevo Pedido</h1>
        <a href="tomar_pedido.php" class="btn btn-secondary" style="text-decoration: none; background: #6c757d; color: white; padding: 8px 12px; border-radius: 4px;">
            Volver a la Lista
        </a>
    </div>

    <form action="tomar_pedido.php" method="POST">
        
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="mesa" style="display: block; font-weight: bold; margin-bottom: 5px;">Número de Mesa:</label>
            <input type="number" id="mesa" name="mesa" min="1" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div class="form-group" style="margin-bottom: 25px;">
            <label for="cliente" style="display: block; font-weight: bold; margin-bottom: 5px;">Nombre del Cliente:</label>
            <input type="text" id="cliente" name="cliente" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <h3>Selecciona los Platillos</h3>
        <table border="1" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th>Platillo</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT id, nombre, precio FROM platillos ORDER BY nombre ASC";
                $resultado = $mysqli->query($query);

                if ($resultado && $resultado->num_rows > 0) {
                    $index = 0; // Este índice nos ayuda a agrupar cada platillo en el array POST
                    while ($platillo = $resultado->fetch_assoc()) {
                        ?>
                        <tr>
                            <td>
                                <input type="hidden" name="platillos[<?= $index ?>][id]" value="<?= $platillo['id'] ?>">
                                <input type="hidden" name="platillos[<?= $index ?>][precio]" value="<?= $platillo['precio'] ?>">
                                
                                <?= htmlspecialchars($platillo['nombre']) ?>
                            </td>
                            <td>$<?= number_format($platillo['precio'], 2) ?></td>
                            <td>
                                <input type="number" name="platillos[<?= $index ?>][cantidad]" value="0" min="0" style="width: 80px; padding: 5px; text-align: center;">
                            </td>
                        </tr>
                        <?php
                        $index++;
                    }
                } else {
                    echo "<tr><td colspan='3' style='text-align:center;'>No hay platillos registrados en el menú.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div style="text-align: right;">
            <button type="submit" class="btn btn-success" style="background: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">
                Guardar Pedido
            </button>
        </div>

    </form>
</div>

</body>
</html>