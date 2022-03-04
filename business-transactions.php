<?php
session_start();

    include('connection.php');
    include('function1.php');

     $user_data = check_user($con);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Orders | EASY PIECE</title>

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
            <ul id = "navbar-nav-business" style="display:none;">
                <?php 
                        if($_SESSION['privilage'] == 'business')
                        {
                            echo '<script> document.getElementById("navbar-nav").style.display = "none";
                                     document.getElementById("navbar-nav-business").style.display = "inline"</script>';
                        }
                    ?>
                <li class="nav-item"><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                <li class="nav-item"><a href="business-profile.html" style=letter-spacing:1px;><i class="fa fa-user"></i>&nbsp;&nbsp;Welcome, <?php echo $user_data['OwnerName']; ?>  </a></li>
            </ul>
        </nav>
        
    </nav>

    <div class="second-nav">
        <ul>
            <li><a href="">Browse Computer Parts</a></li>
            <li><a href="">PC Builder</a></li>
        </ul>
    </div>  
   
    <div class="container-fluid profile-pos pb-4 content-1">
        
        <div class="row content-1">
            <div class="col-buttons col-lg-2 col-md-3 col-sm-4 col-xs-2 justify-content-center align-items-center">
                <ul>
                    <li>
                        <h2><a href="business.php"  class="profile-button-unselected">PROFILE</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-order.php" class="profile-button-unselected">ORDERS</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-inventory.php" class="profile-button-unselected" style="font-size:2rem;">INVENTORY</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-transactions.php" class="profile-button-selected massive-mb" id="btn-transaction">TRANSACTION</a></h2>
                    </li>
                </ul>
            </div>
            <div class="content-bg col-lg-10 col-md-9 col-sm-8 col-xs-12">
                <div class="container-pos container-fluid content-1 mb-5">

                    <div class="row column-card mb-4">
                        <div class="show-items">
                            <span>Show:&nbsp;</span>
                            <select name="num_of_rows" id="">
                                <option value="0">Last 5 Transactions</option>
                                <option value="1">Last 10 Transactions</option>
                                <option value="2">Last 15 Transactions</option>
                                <option value="3">Last 20 Transactions</option>
                            </select>
                        </div>
                    </div>

                    <div class="row column-card mb-2">
                        <div class="order-card container-fluid">
                            <div class="row-business-name row justify-content-between mr-1">
                                <p>Transactioned with: $CUSTOMER_NAME <p><p>Order ID: $ORDER_ID</span>
                            </div>

                            <hr class="divider-1 divider-mod-1">

                            <div class="row pb-4">
                                <a href="" class="link-black-none">
                                    <div class="row row-order-brief container">
                                        <div class="col">
                                            <img src="items/placeholder-image.png" alt="product img">
                                        </div>
                                        <div class="col-7">
                                            <p class="order-item-name">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut voluptate dolorem eum delectus ex vitae non consequatur totam quisquam repellat illum, et minus dolorum minima!</p>
                                        </div>
                                        <div class="col">
                                            <span>₱$num</span>
                                        </div>
                                        <div class="col">
                                            <span>Qty: $num</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="row column-card mb-2">
                        <div class="order-card container-fluid">
                            <div class="row-business-name row justify-content-between mr-1">
                                <p>Transactioned with: $CUSTOMER_NAME <p><p>Order ID: $ORDER_ID</span>
                            </div>

                            <hr class="divider-1 divider-mod-1">

                            <div class="row pb-4">
                                <a href="" class="link-black-none">
                                    <div class="row row-order-brief container">
                                        <div class="col">
                                            <img src="items/placeholder-image.png" alt="product img">
                                        </div>
                                        <div class="col-7">
                                            <p class="order-item-name">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut voluptate dolorem eum delectus ex vitae non consequatur totam quisquam repellat illum, et minus dolorum minima!</p>
                                        </div>
                                        <div class="col">
                                            <span>₱$num</span>
                                        </div>
                                        <div class="col">
                                            <span>Qty: $num</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="row column-card mb-2">
                        <div class="order-card container-fluid">
                            <div class="row-business-name row justify-content-between mr-1">
                                <p>Transactioned with: $CUSTOMER_NAME <p><p>Order ID: $ORDER_ID</span>
                            </div>

                            <hr class="divider-1 divider-mod-1">

                            <div class="row pb-4">
                                <a href="" class="link-black-none">
                                    <div class="row row-order-brief container">
                                        <div class="col">
                                            <img src="items/placeholder-image.png" alt="product img">
                                        </div>
                                        <div class="col-7">
                                            <p class="order-item-name">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut voluptate dolorem eum delectus ex vitae non consequatur totam quisquam repellat illum, et minus dolorum minima!</p>
                                        </div>
                                        <div class="col">
                                            <span>₱$num</span>
                                        </div>
                                        <div class="col">
                                            <span>Qty: $num</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="row column-card mb-2">
                        <div class="order-card container-fluid">
                            <div class="row-business-name row justify-content-between mr-1">
                                <p>Transactioned with: $CUSTOMER_NAME <p><p>Order ID: $ORDER_ID</span>
                            </div>

                            <hr class="divider-1 divider-mod-1">

                            <div class="row pb-4">
                                <a href="" class="link-black-none">
                                    <div class="row row-order-brief container">
                                        <div class="col">
                                            <img src="items/placeholder-image.png" alt="product img">
                                        </div>
                                        <div class="col-7">
                                            <p class="order-item-name">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut voluptate dolorem eum delectus ex vitae non consequatur totam quisquam repellat illum, et minus dolorum minima!</p>
                                        </div>
                                        <div class="col">
                                            <span>₱$num</span>
                                        </div>
                                        <div class="col">
                                            <span>Qty: $num</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
                    
                
                    
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
      
    







    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


