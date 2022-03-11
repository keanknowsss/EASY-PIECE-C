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
    <title>Business Inventory | EASY PIECE</title>

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
            <div class="content-bg col-lg-10 col-md-9 col-sm-8 col-xs-12">
                <div class="container-pos container-fluid content-1 mb-5">

                    <div class="row column-card mb-4 pt-2 pb-2">
                        <div class="col-6">
                            <h2 class="title-invent"><?php echo $user_data['BusinessName'];?>'s Items</h2>
                        </div>

                        <div class="col-2">
                            <a href="business-add-items.php">Add Items</a>
                        </div>
                    </div>

                    <?php 
                        $result=getItem_data($con);

                        if (mysqli_num_rows($result)>0)
                        {
                            while($row=mysqli_fetch_assoc($result))
                            {
                                
                                if($row['business_id']==$user_data['business_id'])
                                {

                                    echo '<div class="row column-card mb-3">
                                        <div class="order-card container-fluid mb-5">
                                            <div class="row">
                                                <div class="row-business-name">
                                                    <p><a href="business-edit-items.php?id='.$row['item_id'].'">Edit Item</a>&nbsp;|&nbsp;<a href="#" data-toggle="modal" data-target="#popUP" onclick="moveId('.$row['item_id'].')">Delete Item</a></p>
                                                </div>
                                            </div>

                                            <hr class="divider-1 divider-mod-1">

                                            <div class="row container-fluid pb-4">
                                                <div class="row row-order-brief container pb-2">
                                                    <div class="col-lg-2 pb-1">
                                                        <div class="row pb-4">
                                                            <a href="product.php?id='.$row['item_id'].'" class="link-black-none">
                                                            <img src="products/'.$row['Image'].'" alt="product img" class="" style="width: 9.5em; height:9em; margin-top: -0.7em; object-fit: cover;">
                                                            </a>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-5 d-block">
                                                        <a href="product.php?id='.$row['item_id'].'" class="link-black-none">
                                                            <p class="order-item-name">'.$row['Name'].'</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-1 d-block">
                                                        <span>&#8369;&nbsp;'.number_format($row['item_price'],2).'</span>
                                                    </div>
                                                    <div class="col">
                                                        <span>Qty: '.$row['Qty'].'</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>';
                                }
                            }
                        }
                        else
                        {
                           
                        }
                        
            

                    ?>

                    
                </div>
                    
                
                    
            </div>

               
                
            </div>

            <footer class="footer" id="footer-mod-2">
                <hr class="footer-line">

                <div class="links">
                <ul>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="termsOfUse.php">Terms of Use</a></li>
                <li><a href="privacyPolicy.php">Privacy Policy</a></li>
                <li><a href="FAQ.php">Frequently Asked Questions</a></li>
            </ul>
                    
                </div>

                <p class="footer-text">COPYRIGHT ©2022 | All Rights Reserved</p>
            </footer>

        </div>
        
    </div>
      
    <!-- Modal -->
    
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




    <script>
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


