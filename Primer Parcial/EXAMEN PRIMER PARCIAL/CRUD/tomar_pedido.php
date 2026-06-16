<?php
require_once('config/connection.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mesa = isset($_POST['mesa']) ? intval($_POST['mesa']) : 0;
    $cliente = isset($_POST['cliente']) ? trim($_POST['cliente']) : '';
    $platillos = isset($_POST['platillos']) ? $_POST['platillos'] : []; 

    if ($mesa <= 0) { die("Error: El número de mesa debe ser mayor a 0."); }
    if (empty($cliente)) { die("Error: El nombre del cliente no puede estar vacío."); }
    if (empty($platillos) || count($platillos) == 0) { die("Error: Debe seleccionar al menos 1 platillo."); }

    $tiene_platillos_validos = false;
    foreach ($platillos as $platillo) {
        if (isset($platillo['cantidad']) && intval($platillo['cantidad']) > 0) {
            $tiene_platillos_validos = true;
            $break;
        }
    }

    if (!$tiene_platillos_validos) {
        die("Error: Al menos un platillo debe tener una cantidad mayor a 0.");
    }

    try {
        $conn->begin_transaction();

        $sql_pedido = "INSERT INTO pedidos (mesa, cliente, total, fecha) VALUES (?, ?, 0, NOW())";
        $stmt_pedido = $mysqli->prepare($sql_pedido);
        $stmt_pedido->bind_param("is", $mesa, $cliente);
        $stmt_pedido->execute();

        $pedido_id = $stmt_pedido->insert_id; 
        $stmt_pedido->close();

        $total_pedido = 0;

        $sql_detalle = "INSERT INTO detalle_pedido (pedido_id, platillo_id, cantidad, precio_unitario) VALUES (?, ?, ?, ?)";
        $stmt_detalle = $mysqli->prepare($sql_detalle);
        
        $stmt_detalle->bind_param("iiid", $pedido_id, $platillo_id, $cantidad, $precio_unitario);

        foreach ($platillos as $platillo) {
            $platillo_id = intval($platillo['id']);
            $cantidad = intval($platillo['cantidad']);
            
            if ($cantidad <= 0) continue; 

            $precio_unitario = floatval($platillo['precio']);
            $subtotal = $precio_unitario * $cantidad;
            $total_pedido += $subtotal;

            $stmt_detalle->execute();
        }
        $stmt_detalle->close();

        $sql_update = "UPDATE pedidos SET total = ? WHERE id = ?";
        $stmt_update = $mysqli->prepare($sql_update);
        $stmt_update->bind_param("di", $total_pedido, $pedido_id);
        $stmt_update->execute();
        $stmt_update->close();

        $conn->commit();
        
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=" . urlencode("Pedido registrado con éxito. ID: $pedido_id"));
        exit();

    } catch (Exception $e) {
        $conn->rollback();
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=" . urlencode($e->getMessage()));
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTOR RESTAURANTE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="page-header">
    <h1><i class="fas fa-utensils"></i> Pedidos del Restaurante</h1>
    <a href="create_pedido.php" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nuevo Pedido
    </a>
</div>

<?php if (isset($_GET["success"])): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($_GET["success"]) ?>
    </div>
<?php elseif (isset($_GET["error"])): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($_GET["error"]) ?>
    </div>
<?php endif; ?>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Mesa</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
               $stmt = $conn->prepare("SELECT id, mesa, cliente, total, fecha FROM pedidos ORDER BY id DESC");
                $stmt->execute();
                $resultado = $stmt->get_result();
                
                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["mesa"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["cliente"]) . "</td>";
                    echo "<td>$" . number_format($row["total"], 2) . "</td>";
                    echo "<td>" . htmlspecialchars($row["fecha"]) . "</td>";
                    echo "<td>";
                    echo "<a href='ver_pedido.php?id=" . urlencode($row["id"]) . "' class='btn btn-sm btn-info'> Ver Detalle</a> ";
                    echo "<a href='delete_pedido.php?id=" . urlencode($row["id"]) . "' class='btn btn-sm btn-danger'> Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                $stmt->close();
                $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>