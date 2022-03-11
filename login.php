<?php 
    require_once('components.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EASY PIECE C. | LOGIN</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- JAVASCRIPT -->
    <script type="text/JavaScript" src="script.js"></script>

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        noAcc_mainNavbar();
        second_Nav(); 
    ?>
    


    <div class="content-1 container-fluid">

        <div class="row">
            <img src="images/background-2.png" class="content-1-background" alt="">
            
            <div class="container-fluid content-1 mt-3">
                <div class="row-2 justify-content-center">
                    <div class="login-row-2 form-inline">
                        <h1>LOGIN <br><span class="login-text" id="privilege-login">Customer</span></h1>
                        <div class="row-text">
                            <p>Don't have an account</p>
                            <a href="regis-main.html">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="row-2 row-2-mod-1 justify-content-center" id="customerlogin">
                    <form action="login-user.php" method="post">
                        <fieldset>
                            <label for="emailCustomer">Email:</label><br>
                                <input type="email" name="emailCustomer" placeholder="Please Enter your Email Address" required>
                                <label for="password">Password:</label><br>
                                <input type="password" name="password" placeholder="Please Enter your Password" required>
                            <p><a href="">Forgot Password?</a><br>
                            <a href="#" onclick="showBusiness()" class="space-1">Login as Business Owner</a></p>
                            <input type="submit" class="btn btn-custom-1 btn-custom-trans-1" id="submit" value="Login">
                        </fieldset>
                    </form>
                </div>
                <div class="row-2 row-2-mod-1 justify-content-center" id="businesslogin">
                    <form action="login-business.php" method="post">
                        <fieldset>
                            <label for="businessEmail">Email:</label><br>
                                <input type="email" name="businessEmail" placeholder="Please Enter your Email Address" required>
                                <label for="password">Password:</label><br>
                                <input type="password" name="password" placeholder="Please Enter your Password" required>
                            <p><a href="">Forgot Password?</a><br>
                            <a href="#" onclick="showCustomer()" class="space-1">Login as Customer</a></p>
                            <input type="submit" class="btn btn-custom-1 btn-custom-trans-1" id="submit" value="Login">
                        </fieldset>
                    </form>
                </div>
            </div>
            
        </div>

    </div>

    <footer class="footer" id="footer-mod-1">
        <hr class="footer-line">

        <div class="links">
        <ul>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="termsOfUse.php">Terms of Use</a></li>
                <li><a href="privacyPolicy.php">Privacy Policy</a></li>
                <li><a href="FAQ.php">Frequently Asked Questions</a></li>
            </ul>
            
        </div>

        <p class="footer-text">COPYRIGHT ©2022 | All Rights Reserved</p>
    </footer>


    <!-- MAIN SCRIPT -->
    <script>
        function showBusiness() 
        {
            document.getElementById("customerlogin").style.display = "none";
            document.getElementById("businesslogin").style.display = "flex";
            document.getElementById("privilege-login").innerHTML = "BUSINESS"
        }

        function showCustomer() 
        {
            document.getElementById("businesslogin").style.display = "none";
            document.getElementById("customerlogin").style.display = "flex";
            document.getElementById("privilege-login").innerHTML = "CUSTOMER"
        }
    </script>


    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>