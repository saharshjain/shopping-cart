
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=divice-width, initial-scale=1.0"/>
</head>

<?php   include_once "top.php"; ?>

<?php   
	 /*if(isset($_COOKIE['counter']))
        {
		$ini=1;
		setcookie('counter',$ini,time() + (86400 * 7));
		}
		if($_COOKIE['counter']>25 or $_COOKIE['counter']==1)*/

		$ip=$_SERVER['REMOTE_ADDR'];
		$script=$_SERVER['PHP_SELF'];
		$conn=mysql_connect("localhost","root","")or die("could not set connectn");
            mysql_select_db("shop");
			$addadder="INSERT INTO logger values('$ip','$script')";
			mysql_query($addadder) or die("cant add address");
			mysql_close($conn);
		ob_start();
		
    ?>
	
<body class="body">
	 <div class="content">
	        <article class="topcontent">

		
   <?php	
            //session_start(); 
            
            $conn=mysql_connect("localhost","root","")or die("could not set connectn");
            mysql_select_db("shop");
     
            $ses_id = session_id(); 
            
            $_session['user']=$ses_id;

            $query="create table $ses_id(icode varchar(10),iname varchar(20),idescriptn varchar(50),price int(5),quantity int(100))";
            mysql_query($query);
	        $query="ALTER TABLE $ses_id ADD PRIMARY KEY(icode)";
            mysql_query($query);
			
    ?>        
	
<?php
        if(isset($_GET['delete']))
		{
			if($_GET['delete']=='table')
				{
				$conn=mysql_connect("localhost","root","")or die("could not set connectn");
				mysql_select_db("shop") or die ("could not find db");
				$ses_id = session_id();
				$query="TRUNCATE TABLE ".$ses_id;
				mysql_query($query);
				mysql_close($conn);
				header('Location:http://localhost/shopping/index.php');
				}
		}
    ?>

<?php
    if(isset($_GET['flag'])==1)
        {     if(($_GET['flag'])==2)
                 {
                   echo "<content>";
                   echo "<form action=\"signup.php\" method=\"post\">";
                   echo "<input type=\"text\" required name=\"fname\" placeholder=\"Enter first name\"  style=\" height:25px; width:150px;\">";
                   echo "<input type=\"text\" name=\"lname\" placeholder=\"Enter last name\" style=\"margin-left:5px;height:25px; width:150px;\"><br>";
                   echo "<input type=\"text\" required name=\"id\" placeholder=\"Enter email id\" style=\"margin-top:10px; height:25px; width:300px;\"><br>";
                   echo "<input type=\"password\" required name=\"pwd1\" placeholder=\"Enter password\" style=\"margin-top:10px; height:25px; width:300px;\"><br>";
                   echo "<input type=\"password\" required name=\"pwd2\" placeholder=\"Re-Enter password \" style=\"margin-top:10px; height:25px; width:300px;\"><br>";
                   echo "<input type=\"text\" required name=\"mobno\" placeholder=\"mobile number\" style=\"margin-top:10px; height:25px; width:300px;\"><br>";
                   echo "<input type=\"text\" required name=\"add\" placeholder=\"address\" style=\"margin-top:10px; height:25px; width:300px;\"><br>";
                   echo "<input type=\"text\" required name=\"sadd\" placeholder=\" shipping address\" style=\"margin-top:10px; height:25px; width:300px;\"><br>";
                   echo "<input type=\"text\" required name=\"pinc\" placeholder=\" pincode\" style=\"margin-top:10px; height:25px; width:300px;\"><br>";
                   echo "<input type=\"text\" name=\"nearloc\" placeholder=\"near by location\" style=\"margin-top:10px; height:25px; width:300px;\"><br>";
                   echo "<input type=\"submit\"  style=\"margin-left:20px; margin-top:20px; height:30px; width:100px;\"> ";
                   echo "</form>";
                   echo "</content>";
                 }
                            
              if(($_GET['flag'])==3)
                 { 
				  echo "<content><h1>Contact Us:</h1><br><h3>Sorry We don't want any fame so we like being under cover.</h3></content>";
                 }
    
   

              if(($_GET['flag'])=='cart')
	            { 
	                 if(isset($_GET['dlt']))
                       {
    	                       
	                           $no=$_GET['code'];

                               mysql_connect("localhost","root","");
                               mysql_select_db('shop');
                               $ses_id = session_id();
                               $add="delete FROM ".$ses_id." WHERE icode like '%".$no."'";
                               mysql_query($add);
                               //header("Location:http://localhost/shopping/index.php?flag=cart");
							   
		               }
                	
	    
		            echo "<content><b><h2>YOUR CART::::</h2><b><br>";
	
	                mysql_connect("localhost","root","");
                    mysql_select_db('shop');
                   
				    $tabname=session_id();
                   
					$sel="SELECT * FROM ".$tabname;
                    $data= mysql_query($sel);

                    echo '<table  width=400  border=\"2\">';
                    echo "<tr><td><b>item code</b></td><td><b>item name</b></td><td><b>item description</b></td><td><b>item price</b></td><td><b>Quantity</b></td><td><b>EDIT</b></td></tr>";
                    $sum=0;

                    while($info = mysql_fetch_array( $data )) 
                     {      
					    extract($info);
                        $sum+=$price*$quantity;

                        echo '<tr><td>'.$icode.'</td><td>'.$iname.'</td><td>'.$idescriptn.'</td><td>'.$price.'</td><td>'.$quantity.'</td><td><a href="index.php?flag=cart&dlt=1&code='.$icode.'"><img class="cart_trash_img"></a></td></tr>';
                     } 


                    echo '</table>'; 
					if($sum==0)
					   echo "<br><font style='font-size:20px;color:red;'> CART EMPTY</font>";
					else
                       { echo "<br>the total amount for shopping is<font style='font-size:20px;color:red;'>  RS. ".$sum."</font>";	
                           if(!isset($_GET['prch']))
						    {if(isset($_COOKIE['name']) AND isset($_COOKIE['pass']))
                              { 
  							    { echo '<br><font style="font-size=25px;"><a href="index.php?flag=cart&prch=1">PURCHASE</a></font>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
							      echo'<font style="font-size=25px;"><a href="ship_info.php?to=gift">Gift To Somebody else</a></font>';
                                 }
						       }
							   else
							      { echo '<br><font style="font-size=25px;"><a href="2.php">PURCHASE</a></font>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
							        echo'<font style="font-size=25px;"><a href="ship_info.php?to=gift">Gift To Somebody else</a></font>';
								   }
							   }
							  
						   if(isset($_GET['prch']) AND ($_GET['prch']==1) )
					       {
					         echo '<br>---------------------------------------------';
	                         echo "<br>choose one of them:<br><a href='ship_info.php'>paypal</a><br><a href='ship_info.php'>cash on delivery</a><br><br>&nbsp&nbsp&nbsp&nbsp<a href='index.php?flag=cart' style='color:white'>back</a>";
	                    
                           }   
						}
                    
		
	                echo "</content>";
                }

           if(($_GET['flag'])=='shopping')
	          { 
			    if(isset($_POST['text']))
				 { $text=$_POST['text'];
				  $conn=mysql_connect("localhost","root","")or die("could not set connectn");
				  mysql_select_db("shop") or die ("could not find db");  
			      $query="create table specialorder(order varchar(1000),ordno int(5))";
     			  mysql_query($query)or die('error in database');
				  $query="insert into specialorder value('$text')";
				  mysql_query($query);
				  }
				echo '<content><h1>WELCOME TO OUR ONLINE SHOPPING STORE</h1><br><br>';
                echo '<h3>Select any item from the MENU on top side & enjoy amazing shopping experience...</h3> ';
                echo '<br>-----------------------------------------<br>IF U HAVE ANY SPECIAL ORDERS THAN LEAVE A COMMENT WITH CONTACT DETAILS:<br>-------------------------------------------------<br> ';
				echo '<form action="index.php?flag=shopping" method="POST"><textarea name="text"></textarea><br><input type="submit" onsubmit="alert("order registerd")"></form></content>';
              
			  } 
        }
    ?>
            </article>	
	</div>
    
		

<?php include"botm.php";?>
</body>
	<?php ob_flush(); ?>