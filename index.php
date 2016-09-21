<<<<<<< HEAD
<?php
    require("core.php");

    if (isset($_GET['clase'])){
      if (file_exists("Business/".strtolower($_GET['clase']).".php")) {
        include("Business/".strtolower($_GET['clase']).".php");
      }
      else {
        include("view/modules/error.php");
      }
    }
    else {
      include("view/modules/paginaPrincipal.php");
    }

  ?>
=======
<?php
    require("core.php");
    if (isset($_GET['clase'])){
      if (file_exists("Business/".strtolower($_GET['clase']).".php")) {
        include("Business/".strtolower($_GET['clase']).".php");
      }
      else {
        include("view/modules/error.php");
      }
    }
    else {
      include("view/modules/paginaPrincipal.php");
    }

  ?>
>>>>>>> refs/remotes/origin/master
