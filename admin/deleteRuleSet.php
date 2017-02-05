<?php
       $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/timetablepro/class.database.php";
   include_once($path);
     $db_connection = new dbConnection();
		   $link = $db_connection->connect(); 
		   

	     $query = $link->query("delete  FROM ruleset");

          if($query){

          	echo"<script> window.location = 'dashboard.php'; alert('ruleset is deleted!!');</script>";
          }







?>