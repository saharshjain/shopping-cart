
<head>
<script>
function showHint(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("txt").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txt").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","searchprod.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<div id="search_box">
<form action=""> 

<img src="http://localhost/shop/image/search_icon.png" style="height:30px;width:30px;"><input class="input" type="search" placeholder="search" autocomplete="off" id="txt1 " style="width:80%; padding-left:2%;border-radius:5px;font-size:26px;"onkeyup="showHint(this.value)"onclick="showHint(this.value)" />
</form>

<div  id="txt" style="background:3F547F;border-radius:5px; padding-left:1%;"/>

</div>