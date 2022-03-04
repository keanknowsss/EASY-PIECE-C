<?php
session_start();

    require_once('components.php');

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

    <!-- JAVASCRIPT -->
    <script type="text/JavaScript" src="script.js"></script>

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="d-flex flex-column">
    <?php 
        withAcc_mainNavbar($_SESSION['privilage'], $user_data['BusinessName']);
        second_Nav(); 
    ?>     
   
    <div class="container-fluid profile-pos content-1">
        
        <div class="row content-1">
            <div class="col-buttons col-lg-2 col-md-3 col-sm-4 col-xs-2 justify-content-center align-items-center">
                <ul>
                    <li>
                        <h2><a href="business.php"  class="profile-button-unselected">PROFILE</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-order.php" class="profile-button-selected">ORDERS</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-inventory.php" class="profile-button-unselected" style="font-size:2rem;">INVENTORY</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-transactions.php" class="profile-button-unselected massive-mb" id="btn-transaction">TRANSACTION</a></h2>
                    </li>
                </ul>
            </div>
            <div class="content-bg col-lg-10 col-md-9 col-sm-8 col-xs-12">
                <div class="container-pos container-fluid content-1">

                    <div class="row column-card mb-4">
                        <div class="show-items">
                            <span>Show:&nbsp;</span>
                            <select name="num_of_rows" id="">
                                <option value="0">Last 5 Orders</option>
                                <option value="1">Last 10 Orders</option>
                                <option value="2">Last 15 Orders</option>
                                <option value="3">Last 20 Orders</option>
                            </select>
                        </div>
                    </div>

                    <div class="row column-card mb-2">
                        <div class="order-card container-fluid">
                            <div class="row-business-name row justify-content-between mr-1">
                                <p>Sold by: $CUSTOMER_NAME <p><p>Order ID: $ORDER_ID</span>
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
                                <p>Sold by: $CUSTOMER_NAME <p><p>Order ID: $ORDER_ID</span>
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
                                <p>Sold by: $CUSTOMER_NAME <p><p>Order ID: $ORDER_ID</span>
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
                                <p>Sold by: $CUSTOMER_NAME <p><p>Order ID: $ORDER_ID</span>
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


