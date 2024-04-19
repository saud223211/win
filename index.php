<?php
include './inc/db.php';
include './inc/form.php';

$sql ='SELECT * FROM `users`  ORDER BY RAND() LIMIT 1';
$result = mysqli_query($conn,$sql);
$users = mysqli_fetch_all($result,MYSQLI_ASSOC);


?>




<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css" >
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body>

    
      

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto ">
        <img src="images/S.2.jpg" alt="">
      <h1 class="display-4 fw-normal">أربح مع سعود </h1>
      <p class="lead fw-normal">باقي على فتح التسجيل</p>
      <h3 id="countdown"></h3>
      <p class="lead fw-normal">للسحب على نسخة مجانية من البرنامج</p>
      
    </div>
   <div class="container">
    <h3>للدخول في السحب اتبع مايلي: </h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">تابع البث المباشر</li>
            <li class="list-group-item">جاوب على الاسالة</li>
            <li class="list-group-item">سجل في السحب</li>
            <li class="list-group-item">في نهاية البث سيتم اختيار  اسم عشوائي</li>
            <li class="list-group-item">الرابح سوف يحصل على نسخة مجانية</li>
         </ul>
    </div>
  </div>


 

<div class="container">

<div class="position-relative  text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
<form  action="index.php" method="POST">
    <h3>الرجاء أدخال معلوماتك</h3>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">الأسم الأول</label>
    <input type="text" name="firstName" class="form-control" id="exampleInputEmail1" value="<?php echo $firstName ?>" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text error"><?php echo $errors['firstNameError']?></div>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">الأسم الأخير</label>
    <input type="text" name="lastName" class="form-control" id="exampleInputEmail1" value="<?php echo $lastName ?>"  aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text error"><?php echo $errors['lastNameError']?></div>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">البريد الأكتروني</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $email ?>"  aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text error"><?php echo $errors['emailError']?></div>
  </div>
  
 
  <button type="submit" name="submit" class="btn btn-primary">إرسال المعلومات</button>
</form>

</div>
    
 </div>
    </div>

    <div class="loader-con">
        <div id="loader">
        <canvas id="circularLoader" width="200" height="200"></canvas>
    </div>
</div>


<!-- Button trigger modal -->
<div  class="d-grid gap-2 col-6 mx-auto my-5">
    <button id="winner" type="button" class="btn btn-primary" >
    أختيار الرابح
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      
        <h5 class="modal-title" id="modalLabel">الرابح في المسابقة</h5>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php foreach($users as $user): ?>
        <h1 class="display-3 text-center modal-title" id="modalLabel"><?php echo htmlspecialchars ($user['firstName']).' '.htmlspecialchars ($user['lastName']); ?></h1>
        <?php endforeach; ?> 
      </div>
      
    </div>
  </div>
</div>





<div id="cards" class="row mb-5 pb-5">  

    <div class="col-sm-6">
    <div class="card my-2 bg-light">
    <div class="card-body">

     <h3 class="card-title"></h3>
     <p class="card-text"><?php echo htmlspecialchars ($user['firstName']).' '.htmlspecialchars ($user['lastName']).' <br>'.htmlspecialchars ($user['email']); ?></p>
            </div>
         </div>
   </div>


   </div>
     
<script src="./js/bootstrap.bundle.min.js" ></script>
<script src="./js/loader.js"></script>
 <script src="./js/script.js"></script>
    
</body>
</html>