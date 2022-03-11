<?php 
session_start();

    require_once('components.php');

    include('connection.php');
    include('function1.php');

    switch($_SESSION['privilage'])
    {
        case "customer":
            $user = getCustomer($_SESSION['user_id'], $con);
            break;
        case "business":
            $user = getBusiness($_SESSION['business_id'], $con);
            break;
    }


    if(isset($_GET['orderid']))
    {
        $order_table = createOrder($con);
        $order_id = $_GET['orderid'];
        
        $sql = "SELECT * FROM $order_table WHERE order_placement_id = '$order_id' LIMIT 1";

        $sample = mysqli_fetch_assoc(mysqli_query($con, $sql));

        $order_method = $sample['procurement'];

    }
    else
    {
        header("location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details | EASY PIECE C</title>

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
                withAcc_mainNavbar($_SESSION['privilage'], $user['FullName']);
                break;
            case "business":
                withAcc_mainNavbar($_SESSION['privilage'], $user['BusinessName']);
                break;
            default:
                header("Location:main-page.html");
        }
    }
    
    second_Nav(); 


    ?>
            

    <div class="main-content some-container container-fluid pb-4 ">
        <div class="row justify-content-center pt-3 mb-5 pb-5">
            <div class="container-fluid col-lg-12 col-md 12 col-sm-12" style="height:100vh">
               <div class="row justify-content-center">
                   <div class="col-8 test m-5 py-5 shadow p-3 mb-5 bg-white rounded" id="contentpt2">
                        <div class="row justify-content-center"><h1 class="browse-title"><strong>ORDER INFORMATION</strong></h1></div>   
                        <div class="row justify-content-center">
                            <div class="hr-title rounded-pill"></div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <b>ORDER NUMBER: <?php echo $order_id ?></b><span>&nbsp;</span><br>
                                <b>ORDER METHOD: <?php echo $order_method ?></b><span>&nbsp;</span>

                            </div>
                        </div>

                        <div class="row justify-content-center mt-5">
                            <div class="col-5 ">
                                <b>NAME: </b><span><?php if($_SESSION['privilage']=="customer"){ echo $user['FullName']; } else{ echo $user['BusinessName']; } ?></span><br>

                            </div>
                            <div class="col-5 ">
                                <b>CONTACT NUMBER: </b><span><?php if($_SESSION['privilage']=="customer"){ echo $user['PhoneNumber']; } else{ echo $user['BusinessContact']; } ?></span>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-1">
                            <div class="col-5">
                                <b>ADDRESS: </b><span><?php if($_SESSION['privilage']=="customer"){ echo $user['Addrss']; } else{ echo $user['BusinessAddress']; } ?></span>
                            </div>
                            <div class="col-5">
                                <b>EMAIL: </b><span><?php if($_SESSION['privilage']=="customer"){ echo $user['Email']; } else{ echo $user['BusinessEmail']; } ?></span>
                            </div>
                        </div>
                        <div class="row test justify-content-center mt-5">
                                <b>ITEMS ORDERED</b><br>
                        </div>

                        <?php
                            $sql = "SELECT * FROM $order_table WHERE order_placement_id = '$order_id'";
                            $result = mysqli_query($con, $sql);
                            
                            while($row = mysqli_fetch_assoc($result))
                            {
                                
                                $item = getProduct($row['item_id'], $con);

                                echo '<div class="row justify-content-center mt-3">
                                <div class="col-md-5">
                                    <b>Item Name: </b><span>'.$item['Name'].'</span>
                                </div>
                                <div class="col-2">
                                    <b>QTY: </b><span>'.$row['qty'].'</span>
                                </div>
                                <div class="col-3">
                                    <b>PRICE:&nbsp;</b><span>&#8369;&nbsp;'.$row['qty']*$item['item_price'].'</span>
                                </div>
    
                            </div>';
                            }

                        ?>
                        

                        <hr class="divider-1 divider-mod-1 mt-2">

                        <div class="row justify-content-center mt-5">
                            <div class="col-3">
                                <b>SUBTOTAL: </b><br>

                            </div>
                            <div class="col-3">
                                <b></b><span><span>&#8369;&nbsp;<?php echo number_format($sample['total']-$sample['shipping_fee'],2) ?></span></span>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-1">
                            <div class="col-3">
                                <b>SHIPPING FEE: </b><span>&nbsp;</span><br>

                            </div>
                            <div class="col-3">
                                <span>&#8369;&nbsp;<?php echo number_format($sample['shipping_fee'],2) ?></span>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-5">
                            <div class="col-3">
                                <b>TOTAL: </b><br>

                            </div>
                            <div class="col-3">
                            <span>&#8369;&nbsp;<?php echo number_format($sample['total'],2) ?></span>
                            </div>
                        </div>


                        <div class="row justify-content-center mt-5">
                        <a href="index.php" class="btn btn-warning justify-align-center">Browse More Products</a>
                        </div>
                        <div class="row justify-align-center">
                        
                            

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




    </script>

    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


