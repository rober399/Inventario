<?php
include 'conexiondb.php';

// Número de resultados por página
$resultados_por_pagina = 10;

// Determinar la página actual
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) {
    $pagina = 1;
}

// Obtener término de búsqueda
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Determinar el offset
$offset = ($pagina - 1) * $resultados_por_pagina;

// Obtener el número total de productos
$sql_count = "SELECT COUNT(*) AS total FROM productos";
if (!empty($busqueda)) {
    $sql_count .= " WHERE nombre LIKE '%$busqueda%'";
}
$total_resultados = $conn->query($sql_count)->fetch_assoc()['total'];
$total_paginas = ceil($total_resultados / $resultados_por_pagina);

// Obtener los productos para la página actual
$sql = "SELECT id, nombre, precio FROM productos";
if (!empty($busqueda)) {
    $sql .= " WHERE nombre LIKE '%$busqueda%'";
}
$sql .= " LIMIT $offset, $resultados_por_pagina";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .header {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .menu {
            width: 100%;
            display: flex;
            justify-content: center;
            background-color: #333;
            padding: 10px 0;
            margin-bottom: 20px;
        }

        .menu a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .menu a:hover {
            background-color: #555;
        }

        .search-container {
            margin: 20px 0;
        }

        .search-container input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .search-container input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .pagination {
            margin: 20px 0;
        }

        .pagination a {
            text-decoration: none;
            color: #4CAF50;
            padding: 10px;
            border: 1px solid #ddd;
            margin: 0 5px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .pagination a:hover {
            background-color: #ddd;
        }

        .update-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .update-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Lista de Productos</h1>
    </div>

    <div class="menu">
        <a href="index.html">Ingresar Producto</a>
        <a href="index.php">Lista de Productos</a>
    </div>

    <div class="search-container">
        <form action="" method="GET">
            <input type="text" name="busqueda" placeholder="Buscar producto..." value="<?php echo htmlspecialchars($busqueda); ?>">
            <input type="submit" value="Buscar">
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td><?php echo $row["precio"]; ?></td>
                        <td>
                            <form action="actualizar_precio.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <input type="number" name="nuevo_precio" step="0.01" required>
                                <button type="submit" class="update-button">Actualizar Precio</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay productos disponibles</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php if ($pagina > 1): ?>
            <a href="?pagina=<?php echo $pagina - 1; ?>&busqueda=<?php echo htmlspecialchars($busqueda); ?>">&laquo; Anterior</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
            <a href="?pagina=<?php echo $i; ?>&busqueda=<?php echo htmlspecialchars($busqueda); ?>" <?php if ($i == $pagina) echo 'style="font-weight:bold;"'; ?>><?php echo $i; ?></a>
        <?php endfor; ?>

        <?php if ($pagina < $total_paginas): ?>
            <a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo htmlspecialchars($busqueda); ?>">Siguiente &raquo;</a>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
