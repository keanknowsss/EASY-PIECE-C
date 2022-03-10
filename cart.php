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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 


    
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
   

    <form action="checkout.php" method="post">
        <div id="main-cont" class="content-bg some-container container-fluid pb-4 content-1" id="profileCustom" >
            <div class="row pt-3 mb-5 pb-5 add-padding content-1">
                <div class="container-fluid col-lg-8 col-md 8 col-sm-12 mr-0 list-cart">
                    <div class="row mt-2">
                        <h1 class="title-cart">MY CART <i class="fa fa-shopping-cart" style="font-size:3.5rem"></i></h1>
                    </div>
                    <hr class="divider-1 divider-mod-4 divider-mod-5">

                    <?php 

                        if (mysqli_num_rows($cart)>0)
                        {
                            $check_id = array();

                            while($row=mysqli_fetch_assoc($cart))
                            {
                                $item_cart = getProduct($row['item_id'], $con);
                                $business = getBusiness($item_cart['business_id'], $con);

                                echo '<div class="row column-card mb-3">
                                        <div class="order-card container-fluid">
                                            <div class="row justify-content-between ml-2 mr-2">
                                                    <p>Sold by: <a href="#" class="link-black-none">'.$business['BusinessName'].'</a> <p><a href="cart-remove.php?cartid='.$row['cart_id'].'">Remove</a></p>
                                            </div>
                                                <hr class="divider-1 divider-mod-1">
                                                    <div class="row container-fluid pb-5">
                                                        <div class="row row-order-brief container">
                                                            <div class="col-lg-2">
                                                                <div class="row">
                                                                    <input type="checkbox" name="item[]" id="" class="mr-3 mt-5" onchange="showValue('.$row['cart_id'].', '.$item_cart['item_price'].', '.$row['qty'].', '.$item_cart['ForDelivery'].','.$item_cart['ForWalkin'].')">
                                                                    <a href="product.php?id='.$row['item_id'].'" class="link-black-none"><img src="products/'.$item_cart['Image'].'" alt="product img" class="" style="width: 9.5em; height:9em; margin-top: -0.7em; object-fit: cover;"></a>
                                                                </div>
                                                            </div>

                                                            <div class="col-5 d-block ml-4">
                                                                <a href="product.php?id='.$row['item_id'].'" class="link-black-none">
                                                                    <p class="order-item-name">'.$item_cart['Name'].'</p>
                                                                </a>
                                                            </div>
                                                        <div class="col-1 d-block">
                                                            <span>&#8369;'.$item_cart['item_price'].'</span>
                                                        </div>
                                                        <div class="col">
                                                            <label for="quantity">Quantity:</label><br>
                                                                <input type="number" value="'.$row['qty'].'" name="quantity" MIN="1" id="qty-'.$row['cart_id'].'" class="addItem inQty-widthMAX no-mx inQty rounded">
                                                                <input type="button" name="update" value="Update" class="updateBtn btn btn-secondary ml-2 py-0 mb-1  row" id="'.$row['cart_id'].'">
                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>';


                                if(!(in_array($row['cart_id'], $check_id)))
                                {
                                    array_push($check_id, $row['cart_id']);
                                }
                                
                            }
                        }
                        else
                        {
                            echo '<p class="msg-none" style="font-size: 3em;"><strong>NO ITEMS IN CART</strong></p>';
                        }

                        
                        echo '<input type="hidden" id="selectedValues" name="selectedValues" >';

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

                        <div class="row ml-2 mt-0 text-danger" id="num_items">
                        </div>

                        <div class="row ml-2 mt-4">
                            <h4 class="mb-1"><strong>Order Summary</strong></h4>
                        </div>
                        <hr class="divider-1 divider-mod-1">
                        <div class="row ml-2 mt-3 justify-content-start">
                            <div class="col-2 mr-4">Subtotal:</div>
                            <div class="col-3 mr-5"><b id ="price-sum">&#8369;&nbsp;0.00</b></div>
                        </div>
                        <hr class="divider-1 divider-mod-1 mt-3">
        
                        <div class="row ml-2 mt-2 justify-content-center">
                            <!-- <a href="checkout.php" class="btn btn-custom-1 btn-custom-trans-2 ml-0 px-5">Proceed to Checkout</a> -->

                            <input type="submit" name="submitCart" class="btn btn-custom-1 btn-custom-trans-2 ml-0 px-5" value="Proceed to Checkout">
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

      
    
    <script>
        var cart_id = [];
        var subtotal= 0;

        // counts how many item offer the following
        var delivery = 0;
        var walkin = 0;
        
        // to be concatenated laters
        var msg_delivery = "";
        var msg_walkin = "";



        function showValue(id, price, qty, check_deliver, check_walkin)
        {
            // if item is not checked
            if(!cart_id.includes(id))
            {
                subtotal += (qty*price);
                cart_id.push(id);

                if (check_deliver==1)
                {
                    delivery +=1;
                }

                if (check_walkin==1)
                {
                    walkin +=1;
                }
            }
            // item already exists in array
            else
            {
                // remove item from array
                for (var i = 0; i < cart_id.length; i++)
                {
                    if(cart_id[i] === id)
                    {
                        cart_id.splice(i, 1);
                    }
                }
                subtotal -= (qty*price);

                //
                if (check_deliver==1)
                {
                    delivery -=1;
                }

                if (check_walkin==1)
                {
                    walkin -=1;
                }
            }

            // check if the delivery/walkin is enough for all items
            if (delivery > 0)
            {
                var x = cart_id.length - delivery;
                if (x==0)
                {
                    document.getElementById("delivery").style.background = "lawngreen";
                }
                else
                {
                    msg_delivery = "There are&nbsp;" + x + "&nbsp;not available for delivery";
                }
            }
            else
            {
                document.getElementById("delivery").style.background = "none";
            }

            if (walkin > 0)
            {
                var y = cart_id.length - walkin;
                if (y==0)
                {
                    document.getElementById("walk-in").style.background = "lawngreen";
                }
                else
                {
                    if (y>1)
                    {
                        msg_walkin = "There are&nbsp;" + y + "&nbsp;items not available for walk in";
                    }
                    else
                    {
                        msg_walkin = "There is&nbsp;" + y + "&nbsp;item not available for walk in";
                    }
                }
            }
            else
            {
                document.getElementById("walk-in").style.background = "none";
            }

            // update values within page

            if(cart_id.length==0)
            {
                document.getElementById("num_items").innerHTML = "";
            }
            else
            {
            document.getElementById("num_items").innerHTML = msg_delivery + "&nbsp;" + msg_walkin;

            }
            document.getElementById("price-sum").innerHTML = "&#8369;&nbsp;" + subtotal.toFixed(2);
            document.getElementById("selectedValues").value = cart_id;
        }


        $(document).ready(function(){
            $(".updateBtn").click(function(){
                var id = $(this).attr("id");
                var qty = $("#qty-"+id).val();
                $.ajax({
                    url: "cart-updateQty.php",
                    method: "POST",
                    data: {
                        Quantity: qty,
                        CartId: id
                    },
                    success: function()
                    {
                        location.reload();
                    }
                    
                    
                });
            });
        });

    </script>

    <!-- JavaScript Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


