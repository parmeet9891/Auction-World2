<?php
$x=0;
require_once 'abc.php';
echo "<p><center>YOU CAN CHOOSE ANY IMAGE FOR FURTHUR BIDDING PROCESS</center></p>";
$conn = mysqli_connect("localhost", "root", "", "auctioner");
$q = "select imgaddress, minbid, lastdate from a12";
$res = mysqli_query($conn, $q);
while($rows = mysqli_fetch_array($res))
{
    $n = $rows['imgaddress'];
        echo "<br><br>";
    
    echo "<br><center><img src='$n' style='width:800px; height:350px'</center>>"."<br>Current Rate:". $rows['minbid'].
            "<form method='post' action='bidder.php'>"
            . "<input type='submit' class='btn btn-primary' value='Bid' name='bid1'/>"
            . "</form>";
            
}
    $conn->close();    








?>
<html>
    <head>
         <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
          <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
          <script src="js/bootstrap.js" type="text/javascript"></script>
          <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
          <link href="css/business-casual.css" rel="stylesheet" type="text/css"/>
          <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
           
    </body>
</html>