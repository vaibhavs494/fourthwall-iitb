<!DOCTYPE html>
<?php
     session_start();
     
     if(!isset($_SESSION["role"]))
       {
        $_SESSION["role"]="";
       }
       else if($_SESSION["role"]=="admin")
        {
            header("Location:admin-acess.php");
        }
        

?>
<html>
<head>
	<title>Fourthwall | IITB</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="css/compiled/sign-in.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <?php include 'nav-bar static.php'; ?>
    <!-- Sign In Option 1 -->
    <div id="sign_in1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 header">
                    <h4>Log in to your account</h4>
                    <p>
                        if you are a council member of dramatics club .... login here</p>

                    <div class="col-md-4 social">
                        <a href="sign-in.html#" class="circle facebook">
                            <img src="img/face.png" alt="">
                        </a>
                         <a href="sign-in.html#" class="circle twitter">
                            <img src="img/twt.png" alt="">
                        </a>
                         <a href="sign-in.html#" class="circle gplus">
                            <img src="img/gplus.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-sm-3 division">
                    <div class="line l"></div>
                    <span>or</span>
                    <div class="line r"></div>
                </div>

                <div class="col-md-12 footer">
                    <form class="form-inline" action="admin-acess.php" method="post">
                        <input id="id" name="id" type="text" placeholder="User ID" class="form-control" required>
                        <input id="pass" name="pass" type="password" placeholder="Password" class="form-control" required>
                        <input type="submit" value="sign in">
                    </form>
                </div>

                <div class="col-md-12 proof">
                    <div class="col-md-6 remember">
                        <label class="checkbox">
                            <input type="checkbox"> Remember me
                        </label>
                        <a href="javascript:alert('contact site admin');">Forgot password?</a>
                    </div>

                    <div class="col-md-6">
                        <div class="dosnt">
                            <span>Don’t have an account?</span>
                            <a href="avascript:alert('sorry option not available');">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <!-- starts footer -->
     <?php include 'footer.php'; ?>
    <!--       -->

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
    <?php
    if($_GET["err"]=="fail")
    {
        echo'
            <script>
                $("#id").addClass("err");
                $("#pass").addClass("err");
            </script>
        ';
    }

    ?>
</body>
</html>