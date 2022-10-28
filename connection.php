<?php
    
    $host = "localhost";  
    $user = "id17136481_gnett";  
    $password = "B|8=QB@SpJQlHtAQ";  
    $db_name = "id17136481_mygrocery";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  