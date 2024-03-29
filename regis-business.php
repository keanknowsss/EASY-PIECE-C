<?php
    require_once('components.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION-Business | Sign Up</title>

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


    <div class="content-1 mod-1 container-fluid">
        <div class="row justify-content-center">
            <img src="images/background-2.png" class="content-1-background" alt="">
            <div class="focus mt-5 ml-5">
                <div class="row-4 row-4-mod">
                    <div class="row-text-2">
                        <h1>CREATE YOUR ACCOUNT</h1>
                        <h2>BUSINESS</h2>
                    </div>
                </div>
            
                <div class="row-4 row-4-mod">
                    <form action="regis-business-process.php" method="post">
                        <fieldset>
                            <div class="col-form-1-mod">
                                <label for="businessEmail">Business Email Address:</label><br>
                                <input type="email" name="businessEmail" placeholder="Please Enter your Business Email Address" required>
                                <hr>
            
                                <label for="businessName">Business Name:</label><br>
                                <input type="text" name="businessName" placeholder="Enter Business Name" required>
            
                                <label for="businessContact">Business Contact Number:</label><br>
                                <input type="tel" name="businessContact" placeholder="Please Enter your Business Number" required>
            
                                <label for="businessAddress">Business Address:</label><br>
                                <input type="text" name="businessAddress" placeholder="Please Enter your Business" required>
                            </div>
                            <div class="col-form-1 part2-mod">
                                <label for="password">Password:</label><br>
                                <input type="password" id="textinput-mod1" name="password" placeholder="Please Enter your Password" required>
                                <hr>
            
                                <label for="ownerName">Owner Name:</label><br>
                                <input type="text"  name="ownerName" placeholder="Please Enter Owner's Name" required>
                                <br>
                                <label for="contactOwner">Owner Contact Number:</label><br>
                                <input type="text" style="width: 60%" name="contactOwner" placeholder="Please Enter Owner's Number" required>
                                <br>
                                <label for="businessID">Add Valid ID Photo:</label><br>
                                <input type="file" id="businessID" name="businessID" accept="image/png, image/gif, image/jpeg" multiple required>
                                <div class="check-with-text">
                                    <input type="checkbox" name="agreement" class="checkbox" required>
                                    <label for="agreement">I agree to Easy PC's <a href="">Terms of Use</a> and <a href="">Privacy Policy</a></label>
                                </div>
                                <br>
                                <input type="submit" value="Sign Up" class="btn btn-custom-1 btn-custom-trans-1" id="business-mod1">
                                <div class="links-2 mt-5" >
                                    <a href="login.html">Login</a><br>
                                    <a href="regis-customer.html">Create a customer account here</a>
                                </div>
                            </div>
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


    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>