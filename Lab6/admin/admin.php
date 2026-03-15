<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Admin | Cat Breeds</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background:#f4f4f4;
}
.card{
border-radius:15px;
}
</style>

</head>
<body>

<div class="container py-5">

<h2 class="mb-4">🐱 Admin จัดการสายพันธุ์แมว</h2>

<div class="card p-4 mb-4">

<h5 id="formTitle">เพิ่มสายพันธุ์แมว</h5>

<form id="catForm" enctype="multipart/form-data">ๆ

<input type="hidden" name="id" id="cat_id">

<div class="row g-3">

<div class="col-md-6">
<input type="text" name="name_th" id="name_th" class="form-control" placeholder="ชื่อสายพันธุ์ (ไทย)" required>
</div>

<div class="col-md-6">
<input type="text" name="name_en" id="name_en" class="form-control" placeholder="ชื่อสายพันธุ์ (English)" required>
</div>

<div class="col-12">
<textarea name="description" id="description" class="form-control" placeholder="คำอธิบาย"></textarea>
</div>

<div class="col-12">
<textarea name="characteristics" id="characteristics" class="form-control" placeholder="ลักษณะ"></textarea>
</div>

<div class="col-12">
<textarea name="care_instructions" id="care_instructions" class="form-control" placeholder="การดูแล"></textarea>
</div>

<div class="col-12">
<input type="file" name="image_file" id="image_file" class="form-control" accept="image/*">

</div>

<div class="col-12">

<button id="submitBtn" class="btn btn-success">
เพิ่มข้อมูล
</button>

<button type="button" onclick="resetForm()" class="btn btn-secondary">
ยกเลิก
</button>

</div>

</div>

</form>

</div>


<div class="card p-4">

<h5>รายการแมวทั้งหมด</h5>

<table class="table table-striped mt-3">

<thead>
<tr>
<th>ID</th>
<th>ชื่อไทย</th>
<th>ชื่ออังกฤษ</th>
<th>สถานะ</th>
<th>จัดการ</th>
</tr>
</thead>

<tbody id="catTable"></tbody>

</table>

</div>

</div>


<script>

let editMode=false;

loadCats();

function loadCats(){

fetch("../api/get_cats.php")
.then(res=>res.json())
.then(data=>{

let html="";

data.forEach(cat=>{

html+=`
<tr>

<td>${cat.id}</td>

<td>${cat.name_th}</td>

<td>${cat.name_en}</td>

<td>
${cat.is_visible == 1 ?
'<span class="badge bg-success">แสดง</span>' :
'<span class="badge bg-secondary">ซ่อน</span>'}
</td>

<td>

<button onclick='editCat(${JSON.stringify(cat)})'
class="btn btn-warning btn-sm">
แก้ไข
</button>

<button onclick="deleteCat(${cat.id})"
class="btn btn-danger btn-sm">
ลบ
</button>

</td>

</tr>
`;

});

document.getElementById("catTable").innerHTML=html;

});

}


document.getElementById("catForm").addEventListener("submit",function(e){

e.preventDefault();

let formData=new FormData(this);

let url= editMode ?
"../api/update_cat.php" :
"../api/add_cat.php";

fetch(url,{
method:"POST",
body:formData
})
.then(res=>res.text())
.then(data=>{

alert(editMode ? "แก้ไขสำเร็จ" : "เพิ่มข้อมูลสำเร็จ");

resetForm();
loadCats();

});

});


function editCat(cat){

editMode=true;

document.getElementById("formTitle").innerText="แก้ไขข้อมูลแมว";
document.getElementById("submitBtn").innerText="บันทึกการแก้ไข";

document.getElementById("cat_id").value=cat.id;
document.getElementById("name_th").value=cat.name_th;
document.getElementById("name_en").value=cat.name_en;
document.getElementById("description").value=cat.description;
document.getElementById("characteristics").value=cat.characteristics;
document.getElementById("care_instructions").value=cat.care_instructions;

window.scrollTo(0,0);

}


function resetForm(){

editMode=false;

document.getElementById("formTitle").innerText="เพิ่มสายพันธุ์แมว";
document.getElementById("submitBtn").innerText="เพิ่มข้อมูล";

document.getElementById("catForm").reset();
document.getElementById("cat_id").value="";

}



function deleteCat(id){

if(confirm("ต้องการลบข้อมูลหรือไม่")){

fetch("../api/delete_cat.php?id="+id)
.then(()=>{

alert("ลบสำเร็จ");

loadCats();

});

}

}

</script>

</body>
</html>
