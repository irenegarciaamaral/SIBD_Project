<?php
  require_once('dbConnect.php');
  
  session_destroy();

  header('Location: index.php');
?>
