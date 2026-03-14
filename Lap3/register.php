<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ฟอร์มลงทะเบียนอบรม</title>
</head>
<body>

<h2>ฟอร์มลงทะเบียนอบรม</h2>

<form method="post">

ชื่อ-นามสกุล:<br>
<input type="text" name="fullname" required><br><br>

Email:<br>
<input type="email" name="email" required><br><br>

หัวข้ออบรม:<br>
<select name="course">
<option value="AI สำหรับงานสำนักงาน">AI สำหรับงานสำนักงาน</option>
<option value="Excel สำหรับการทำงาน">Excel สำหรับการทำงาน</option>
<option value="การเขียนเว็บด้วย PHP">การเขียนเว็บด้วย PHP</option>
</select><br><br>

อาหารที่ต้องการ:<br>
<input type="checkbox" name="food[]" value="ปกติ"> ปกติ
<input type="checkbox" name="food[]" value="มังสวิรัติ"> มังสวิรัติ
<input type="checkbox" name="food[]" value="ฮาลาล"> ฮาลาล
<br><br>

รูปแบบการเข้าร่วม:<br>
<input type="radio" name="type" value="Onsite" required> Onsite
<input type="radio" name="type" value="Online"> Online
<br><br>

<button type="submit" name="submit">ลงทะเบียน</button>

</form>

<hr>

<?php

if(isset($_POST['submit'])){

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$course = $_POST['course'];
$type = $_POST['type'];

if(isset($_POST['food'])){
$food = implode(",", $_POST['food']);
}else{
$food = "ไม่ระบุ";
}

if($type == "Onsite"){
$price = 1500;
}else{
$price = 800;
}

$data = $fullname."|".$email."|".$course."|".$food."|".$type."|".$price."\n";

file_put_contents("register.txt",$data,FILE_APPEND);

echo "<h3>ลงทะเบียนสำเร็จ</h3>";
echo "ชื่อ: $fullname <br>";
echo "Email: $email <br>";
echo "หัวข้อ: $course <br>";
echo "อาหาร: $food <br>";
echo "รูปแบบ: $type <br>";
echo "ค่าลงทะเบียน: ".number_format($price,2)." บาท";

}

?>

<hr>

<h3>รายชื่อผู้ลงทะเบียนทั้งหมด</h3>

<?php

if(file_exists("register.txt")){

$lines = file("register.txt");

echo "<table border='1' cellpadding='5'>";

echo "<tr>
<th>ชื่อ</th>
<th>Email</th>
<th>หัวข้อ</th>
<th>อาหาร</th>
<th>รูปแบบ</th>
<th>ค่าลงทะเบียน</th>
</tr>";

foreach($lines as $line){

list($name,$email,$course,$food,$type,$price) = explode("|",trim($line));

echo "<tr>";
echo "<td>$name</td>";
echo "<td>$email</td>";
echo "<td>$course</td>";
echo "<td>$food</td>";
echo "<td>$type</td>";
echo "<td>".number_format($price,2)."</td>";
echo "</tr>";

}

echo "</table>";

}

?>

</body>
</html>
