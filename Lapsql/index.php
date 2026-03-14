<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>BMI Calculator</title>

<style>

body{
    font-family: Arial;
    background: linear-gradient(135deg,#4facfe,#00f2fe);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    background:white;
    padding:40px;
    border-radius:15px;
    width:350px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

label{
    font-weight:bold;
}

input{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:15px;
    border-radius:8px;
    border:1px solid #ccc;
}

.btn-group{
    display:flex;
    justify-content:space-between;
}

button{
    width:48%;
    padding:10px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-size:16px;
}

.submit{
    background:#4CAF50;
    color:white;
}

.clear{
    background:#f44336;
    color:white;
}

</style>
</head>

<body>

<div class="card">

<h2>โปรแกรมคำนวณ BMI</h2>

<form action="result.php" method="post">

<label>ชื่อ-นามสกุล</label>
<input type="text" name="name" required>

<label>วันเกิด</label>
<input type="date" name="birth" required>

<label>อายุ</label>
<input type="number" name="age" required>

<label>น้ำหนัก (กก.)</label>
<input type="number" step="0.1" name="weight" required>

<label>ส่วนสูง (ซม.)</label>
<input type="number" step="0.1" name="height" required>

<div class="btn-group">
<button class="submit" type="submit">Submit</button>
<button class="clear" type="reset">Clear</button>
</div>

</form>

</div>

</body>
</html>
