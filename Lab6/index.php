<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cat Breeds | ระบบข้อมูลสายพันธุ์แมว</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
body{font-family:'Kanit',sans-serif;background:#fdfbf9}
.hero-section{background:linear-gradient(45deg,#ff914d,#ffbd59);color:white;padding:60px 0;margin-bottom:-40px}
.search-card{border:none;border-radius:15px;box-shadow:0 10px 30px rgba(0,0,0,.1)}
.cat-card{border:none;border-radius:20px;transition:.3s;height:100%;overflow:hidden;box-shadow:0 5px 15px rgba(0,0,0,.05);display:flex;flex-direction:column}
.cat-card:hover{transform:translateY(-10px);box-shadow:0 15px 35px rgba(0,0,0,.1)}
.cat-img{height:220px;object-fit:cover}
.badge-en{background:#fff0e6;color:#ff914d;font-weight:600;font-size:.75rem}
</style>
</head>

<body>

<header class="hero-section text-center">
<div class="container">
<h1 class="display-4 fw-bold">🐱 Cat Breeds Society</h1>
<p class="lead">รวบรวมสายพันธุ์แมว พร้อมระบบจัดการฐานข้อมูล</p>
</div>
</header>

<div class="container mb-5">

<div class="row justify-content-center">
<div class="col-md-6">

<div class="card search-card p-2 mb-5">
<div class="input-group">
<span class="input-group-text bg-transparent border-0">
<i class="bi bi-search text-muted"></i>
</span>

<input type="text"
id="search"
class="form-control border-0 shadow-none"
placeholder="ค้นหาชื่อแมว (ไทย/อังกฤษ)...">

</div>
</div>

</div>
</div>

<div id="cats" class="row g-4"></div>

</div>


<!-- Modal รายละเอียด -->
<div class="modal fade" id="catDetailModal" tabindex="-1">
<div class="modal-dialog modal-dialog-centered modal-lg">

<div class="modal-content border-0" style="border-radius:20px">

<div class="modal-body">

<img id="modalImg"
class="w-100 mb-3"
style="height:300px;object-fit:cover">

<h3 id="modalTitle" class="fw-bold"></h3>

<span id="modalBadge" class="badge badge-en mb-3"></span>

<hr>

<h6 class="fw-bold">คำอธิบาย</h6>
<p id="modalDesc"></p>

<h6 class="fw-bold">ลักษณะเด่น</h6>
<p id="modalChar"></p>

<h6 class="fw-bold">การดูแล</h6>
<p id="modalCare"></p>

<div class="text-end mt-3">
<button class="btn btn-warning"
data-bs-dismiss="modal">
ปิด
</button>
</div>

</div>
</div>
</div>
</div>


<footer class="text-center py-4 text-muted border-top bg-white mt-5">
<p>© 2026 it67040233132 | Project Database</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>

let catsData=[]
const modal=new bootstrap.Modal(document.getElementById('catDetailModal'))


fetch("api/get_cats.php")
.then(res=>res.json())
.then(data=>{
catsData=data
showCats(data)
})


function showCats(data){

let html=""

if(data.length===0){
html=`<div class="col-12 text-center">
<h4 class="text-muted">ไม่พบข้อมูลแมว</h4>
</div>`
}

else{

data.forEach((cat,index)=>{

html+=`

<div class="col-sm-6 col-lg-4 col-xl-3">

<div class="card cat-card">

<img src="${cat.image_url || 'https://via.placeholder.com/400x300?text=No+Image'}" class="card-img-top cat-img" onerror="this.onerror=null;this.src='https://via.placeholder.com/400x300?text=No+Image';">

<div class="card-body d-flex flex-column">

<span class="badge badge-en mb-2">${cat.name_en}</span>

<h5 class="fw-bold">${cat.name_th}</h5>

<p class="small text-muted text-truncate">
${cat.description}
</p>

<button
class="btn btn-outline-warning btn-sm mt-auto"
onclick="openDetail(${index})">
ดูรายละเอียด
</button>

</div>
</div>
</div>

`

})

}

document.getElementById("cats").innerHTML=html

}



function openDetail(index){

const cat=catsData[index]

document.getElementById("modalImg").src=cat.image_url || 'https://via.placeholder.com/800x600?text=No+Image'
document.getElementById("modalTitle").innerText=cat.name_th
document.getElementById("modalBadge").innerText=cat.name_en

document.getElementById("modalDesc").innerText=cat.description
document.getElementById("modalChar").innerText=cat.characteristics
document.getElementById("modalCare").innerText=cat.care_instructions

modal.show()

}



document.getElementById("search").addEventListener("input",function(){

let keyword=this.value.toLowerCase()

let filtered=catsData.filter(cat=>
cat.name_th.toLowerCase().includes(keyword)||
cat.name_en.toLowerCase().includes(keyword)
)

showCats(filtered)

})

</script>

</body>
</html>
