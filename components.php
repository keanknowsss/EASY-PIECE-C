<?php


    function withAcc_mainNavbar($privilege, $name)
    {
        $x = "<nav class=\"navbar navbar-expand-lg fixed-top container-nav\">
        <div class=\"logo col-lg-3\" >
            <a class=\"navbar-brand\" href=\"index.php\" ><img class=\"logo-link\" src=\"images/logo.png\" alt=\"Home\" ></a>

        </div>


        <div class=\"justify-content-around form-inline mr-5\">
            <form class=\" my-2 my-lg-0\" action=\"search.php\" method=\"get\">
                <div class=\"search-box\">
                    <input type=\"search\" name=\"search\"  class=\"search\" placeholder=\"Search Computer Components and Peripherals\">
                    <a href=\"index.html\">
                        <img src=\"images/Icons/search.png\" class = \"search-icon\">
                    </a>
                </div>
                
            </form>
            

            <select name=\"categories\" class=\"categories\" value=\"categories\" onchange=\"javascript:searchCategory(this)\">
                <option value=\"none\" class=\"placeholder\">Categories</option>
                <option value=\"processor\">Processor</option>
                <option value=\"gpu\">Graphics Card</option>
                <option value=\"memory\">Memory</option>
                <option value=\"storage\">Storage</option>
                <option value=\"powersupply\">Power Supply</option>
                <option value=\"motherboard\">Motherboard</option>
                <option value=\"case\">Case</option>
                <option value=\"monitor\">Monitor</option>
                <option value=\"keyboard\">Keyboard</option>
                <option value=\"mouse\">Mouse</option>
                <option value=\"headset\">Headset</option>
                <option value=\"webcam\">Webcam</option>
                <option value=\"desktop\">Pre-built Desktop</option>
                <option value=\"laptop\">Laptop</option>
                <option value=\"fans\">Cooling Fans</option>
                <option value=\"nic\">Interface Cards</option>
                <option value=\"software\">Softwares</option>
                <option value=\"others\">Others</option>
            </select>
        </div>
        

        <nav class=\"navbar-collapse justify-content-end mt-3 ml-5\" id=\"guest\">
            <ul id = \"navbar-nav-user\">
               
                <li class=\"nav-item\"><a href=\"cart.php\"><i class=\"fa fa-shopping-cart\"></i></a></li>
                <li class=\"nav-item\"><a href=\"$privilege.php\" style=letter-spacing:1px;><i class=\"fa fa-user\"></i>&nbsp;&nbsp;Welcome, $name  </a></li>
            </ul>
        </nav>
        
    </nav>";
    echo $x;
    }


    function noAcc_mainNavbar()
    {
        $x = '<nav class="navbar navbar-expand-lg fixed-top container-nav">
        <div class="logo col-lg-3" >
            <a class="navbar-brand" href="index.php" ><img class="logo-link" src="images/logo.png" alt="Home" ></a>

        </div>


        <div class="justify-content-around form-inline mr-5">
            <form class=" my-2 my-lg-0" action="search.php" method="get">
                <div class="search-box ">
                    <input type="search" name="search"  class="search" placeholder="Search Computer Components and Peripherals">
                    <a href="index.html">
                        <img src="images/Icons/search.png" class = "search-icon">
                    </a>
                </div>
                
            </form>
            

            <select name="categories" class="categories" value="categories" onchange="javascript:searchCategory(this)">
                <option value="none" class="placeholder">Categories</option>
                <option value="processor">Processor</option>
                <option value="gpu">Graphics Card</option>
                <option value="memory">Memory</option>
                <option value="storage">Storage</option>
                <option value="powersupply">Power Supply</option>
                <option value="motherboard">Motherboard</option>
                <option value="case">Case</option>
                <option value="monitor">Monitor</option>
                <option value="keyboard">Keyboard</option>
                <option value="mouse">Mouse</option>
                <option value="headset">Headset</option>
                <option value="webcam">Webcam</option>
                <option value="desktop">Pre-built Desktop</option>
                <option value="laptop">Laptop</option>
                <option value="fans">Cooling Fans</option>
                <option value="nic">Interface Cards</option>
                <option value="software">Softwares</option>
                <option value="others">Others</option>
            </select>
        </div>
        

        <nav class="navbar-collapse justify-content-end mt-3 ml-5" id="guest">
            <ul id = "navbar-nav">
                <li class="nav-item"><a href="login.php">Login</a></li>
                <li class="nav-item"><a href="regis-main.php">Register</a></li>
            </ul>
        </nav>
        
    </nav> ';
    echo $x;
    }

    function second_Nav() 
    {
        echo '<div class="second-nav">
                <ul>
                    <li><a href="allProducts.php">Browse Computer Parts</a></li>
                    
                </ul>
            </div>';
    }

    function inventoryCard($product_img, $product_name, $product_price, $product_qty)
    {
        $x = "<div class=\"row column-card mb-3\">
        <div class=\"order-card container-fluid mb-5\">
            <div class=\"row\">
                <div class=\"row-business-name\">
                    <p><a href=\"business-edit-items.php\">Edit Item</a>&nbsp;|&nbsp;<a href=\"\">Delete Item</a></p>
                </div>
            </div>

            <hr class=\"divider-1 divider-mod-1\">

            <div class=\"row container-fluid pb-5\">
                <div class=\"row row-order-brief container\">
                    <div class=\"col-lg-2 pb-1\">
                        <div class=\"row pb-4\">
                            <a href=\"\" class=\"link-black-none\">
                            <img src=\"products/$product_img\" alt=\"product img\" class=\"\" style=\"width: 10.5em; height:10em; margin-top: -0.5em; object-fit: cover;\">
                            </a>
                        </div>
                        
                    </div>
                    <div class=\"col-5 d-block\">
                        <a href=\"\" class=\"link-black-none\">
                            <p class=\"order-item-name\">$product_name</p>
                        </a>
                    </div>
                    <div class=\"col-1 d-block\">
                        <span>₱$product_price</span>
                    </div>
                    <div class=\"col\">
                        <span>Qty: $product_qty</span>
                    </div>
                </div>
            </div>

        </div>
    </div>";

    echo $x;
    }


