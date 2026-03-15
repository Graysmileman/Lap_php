<?php
include "db.php";

$id = $_GET["id"] ?? 0;

$sql = "DELETE FROM CatBreeds WHERE id=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

echo "success";
?>
