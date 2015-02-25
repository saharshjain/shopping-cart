<?php
if(isset($_GET['code']))
{
$no=$_GET['code'];

mysql_connect("localhost","root","");
mysql_select_db('shop');

$ses_id = session_id();
$add="delete FROM ".$ses_id." WHERE icode like '%".$no."'";

if(mysql_query($add))

echo "deleted successfully";

else

echo "deletion has been failed";
}
?>