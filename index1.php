<?php
session_start();

    include('connection.php');
    include('function2.php');

     $user_data = check_login($con);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EASY PIECE C. | One Stop Comp Shop</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
        
    <nav class="navbar navbar-expand-lg sticky-top container-nav">
        <div class="logo col-lg-3" >
            <a class="navbar-brand" href="index.html" ><img class="logo-link" src="images/logo.png" alt="Home" ></a>

        </div>


        <div class="justify-content-around form-inline mr-5">
            <form class=" my-2 my-lg-0" action="search.php" method="get">
                <div class="search-box ">
                    <input type="search" name="search"  class="search" placeholder="Search Computer Components and Peripherals">
                    <a href="index.html">
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
                <li class="nav-item"><a href="business.php">Welcome, <?php echo $user_data['OwnerName']; ?></a></li>
                <li class="nav-item"><a href="regis-main.html"></a></li>
            </ul>
            <ul id = "navbar-nav" style="display:none;">
                <li class="nav-item"><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                <li class="nav-item"><a href="customer-profile.html" style=letter-spacing:1px;><i class="fa fa-user"></i>&nbsp;&nbsp;Welcome User</a></li>
            </ul>
        </nav>
        
    </nav>
        

    <div class="header">
        <img src="images/header-1.png">

        <div class="head-title">
            <h2>One Stop Comp Shop</h2>
            <h1>For All Computer Parts and Peripherals</h1>

            <ul>
                <li><a href="" class="btn btn-custom-1 btn-custom-trans-1">Browse Computer Parts</a></li>
                <li><a href="" class="btn btn-custom-1 btn-custom-trans-1">Proceed to PC Builder</a></li>
            </ul>
        </div>

    </div>

    <div class="buffer">
        <h1 class="title">CATEGORIES</h1>
    </div>


    <div class="container ">
        <div class="row justify-content-center mb-4">
            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-1.png" alt="Processor">
                    <h2>Processor</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-2.png" alt="Graphics Card" style="object-fit:none; object-position: 70% 30%">
                    <h2>Graphics Card</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-3.png" alt="RAM">
                    <h2>Memory</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-4.png" alt="Storage">
                    <h2>Storage</h2>
                </a>
            </div>
        </div>
        
        <div class="row justify-content-center mb-4">
            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-5.png" alt="Power Supply"> 
                    <h2>Power Supply</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-6.png" alt="Motherboard">
                    <h2>Motherboard</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-7.png" alt="Case">
                    <h2>Case</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-8.png" alt="Monitor">
                    <h2>Monitor</h2>
                </a>
            </div>
        </div>

        <div class="row justify-content-center mb-4">
            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-9.png" alt="Keyboard"> 
                    <h2>Keyboard</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-10.png" alt="Mouse">
                    <h2>Mouse</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-11.png" alt="Headset">
                    <h2>Headset</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-12.png" alt="Camera">
                    <h2>Camera</h2>
                </a>
            </div>
        </div>


        <div class="row justify-content-center mb-4">
            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-13.png" alt="Pre-Built Desktop"> 
                    <h2>Pre-Built Desktop</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-14.png" alt="Laptop">
                    <h2>Laptop</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-15.png" alt="Cooling Fans">
                    <h2>Cooling Fans</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-16.png" alt="Interface Cards">
                    <h2>Interface Cards</h2>
                </a>
            </div>
        </div>


        <div class="row justify-content-center mb-5">
            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-17.png" alt="Softwares"> 
                    <h2>Softwares</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="">
                    <img src="images/category-18.png" alt="Others" style="object-fit:none; object-position: 10% 70%">
                    <h2>Others</h2>
                </a>
            </div>
        </div>
    </div>

    
    <footer class="footer">
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