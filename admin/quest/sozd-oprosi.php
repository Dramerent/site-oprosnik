<?php 
    session_start();


    $nam=filter_var(trim($_POST['nam']));
    $quest1=filter_var(trim($_POST['quest1']));
    $quest2=filter_var(trim($_POST['quest2']));
    $quest3=filter_var(trim($_POST['quest3']));
    $quest4=filter_var(trim($_POST['quest4']));
    
    
    
    $mysql= new mysqli('localhost','root','','oprosnik') ;
    $mysql->query("INSERT INTO `opros`(`nam`,`quest1`,`quest2`,`quest3`,`quest4`)
    VALUES('$nam', '$quest1','$quest2' ,'$quest3', '$quest4')");
    $mysql->close();



    header('Location:/admin/quest/sozdanie.php');


    
?>