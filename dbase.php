<?php
try {
	 $bdd = new PDO('mysql:host=localhost;dbname=payglitz;charset=UTF8', 'root', '');
   } catch(Exception $e) {
       exit("Unable to connect to database.payglitz mysql_error()");
  }
?>