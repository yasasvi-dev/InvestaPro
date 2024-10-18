<?php
include "db.php";
include "sqlobj.php";

$vals = $_POST["pvals"];
print_r($vals);
 $its = explode("#", $vals[8]);
 print_r($its);
 for($i1=0; $i1 < count($its); $i1++){
    echo ($its[$i1]."Hi<br>");
 }



?>