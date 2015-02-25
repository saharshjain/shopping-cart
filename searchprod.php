
<?php
$conn=mysql_connect("localhost","root","")or die("could not set connectn");
      mysql_select_db("shop")or die("could not connect to db");
	  
class find_item {
   private $q;
   public function __construct($q) {
     $this->q="$q";   
    
	}
   public function find_item($item_type)
    {      
	  $query="select * from $item_type where iname LIKE '%".$this->q."%'";
      $x=mysql_query($query)or die("cannot select");

      while( $row=mysql_fetch_array($x) )
        {    extract($row);
             echo "<a href='".$item_type.".php?code=$icode' style='color:white;'>$iname</a><br>";  
             echo "<font color='gray'>-----------</font><br>";
        }
   }
   
 }
$obj = new find_item($_GET["q"]);

if( strstr($_GET["q"], ' ',true)== "range" or strstr($_GET["q"], ' ',true)== "Range")
    {
     $price_range = strstr($_GET["q"], ' ');
	 
      $x='';
	  $x=strstr($price_range,'to',true);
	  if($x=='')
	  $x=strstr($price_range,'-',true);
	  else if($x=='')
	  $x=strstr($price_range,' ',true);
	  	  
	  $y='';
	  $y=strrchr($price_range,'to ');
	  if($y=='')
	  $y=strstr($price_range,'to');
	  else if($x=='')
	  $x=strstr($price_range,'- ');
	  
	  echo "$x   $y";
	}
else
{
$obj->find_item("mobile");
$obj->find_item("camera");
$obj->find_item("books");
}
mysql_close($conn);

?>
