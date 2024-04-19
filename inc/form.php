<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];

$errors = [
    'firsNaneError' => '',
    'lastNameError' => '',
    'emailError' => '',
];
  

if(isset($_POST['submit'])){





    //الاسم الاول    
    if(empty($firstName)){
        $errors['firstNameError']= 'يرجى أدخال الأسم الأول';
    }
    //الاسم الاخير
    if(empty($lastName)){
        $errors['lastNameError']= 'يرجى أدخال الأسم الاخير';
    }
    //تححق من الايميل
    if(empty($email)){
        $errors['emailError']= 'يرجى أدخال الأيميل ';  
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['emailError']= 'يرجى أدخال ايميل صحيح  ';   
    }

    //تحقق من الاخطاء
    if(!array_filter($errors)){
            $firstName = mysqli_real_escape_string($conn,$_POST['firstName']);
    $lastName =  mysqli_real_escape_string($conn, $_POST['lastName']);
    $email =     mysqli_real_escape_string($conn,$_POST['email']);
    $sql = "INSERT INTO users(firstName,lastName,email)
    VALUES('$firstName','$lastName','$email')";

if(mysqli_query($conn,$sql)){
    header('Location:index.php');
}else{
    echo'Error:' . mysqli_error($conn);
}
    }
}