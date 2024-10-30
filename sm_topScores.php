<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Puntuaciones Más Altas</title>
</head>
<body>
    <h1>Puntuaciones Más Altas</h1>
    <table>
        <tr><th>Nombre</th><th>Puntaje</th><th>Fecha</th></tr>
        <?php
        $conn = new mysqli("localhost", "zebam", "9572", "sm_ahorcadoDB");
        $result = $conn->query("SELECT nombre, puntaje, fecha FROM puntuaciones ORDER BY puntaje DESC LIMIT 10");
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['nombre']}</td><td>{$row['puntaje']}</td><td>{$row['fecha']}</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
