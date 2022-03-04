<?php
    require_once('components.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION-Customer | Sign Up</title>

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
        <div class="row justify-content-center">
            <img src="images/background-2.png" class="content-1-background" alt="">
            
            <div class="container-fluid mt-5 ">
                <div class="row row-4">
                    <div class="row-text-2">
                        <h1>CREATE YOUR ACCOUNT</h1>
                        <h2>CUSTOMER</h2>
                    </div>
                </div>
            
                <div class="row-4">
                    <form action="regis-customer.php" method="post">
                        <fieldset>
                            <div class="col-form-1">
                                <label for="fullName">Full Name:</label><br>
                                <div class="name">
                                    <input type="text" name="fullName" placeholder="First Name Middle Initial Surname" required>
                                </div>
                                <label for="emailCustomer">Email:</label><br>
                                <input type="email" name="emailCustomer" placeholder="Please Enter your Email Address" required>
            
                                <label for="password">Password:</label><br>
                                <input type="password" name="password" style="width: 74%" placeholder="Please Enter your Password" required>
                                <label for="numberCustomer">Phone Number:</label><br>
                                <input type="tel" name="numberCustomer" style="width: 74%" placeholder="Please Enter your Phone Number" required>
            
                            </div>
                            <div class="col-form-1 part2">
            
                                <div id="birthdate-and-sex">
                                    <div class="birthdate">
                                        <label for="birthDate">Birthdate:</label><br>
                                        <input type="date" name="birthDate" id="birthDate" required>
                                    </div>
                                    <div class="sex">
                                        <label for="">Sex:</label><br>
                                        <select name="sex" id="sex">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <br><label for="address">Address:</label><br>
                                <input type="text" name="address" id="address" placeholder="Zip Code, Block No., House No., Street Name, Barangay, City" required>
                                <div class="check-with-text">
                                    <input type="checkbox" name="agreement" class="checkbox" required>
                                    <label for="agreement">I agree to I agree to Easy PC's <a href="">Terms of Use</a> and <a href="">Privacy Policy</a></label>
                                </div>
                                <input type="submit" value="Sign Up" class="btn btn-custom-1 btn-custom-trans-1">
                                <div class="links-2">
                                    <a href="login.html">Login</a><br>
                                    <a href="regis-business.html">Create a Business</a>
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
                <li><a href="">About Us</a></li>
                <li><a href="">Terms of Use</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Frequently Asked Questions</a></li>
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