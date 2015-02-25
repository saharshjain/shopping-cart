<?php 
     ob_start();
	?>
<?php
   	 include_once "assembly.css";
	 include_once "top.php";
	 //session_start();

	 ?>

<body class="body">	
    <div class='content'>
         <article class='topcontent'>
	 
	 
<?php

if((isset($_REQUEST["qty"])))
{ 
if ($_REQUEST["qty"]=='0/0' or $_REQUEST["qty"]==0)
$quantity=1;
else if( $_REQUEST["qty"] >25)
      $quantity=25;
else
$quantity=$_REQUEST["qty"];


$itemcode=$_COOKIE["code"];
$itemprice=$_COOKIE["iprice"];
$itemdsptn=$_COOKIE["idcriptn"];
$itemname=$_COOKIE["itemname"];


if(!isset($_GET['cartflag'])) 
       {  
         mysql_connect("localhost","root","")or die("could not set connectn");
         mysql_select_db("shop")or die("could not connect to db");
   
        $tabname=session_id();
  
   	    $query="INSERT INTO ".$tabname." values('$itemcode','$itemname','$itemdsptn','$itemprice','$quantity')";
               mysql_query($query);
           }

 echo "<content>";
 echo 'Item ADDED to CART .<br>U can make CHANGES here in quantity of purchased product<br>';
 echo 'Click on <a href="index.php?flag=cart">CART</a> to view your items';
 echo "<table border=\"1\">";
 echo "<tr><td><b>item code</b></td><td><b>item name</b></td><td><b>item description</b></td><td><b>item price</b></td><td><b>Quantity</b></td><td><b>change Quantity</b></td></tr>";
 echo "<tr><td>".$itemcode."</td><td>".$itemname."</td><td>".$itemdsptn."</td><td>".$itemprice."</td><td>".$quantity;
?>

<script type="text/javascript">
function numbersonly(e)
{
var key=e.charCode? e.charCode : e.keyCode
   if (key!=8){ 
               if (key<48||key>57) 
                return false
              }
  }
</script>

 <?php
 echo "</td><td><form action='addtocart.php?cartflag=1'  method='POST' onkeypress=\"return numbersonly(event)\" ><input type=\"text\" name=\"qty\" style='width:20px'><input type=\"submit\" value='Click To CHANGE' ></td>";
 echo "<br/><br/>";
 
 $conn=mysql_connect("localhost","root","")or die("could not set connectn");
       mysql_select_db("shop")or die("could not connect to db");
   
       $tabname=session_id();
//echo $tabname;
     if(isset($_GET['cartflag']))
        {   if($_GET['cartflag']==1)
             {   //echo $itemcode;
			     $query = "UPDATE". $tabname." SET quantity='".$quantity."' WHERE icode like '%".$itemcode."'";
                         mysql_query($query)or die('error while updating value');
              }
        }
      else   {  
              $query="INSERT INTO ".$tabname." values('$itemcode','$itemname','$itemdsptn','$itemprice','$quantity')";
              mysql_query($query) ;
             }

mysql_close($conn);


echo "</content>";
}

?>
   </article>
 </div> 
</body>


<?php 
     ob_flush();
	?>