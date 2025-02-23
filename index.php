<?php
include_once("header.php");
include_once("config.php");

// Configuración de paginación
$records_per_page = 7;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page < 1 ? 1 : $page;  // Asegurarse de que la página sea al menos 1
$start_from = ($page - 1) * $records_per_page;

// Consulta para obtener los registros de la página actual usando bindValue para mayor seguridad
$sql = "SELECT * FROM jugadores LIMIT :start_from, :records_per_page";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':start_from', $start_from, PDO::PARAM_INT);
$stmt->bindValue(':records_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener el total de registros y calcular el total de páginas
$sql = "SELECT COUNT(id) FROM jugadores";
$stmt = $conn->prepare($sql);
$stmt->execute();
$total_records = $stmt->fetchColumn();
$total_pages = ceil($total_records / $records_per_page);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Jugadores</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Equipo</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($result)) {
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . htmlentities($row["id"]) . "</td>";
                echo "<td>" . htmlentities($row["nombre"]) . "</td>";
                echo "<td>" . htmlentities($row["equipo"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>0 resultados</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <!-- Nueva Paginación -->
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=<?php echo 1; ?>">First</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=<?php echo $page - 1; ?>">Previous</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled"><span class="page-link">First</span></li>
                <li class="page-item disabled"><span class="page-link">Previous</span></li>
            <?php endif; ?>

            <?php
            // Configuración para mostrar páginas adyacentes
            $adjacents = 2;

            if ($total_pages <= (1 + ($adjacents * 2))) {
                // Si hay pocas páginas, mostramos todas
                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($i == $page) {
                        echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
                    }
                }
            } else {
                // Si hay muchas páginas, usamos puntos suspensivos

                // Primer enlace
                if ($page > ($adjacents + 2)) {
                    echo "<li class='page-item'><a class='page-link' href='index.php?page=1'>1</a></li>";
                    echo "<li class='page-item disabled'><span class='page-link'>...</span></li>";
                }

                // Rango central
                $start = max(1, $page - $adjacents);
                $end = min($total_pages, $page + $adjacents);
                for ($i = $start; $i <= $end; $i++) {
                    if ($i == $page) {
                        echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
                    }
                }

                // Último enlace
                if ($page < ($total_pages - $adjacents - 1)) {
                    echo "<li class='page-item disabled'><span class='page-link'>...</span></li>";
                    echo "<li class='page-item'><a class='page-link' href='index.php?page=$total_pages'>$total_pages</a></li>";
                }
            }
            ?>

            <?php if ($page < $total_pages): ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=<?php echo $page + 1; ?>">Next</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=<?php echo $total_pages; ?>">Last</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled"><span class="page-link">Next</span></li>
                <li class="page-item disabled"><span class="page-link">Last</span></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
</body>
</html>

<?php include_once("footer.php"); ?>
