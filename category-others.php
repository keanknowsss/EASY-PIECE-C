
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
    <title>Other Parts | EASY PIECE C</title>

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

    $result = getItem_data($con);
    $x = mysqli_num_rows($result);

    ?>
            

    <div class="main-content some-container container-fluid pb-4 ">
        <div class="row justify-content-center pt-3 mb-5 pb-5">
            <div class="container-fluid col-lg-12 col-md 12 col-sm-12">
                <div class="row mt-2 justify-content-center">
                    <h1 class="browse-title"><center><strong>OTHER COMPONENTS AND ELECTRONICS</strong></center></h1>
                </div>
                <div class="row justify-content-center">
                    <div class="hr-title rounded-pill"></div>
                </div>

                <?php
                    // need to check if the rows are greater than 5 to avoid getting destroyed
                    while($x>5)
                    {
                        // debug_to_console($row = mysqli_fetch_assoc($result));
                        
                        echo '<div class="row pl-5 pr-5 mb-4 mt-5 justify-content-between">';

                        $i = 0;
                        while($row = mysqli_fetch_assoc($result))
                        {
                            if($row['Category']=="Others")
                            {
                                // debug_to_console($row['item_price']);
                                echo '<a href="product.php?id='.$row['item_id'].'" class="product-card col-lg-2 col-md-4 col-sm-6">
                                            <div class="row justify-content-center pt-3">
                                                <img src="products/'.$row['Image'].'" class="product-img" style="height:11em; width:13em;" alt="">
                                            </div>
                                            <div class="row pl-3 pr-3 mt-2">
                                                <p class="product-name">'.$row['Name'].'<br></p>
                                            </div>
                                            <div class="row pl-3 pr-3 mt-2 mb-2 container">
                                                <h6 class="product-price">&#8369;'.$row['item_price'].'</h6><strike class="mt-1 ml-2 strike-price" style="color:darkgoldenrod">&#8369;69.00</strike>
                                            </div>
                                        </a>';

                                $i++;
                                if ($i==5)
                                {
                                    break;
                                }
                            }
                        }

                        echo '</div>';     
                        
                        $x -=5;
                    }

                    ?>
 
            </div>
        </div>
    </div>



      
    <footer class="footer" id="footer-mod-1">
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




    </script>

    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


