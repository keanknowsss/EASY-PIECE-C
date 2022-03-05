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
    <title>My Cart | EASY PIECE C</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- JAVASCRIPT -->
    <script type="text/JavaScript" src="script.js"></script>

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="d-flex flex-column min-vh-100 content-bg"> 
    <?php 
        if(isset($_SESSION['privilage']))
        {
            // debug_to_console($_SESSION['privilage']);

            switch($_SESSION['privilage'])
            {
                case "customer":
                    withAcc_mainNavbar($_SESSION['privilage'], $user_data['FullName']);
                    break;
                case "business":
                    withAcc_mainNavbar($_SESSION['privilage'], $user_data['BusinessName']);
                    break;
                default:
                    header("Location:main-page.html");
            }
        }
        
        second_Nav(); 
    ?>
   

    <form action="goPlaceOrder.php" method="post">
        <div class="content-bg some-container container-fluid pb-4 content-1" id="profileCustom" >
            <div class="row pt-3 mb-5 pb-5 add-padding content-1">
                <div class="container-fluid col-lg-8 col-md 8 col-sm-12 mr-0 list-cart">
                    <div class="row mt-2">
                        <h1 class="title-cart">MY CART <i class="fa fa-shopping-cart" style="font-size:3.5rem"></i></h1>
                    </div>
                    <hr class="divider-1 divider-mod-4 divider-mod-5">
                    <div class="row ml-3">
                        <div class="row column-card mt-2">
                            <div class="order-card container-fluid">
                                <div class="row-business-name row justify-content-between mr-1">
                                    <p>Sold by: <a href="#" class="link-black-none">$CUSTOMER_NAME</a> <p><a href="">Remove</a></p>
                                </div>
                                <hr class="divider-1 divider-mod-1">
                                    <div class="row row-order-brief container-fluid p-0 ml-0 mr-0 pb-2">
                                        <div class="col">
                                            <input type="checkbox" name="" id="" class="mr-3 mt-4">
                                            <a href="product.php" class="link-black-none"><img src="items/placeholder-image.png" alt="product img"></a>
                                        </div>
                                        <div class="col-7 mr-0">
                                            <a href="product.php" class="link-black-none">
                                                <p class="order-item-name">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut voluptate dolorem eum delectus ex vitae non consequatur totam quisquam repellat illum, et minus dolorum minima!</p>
                                            </a>
                                        </div>
                                        <div class="mr-3 ml-2 mr-2">
                                            <span>₱$num</span>
                                        </div>
                                        <div class="col inc-qty mx-0 my-0 px-0 ml-3">
                                            <label for="quantity">Quantity:</label><br>
                                                <input type="number" value="1" name="quantity" MIN="1" id="qty" class="addItem  inQty-widthMAX no-mx inQty rounded">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    <div class="row ml-3">
                        <div class="row column-card mt-2">
                            <div class="order-card container-fluid">
                                <div class="row-business-name row justify-content-between mr-1">
                                    <p>Sold by: <a href="#" class="link-black-none">$CUSTOMER_NAME</a> <p><a href="">Remove</a></p>
                                </div>
                                <hr class="divider-1 divider-mod-1">
                                    <div class="row row-order-brief container-fluid p-0 ml-0 mr-0 pb-2">
                                        <div class="col">
                                            <input type="checkbox" name="" id="" class="mr-3 mt-4">
                                            <a href="product.php" class="link-black-none"><img src="items/placeholder-image.png" alt="product img"></a>
                                        </div>
                                        <div class="col-7 mr-0">
                                            <a href="product.php" class="link-black-none">
                                                <p class="order-item-name">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut voluptate dolorem eum delectus ex vitae non consequatur totam quisquam repellat illum, et minus dolorum minima!</p>
                                            </a>
                                        </div>
                                        <div class="mr-3 ml-2 mr-2">
                                            <span>₱$num</span>
                                        </div>
                                        <div class="col inc-qty mx-0 my-0 px-0 ml-3">
                                            <label for="quantity">Quantity:</label><br>
                                                <input type="number" value="1" name="quantity" MIN="1" id="qty" class="addItem  inQty-widthMAX no-mx inQty rounded">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    <div class="row ml-3">
                        <div class="row column-card mt-2">
                            <div class="order-card container-fluid">
                                <div class="row-business-name row justify-content-between mr-1">
                                    <p>Sold by: <a href="#" class="link-black-none">$CUSTOMER_NAME</a> <p><a href="">Remove</a></p>
                                </div>
                                <hr class="divider-1 divider-mod-1">
                                    <div class="row row-order-brief container-fluid p-0 ml-0 mr-0 pb-2">
                                        <div class="col">
                                            <input type="checkbox" name="" id="" class="mr-3 mt-4">
                                            <a href="product.php" class="link-black-none"><img src="items/placeholder-image.png" alt="product img"></a>
                                        </div>
                                        <div class="col-7 mr-0">
                                            <a href="product.php" class="link-black-none">
                                                <p class="order-item-name">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut voluptate dolorem eum delectus ex vitae non consequatur totam quisquam repellat illum, et minus dolorum minima!</p>
                                            </a>
                                        </div>
                                        <div class="mr-3 ml-2 mr-2">
                                            <span>₱$num</span>
                                        </div>
                                        <div class="col inc-qty mx-0 my-0 px-0 ml-3">
                                            <label for="quantity">Quantity:</label><br>
                                                <input type="number" value="1" name="quantity" MIN="1" id="qty" class="addItem  inQty-widthMAX no-mx inQty rounded">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    <div class="row ml-3">
                        <div class="row column-card mt-2">
                            <div class="order-card container-fluid">
                                <div class="row-business-name row justify-content-between mr-1">
                                    <p>Sold by: <a href="#" class="link-black-none">$CUSTOMER_NAME</a> <p><a href="">Remove</a></p>
                                </div>
                                <hr class="divider-1 divider-mod-1">
                                    <div class="row row-order-brief container-fluid p-0 ml-0 mr-0 pb-2">
                                        <div class="col">
                                            <input type="checkbox" name="" id="" class="mr-3 mt-4">
                                            <a href="product.php" class="link-black-none"><img src="items/placeholder-image.png" alt="product img"></a>
                                        </div>
                                        <div class="col-7 mr-0">
                                            <a href="product.php" class="link-black-none">
                                                <p class="order-item-name">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut voluptate dolorem eum delectus ex vitae non consequatur totam quisquam repellat illum, et minus dolorum minima!</p>
                                            </a>
                                        </div>
                                        <div class="mr-3 ml-2 mr-2">
                                            <span>₱$num</span>
                                        </div>
                                        <div class="col inc-qty mx-0 my-0 px-0 ml-3">
                                            <label for="quantity">Quantity:</label><br>
                                                <input type="number" value="1" name="quantity" MIN="1" id="qty" class="addItem  inQty-widthMAX no-mx inQty rounded">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
                <div class="col pt-5 ml-0 mt-5 content-1">
                    <div class="column-card">
                        <div class="row ml-2 mt-2">
                            <h4 class="mb-1"><strong>Delivery Options Available:</strong></h4>
                        </div>
                        <hr class="divider-1 divider-mod-1">
                        <div class="row ml-2 mt-2">
                            <ul class="list-inline ">
                                <li class="list-inline-item px-4 py-2" id="delivery">Delivery</li>
                                <li class="list-inline-item px-4 py-2" id="walk-in">Walk-in</li>
                            </ul>
                        </div>
                        <div class="row ml-2 mt-4">
                            <h4 class="mb-1"><strong>Order Summary</strong></h4>
                        </div>
                        <hr class="divider-1 divider-mod-1">
                        <div class="row ml-2 mt-3 justify-content-start">
                            <div class="col-2 mr-4">Subtotal:</div>
                            <div class="col-3 price-sum mr-5"><b>$SUBTOTAL</b></div>
                        </div>
                        <hr class="divider-1 divider-mod-1 mt-3">
        
                        <div class="row ml-2 mt-2 justify-content-center">
                            <a href="checkout.php" class="btn btn-custom-1 btn-custom-trans-2 ml-0 px-5">Proceed to Checkout</a>

                            <!-- <input type="submit" class="btn btn-custom-1 btn-custom-trans-2 ml-0 px-5" value="Proceed to Checkout"> -->
                        </div>
                    </div>
                </div>
                

                
            </div>
            
        </div>
        
    </form>
    
    <footer class="footer mt-auto"  id="footer-mod-1">
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

      
    




    </script>

    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


