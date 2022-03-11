<?php
session_start();

    require_once('components.php');


    include('connection.php');
    include('function1.php');
    

    $user_data = check_user($con);


    if(!isset($_GET['id']))
    {
        header("location: business-inventory.php");
    }
    
    $item = getProduct($_GET['id'], $con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit ITEMS | Business Inventory</title>

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


    <div class="container-fluid profile-pos pb-4 content-1">
        
        <div class="row content-1">
            <div class="col-buttons col-lg-2 col-md-3 col-sm-4 col-xs-2">
                <ul>
                    <li>
                        <h2><a href="business.php"  class="profile-button-unselected">PROFILE</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-order.php" class="profile-button-unselected">ORDERS</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-inventory.php" class="profile-button-selected">INVENTORY</a></h2>
                    </li>
                    <li>
                        <h2><a href="business-transactions.php" class="profile-button-unselected">TRANSACTION</a></h2>
                    </li>
                </ul>
            </div>
            <div class="content-bg col-lg-10 col-md-9 col-sm-8 col-xs-12" >
                <div class="container-pos container-fluid content-1">
                    <div class="row add-item-box column-card px-5 mb-5 py-5">
                       <form action="business-edit-items-process.php" method="post"  enctype="multipart/form-data"> 
                            <div class="row px-5 justify-content-center">
                                
                                <div class="col-lg-5 col-md-4 mt-4">
                                    <div class="img-with-add-file mb-0">
                                        <div class="row">
                                            <div class="image-preview">
                                                <img src="products/<?php echo $item['Image'] ?>" alt="displayImg" class="placeholder-img mb-2" id="displayImg">
                                            </div>
                                        </div>
                                        <div class="row file-up">
                                            <div class="input-img ml-5">
                                                <label for="inputImg" id="link-for-img" class="btn btn-custom-1 btn-custom-trans-1">Upload Image</label>
                                                <input type="file" name="image" id="inputImg" accept="image/png, image/gif, image/jpeg" value="<?php echo $item['Image'] ?>">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-12 p-1 pt-3">
                                    <div class="row">
                                        <label for="itemPrice" class="mt-1 addlabel" >Item Price:&nbsp;</label>
                                        <input type="number" name="itemPrice" min="0.00" step=".01" class="no-Arrow addItem addPrice" value="<?php echo $item['item_price'] ?>" required>
                                    </div>
                                    

                                    <div class="row mt-2 justify-content-start">
                                        <label for="itemQuantity" class="mt-1 addlabel qtyLbl">Item Quantity:&nbsp;</label>
                                        <input type="number" name="itemQuantity" min="1" class="addItem addPrice" value="<?php echo $item['Qty'] ?>" required>
                                    </div>

                                    <div class="row mt-2">
                                        <label for="itemName" class="mt-1 addlabel">Item Name:&nbsp;</label>
                                        <input type="text" name="itemName" class="addItem" value="<?php echo $item['Name'] ?>" required>
                                    </div> 

                                    <div class="row mt-2">
                                        <label for="brandName" class="mt-1 addlabel">Brand Name:&nbsp;</label>
                                        <input type="text" name="brandName" class="addItem" value="<?php echo $item['BrandName'] ?>" required> 
                                    </div>

                                    <div class="row mt-2">
                                        <label for="category" class="addlabel">Category:&nbsp;</label>
                                        <select name="category" class="addItem add-select-box" value="categories" id="addCat">
                                            <option value="none" class="placeholder">Categories</option>
                                            <option value="Processor">Processor</option>
                                            <option value="Graphics Card">Graphics Card</option>
                                            <option value="Memory">Memory</option>
                                            <option value="Storage">Storage</option>
                                            <option value="Power Supply">Power Supply</option>
                                            <option value="Motherboard">Motherboard</option>
                                            <option value="Case">Case</option>
                                            <option value="Monitor">Monitor</option>
                                            <option value="Keyboard">Keyboard</option>
                                            <option value="Mouse">Mouse</option>
                                            <option value="Headset">Headset</option>
                                            <option value="Webcam">Webcam</option>
                                            <option value="Desktop">Pre-built Desktop</option>
                                            <option value="Laptop">Laptop</option>
                                            <option value="Cooling Fans">Cooling Fans</option>
                                            <option value="Interface Cards">Interface Cards</option>
                                            <option value="Softwares">Softwares</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>


                                    <div class="row mt-2">
                                        <label for="delivery-mode" class="mt-1 ml-0 addlabel mb-2">Delivery Mode:&nbsp;</label>
                                        <ul class="list-group list-group-horizontal addDeliver" >
                                            <li class="list-group-item addDeliver p-0 pt-3 mr-3">
                                                <input type="checkbox" name="delivery" class="mr-2 ml-0" <?php if($item['ForDelivery']=='1'){echo "checked";} ?>>Delivery                                                   
                                            </li>
                                            <li class="list-group-item addDeliver p-0 pt-3"><input type="checkbox" name="walkIn" style="font-size: 2rem;" class="mr-2" id="" 
                                            <?php if($item['ForWalkin']=='1'){echo "checked";} ?>>Walk-in Service</li>
                                        </ul>
                                    </div>

                                    <div class="row mt-2" id="desc-add">
                                        <label for="description" class="mt-1 addlabel">Description:&nbsp;</label>
                                        <textarea name="description" id="" cols="32" rows="2" class="descText" required><?php echo $item['Description']?></textarea>
                                    </div>
                                </div>
                                
                                
                            </div>

                            <div class="row container mt-3 justify-content-lg-end justify-content-md-end justify-content-sm-center">
                                <div class="col-3">
                                    <input type="hidden" name="id" value="<?php echo $item['item_id'] ?>">
                                    <input type="submit" name="submit" value="UPDATE ITEM" class="btn btn-custom-1 btn-add" style="margin: 0;">
                                </div>
                                <div class="col-4">
                                    <a href="#" href="#" data-toggle="modal" data-target="#popUP" onclick="moveId(<?php echo $item['item_id'] ?>)" class="btn btn-custom-1 btn-add" style="background: gray; margin:0;">Remove Item</a>

                                </div>

                            </div>
                        </form>
                    </div>
                    
                </div>
                    
                
                    
            </div>

               
                
            </div>

            <footer class="footer  footer-mod-2" id="footer-mod-2">
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
      

    <form action="business-inventory-delete.php" method="post">
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
                            Are you sure you want to Remove the Item?
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="modalVal" id="modalVal" value="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="OK">
                        </div>
                    </div>
                    </div>
                </div>
            </form>



    
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

        function moveId(id)
        {
            document.getElementById("modalVal").value = id;
        }
    </script>



    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


