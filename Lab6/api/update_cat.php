<?php
include "db.php";

$id=$_POST["id"];
$name_th=$_POST["name_th"];
$name_en=$_POST["name_en"];
$description=$_POST["description"];
$characteristics=$_POST["characteristics"];
$care=$_POST["care_instructions"];

$image_url="";

if(isset($_FILES["image_file"]) && $_FILES["image_file"]["name"]!=""){

    $upload_dir="../uploads/";

    if(!is_dir($upload_dir)){
        mkdir($upload_dir,0777,true);
    }

    $filename=time()."_".basename($_FILES["image_file"]["name"]);

    $target_file=$upload_dir.$filename;

    if(move_uploaded_file($_FILES["image_file"]["tmp_name"],$target_file)){
        $image_url="uploads/".$filename;
    }

}

if($image_url!=""){

$sql="UPDATE CatBreeds SET
name_th=?,
name_en=?,
description=?,
characteristics=?,
care_instructions=?,
image_url=?
WHERE id=?";

$stmt=$pdo->prepare($sql);
$stmt->execute([$name_th,$name_en,$description,$characteristics,$care,$image_url,$id]);

}else{

$sql="UPDATE CatBreeds SET
name_th=?,
name_en=?,
description=?,
characteristics=?,
care_instructions=?
WHERE id=?";

$stmt=$pdo->prepare($sql);
$stmt->execute([$name_th,$name_en,$description,$characteristics,$care,$id]);

}

echo "success";
?>