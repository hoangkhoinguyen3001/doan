<?php

if(empty($_SESSION['user'])) {
    header("Location: http://localhost:8080/wint_zoo/admin/login.php");
} 
?>

