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
    <title>FAQ | EASY PIECE C</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- JAVASCRIPT -->
    <script type="text/JavaScript" src="script.js"></script>

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="content-bg">
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
            <div class="container-fluid col-lg-12 col-md 12 col-sm-12" style="height:100vh">
               <div class="row justify-content-center">
                   <div class="col-8 test m-5 py-5 shadow p-3 mb-5 bg-white rounded" id="contentpt2">
                        <div class="row justify-content-center"><h1 class="browse-title"><strong>FAQs</strong></h1></div>   
                        <div class="row justify-content-center">
                            <div class="hr-title rounded-pill"></div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col">
                                <ul class="ml-2">
                                    <li>Data Storage – Data and Information are constantly being updated on the site in order for businesses and customers to know what is happening. </li>
                                    <li>Unverified Business Owners – There is a chance that people will post fake products and items.</li>
                                    <li>Unverified Customers – There are people who might buy items and will not pay for it, or they can use this site to troll businesses.  </li>
                                    <li>Defective Products – Products that are listed are working usually, but there will be times that it can be defective.</li>
                                    <li>Location of the Shop – The address of the customer and the shop can be far apart from each other for walk-ins.</li>
                                    <li>Customer and Shop Communications – The customers will have inquiries about the items that only the shop can answer.</li>
                                    <li>Payment Methods – There are multiple ways a customer can pay either for walk-ins or delivery.</li>

                                </ul>

                                

                            </div>
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


