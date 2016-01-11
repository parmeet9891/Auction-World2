<?php
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
           echo "<font color='black'>".$bidder1."You Bid for " .$m."<br></font>";
           echo "Congartulations!You are the new Buyer";
           
       }
       else
           echo "Your bidding is less than original bidding,select your product again";
           echo "<script type='text/javascript'window.location.href='beforebid.php'</script>";
      $que = "insert into a12(maxbid) values('$m')";
      $newsmt->execute();
    
     $nconn->close();    



?>

