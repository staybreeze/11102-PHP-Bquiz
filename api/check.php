<?php
// include_once "db.php";

// $admin = $Admin->find($_POST['acc']);

// if (isset($admin)) {
 
//     if ($admin['acc'] == $_POST['acc'] && $admin['pw'] == $_POST['pw']) {

//         header("Location: ../back.php");
//         exit(); 
//     } else {
//         echo "請輸入正確的帳號密碼";
//     }
// } else {
//     echo "請輸入正確的帳號密碼";
// }


// header("Location: ../back.php");
?>

<?php include_once "db.php";

if($Admin->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']])>0){
    $_SESSION['login']=$_POST['acc'];
    to("../back.php");
}else{
    to("../index.php?do=login&error=帳號或密碼錯誤");
}

