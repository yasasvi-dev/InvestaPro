<?php
include "dbase.php";
$cno=$_POST["pvals"];
$str1 = "DELETE FROM account WHERE cno = $cno";
$rs1 = $bdd->query($str1)or die("Error on $str1");
echo "Complete";
?>