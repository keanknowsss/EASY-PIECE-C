<?php
session_start();

    require_once('components.php');


    include('connection.php');
    include('function1.php');

    

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Profile | EASY PIECE</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- JAVASCRIPT -->
    <script type="text/JavaScript" src="script.js"></script>

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="d-flex flex-column">
    <?php 
        
        admin_nav(); 
    ?> 

   
    <div class="container-fluid profile-pos pb-4 content-1" id="profileCustom" style="margin-top:2.8em" >
        
        <div class="row content-1">
            <div class="col-buttons col-lg-2 col-md-3 col-sm-4 col-xs-2 justify-content-center align-items-center">
                <ul>
                    <li>
                        <h2><a href="business.php"  class="profile-button-selected">PROFILE</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-order.php" class="profile-button-unselected">CUSTOMERS</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-inventory.php" class="profile-button-unselected">BUSINESSES</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-transactions.php" class="profile-button-unselected">ITEMS</a></h2>
                    </li>
                </ul>
            </div>
            
            <div class="content-bg content-bg col-lg-10 col-md-9 col-sm-8 col-xs-12" id="content-change-password">
                <div class="container-fluid content-1 mb-5">
                    <div class="change-password mt-5">
                        <h2>Change Password:</h2>
                        <hr class="divider-mod-2 rounded">
                        <form action=" " method="post">
                            <div class="row mt-4 ml-1">
                                <label for="currentPassword">Current Password: </label>
                            </div>
                            <div class="row ml-1">
                                <input type="password" name="currentPassword" id="currentPassword" class="profPass">
                            </div>

                            <div class="row ml-1">
                                <label for="password">New Password: </label>
                            </div>
                            <div class="row ml-1">
                                <input type="password" name="password" id="password" class="profPass">
                            </div>

                            <hr class="divider-1 divider-mod-3">
                            <div class="links-profile col-12 mb-5">
                                <ul>
                                    <li><input type="submit" class="btn btn-custom-1 btn-trans-1 btn-profile" value="Save Password"></li>
                                    <li><a href="#" onclick="returntoProf()" id="pass-button" class="btn btn-custom-1 btn-trans-1 btn-profile">Cancel Change</a></li>
                                </ul>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>

            <div class="content-bg col-lg-10 col-md-9 col-sm-8 col-xs-12" id="content-main">
                <form action=" " method="POST"> 
                    <div class="container-fluid content-1 mb-5">
                        <div class="row justify-content-start mr-5">
                            <div class="custo-info col-lg-5 col-md-6 col-sm-6 col-xs-12">
                                <h4>Admin E-mail:</h4>
                                <div class="profInfo">
                                    <p>Admin@gmail.com</p><hr class="hr-underline">
                                </div>
                                <input type="text" name="businessName" class="profEdit">
                            </div>
                            <div class="custo-info col-lg-7 col-md-6 col-sm-6 col-xs-12" style="margin-top: 3rem">
                                <h4>Admin Password:</h4>
                                <div class="profInfo">
                                    <p>Admin123</p><hr class="hr-underline">
                                </div>
                                <input type="text" name="businessAddress" class="profEdit profAddress">
                            </div>
                        </div>
                        
                        
                    </div>
                    
                <hr class="divider-1">
                <div class="links-profile col-12">
                    <ul>
                        
                        <li><a href="logout1.php" onclick="editPass()" id="pass-button" class="btn btn-custom-1 btn-trans-1 btn-log-out">Logout</a></li>
                    </ul>
                </div>

                </form>
                    
                </div>

               
                
            </div>
            <footer class="footer" id="footer-mod-2">
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
        </div>
    </div>

      
    


    <!-- Main Script -->
    <script>

        // swaps view of profile and edit
        function editInfo() 
        {
            var allINFO = document.getElementsByClassName("profInfo");
            var allINPUT = document.getElementsByClassName("profEdit");

            for(var i=0; i<allINFO.length; i++)
            {
                allINFO[i].style.display = "none"
                allINPUT[i].style.display = "inline";

            }


            // for one class only

            var btnEdit = document.getElementsByClassName("btn-edit");
            var btnSave = document.getElementsByClassName("btn-save");
            for(var i=0; i<btnEdit.length; i++)
            {
                btnEdit[i].style.display = "none"
                btnSave[i].style.display = "inline";

            }

        }

        // swaps view of profile and change password

        //  document.getElementById("content-main");
            

        function editPass() 
        {   
            document.getElementById("content-main").style.display = "none";
            document.getElementById("content-change-password").style.display = "inline";
           
        }

        function returntoProf()
        {
            document.getElementById("content-main").style.display = "inline";
            document.getElementById("content-change-password").style.display = "none";
        }

    </script>

    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


