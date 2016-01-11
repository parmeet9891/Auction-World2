<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo "<font color='white'>User : ". $_SESSION['username']."</font>";
  //  header('location: mainpage.php');
}
else{
    echo "You have to login first";
}
if(isset($_POST['b1'])){
    
    session_destroy();
    echo  "<script type='text/javascript'>alert 'You are logout successfully!'</script>";
     echo "<script type='text/javascript'>window.location.href = 'mainpage.php';</script";
}
if(isset($_POST['s2'])){
    $newconn = mysqli_connect("localhost", "root", "", "auctioner");
    $prname = mysqli_real_escape_string($newconn,$_POST['pname']);
    $prdetails = mysqli_real_escape_string($newconn,$_POST['pdetails']);
    $lastdate = mysqli_real_escape_string($newconn,$_POST['ldate']);
    $mibid = mysqli_real_escape_string($newconn,$_POST['mbid']);
    $type = $_FILES['f1']['type'];
    $ext = strstr($type, "/");
    
    $filetype = ['/gif','/png','/jpg','/jpeg','/bmp'];
    if(in_array($ext, $filetype)){
     echo   $fname = $_FILES['f1']['name'];
        $filename = $_FILES['f1']['tmp_name'];
        $destination = "img/".$fname;  
        $ar = scandir("img");
        print_r($ar);
        if(in_array($fname, $ar))
             echo    $destination = $destination."-".$fname;
        
        if(move_uploaded_file($filename, $destination))
                echo "file is uploaded...";
    }else{
        echo "upload only image";
    }
    $smt = $newconn->prepare("insert into a12(pname, pdetails, lastdate, minbid, imgaddress) values(?,?,?,?,?)");
    $smt->bind_param("ssdis",$prname, $prdetails, $lastdate, $mibid, $destination);
    $pname = $prname;
    $pdetails = $prdetails;
    $ldate = $lastdate;
    $mbid = $mibid;
    $smt->execute();
    echo "Your product details have been eneterd";
    $smt->close();
    $newconn->close();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/business-casual.css" rel="stylesheet" type="text/css"/>
      
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    </head>
    <body>
        <form method="post" action="mainpage.php">
                    <p class="text-right">
                        <a href=" "><input type="submit" value="Logout" name="b1" class="btn btn-danger"/></a>
                    </p>
        </form>
        
        <div class="jumbotron">
            <h3><center>HELLO AUCTIONER<br>
                    <img src="auction1.jpg"
                         width="500" height="200">
            
                </center></h3><br> <br>
        </div>
        <form method="post" enctype="multipart/form-data">
            <table align="center" border="2">
                 <div class="panel panel-primary">
                <div class="panel-heading">Auctioner Login</div>
                <div class="panel-body">
     
  <div class="form-group">
    <label for="exampleInputname">Product Name</label>
    <input type="text" class="form-control" id="exampleInputDetails" name="pname" placeholder="EnterYourProductName">
  </div>
                    <div class="form-group">
    <label for="exampleInputDetails">Product Details</label>
    <input type="text" class="form-control" id="exampleInputDetails" name="pdetails" placeholder="EnterYourProductDetails">
  </div>
                    <div class="form-group">
    <label for="exampleInputDate">Last Date</label>
    <input type="date" class="form-control" id="exampleInputDate" name="ldate"/>
  </div>
                                    <div class="form-group">
    <label for="exampleInputMinBid">Minimum Bid</label>
    <input type="text" class="form-control" id="exampleInputMinBid" name="mbid"/>
  </div>
      <div class="form-group">
    <label for="exampleInputDate">IMAGE</label>
    <input type="file" class="form-control" id="exampleInputDate" name="f1"/>
  </div>
                    
                    <input type="submit" class="btn btn-primary" value="Submit" name="s2"/>
    </div>
            </div>
            </table>
        </form>
      
              
    </body>
</html>