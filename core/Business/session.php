<?php
    //session_start();

   if ($_POST['id'] !="") {

     $_SESSION['id'] = $_POST['id'];
     include("core/Business/administradorController.php");
   }else{
     echo "ELSE{}";
     header('Location: ?clase=administradorController');
    }
?>
