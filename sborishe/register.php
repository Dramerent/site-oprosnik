<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = isset($_POST['login']) ? filter_var(trim($_POST['login'])) : null;
        $pass = isset($_POST['pass']) ? filter_var(trim($_POST['pass'])) : null;
        $name = isset($_POST['name']) ? filter_var(trim($_POST['name'])) : null;
    
        if (true) {
            $mysql = new mysqli('localhost','root','','users');
            if ($mysql->connect_error) {
                die("Connection failed: " . $mysql->connect_error);
            }
    
            
    
            if ($query->execute()) {
                echo "New record created successfully";
            } 
            else {
                echo "Error: " . $query . "<br>" . $mysql->error;
                echo "penis";
            }
    
            $query->close();
            $mysql->close();
        } else {
            echo "Invalid data received from the form";
        }
    } 
    else {
        echo "Invalid request method";
    }
   
?>
