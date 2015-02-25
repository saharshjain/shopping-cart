<?php 
     ob_start();
	?>
	
	
<?php
     
	 include_once "assembly.css";
	 include_once "top.php";
    ?>
	
	<body class="body">	
       <div class='content'>
          <article class='topcontent'>


<?php 
       if(isset($_GET['flag'])==1 AND( $_GET['flag']=='m'))
    	{ 
    		echo "<content>";
            $conn=mysql_connect("localhost","root","")or die("could not set connectn");
            mysql_select_db('shop')or die("could not connect to db what to dooo");
            $query="SELECT * FROM mobile";
            $x=mysql_query($query);
            echo "<table border=\"1\">";
            echo "<tr><td><b>item code</b></td><td><b>item name</b></td><td><b>item description</b></td><td><b>item price</b></td><td><b>Details</b></td></tr>";

            while( $row=mysql_fetch_array($x) )
              { 
			   extract($row);
               echo "<tr><td>".$icode."</td><td>".$iname."</td><td>".$idescriptn."</td><td>".$price."</td><td><a href=\"mobile.php?code=$icode\">details</a></td></tr>";
              }
            echo "</table>";
            echo "</content>";
            mysql_close($conn);
  
       }
    ?>
 
<?php
    if(isset($_GET['code'])==1 )
    {
   	    echo "<content>";
        $i=$_GET['code'];
       //echo $i;
        $conn2=mysql_connect("localhost","root","")or die("could not set connectn");
        mysql_select_db("shop")or die("could not connect to db now kya karun");
        $query='SELECT * FROM mobile where icode like "%'.$i.'"';
        $x=mysql_query($query) or die ('unable to load this mobile');
 ///////////////////
			$liker='SELECT * FROM mobile where icode like "%'.$i.'"';
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
			$update="UPDATE mobile SET likes='".$pre."' WHERE icode like '%".$i."'";
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
echo "</td><td><form name='qtyinput' action='addtocart.php' method='POST' onkeypress=\"return numbersonly(event)\" ><input type=\"text\" name=\"qty\" style='width:20px'>"?>
<input type='image' src="add-to-cart.png" style="height:25%;width:30%;" value='submit' alt='submit Button' /> </td>
   
   <?php 
         echo "</tr></table></content>";
        }
         mysql_close($conn2);
    }
 
?>

    	</article>
</div>
<?php 
include_once "rcomndtn.php";
include"botm.php";?>
	</body>

<?php 
     ob_flush();
	?>