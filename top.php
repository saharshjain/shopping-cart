
<?php    //alternate scroll slide
        	session_start();        
			include_once "assembly.css";
		     ob_start();
		
		 $conn=mysql_connect("localhost","root","")or die("could not set connectn");
            mysql_select_db("shop");
     
            $ses_id = session_id(); 
            
            $_session['user']=$ses_id;

            $query="create table $ses_id(icode varchar(10),iname varchar(20),idescriptn varchar(50),price int(5),quantity int(100))";
            mysql_query($query);
	        $query="ALTER TABLE $ses_id ADD PRIMARY KEY(icode)";
            mysql_query($query);
		
		
		?>
	
	
 <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <meta name="viewport" content="width=divice-width, initial-scale=1.0" />
 </head>

<header class="mainHeader" >	
				
		<nav><ul>
		      <li class="active" ><a href="http://localhost/shopping/index.php?flag=cart">CART 
			  <?php
 			  	  
				  $conn=mysql_connect("localhost","root","");
                    mysql_select_db('shop');
                   
				    $tabname=session_id();
                    $sel="SELECT * FROM ".$tabname;
                    $data= mysql_query($sel);

                    $total_item=0;
                  
                   if($data)
                     { while(mysql_fetch_array( $data ))
					   {      
					      $total_item+=1;
                         } 
					 } 
                echo '('.$total_item.')';	
                mysql_close($conn);				
			  ?>
			  
			  </a></li>
			  <li title="HOME"><a  href="http://localhost/shopping/start.php" >home</a></li>
	          <li title="about the origin of dis e-shopping"><a  href="#">about us</a></li>
	          <li title="ALL Mobiles"><a href="http://localhost/shopping/mobile.php?flag=m">mobile</a></li> 
	          <li title="ALL Camera's"><a href="http://localhost/shopping/camera.php?flag=c">camera</a></li>
	          <li title="ALL Books"><a href="http://localhost/shopping/books.php?flag=b">books</a></li>
	          <li title="Login from here"><a href="http://localhost/shopping/login.php">LOGIN</a></li> 
	          <li title="Sign up from here"><a href="http://localhost/shopping/login.php?check=1">sign up</a></li>
	          <li title="YOU can contact us 24/7"><a href="http://localhost/shopping/index.php?flag=3">contact us</a></li>
	          
		 </ul></nav>
	</header>
    	<br><br>
    <header class="top">
        <nav class="guest">
          <a  href=" http://localhost/shopping/index.php?flag=shopping "><b>SMART E-SHOPPING</b></a>
            <?php 
              if(isset($_COOKIE['name']))
                echo '<br><marquee behavior="scroll" width="300px">Welcome Mr/Ms '.$_COOKIE['name'].'</marquee><u><a href="logout.php" >LOGOUT </a></>';
              else
                echo '<br><marquee behavior="alternate">Welcome Guest</marquee>';
              ?>
         </nav>
	 </header>	
	<?php include_once"search.php";
		      ?>	

			  
	<?php ob_flush(); ?>