<?php
    if (isset($_GET['clase'])){
      if (file_exists("core/controller/".strtolower($_GET['clase']).".php")) {
        include("core/controller/".strtolower($_GET['clase']).".php");
      }
      else {
        include("view/modules/error.php");
      }
    }
    else {
      include("view/modules/paginaPrincipal.php");
    }

  ?>
