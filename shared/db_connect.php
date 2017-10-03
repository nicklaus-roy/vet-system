<?php
    $conn = mysqli_connect('localhost', 'root', 'slsc', 'animal_haven');
    if(mysqli_connect_errno()){
        die("Failed to connect :".mysqli_connect_error());
    }
    
?>