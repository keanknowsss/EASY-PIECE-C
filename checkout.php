<?php
session_start();

    require_once('components.php');

    include('connection.php');
    include('function1.php');

    $user_data = check_user($con);


    // check if page is from the cart submit
    if(isset($_POST['submitCart']))
    {
        // check if page has selected values/items
        if(strlen($_POST['selectedValues'])>0)
        {
            $selectedItems =  $_POST['selectedValues'];
            $selectedItemsArray = explode(",",$selectedItems);


            if(count($selectedItemsArray)>0)
            {
            }
            else
            {
                header("location: cart.php");
            }
        }
        else
        {
            header("location: cart.php");

        }
    }
    else
    {
        header("location: cart.php");
    }
     
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | EASY PIECE C</title>

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
   

    <form action="checkout-process.php" method="post">
        <div class="content-bg some-container container-fluid pb-4 content-1" id="profileCustom" >
            <div class="row justify-content-center pt-3 mb-5 pb-5 add-padding content-1">
                <div class="container-fluid col-lg-7 col-md 8 col-sm-12 mr-0 list-cart content-1">
                    <div class="row mt-2">
                        <h1 class="title-cart">CHECKOUT</h1>
                    </div>
                    <hr class="divider-1 divider-mod-4 divider-mod-5 mt-0">
                    

                    <?php 
                        $total = 0;
                        $shipping = rand(20,50);

                        for($i = 0; $i<count($selectedItemsArray); $i++)
                        {
                            $cart = itemsinCart(createCart($con), $selectedItemsArray[$i], $con);

                            $item_data = getProduct($cart['item_id'], $con);
                            $business = getBusiness($item_data['business_id'], $con);


                            $total += ($cart['qty']*$item_data['item_price']);

                            //item card
                            echo '
                            <div class="row column-card mt-2 pb-4">
                            <div class="order-card container-fluid pb-3">
                                <div class="row-business-name row justify-content-between mr-1">
                                    <p>Sold by: <a href="#" class="link-black-none">'.$business['BusinessName'].'</a> <p><a href="cart-remove.php?cartid='.$cart['cart_id'].'">Remove</a></p>
                                </div>
                                <hr class="divider-1 divider-mod-1">
                                    <div class="row row-order-brief container p-0 ml-0 mr-0 pb-4 mb-5">
                                        <div class="col-lg-2">
                                            <div class="row ml-1 mt-1">
                                                <a href="product.php?id='.$cart['item_id'].'" class="link-black-none"><img src="products/'.$item_data['Image'].'" alt="product img"  style="width: 9.5em; height:9em; margin-top: -0.7em; object-fit: cover;"></a>
                                            </div>
                                        </div>
                                        <div class="col-5 d-block">
                                            <a href="product.php?id='.$cart['item_id'].'" class="link-black-none">
                                                <p class="d-block order-item-name">'.$item_data['Name'].'</p>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 d-block ml-3">
                                            <span>&#8369;'.$item_data['item_price'].'</span>
                                        </div>
                                        <div>
                                            <p>Qty:&nbsp;'.$cart['qty'].'</p>
                                        </div>
                                    </div>
                            </div>
                        </div>';
                        }
                        
                        $order_total = $total + $shipping;
                        echo '<input type="hidden" name="idString" value="'.$selectedItems.'">';
                        echo '<input type="hidden" name="total" value="'.number_format($order_total,2).'">';
                        
                    ?>

                    
                </div>
                
                <div class="col-lg-3 col-lg-4 col-sm-12 pt-5 ml-0 mt-4 mb-4 content-1">
                    <div class="p-3 column-card mb-3 margin-mod">
                        <div class="row justify-content-between">
                            <div class="col-10">
                                <h5>Profile Information:</h5>
                                
                            </div>
                            
                            <div class="col">
                                <a href="<?php echo $_SESSION['privilage'] ?>.php">Edit</a>
                            </div>
                        </div>
                        <hr class="divider-1 divider-mod-1 m-0 mb-2">

                        <table class="table-prof">
                            <tr>
                                <td class="profTitle">Name:</td>
                                <td><?php if($_SESSION['privilage']=='customer') {echo $user_data['FullName'];} else {echo $user_data['BusinessName'];}?></td>
                            </tr>
                            <tr>
                                <td class="profTitle">Address:</td>
                                <td ><?php if($_SESSION['privilage']=='customer') {echo $user_data['Addrss'];} else {echo $user_data['BusinessAddress'];}?></td>
                            </tr>
                            <tr>
                                <td class="profTitle"> Phone Number:</td>
                                <td><?php if($_SESSION['privilage']=='customer') {echo $user_data['PhoneNumber'];} else {echo $user_data['BusinessContact'];}?></td>
                            </tr>
                            <tr>
                                <td class="profTitle">Email:</td>
                                <td><?php if($_SESSION['privilage']=='customer') {echo $user_data['Email'];} else {echo $user_data['BusinessEmail'];}?></td>
                            </tr>
                        </table>
        
                    </div>
                    <div class="mt-0 p-3 column-card mb-3">
                        <h4><b>Procurement Option:</b></h4>
                        <div class="radio">
                            <div class="row ml-2 justify-content-center mr-2">
                                <input label="DELIVERY" type="radio" id="delivery-rb" name="procurement" value="delivery" >
                            </div>
                            <div class="row ml-2 justify-content-center mr-2">
                                <input label="WALK-IN" type="radio" id="walkin-rb" name="procurement" value="walkin"checked>
                            </div>
                        </div>
                    </div>
                    <div class="column-card">
                        <div class="row ml-2 mt-4">
                            <h4 class="mb-1"><strong>Order Summary</strong></h4>
                        </div>
                        <hr class="divider-1 divider-mod-1">
                        <div class="row ml-2 mt-3 justify-content-start">
                            <div class="col-2 mr-4">Subtotal:</div>
                            <div class="col-3 price-sum mr-5 ml-3"><b>&#8369;&nbsp;<?php echo number_format($total,2); ?></b></div>
                        </div>
                        <div class="row ml-2 mt-3 justify-content-start">
                            <div class="col-2 mr-4">Shipping Fee(Delivery):</div>
                            <div class="col-3 price-sum mr-5 ml-2"><b>&#8369;&nbsp;<?php echo number_format($shipping,2); ?></b></div>
                        </div>
                        <hr class="divider-1 divider-mod-1 mt-3">
        
                        <div class="row ml-2 mt-3 justify-content-start">
                            <div class="col-2 mr-4">Total</div>
                            <div class="col-3 price-sum mr-5 ml-2"><b>&#8369;&nbsp;<?php echo number_format($order_total,2); ?></b></div>
                        </div>
                        <div class="row ml-2 mt-2 justify-content-center">
                            <a href="#" data-toggle="modal" data-target="#popUP" class="btn btn-custom-1 btn-custom-trans-2 ml-0 px-5">PLACE ORDER NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
            <!-- Modal -->
            <div class="modal fade" id="popUP" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">User Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to place the order?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="submit" class="btn btn-primary" value="OK">
                    </div>
                </div>
                </div>
            </div>
    </form>


      
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


