<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   $sql = "select FirstName from logintable where Email = '$user_check' ";
   $statement = $db->prepare($sql);
   $statement->execute();
   $row = $statement->fetch();
   $statement->closeCursor();
   
   $login_session_name = $row['FirstName'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>