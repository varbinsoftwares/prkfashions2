<?php

$productcategory1 = [
    array("title"=>"Mens Wear", "link"=>""),
   
];
$productcategory2 = [
    
    array("title"=>"Womens Wear", "link"=>""),
    
];
$productcategory3 = [
    
    array("title"=>"Kids Wear", "link"=>""),
];
?> 
<style>
    .menudescription{
        font-size: 12px;margin-bottom: 10px
    }
</style>
<!-- Primary-menu-wide -->
<div class="d-none d-xl-block bg-primary">
    <div class="container">
        <div class="min-height-45">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--wide u-header__navbar--no-space hs-menu-initialized hs-menu-horizontal">
                <!-- Navigation -->
        
                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                    <ul class="navbar-nav u-header__navbar-nav">

                        <?php
                        foreach ($productcategory1 as $key => $value) {
                            ?>
                            <!-- TV & Audio -->
                            <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                <a id="TVMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="<?php echo $value['link']; ?>" aria-haspopup="true" aria-expanded="false"><?php echo $value['title'] ?></a>

                                <!-- TV & Audio - Mega Menu -->
                                <div class="hs-mega-menu w-100 u-header__sub-menu" aria-labelledby="TVMegaMenu" style="display: none;">
                                    <div class="row u-header__mega-menu-wrapper">

                                        <div class="col-md-4">
                                            <span class="u-header__sub-menu-title">Latest Trend</span>

                                            <p class="menudescription">
                                                Shop from the latest collection of Shirts for men online. Buy shirts, T-shirts, Jeans, Trousers & more at best price
                                            </p>
                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <?php
                                                $menuarray = [
                                                    array("title" => "Shirts", "link" => ""),
                                                    array("title" => "T-shirts", "link" => ""),
                                                    array("title" => "Jeans", "link" => ""),
                                                    array("title" => "Trousers", "link" => ""),
                                                    array("title" => "Jackets", "link" => ""),
                                                    array("title" => "Accessories", "link" => ""),
                                                ];
                                                foreach ($menuarray as $key => $value) {
                                                    ?>
                                                    <li><a href="#" class="nav-link u-header__sub-menu-nav-link"><?php echo $value['title']; ?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                            <span class="u-header__sub-menu-title">Shop By Discount</span>

                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <?php
                                                $menuarray = [
                                                    array("title" => "Upto 25% Off", "link" => ""),
                                                    array("title" => "Upto 50% Off", "link" => ""),
                                                    array("title" => "Upto 60% Off", "link" => ""),
                                                    array("title" => "Upto 80% Off", "link" => ""),
                                                ];
                                                foreach ($menuarray as $key => $value) {
                                                    ?>
                                                    <li><a href="#" class="nav-link u-header__sub-menu-nav-link"><?php echo $value['title']; ?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="u-header__sub-menu-title">Mens Fashion</span>
                                            <p class="menudescription">
                                                Amazing fashion collection by PrkFashions . 
                                            </p>
                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <?php
                                                $menuarray = [
                                                    array("img" => "jeans1.jpg", "link" => ""),
                                                  
                                                 
                                                ];
                                                foreach ($menuarray as $key => $value) {
                                                    ?>
                                                    <li><a href="#" class="d-block mb-3">
                                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/ad-block/<?php echo $value['img']; ?>" alt="Image Description">
                                            </a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>

                                            <span class="u-header__sub-menu-title">Shop By Price</span>

                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <?php
                                                $menuarray = [
                                                    array("title" => "Below Rs. 300", "link" => ""),
                                                    array("title" => "300 - 500", "link" => ""),
                                                    array("title" => "500 - 600", "link" => ""),
                                                    array("title" => "600 and Above", "link" => ""),
                                                ];
                                                foreach ($menuarray as $key => $value) {
                                                    ?>
                                                    <li><a href="#" class="nav-link u-header__sub-menu-nav-link"><?php echo $value['title']; ?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>

                                        </div>
                                       
                                        <div class="col-md-4">

                                            <a href="#" class="d-block mb-3 mt-8">
                                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/ad-block/off.jpg" alt="Image Description">
                                            </a>
                                            <p>
                                                Browse through a wide array of Bracelet Designs crafted with dexterity and buy your favorite from octopuscart jewellery.      
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End TV & Audio - Mega Menu -->
                            </li>
                            <!-- End Pages -->
                            <?php
                        }
                        ?>
                        <?php
                        foreach ($productcategory2 as $key => $value) {
                            ?>
                            <!-- TV & Audio -->
                            <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                <a id="TVMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="<?php echo $value['link']; ?>" aria-haspopup="true" aria-expanded="false"><?php echo $value['title'] ?></a>

                                <!-- TV & Audio - Mega Menu -->
                                <div class="hs-mega-menu w-100 u-header__sub-menu" aria-labelledby="TVMegaMenu" style="display: none;">
                                   
                                </div>
                                <!-- End TV & Audio - Mega Menu -->
                            </li>
                            <!-- End Pages -->
                            <?php
                        }
                        ?>
                        <?php
                        foreach ($productcategory3 as $key => $value) {
                            ?>
                            <!-- TV & Audio -->
                            <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                <a id="TVMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="<?php echo $value['link']; ?>" aria-haspopup="true" aria-expanded="false"><?php echo $value['title'] ?></a>

                                <!-- TV & Audio - Mega Menu -->
                               
                                <!-- End TV & Audio - Mega Menu -->
                            </li>
                            <!-- End Pages -->
                            <?php
                        }
                        ?>
                        <!-- End Movies & Games -->
                    </ul>
                </div>
                <!-- End Navigation -->
            </nav>
            <!-- End Nav -->
        </div>
    </div>
</div>
<!-- End Primary-menu-wide -->