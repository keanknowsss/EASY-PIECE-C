<?php 
session_start();

    require_once('components.php');

    include('connection.php');
    include('function1.php');

    if (isset($_SESSION['privilage']))
    {
        $user_data = check_user($con);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Description | EASY PIECE C</title>

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
        switch($_SESSION['privilage'])
        {
            case "customer":
                withAcc_mainNavbar($_SESSION['privilage'], $user_data['FullName']);
                break;
            case "business":
                withAcc_mainNavbar($_SESSION['privilage'], $user_data['BusinessName']);
                break;
        }
    }
    else if (!(isset($_SESSION['privilage'])))
    {
        noAcc_mainNavbar();

    }
    second_Nav(); 

    ?>

   

    <div class="some-container content-bg container-fluid pb-4" id="profileCustom">
        <div class="row container-fluid justify-content-center pt-5 mb-5 ">
            <div class="column-card container-fluid col-lg-8 col-md-8 col-sm-12 mr-3">
                <form action="">
                    <div class="row ml-3 mr-2 mt-4 mb-5 justify-content-around">
                        <img src="items/placeholder-image.png" class="img-product-display" alt="">
                        <div class="display-product col-lg-7 col-md-7 col-sm-12 mt-2">
                            <div class="row">
                                <h2 class="display-product-name pr-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore, maiores.</h2>
                            </div>
                            <div class="row ml-1 mt-2 some-product-text">
                                <p><b>Brand:</b>&nbsp;$BRAND_NAME <div class="ml-5"><b>Category:</b>&nbsp;$CATEGORY</div></p>
                            </div>
                            <hr class="divider-1 divider-mod-1 mt-1">
                            <div class="row mt-3 ml-1">
                                <h3 class="product-price"><strong>₱$PRODUCT_PRICE</strong></h3>
                                <strike class="mt-2 ml-3">$PREVIOUS_PRICE</strike>
                            </div>
                            <hr class="divider-1 divider-mod-1 mt-3">
                    
                            <div class="row ml-1 mt-4">
                                <div class="inc-qty">
                                    <label for="quantity">Quantity:</label>
                                    <input type="button" class="btn-custom-1 btn-increment rounded" value="-" onclick="decrement(document.getElementById('qty'))">
                                    <input type="number" value="1" name="quantity" MIN="1" id="qty" class="no-Arrow addItem no-mx inQty rounded">
                                    <input type="button" class="btn-custom-1 btn-increment rounded" value="+" onclick="increment(document.getElementById('qty'))">
                                </div>
                            </div>

                            <div class="row ml-1">
                                <input type="submit" value=" Add to Cart" class="mt-4 btn-custom-1 btn-custom-trans-1 add-to-cart">
                            </div>

                            <hr class="divider-1 divider-mod-3 mt-3">
                            <div class="row ml-1 mt-1">
                                <span class="desc-dis">Description</span> 

                            </div>

                            <div class="row ml-1 mb-3">
                                <span> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae molestias harum consequatur. Repellendus, quidem neque debitis nostrum, recusandae aliquid quas, nisi laudantium atque sequi laborum.</span>
                            </div>

                            <hr class="divider-1 divider-mod-3 mt-3">

                        </div>
                    </div>
                </form>

            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 content-1">
                <div class="column-card">
                    <div class="row ml-2 mt-2">
                        <h4 class="mb-1"><strong>Delivery Options Available:</strong></h4>
                    </div>

                    <div class="row ml-2 mt-2 justify-content-center">
                        <ul class="list-inline mr-5">
                            <li class="border list-inline-item px-4 py-2" id="delivery">Delivery</li>
                            <li class="border list-inline-item px-4 py-2" id="walk-in">Walk-in</li>
                        </ul>
                    </div>
                    <hr class="divider-1 divider-mod-1">
                    
                    <div class="row ml-2 mt-3">
                        <h5><strong>Owned by:</strong></h5>
                    </div>
                    <div class="row ml-2">
                        <p>$BUSINESS_NAME</p>
                    </div>
                    <div class="row ml-2 mt-4">
                        <h5><strong>Seller's Address:</strong></h5>
                    </div>
                    <div class="row ml-2">
                        <p>$BUSINESS_ADDRESS</p>
                    </div>
                    <hr class="mt-2 divider-1 divider-mod-1">

                    <div class="row ml-2 justify-content-center">
                        <a href="" class="btn btn-custom-1 btn-custom-trans-2 ml-0 px-5">Visit Store</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>

      
    <footer class="footer mt-auto" id="footer-mod-3">
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


