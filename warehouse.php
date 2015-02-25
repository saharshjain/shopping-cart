<?php
$conn=mysql_connect("localhost","root","")or die("could not set connectn");
 mysql_select_db("shop")or die("could not connect to db");

 ?>
<form action="warehouse.php" method="GET">
select table name:
<select name="tablenam">
<option>books<option>
<option>camera<option>
<option>mobile<option>
</select>

<input type="text" name="iname" placeholder="item name">&nbsp
<input type="text" name="idesc" placeholder="item descripttion">&nbsp
<input type="text" name="price" placeholder="price">&nbsp
<input type="text" name="imglink" placeholder="image link">&nbsp
<input type="text" name="qty" placeholder="quantity">&nbsp
<input type="text" name="icode" placeholder="item code">&nbsp
<input type="submit" value="press enter">
</form>
<?php


if(isset($_REQUEST['tablenam']) and isset($_REQUEST['iname']) and isset($_REQUEST['idesc']) and isset($_REQUEST['price']) and isset($_REQUEST['imglink']) and isset($_REQUEST['qty']) and isset($_REQUEST['icode']))
{ $table=$_REQUEST['tablenam'];
  $item=$_REQUEST['iname'];
  $descrip=$_REQUEST['idesc'];
  $price =$_REQUEST['price']; 
  $img=$_REQUEST['imglink'];
  $qty=$_REQUEST['qty']; 
  $code=$_REQUEST['icode'];

$query="INSERT INTO $table values('$item','$descrip','$price','$img','$qty','$code')";
mysql_query($query);

if(isset($_GET['code']))
{
$no=$_GET['code'];
$add="delete FROM ".$tablenam." WHERE icode like '%".$no."'";
mysql_query($add);
}


$query="select * from $table";
$x=mysql_query($query);

echo "<table border=\"1\">";
echo "<tr><td><b>item name</b></td><td><b>item description</b></td><td><b>item price</b></td><td><b>image link</b></td><td><b>Quantity</b></td><td><b>item code</b></td><td><b>EDIT</b></td></tr>";

while( $row=mysql_fetch_array($x) )
{extract($row);
 echo "<tr><td>".$iname."</td><td>".$idescriptn."</td><td>".$price."</td><td>".$image."</td><td>".$quantity."</td><td>".$icode."</td><td><a href=\"warehouse.php?code=$icode\">delete</a></td></tr>";
}
echo "</table>";
mysql_close($conn);
}
?>