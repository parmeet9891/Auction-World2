 <?php
 $x=0;
 require_once 'abc.php';
if(isset($_POST['s1'])){
    $conn = mysqli_connect("localhost", "root", "", "world");
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $stmt = $conn->prepare("insert into e12(username, password) values (?,?)");
    $stmt->bind_param("ss", $username,$password);
    $username = $user;
    $password = $pass;
    $stmt->execute();
    echo "You are registred now ";
    $stmt->close();
    $conn->close();       
    echo "<script type='text/javascript'>window.location.href = 'mainpage.php';</script>";
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
        
        <div class="jumbotron">
            <h3><center>THIS IS THE REGISTER PAGE<br><br>
                If you are already registered then <a href="Login.php">CLICK HERE TO LOGIN</a>
            
                </center></h3><br> <br>
        </div>
                    <form method="post">
            <table align="center" border="2">
                 <div class="panel panel-primary">
                <div class="panel-heading">REGSITER FORM</div>
                <div class="panel-body">
                <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
                    <input type="submit" class="btn btn-primary" value="Register" name="s1"/>
    </div>
            </div>
            </table>
        </form>
              
    </body>
</html>