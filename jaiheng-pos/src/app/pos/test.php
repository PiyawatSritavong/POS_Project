<?php
   require('../admin/connect.php');
   // get the q parameter from URL
   $q = $_REQUEST["q"];

   $hint = "";
   // lookup all hints from array if $q is different from ""
   if ($q !== "") {
   $q = strtolower($q);
   $len=strlen($q);

    $testSQL = '
        SELECT barcode.barcode_no, products.products_name , products.details ,products.price, products.image , products.products_id
        FROM barcode 
        LEFT JOIN products ON barcode.id = products.barcode_id 
        WHERE barcode.barcode_no = ' . $q . ';
        ';

    $objQueryTest = mysqli_query($conn, $testSQL) or die("Error Query [" . $sql . "]");

    $i = 1;
    $a = [];
    while ($objResultTest = mysqli_fetch_array($objQueryTest)) {
       
        array_push($a,$objResultTest["products_id"]);
        array_push($a,$objResultTest["products_name"]);
        array_push($a,$objResultTest["details"]);
        array_push($a,$objResultTest["price"]);
        
        $i++;
    }
    

    /* print_r($a[1]); */
    print_r("<td>$a[0]</td>");
    print_r("<td>$a[1]</td>");
    print_r("<td>$a[2]</td>");
    print_r("<td>$a[3]</td>");
    

    /* foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = print_r($a[0]. $a[1]. $a[2]. $a[3]);
            } else {
                $hint .= ", $name";
            }
        }
    } */
}

    
    
    

    // Output "no suggestion" if no hint was found or output correct values
    /* echo $hint === "" ? "no suggestion" : $hint; */
?>