<?php
header("Content-Type: application/json");
include "db.php";

$sql="SELECT * FROM CatBreeds ORDER BY id DESC";

$stmt=$pdo->query($sql);

$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>