<?php
session_start();

    require_once('components.php');

    include('connection.php');
    include('function1.php');

    $user_data = check_user($con);
    

    switch($_SESSION['privilage'])
    {
        case "customer":
            $id = $_SESSION['user_id'];
            break;
        case "business":
            $id = $_SESSION['business_id'];
            break;
    }

    $cart =  getCart(createCart($con), $con);

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

                    <?php 
                        // echo <input type="hidden" name="">

                        if (mysqli_num_rows($cart)>0)
                        {
                            while($row=mysqli_fetch_assoc($cart))
                            {
                                $item_cart = getProduct($row['item_id'], $con);
                                $business = getBusiness($item_cart['business_id'], $con);

                                cartCard($business['BusinessName'], $row['cart_id'], $row['item_id'],$item_cart['Name'], $item_cart['item_price'], $row['qty'], $item_cart['Image']);
                                // $_SESSION['invent_id'][$i] = $row['item_id'];
                            }
                        }
                        else
                        {
                            echo '<p class="msg-none" style="font-size: 3em;"><strong>NO ITEMS IN CART</strong></p>';
                        }

                    ?>
                
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
                            <!-- <a href="checkout.php" class="btn btn-custom-1 btn-custom-trans-2 ml-0 px-5">Proceed to Checkout</a> -->

                            <input type="submit" class="btn btn-custom-1 btn-custom-trans-2 ml-0 px-5" value="Proceed to Checkout">
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


