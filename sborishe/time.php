<?php
    setcookie('user', $user['name'], time()-3600*100000,"/");
    setcookie('email', $user['login'], time()-3600*10000,"/");
    header('Location:/index.php')
?>