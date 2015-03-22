<?php
session_start();
$error=''; 
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }else{
        $username=$_POST['username'];
        $password=$_POST['password'];
    }
}
$connection = mysql_connect("localhost","root","xxxxxxx") or die(mysql_error());
$db = mysql_select_db("web_bug_db") or die(mysql_error());
$sql = "select * from t_user where username='" . $username . "' and pwd='" . $password . "';";
$result = mysql_query($sql, $connection);
$rows = mysql_num_rows($result);

if ($rows == 1) {
    $_SESSION['login_user']=$username; // Initializing Session
    header("location: gallery.php"); // Redirecting To Other Page
}else{
    $error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Web_bug</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>             
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" placeholder="username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" name="submit">Log In</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2014 AppName
                    </div>
                    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






