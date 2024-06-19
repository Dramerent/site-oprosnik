<?php
    session_start();
    $login = filter_var(trim($_POST['login']),FILTER_UNSAFE_RAW);
    $pass= filter_var(trim($_POST['pass']),FILTER_UNSAFE_RAW);
    $cookieEnd = 0;

    $mysql = new mysqli('localhost','root','','users');
    $result=$mysql->query("SELECT * FROM `users-main` WHERE `login` = '$login' AND `pass` = '$pass'");
    $user=$result->fetch_assoc();
    include "/MINE/apps/OSPanel/domains/localhost/admin/info.php";
   

    
    if(count($user)==0):{
       
       $_SESSION['message']='Пароль или логин не верный' ;
       
       header('Location: /index.php');
       exit();
    }
endif;
$cookie = time() + 10000;
setcookie('user', $user['name'], $cookie,"/");
setcookie('email', $user['login'], $cookie,"/");
$mysql->close();

header("Location: /admin/info.php");





       

    
 
?>