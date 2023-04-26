<?php 

   
    if(!isset($_SESSION['user'])) 
    {
        
        $_SESSION['no-login-message'] = "<div class='error text-center'>Admin panel bejelentkezés</div>";
        
        header('location:'.SITEURL.'admin/login.php');
    }

?>