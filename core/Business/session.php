<?php
    //session_start();

   if ($_POST['id'] !="") {

     $_SESSION['id'] = $_POST['id'];
     echo "Sesion: ".$_POST['id'];
       //require();
     //include("view/administrador/administrador.php");
     include("core/Business/administradorController.php");
   }else{
     echo "ELSE{}";
     header('Location: ?clase=administradorController');
    }
?>
