<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <title>TSC Dashboard - Login</title>

    <!-- default stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- customized stylesheets-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/customize.css" rel="stylesheet">

    <style> 
        .error {
            display: none;
        }
    </style>
</head>

<body id="loginscreen" class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div class="site">
            <img style="width: 180px; height: 180px; margin-bottom: 30px; margin-top: 25px;" src="images/1-3rd-share_cafe_white.png" />
        </div>
        <div id="error" class="alert error alert-danger">
            ユーザーネームもしくはパスワードが間違っています。<br/> もう一度お確かめの上再度お試しください。
        </div>
        <form class="login-box" role="form" method="post">
            <div class="form-group">
                <input type="name" name="username" class="form-control" placeholder="Username" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
            <button type="submit" name="submit" class="btn btn-primary block full-width m-b"> ログイン </button>
        </form>
    </div>

    <!-- default scripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <?php
    if (isset($_POST['submit']))
        {
            include("config.php");
            session_start();
            $username=$_POST['username'];
            $password=$_POST['password'];

            $_SESSION['login_user']=$username;
            $query = mysqli_query($db, "SELECT username FROM users WHERE username='$username' and password='$password'");
            if (mysqli_num_rows($query) != 0)
            {
                $_SESSION['login']=1;
                echo "<script language='javascript' type='text/javascript'> location.href='index.php' </script>";
            }
            else
            {
                echo "<script type='text/javascript'>
                $('#error').css({display: 'block'})
                </script>";
            }
        }
    ?>

</body>

</html>
