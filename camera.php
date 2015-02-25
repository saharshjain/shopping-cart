<?php 
     ob_start();
	?>

	<?php
     
	 include_once "assembly.css";
	 include_once "top.php";
    ?>

          
 <?php 
       if(isset($_GET['flag'])==1 AND( $_GET['flag']=='c'))
	    {  
		  echo "<body class='body'><div class='content'><article class='topcontent'><content>";
          $conn=mysql_connect("localhost","root","")or die("could not set connectn");
          mysql_select_db("shop")or die("could not connect to db");
          $query="select * from camera";
          $x=mysql_query($query);

          echo "<table border=\"1\">";
          echo "<tr><td><b>item code</b></td><td><b>item name</b></td><td><b>item description</b></td><td><b>item price</b></td><td><b>Details</b></td></tr>";

          while( $row=mysql_fetch_array($x) )
           {
		     extract($row);
             echo "<tr><td>".$icode."</td><td>".$iname."</td><td>".$idescriptn."</td><td>".$price."</td><td><a href=\"camera.php?code=$icode\">details</a></td></tr>";
           }
          
		  echo "</table>";
          echo "</content></article></div>";
         include_once "rcomndtn.php";		  
		  include_once "botm.php";
		  echo "</body>";
          mysql_close($conn);
        }
    ?>
          
 
<?php
       if(isset($_GET['code'])==1 )
        { 
		  echo "<body class='body'><div class='content'><article class='topcontent'><content>";
          $i=$_GET['code'];
          $conn2=mysql_connect("localhost","root","")or die("could not set connectn");
          mysql_select_db("shop")or die("could not connect to db now kya karun");
          $query='SELECT * FROM camera where icode like "%'.$i.'"';
          $x=mysql_query($query) or die ('unable to load this camera');
			
			
			///////////////////
			$liker='SELECT * FROM camera where icode like "%'.$i.'"';
          $retall=mysql_query($liker);

          echo "<table border=\"1\">";
          echo "<tr><td><b>item code</b></td><td><b>item name</b></td><td><b>item description</b></td><td><b>item price</b></td><td><b>Details</b></td></tr>";

          while( $rowing=mysql_fetch_array($retall) )
           {
		     extract($rowing);
             $pre=$likes;
			echo $pre;
			$pre=$pre+1;
			echo "<br/><br/>".$pre;
			$update="UPDATE camera SET likes='".$pre."' WHERE icode like '%".$i."'";
			mysql_query($update) or die ('unable to update likes');
           }
			
			//////////////////////////
          while( $row=mysql_fetch_array($x) )
            {
			 extract($row);
             echo '<img src='.$image.' style="width:200px;height:200px;">';
             echo "<table border=\"1\">";
             echo "<tr><td><b>item code</b></td><td><b>item name</b></td><td><b>item description</b></td><td><b>item price</b></td><td><b>Enter Quantity</b></td></tr>";
	         echo "<tr><td>".$icode."</td><td>".$iname."</td><td>".$idescriptn."</td><td>".$price;
	         setcookie('code',$icode,time() + (86400 * 7));
	         setcookie('itemname',$iname,time() + (86400 * 7));
	         setcookie('idcriptn',$idescriptn,time() + (86400 * 7));
             setcookie('iprice',$price,time() + (86400 * 7));
?>
	         <script type="text/javascript">
function numbersonly(e){
var key=e.charCode? e.charCode : e.keyCode
if (key!=8){ 
if (key<48||key>57) 
return false
}
}
</script>
<?php
echo "</td><td><form action='addtocart.php' method='POST' onkeypress=\"return numbersonly(event)\" ><input type=\"text\" name=\"qty\" style='width:20px'><input type=\"submit\" value='Add To Cart' ></td>";

             echo "</tr></table></content></article></div>";
             
		     echo "</body>";           
		  }
          mysql_close($conn2);
        }
    ?>
     <?php 
	 include_once "rcomndtn.php";
	 include_once "botm.php";?>
	 
	 
<?php 
     ob_flush();
	?>