<?php
   if ($_POST['id'] !="") {

     $_SESSION['id'] = $_POST['id'];
     include("Business/administradorController.php");
   }else{
     echo "ELSE{}";
     header('Location: ?clase=administradorController');
    }
?>
