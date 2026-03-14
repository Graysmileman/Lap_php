<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>โปรแกรมแยกชื่อ สกุล</title>
</head>
<body>

<h2>โปรแกรมแยกส่วนของชื่อ สกุล</h2>

<form method="post">
ชื่อสกุลแบบเต็ม :
<input type="text" name="fullname" size="50" required>
<input type="submit" value="แยกชื่อ-สกุล">
</form>

<hr>

<?php

if(isset($_POST["fullname"])){

$fullname = trim($_POST["fullname"]);

$prefix_list = [
"นาย","นาง","นางสาว","เด็กชาย","เด็กหญิง",
"น.ส.","ด.ช.","ด.ญ.","ร.ต.ต.","ด.ต.","มรว.","ผศ.","ดร."
];

$prefix = "";
$firstname = "";
$lastname = "";

$words = preg_split('/\s+/', $fullname);

if(in_array($words[0], $prefix_list)){

$prefix = $words[0];

if(count($words) >= 2){
$firstname = $words[1];
}

if(count($words) >= 3){
$lastname = implode(" ", array_slice($words,2));
}

}else{

$firstname = $words[0];

if(count($words) >= 2){
$lastname = implode(" ", array_slice($words,1));
}

}

echo "<h3>ผลลัพธ์</h3>";
echo "คำนำหน้า : ".$prefix."<br>";
echo "ชื่อ : ".$firstname."<br>";
echo "สกุล : ".$lastname."<br>";

}

?>

</body>
</html>
