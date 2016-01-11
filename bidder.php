<?php
session_start();
$x=0;
require_once 'abc.php';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo "<font color='white'>User : ". $_SESSION['username']."</font>";
  //  header('location: mainpage.php');
}
else{    echo "You have to login first";
}
if(isset($_POST['b1'])){
    
    session_destroy();
    echo  "<script type='text/javascript'>alert 'You are logout successfully!'</script>";
     //echo "<script type='text/javascript'>window.location.href = 'mainpage.php';</script";
}
if(isset($_POST['s12'])){
    $nconn = mysqli_connect("localhost", "root", "", "auctioner");
    $bname = $_POST['bidder1'];
    $maxbid = $_POST['maxbid1'];
    $newsmt = $nconn->prepare("insert into a12(maxbidperson, maxbid) values(?,?)");
    $newsmt->bind_param("ss", $bidder1, $maxbid1);    
    $bidder1 = $bname;
    $maxbid1 = $maxbid;
    $newsmt->execute();
    $query1 = "select minbid,maxbid from a12";
    $res1 = mysqli_query($nconn, $query1);
    $row1 = mysqli_fetch_array($res1);    
       $m = $row1['minbid'];
       if($m<$maxbid1)
       {
           $m = $maxbid1;
           echo "<br><br><font color='white'>".$bidder1."You Bid for " .$m."<br></font>";
           echo "<font color='white'>Congartulations!You are the new Buyer</font>";
           
       }
       else
           echo "Your bidding is less than original bidding,select your product again";
           echo "<script type='text/javascript'window.location.href='beforebid.php'</script>";
      $que = "insert into a12(maxbid) values('$m')";
      $newsmt->execute();
    
     $nconn->close();    
}

?>
<html>
    <head>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/business-casual.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    </head>
    <body
          <form method="post" action="mainpage.php">
                    <p class="text-right">
                        <a href=" "><input type="submit" value="Logout" name="b1" class="btn btn-danger"/></a>
                    </p>
        </form>
        <form method="post" action="bidder.php">
            <table align="center" border="2">
                 <div class="panel panel-primary">
                <div class="panel-heading">Bidder</div>
                <div class="panel-body">
                <div class="form-group">
    <label for="exampleInputEmail1">Bidder's Name</label>
    <input type="text" class="form-control" id="e" name="bidder1" placeholder="Name Of Bidder"/>
  </div>
                    <div class="form-group">
                    <label for="exampleMaximumBid">Maximum Bid</label>
                    <input type="text" class="form-control" name="maxbid1" id="f" placeholder="Enter the Max Bid You Want"/>
                    </div>
                    <input type="submit" class="btn btn-primary" name="s12" value="BID IT OUT"/>
                    </div>
                 </div>
            </table>
        </form>
    </body>
</html>
