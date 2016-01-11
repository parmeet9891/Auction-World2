<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo "<font color='white'>Welcome here,". $_SESSION['username']."</font>";
  //  header('location: mainpage.php');
}
else{
    echo "You have to login first";
}
if(isset($_POST['b1'])){
    session_start();
    session_destroy();
    echo  "<script type='text/javascript'>alert 'You are logout successfully!'</script>";
     //echo "<script type='text/javascript'>window.location.href = 'mainpage.php';</script>";
}

if(isset($_POST['d1'])){
    $connection = mysqli_connect("localhost", "root", "", "auctioner");
    $query = "select * from e12";
    $result = mysqli_query($connection, $query);
   
    while($row = mysqli_fetch_array($result)){
        echo "<br>". $row['pname']. "<br>". $row['pdetails']. "<br>". $row['imgaddress']. "<br>" . $row['minbid']. "<br>" . $row['lastdate'];
      $connection->close();
      
    }
}




?>





<html>
    <head>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
          <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
          <link href="css/business-casual.css" rel="stylesheet" type="text/css"/>
          <script src="js/bootstrap.js" type="text/javascript"></script>
          <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
          <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
     
        <h2><center>
                ONLINE AUCTION   <small>Where Buyers And Sellers Meet</small>
            </center>
        </h2>
      
        <form method="post" action="mainpage.php">
                    <p class="text-right">
                        <a href=" "><input type="submit" value="Logout" name="b1" class="btn btn-danger"/></a>
                    </p>
        </form>
                </div>    
            </div>     
        </nav>
        <p><center><font color="cream"size="6">Online Auction </font><font color="white" size="5.5">is a very different and unique concept. Here you are provided with all the 
            facilities. <br><br>
            Here you can see two button below, one if for <strong>Auctioner</strong> and other one is for <strong>Bidder</strong><br><br>
            Go for Auctioner if you have something to sell, you should have all your product details and description properly so that you can get the maximum Bid for it.<br><br>
            Go for Bidder to bid the product of your own choice.<br><br>
            THANK YOU FOR READING THE INSTRUCTIONS, NOW YOU MAY PROCEED. </font></center>
        </p>
            <a href="auctioner.php"><center><input type="submit" value="Auctioner" class="btn btn-primary"/></center></a><br><br>
            <a href="beforebid.php"><center><input type="submit" value="Bidder" class="btn btn-primary"/></center></a>                    
          
       
    </body>
  
</html>