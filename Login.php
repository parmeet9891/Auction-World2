<?php
$x=0;
require_once 'abc.php';
if(isset($_POST['s1'])){
   $obj = mysqli_connect("localhost", "root", "", "world");
   $newuser = mysqli_real_escape_string($obj,$_POST['username']);
   $newpassword = mysqli_real_escape_string($obj,$_POST['password']);
   $sel_user = "select * from e12 where username='$newuser' AND password='$newpassword'";
   $run_user = mysqli_query($obj, $sel_user);
   $check_user = mysqli_num_rows($run_user);
   if($check_user>0){
       session_start();
       $_SESSION['loggedin'] = true;
       $_SESSION['username']=$newuser;
     echo "<script type='text/javascript'>window.location.href = 'auction1.php';</script>";
   }
   else
   {
       echo "It seems that you have not regsitered yet or <br>"
       . "Something went wrong with password or username";
   }
  
}



?>
<!DOCTYPE html>
<html>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/business-casual.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    </head>
    <body>
        <br><br><br>
        <div class="jumbotron">
            <h3><center>THIS IS THE LOGIN PAGE<br>
                </center></h3><br> <br>
        </div>
                    <form method="post">
            <table align="center" border="2">
                 <div class="panel panel-primary">
                <div class="panel-heading">LOGIN FORM</div>
                <div class="panel-body">
                <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
                    <input type="submit" class="btn btn-primary" value="Login" name="s1"/>
    </div>
            </div>
            </table>
        </form>
              
    </body>
</html>