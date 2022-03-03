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
    <title>Add ITEMS | Business Inventory</title>

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
            <ul id = "navbar-nav" style="display:none;">
                <li class="nav-item"><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                <li class="nav-item"><a href="" style=letter-spacing:1px;><i class="fa fa-user"></i>&nbsp;&nbsp;Welcome User</a></li>
            </ul>
        </nav>
        
    </nav>

    <div class="second-nav">
        <ul>
            <li><a href="">Browse Computer Parts</a></li>
            <li><a href="">PC Builder</a></li>
        </ul>
    </div>  
   
    <div class="container-fluid profile-pos pb-4">
        
        <div class="row gx-5">
            <div class="col-buttons col-lg-2 col-md-3 col-sm-4 col-xs-2 justify-content-center align-items-center">
                <ul>
                    <li>
                        <h2><a href="business.php"  class="profile-button-unselected">PROFILE</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-order.php" class="profile-button-unselected">ORDERS</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-inventory.php" class="profile-button-selected" style="font-size:2rem;">INVENTORY</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-transactions.php" class="profile-button-unselected massive-mb" id="btn-transaction">TRANSACTION</a></h2>
                    </li>
                </ul>
            </div>
            <div class="content-bg col-lg-10 col-md-9 col-sm-8 col-xs-12">
                <div class="container-pos container-fluid  mb-3">
                    <div class="row add-item-box column-card px-5 py-5">
                        <form action="">
                            <div class="row px-5 justify-content-around">
                                
                                <div class="col-lg-3 col-md-4 mt-4">
                                    <div class="img-with-add-file mb-0">
                                        <img src="items/placeholder-image.png" alt="" class="add-item-pic mb-2" id="displayImg">
                                        <div class="input-img ml-2">
                                            <label for="inputImg" id="link-for-img" class="btn btn-custom-1 btn-custom-trans-1">Upload Image</label>
                                            <input type="file" name="productImg" id="inputImg" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-12 p-1 pt-3">
                                    <div class="row">
                                        <label for="itemPrice" class="mt-1 addlabel">Item Price:&nbsp;</label>
                                        <input type="number" name="itemPrice" min="0.00" class="no-Arrow addItem addPrice" placeholder="0.00" required>
                                    </div>
                                    

                                    <div class="row mt-2 justify-content-start">
                                        <label for="itemQuantity" class="mt-1 addlabel qtyLbl">Item Quantity:&nbsp;</label>
                                        <input type="number" name="itemQuantity" min="1" class="addItem addPrice" value="1" required>
                                    </div>

                                    <div class="row mt-2">
                                        <label for="itemName" class="mt-1 addlabel">Item Name:&nbsp;</label>
                                        <input type="text" name="itemName" class="addItem" placeholder="Please Input Name of Item" required>
                                    </div> 

                                    <div class="row mt-2">
                                        <label for="brandName" class="mt-1 addlabel">Brand Name:&nbsp;</label>
                                        <input type="text" name="brandName" class="addItem" placeholder="Please Input Brand of Item" required> 
                                    </div>

                                    <div class="row mt-2">
                                        <label for="category" class="addlabel">Category:&nbsp;</label>
                                        <select name="category" class="addItem add-select-box" value="categories" id="addCat">
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


                                    <div class="row mt-2">
                                        <label for="delivery-mode" class="mt-1 ml-0 addlabel mb-2">Delivery Mode:&nbsp;</label>
                                        <ul class="list-group list-group-horizontal addDeliver" >
                                            <li class="list-group-item addDeliver p-0 pt-3 mr-3">
                                                <input type="checkbox" name="delivery" class="mr-2 ml-0">Delivery                                                   
                                            </li>
                                            <li class="list-group-item addDeliver p-0 pt-3"><input type="checkbox" name="walkIn" style="font-size: 2rem;" class="mr-2" id="">Walk-in Service</li>
                                        </ul>
                                    </div>

                                    <div class="row mt-2" id="desc-add">
                                        <label for="description" class="mt-1 addlabel">Description:&nbsp;</label>
                                        <textarea name="description" id="" cols="32" rows="2" class="descText"  placeholder="Some Item Description . . ." required></textarea>
                                    </div>
                                </div>
                                
                                
                            </div>

                            <div class="row container mt-3 justify-content-lg-end justify-content-md-end justify-content-sm-center">
                                <input type="submit" value="ADD ITEM" class="btn btn-custom-1  btn-add">
                            </div>
                        </form>
                    </div>
                    
                </div>
                    
                
                    
            </div>

               
                
            </div>
        </div>
    </div>
      
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



    
    <!-- Main Script -->
    <script src="jquery-latest.min.js"></script>

    <script>
        $(function(){
            $("#inputImg").change(function(event){
                // Act on Event
                var x = URL.createObjectURL(event.target.files[0]);
                $("#displayImg").attr("src", x);
                console.log(event);
            }); 
        })
    </script>



    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


