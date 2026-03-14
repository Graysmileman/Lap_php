<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>โปรแกรมคำนวณส่วนลดร้านค้า</title>
</head>
<body>

<h2>โปรแกรมคำนวณส่วนลดร้านค้า</h2>

<form method="post">
    ยอดซื้อสินค้า (บาท): 
    <input type="number" name="amount" step="0.01" required>
    <br><br>

    สถานะสมาชิก:
    <input type="radio" name="member" value="yes"> สมาชิก
    <input type="radio" name="member" value="no" checked> ไม่ใช่สมาชิก
    <br><br>

    <input type="submit" value="คำนวณ">
</form>

<hr>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $amount = $_POST["amount"];
    $member = $_POST["member"];

    if($amount < 0){
        echo "ยอดซื้อห้ามเป็นค่าติดลบ";
        exit;
    }

    $discountRate = 0;
    $level = "ไม่ได้รับส่วนลด";
    $nextLevel = 500;

    if($amount >= 5000){
        $discountRate = 20;
        $level = "Platinum";
        $nextLevel = 0;
    }
    elseif($amount >= 3000){
        $discountRate = 15;
        $level = "Gold";
        $nextLevel = 5000;
    }
    elseif($amount >= 1000){
        $discountRate = 10;
        $level = "Silver";
        $nextLevel = 3000;
    }
    elseif($amount >= 500){
        $discountRate = 5;
        $level = "Bronze";
        $nextLevel = 1000;
    }

    // ส่วนลดสมาชิก
    $memberBonus = 0;
    if($member == "yes" && $amount >= 500){
        $memberBonus = 5;
    }

    $totalRate = $discountRate + $memberBonus;

    $discount = $amount * $totalRate / 100;
    $net = $amount - $discount;

    echo "<h3>ผลการคำนวณ</h3>";
    echo "ยอดซื้อ: ".number_format($amount,2)." บาท <br>";

    if($discountRate > 0){
        echo "ได้รับส่วนลดระดับ $level $discountRate% <br>";
    }else{
        echo "ไม่ได้รับส่วนลด <br>";
    }

    if($memberBonus > 0){
        echo "ได้รับส่วนลดพิเศษสมาชิก +5% <br>";
    }

    if($totalRate > 0){
        echo "ส่วนลดรวม $totalRate% <br>";
        echo "ส่วนลดที่ได้รับ: ".number_format($discount,2)." บาท <br>";
    }

    echo "ราคาที่ต้องจ่าย: ".number_format($net,2)." บาท <br>";

    // คำแนะนำซื้อเพิ่ม
    if($nextLevel > 0 && $amount < $nextLevel){
        $need = $nextLevel - $amount;

        if($nextLevel == 500){
            $rate = "5%";
        }elseif($nextLevel == 1000){
            $rate = "10%";
        }elseif($nextLevel == 3000){
            $rate = "15%";
        }elseif($nextLevel == 5000){
            $rate = "20%";
        }

        echo "แนะนำ: ซื้อเพิ่มอีก ".number_format($need,2)." บาท รับส่วนลด $rate";
    }
}
?>

</body>
</html>
