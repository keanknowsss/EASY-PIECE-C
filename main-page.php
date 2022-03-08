<?php 

    include('components.php');

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

    <!-- JAVASCRIPT -->
    <script type="text/JavaScript" src="script.js"></script>

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
    <?php noAcc_mainNavbar(); ?>
        

    <div class="header">
        <img src="images/header-1.png">

        <div class="head-title mt-2">
            <h2>One Stop Comp Shop</h2>
            <h1>For All Computer Parts and Peripherals</h1>

            <ul>
                <li><a href="allProducts.php" class="btn btn-custom-1 btn-custom-trans-1">Browse Computer Parts</a></li>
                <!-- <li><a href="" class="btn btn-custom-1 btn-custom-trans-1">Proceed to PC Builder</a></li> -->
            </ul>
        </div>

    </div>

    <div class="buffer">
        <h1 class="title">CATEGORIES</h1>
    </div>


    <div class="container ">
        <div class="row justify-content-center mb-4">
            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-processor.php">
                    <img src="images/category-1.png" alt="Processor">
                    <h2>Processor</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-gpu.php">
                    <img src="images/category-2.png" alt="Graphics Card" style="object-fit:none; object-position: 70% 30%">
                    <h2>Graphics Card</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-memory.php">
                    <img src="images/category-3.png" alt="RAM">
                    <h2>Memory</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-storage.php">
                    <img src="images/category-4.png" alt="Storage">
                    <h2>Storage</h2>
                </a>
            </div>
        </div>
        
        <div class="row justify-content-center mb-4">
            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-powersupply.php">
                    <img src="images/category-5.png" alt="Power Supply"> 
                    <h2>Power Supply</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-motherboard.php">
                    <img src="images/category-6.png" alt="Motherboard">
                    <h2>Motherboard</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-case.php">
                    <img src="images/category-7.png" alt="Case">
                    <h2>Case</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-monitor.php">
                    <img src="images/category-8.png" alt="Monitor">
                    <h2>Monitor</h2>
                </a>
            </div>
        </div>

        <div class="row justify-content-center mb-4">
            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-keyboard.php">
                    <img src="images/category-9.png" alt="Keyboard"> 
                    <h2>Keyboard</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-mouse.php">
                    <img src="images/category-10.png" alt="Mouse">
                    <h2>Mouse</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-headset.php">
                    <img src="images/category-11.png" alt="Headset">
                    <h2>Headset</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-camera.php">
                    <img src="images/category-12.png" alt="Camera">
                    <h2>Camera</h2>
                </a>
            </div>
        </div>


        <div class="row justify-content-center mb-4">
            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-desktop.php">
                    <img src="images/category-13.png" alt="Pre-Built Desktop"> 
                    <h2>Pre-Built Desktop</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-laptop.php">
                    <img src="images/category-14.png" alt="Laptop">
                    <h2>Laptop</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-fans.php">
                    <img src="images/category-15.png" alt="Cooling Fans">
                    <h2>Cooling Fans</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-nic.php">
                    <img src="images/category-16.png" alt="Interface Cards">
                    <h2>Interface Cards</h2>
                </a>
            </div>
        </div>


        <div class="row justify-content-center mb-5">
            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-softwares.php">
                    <img src="images/category-17.png" alt="Softwares"> 
                    <h2>Softwares</h2>
                </a>
            </div>

            <div class="col-1 col-md-3 col-sm-8 my-3 my-md-0">
                <a href="category-others.php">
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