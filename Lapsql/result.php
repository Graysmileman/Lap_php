<?php

$name = $_POST['name'];
$birth = $_POST['birth'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$height = $_POST['height'];

$height_m = $height / 100;

$bmi = $weight / ($height_m * $height_m);

if($bmi < 18.5){
$result = "น้ำหนักน้อย";
$advice = "ควรรับประทานอาหารเพิ่ม";
}
elseif($bmi < 23){
$result = "ปกติ";
$advice = "รักษาสุขภาพให้ดี";
}
elseif($bmi < 25){
$result = "น้ำหนักเกิน";
$advice = "ควรควบคุมอาหาร";
}
elseif($bmi < 30){
$result = "อ้วน";
$advice = "ควรออกกำลังกาย";
}
else{
$result = "อ้วนมาก";
$advice = "ควรพบแพทย์";
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>ผลลัพธ์ BMI</title>

<style>

body{
    font-family: Arial;
    background: linear-gradient(135deg,#43e97b,#38f9d7);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    background:white;
    padding:40px;
    border-radius:15px;
    width:400px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
}

.result{
    margin-top:20px;
    line-height:1.8;
}

.bmi{
    font-size:24px;
    font-weight:bold;
    color:#2196F3;
}

button{
    width:100%;
    padding:12px;
    margin-top:20px;
    border:none;
    border-radius:8px;
    background:#2196F3;
    color:white;
    font-size:16px;
    cursor:pointer;
}

</style>
</head>

<body>

<div class="card">

<h2>ผลการคำนวณ BMI</h2>

<div class="result">

ชื่อ : <?php echo $name; ?><br>
วันเกิด : <?php echo $birth; ?><br>
อายุ : <?php echo $age; ?> ปี<br>
น้ำหนัก : <?php echo $weight; ?> กก.<br>
ส่วนสูง : <?php echo $height; ?> ซม.<br>

<br>

ค่า BMI :  
<span class="bmi">
<?php echo number_format($bmi,2); ?>
</span>

<br><br>

ผลการวิเคราะห์ : <?php echo $result; ?><br>
คำแนะนำ : <?php echo $advice; ?>

</div>

<a href="index.php">
<button>กลับหน้าหลัก</button>
</a>

</div>

</body>
</html>
