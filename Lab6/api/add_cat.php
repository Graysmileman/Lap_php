<?php
include "db.php";

$name_th = $_POST["name_th"];
$name_en = $_POST["name_en"];
$description = $_POST["description"];
$characteristics = $_POST["characteristics"];
$care = $_POST["care_instructions"];

$image_url = "";

if(isset($_FILES["image_file"])){

$upload_dir = "../uploads/";

if(!is_dir($upload_dir)){
mkdir($upload_dir,0777,true);
}

$filename = time()."_".$_FILES["image_file"]["name"];
$target = $upload_dir.$filename;

if(move_uploaded_file($_FILES["image_file"]["tmp_name"],$target)){
$image_url = "uploads/".$filename;
}

}

$sql="INSERT INTO CatBreeds
(name_th,name_en,description,characteristics,care_instructions,image_url)
VALUES (?,?,?,?,?,?)";

$stmt=$pdo->prepare($sql);
$stmt->execute([
$name_th,
$name_en,
$description,
$characteristics,
$care,
$image_url
]);

echo "success";
?>