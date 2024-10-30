<?php
$servername = "localhost";
$username = "zebam";
$password = "9572";
$dbname = "sm_ahorcadoDB";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['random'])) {
    $result = $conn->query("SELECT palabra FROM palabra ORDER BY RAND() LIMIT 1");
    $palabra = $result->fetch_assoc()['palabra'];
    echo json_encode(['palabra' => $palabra]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['nombre']) && isset($_GET['puntaje'])) {
    $nombre = $_GET['nombre'];
    $puntaje = $_GET['puntaje'];
    $stmt = $conn->prepare("INSERT INTO puntuaciones (nombre, puntaje) VALUES (?, ?)");
    $stmt->bind_param("si", $nombre, $puntaje);
    $stmt->execute();
}
$conn->close();
?>
 