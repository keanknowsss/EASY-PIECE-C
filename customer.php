<?php
session_start();

    include('connection.php');
    include('function1.php');

     $user_data = check_user($con);
     $u_id = $user_data['user_id'];
     //echo $u_id;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile | EASY PIECE</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="d-flex flex-column">
    <nav class="navbar navbar-expand-lg fixed-top container-nav">
        <div class="logo col-lg-3" >
            <a class="navbar-brand" href="index.php" ><img class="logo-link" src="images/logo.png" alt="Home" ></a>

        </div>


        <div class="justify-content-around form-inline mr-5">
            <form class=" my-2 my-lg-0" action="search.php" method="get">
                <div class="search-box ">
                    <input type="search" name="search"  class="search" placeholder="Search Computer Components and Peripherals">
                    <a href="index.php">
                        <img src="images/Icons/search.png" class = "search-icon">
                    </a>
                </div>
                
            </form>
            

            <select name="categories" class="categories" value="categories">
                <option value="none" class="placeholder">Categories</option>
                <option value="cpu">Processor</option>
                <option value="gpu">Graphics Card</option>
                <option value="ram">Memory</option>
                <option value="storage">Storage</option>
                <option value="psu">Power Supply</option>
                <option value="motherboard">Motherboard</option>
                <option value="case">Case</option>
                <option value="monitor">Monitor</option>
                <option value="keyboard">Keyboard</option>
                <option value="mouse">Mouse</option>
                <option value="headset">Headset</option>
                <option value="webcam">Webcam</option>
                <option value="desktop">Pre-built Desktop</option>
                <option value="laptop">Laptop</option>
                <option value="cooling Fans">Cooling Fans</option>
                <option value="nic">Interface Cards</option>
                <option value="softwares">Softwares</option>
                <option value="others">Others</option>
            </select>
        </div>
        

        <nav class="navbar-collapse justify-content-end mt-3 ml-5" id="guest">
            <ul id = "navbar-nav">
                <li class="nav-item"><a href="login.html">Login</a></li>
                <li class="nav-item"><a href="regis-main.html">Register</a></li>
            </ul>
            <ul id = "navbar-nav-user" style="display:none;">
                <?php 
                    if($_SESSION['privilage'] == 'customer')
                    {
                        echo '<script> document.getElementById("navbar-nav").style.display = "none";
                             document.getElementById("navbar-nav-user").style.display = "inline" </script>';
                    }
                ?>
                <li class="nav-item"><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                <li class="nav-item"><a href="customer.php" style=letter-spacing:1px;><i class="fa fa-user"></i>&nbsp;&nbsp;Welcome, <?php echo $user_data['FullName']; ?>  </a></li>
            </ul>
        </nav>
        
    </nav>

    <div class="second-nav">
        <ul>
            <li><a href="">Browse Computer Parts</a></li>
            <li><a href="">PC Builder</a></li>
        </ul>
    </div>

   

    <div class="container-fluid profile-pos pb-4 content-1"  id="profileCustom">
        
        <div class="row content-1">
            <div class="col-buttons col-lg-2 col-md-3 col-sm-4 col-xs-2 justify-content-center align-items-center">
                <ul>
                    <li>
                        <h2><a href="customer.php"  class="profile-button-selected">PROFILE</a></h2>
                    </li>
                    <li class="order-button">
                        <h2><a href="customer-order.php" class="profile-button-unselected massive-mb-0">ORDERS</a></h2>
                    </li>
                </ul>
            </div>
            
            <div class="content-bg content-bg col-lg-10 col-md-9 col-sm-8 col-xs-12" id="content-change-password">
                <div class="container-fluid content-1">
                    <div class="change-password mt-5">
                        <h2>Change Password:</h2>
                        <hr class="divider-mod-2 rounded">
                        <form action="changePassword.php" method="post">
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
                                    <li><input type="submit" name="update" class="btn btn-custom-1 btn-trans-1 btn-profile" value="Save Password"></li>
                                    <li><a href="#" onclick="returntoProf()" id="pass-button" class="btn btn-custom-1 btn-trans-1 btn-profile">Cancel Change</a></li>
                                </ul>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>

            <div class="content-bg col-lg-10 col-md-9 col-sm-8 col-xs-12" id="content-main">
                <form action="editProf.php" method="post">
                    <div class="container-fluid content-1">
                        <div class="row  justify-content-start mr-5">
                            <div class="custo-info col-lg-5 col-md-6 col-sm-6 col-xs-12">
                                <h4>Full Name:</h4>
                                <div class="profInfo">
                                    <p><?php echo $user_data['FullName'];?></p><hr class="hr-underline">
                                </div>
                                <input type="text" name="fullName" class="profEdit">
                            </div>
                            <div class="custo-info col-lg-7 col-md-6 col-sm-6 col-xs-12">
                                <h4>Birthdate:</h4>
                                <div class="profInfo">
                                    <p><?php echo $user_data['BirthDate'];?></p><hr class="hr-underline">
                                </div>
                                <input type="date" name="birthDate" class="profEdit profBday">
                            </div>
                        </div>
                        <div class="row  justify-content-start mr-5">
                            <div class="custo-info col-lg-5 col-md-6 col-sm-6 col-xs-12">
                                <h4>Email:</h4>
                                <div class="profInfo">
                                    <p><?php echo $user_data['Email'];?></p><hr class="hr-underline">
                                </div>
                                <input type="email" name="emailCustomer" class="profEdit">

                            </div>
                            <div class="custo-info col-lg-7 col-md-6 col-sm-6 col-xs-12">
                                <h4>Sex:</h4>
                                <div class="profInfo">
                                    <p><?php echo $user_data['Sex'];?></p><hr class="hr-underline">
                                </div>
                                <select name="sex" id="sex" class="profEdit profSex">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                    
                        </div>
                        <div class="row  justify-content-start mr-5">
                            <div class="custo-info col-lg-5 col-md-6 col-sm-6 col-xs-12">
                                <h4>Mobile Number:</h4>
                                <div class="profInfo">
                                    <p><?php echo $user_data['PhoneNumber'];?></p><hr class="hr-underline">
                                </div>
                                <input type="tel" name="numberCustomer" class="profEdit profNum">
                            </div>
                            <div class="custo-info col-lg-7 col-md-6 col-sm-6 col-xs-12">
                                <h4>Address:</h4>
                                <div class="profInfo">
                                    <p><?php echo $user_data['Addrss'];?></p>
                                    <hr class="hr-underline">
                                </div>
                                <input type="text" name="address" class="profEdit profAddress">

                            </div>
                        </div>
                    </div>
                    
                <hr class="divider-1">
                <div class="links-profile col-12">
                    <ul>
                        <li><a href="#" onclick="editInfo()" class="btn btn-custom-1 btn-trans-1 btn-edit btn-profile" style="margin-left:1em;">Edit Profile</a></li>
                        <li><input type="submit" class="btn btn-custom-1 btn-trans-1 btn-save btn-profile" value="Save Profile"></li>
                        <li><a href="#" onclick="editPass()" id="pass-button" class="btn btn-custom-1 btn-trans-1 btn-profile">Change Password</a></li>
                        <li><a href="logout.php" onclick="editPass()" id="pass-button" class="btn btn-custom-1 btn-trans-1 btn-log-out">Logout</a></li>
                    </ul>
                </div>

                </form>
                    
                </div>

               
                
            </div>
            <footer class="footer" id="footer-mod-2">
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




