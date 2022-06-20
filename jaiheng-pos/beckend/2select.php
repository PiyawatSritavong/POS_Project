<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<html>

<head></head>

<body>
  <?php
  require('connect.php');

  $sql = '
    SELECT * 
    FROM products;
    ';

  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  ?>
  <table border="1">
    <tr>
      <th width="50">
        <div align="center">products_id</div>
      </th>
      <th width="100">
        <div align="center">products_name</div>
      </th>
      <th width="100">
        <div align="center">details</div>
      </th>
      <th width="100">
        <div align="center">barcode</div>
      </th>
      <th width="100">
        <div align="center">qty</div>
      </th>
      <th width="100">
        <div align="center">image</div>
      </th>
    </tr>
    <?php
    $i = 1;
    while ($objResult = mysqli_fetch_array($objQuery)) {
    ?>
      <tr>
        <td>
          <div align="center"><?php echo $i; ?></div>
        </td>
        <td><?php echo $objResult["products_id"]; ?></td>
        <td><?php echo $objResult["products_name"]; ?></td>
        <td><?php echo $objResult["details"]; ?></td>
        <td><?php echo $objResult["qty"]; ?></td>
        <td><?php echo $objResult["image"]; ?></td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>
  <?php
  mysqli_close($conn); // ปิดฐานข้อมูล
  echo "<br><br>";
  echo "--- END ---";
  ?>
</body>

</html>