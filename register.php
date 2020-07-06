<?php
include "connection.php";
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register Now</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/owl.carousel.css">
    <link rel="stylesheet" href="css1/owl.theme.css">
    <link rel="stylesheet" href="css1/owl.transitions.css">
    <link rel="stylesheet" href="css1/animate.css">
    <link rel="stylesheet" href="css1/normalize.css">
    <link rel="stylesheet" href="css1/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <div class="error-pagewrap" style="background-image: url(img/book3.png);background-repeat: no-repeat;background-size: 100%">
		<div class="error-page-int">
                    <div class="text-center custom-login" style="color: #3667f7;font-size: 25px;">
				<h2>Register Now</h2>

			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="form1" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>FirstName</label>
                                    <input type="text" name="firstname" required="" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>LastName</label>
                                    <input  type="text" name="lastname" required="" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input type="email" name="email" required="" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" name="username" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                     <label>Password</label>
                                     <input type="password" name="password" id="password"required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}"
                                       title="Must contain at least one number and one uppercase and lowercase letter, and  8 to 10 characters"  class="form-control">
                                </div>
                                 <div class="form-group col-lg-12">
                                    <label>Confirm password</label>
                                    <input type="password" name="password_confirmation"  required=""  class="form-control">
                                    
                                </div>
                              </div>
                            <div class="text-center">
                                <button type="submit" name="submit1" class="btn btn-success loginbtn"style="font-size: 20px;">Register</button>
                            </div>
                            <a class="btn btn-success loginbtn text-center" style="display: block;"href="login.php">Login</a>
                            
                            <div class="alert alert-success" id="success" style="margin-top: 10px;display: none">
                                  <strong>Success!</strong> Account Registration successfully.
                            </div>
                            <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none">
                                 <strong>Alredy Exist!</strong>This Username is Alredy Exsist.
                            </div>
                        </form>
                    </div>
                </div>
	    </div>
	</div>   
    </div>
   
    <?php
    if(isset($_POST["submit1"]))
    {
        $count = 0;                 //username available or not
        
        $res= mysqli_query($link, "SELECT * FROM registration WHERE username ='$_POST[username]'") or die(mysqli_error($link));
                  
        $count = mysqli_num_rows($res);
        
        if ($count>0){  //username available
         ?>
    <script type="text/javascript">
        
        document.getElementById("success").style.display = "none";
        document.getElementById("failure").style.display = "block";
  
    </script>
        <?php
        }else if ($_POST['password'] != $_POST['password_confirmation']) {
         // password ne odgovara
            $message = "Your passwords do not match. Please type carefully.";
         echo "<script type='text/javascript'>alert('$message');</script>";
          
         return false;
     // password potvrdjen
     return true;
      } else {
          mysqli_query($link, "INSERT INTO registration VALUES (NULL,' $_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[username]',md5('$_POST[password]'),md5('$_POST[password_confirmation]'))")or die(mysqli_error($link)); 
      ?>
    <script type="text/javascript">
        document.getElementById("success").style.display = "block";
        document.getElementById("failure").style.display = "none";
    </script>
    <?php            
      }
    }
    ?>
          
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>
</html>

