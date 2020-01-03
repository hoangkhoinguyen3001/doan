<?php 
include('./login.php'); 

if (isset($_SESSION['user']) && $_SESSION['user']){
    header("Location:http://localhost:8080/wint_zoo/admin/dashboard.php");
}
?>



