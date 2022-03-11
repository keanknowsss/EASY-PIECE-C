<?php
    require_once('components.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EASY PIECE C. | REGISTRATION</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- JAVASCRIPT -->
    <script type="text/JavaScript" src="script.js"></script>

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="style.css">

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
            
            <div class="container-fluid focus mt-5">
                <div class="row-3">
                    <h2 class="col-5 just">CHOOSE YOUR ACCOUNT PRIVILEGE</h2>
                    <p>Have an account already? <a href="login.php">Click Here</a>.</p>
                </div>
            
                <div class="row justify-content-center">
                    <div class= "col-mod-2">
                        <a href="regis-customer.php">
                            <img src="images/regis-2.png" alt="">
                            <h2>CUSTOMER</h2>
                        </a>
                    </div>
                    <div class="col-mod-2">
                        <a href="regis-business.php">
                            <img src="images/regis-1.png" alt="">
                            <h2>BUSINESS</h2>
                        </a>
                    </div>
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