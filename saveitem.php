<?php
include "dbase.php";
// include "sqlobj.php";
// $myclass = new sqlobj($bdd); RG

// $cno = $myclass -> maxacno("customer",array(),"cno"); RG
// $ano = rand(100000, 999999); RG

$vals=$_POST["pvals"];
// print_r($vals);
// $str1="SELECT * from customer order by cno desc";
// $rs1=$bdd->query($str1) or die('error on $str1');
// $row1=$rs1->fetch();
// $cno=$row1[0]+1;
// $ano=rand(100000, 999999);
$str1="INSERT into item values('$vals[0]','$vals[1]','$vals[2]')";
$ts1=$bdd->query($str1) or 
die('error on $str1');
// $myclass -> adddata($str1); RG
echo "complete";

?>