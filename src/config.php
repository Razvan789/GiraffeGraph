<?php
       //For Database connections, include file when using db
       $dsn = 'mysql:host=beldeanu.com;dbname=razvan_GiraffeGraph';
       $username = 'razvan';
       $password = 'Paul2002!@#';
       $host = "beldeanu.com";
       $site = "GiraffeGraph";
   try{
       $db = new PDO($dsn, $username, $password);
   } catch (Exception $e){
       echo "Database error please try again";
   }

   function checkEmpty($varToCheck, $varName) {
    $arrayToAdd = [];
    if(empty($varToCheck)) {
        array_push($arrayToAdd, "The $varName field is required.");
    }
    return $arrayToAdd;
}
?>