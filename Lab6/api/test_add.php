<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>เพิ่มแมว</title>
</head>
<body>

<h2>เพิ่มสายพันธุ์แมว</h2>

<form action="add_cat.php" method="post">

ชื่อสายพันธุ์ (ไทย)
<input type="text" name="name_th"><br><br>

ชื่อสายพันธุ์ (อังกฤษ)
<input type="text" name="name_en"><br><br>

คำอธิบาย
<textarea name="description"></textarea><br><br>

ลักษณะ
<textarea name="characteristics"></textarea><br><br>

การเลี้ยงดู
<textarea name="care_instructions"></textarea><br><br>

URL รูปภาพ
<input type="text" name="image_url"><br><br>

<button type="submit">เพิ่มข้อมูล</button>

</form>

</body>
</html>
