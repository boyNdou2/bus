<?php
$host = 'localhost';
$db = 'buss';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $bus_id = $_POST['bus_id'];
        $departure_location = $_POST['departure_location'];
        $arrival_location = $_POST['arrival_location'];
        $departure_time = $_POST['departure_time'];
        $arrival_time = $_POST['arrival_time'];

        $sql = "INSERT INTO trips (bus_id, departure_location, arrival_location, departure_time, arrival_time)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$bus_id, $departure_location, $arrival_location, $departure_time, $arrival_time]);

        echo "Trajet ajouté avec succès.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
