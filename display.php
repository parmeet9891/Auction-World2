<?php
if(isset($_POST['d1'])){
    $newconn1 = mysqli_connect("localhost", "root", "", "auctioner");
    $prname1 = mysqli_real_escape_string($newconn1, $_POST['pn1']);
    $nsmt = $newconn1->prepare("SELECT * FROM a12 WHERE pname= ?");
    $nsmt->bind_param("s",$prname1);
    $nsmt->execute();
    $nsmt->close();
    $newconn1->close();
   
}
?>
<html>
    <head>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    </head>
    <body>
        <p>
            <font color="red"><strong>
                Here By entering your product name you can easily see the details of your product.
            </strong> </font>
        </p>
        <form method="post">
            <table align="left" border="2">
                <label for="InputProductForm">Product Name</label>
                <input type="text" class="form-control" name="pn1" placeholder="ProductName"/><br>
                <input type="submit" name="d1" value="Display" class="btn btn-success"/>
            </table>
                
        </form>
    </body>
</html>
