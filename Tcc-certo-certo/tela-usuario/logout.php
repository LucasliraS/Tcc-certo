<?php
session_start();

if(isset($_SESSION['usuario_logado'])) {
   session_unset();
   session_destroy();

   header("Location: ../login/html/login.html");
   exit;
} else{
   header("Location: ../login/html/login.html");
   exit;
}
?>