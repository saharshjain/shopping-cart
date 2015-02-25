
<?php 
     ob_start();
	?>

<style>
.img {
height:220px;
width:120px;
border:solid 5px lightgrey;
}
.img:hover {
border:solid 5px orange;
box-shadow:5px 4px 20px orange;
}
.product{
font-size:15px;
margin-left:20px;
margin-bottom:20px;
float:left;
}

</style>


<?php
      include_once "assembly.css";
	  include_once "top.php";


	  $conn=mysql_connect("localhost","root","")or die("could not set connectn");
        mysql_select_db("shop")or die("could not connect to db");

	function search_prod($item_type)
      {
      
         $query="select * from $item_type ";
         $x=mysql_query($query)or die("cannot select");

       while( $row=mysql_fetch_array($x) )
         {
          extract($row);
          echo '<section class="product"><a href="'.$item_type.'.php?code='.$icode.'"><img class="img" src='.$image.'>';
          echo '<br>RS'.$price.'<br>'.$iname.'</a></section>';
 
          }
       }
	  ?>
	
	<body class="body" >	
      <div class='content' >
         <article class='topcontent'>     

<?php
/*
$conn=mysql_connect("localhost","root","")or die("could not set connectn");
 mysql_select_db("shop")or die("could not connect to db");

$query="select * from camera ";
$x=mysql_query($query)or die("cannot select");

while( $row=mysql_fetch_array($x) )
{
  extract($row);
  echo '<section class="product"><a href="camera.php?code='.$icode.'"><img class="img" src='.$image.'>';
  echo '<br>RS'.$price.'<br>'.$iname.'</a></section>';
 
 }
*/
search_prod('camera');
search_prod("books");
search_prod("mobile");
  
  mysql_close($conn);
?>
    	</article>
</div>

<?php
//include_once "rcomndtn.php";

?>
	</body>


	<?php 
include_once "botm.php";
	ob_flush();

	?>	