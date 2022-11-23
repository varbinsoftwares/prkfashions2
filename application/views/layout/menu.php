<?php


$this->db->where('parent_id', '0');
$query = $this->db->get('category');
$parent_categories = $query->result_array();


$query1 = $this->db->get('category');
$sub_categories = $query1->result_array();

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
                        foreach ($parent_categories as $key => $value) {
                            ?>
                            <!-- TV & Audio -->
                        <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                <a id="TVMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="<?php echo $value['link']; ?>" aria-haspopup="true" aria-expanded="false"><?php echo $value['category_name'] ?></a>

                                
                                
                                <!-- TV & Audio - Mega Menu -->
                            <?php foreach($sub_categories as $row => $svalue) { ?>
                                    <?php if ($svalue['parent_id']==$value['id']) { ?>
                                   <div class="hs-mega-menu w-100 u-header__sub-menu" aria-labelledby="MENSMegaMenu"  style="display: none;">
                                    <div class="row u-header__mega-menu-wrapper">

                                        <div class="col-md-4">
                                            <span class="u-header__sub-menu-title">Latest Trend</span>

                                            <p class="menudescription">
                                                Shop from the latest collection of Shirts for men online. Buy shirts, T-shirts, Jeans, Trousers & more at best price.
                                            </p>
                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <?php
                                                $menuarray = [
                                                    array("title" => "Shirts", "link" => "Product/Productlist/0/0/"),
                                                    array("title" => "T-shirts", "link" => "Product/Productlist/0/0/"),
                                                    array("title" => "Jeans", "link" => "Product/Productlist/0/0/"),
                                                    array("title" => "Trousers", "link" => "Product/Productlist/0/0/"),
                                                    array("title" => "Jackets", "link" => "Product/Productlist/0/0/"),
                                                    array("title" => "Accessories", "link" => "Product/Productlist/0/0/"),
                                                ];
                                                 
                                                    ?>
                                                    <?php foreach($sub_categories as $row => $svalue) { ?>
                                                        <?php if ($svalue['parent_id']==$value['id']) { ?>
                                                    
                                                    <li><a href="<?php echo site_url(); ?>product/productlist/0/0" class="nav-link u-header__sub-menu-nav-link"><?php echo $svalue['category_name']; ?></a></li>
                                                    <?php } ?>
                                                    <?php  } ?>
                                            </ul>
                                            <span class="u-header__sub-menu-title">Shop By Discount</span>

                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <?php
                                                $menuarray = [
                                                    array("title" => "Upto 25% Off", "link" => "Product/Productlist/0/0/"),
                                                    array("title" => "Upto 50% Off", "link" => "Product/Productlist/0/0/"),
                                                    array("title" => "Upto 60% Off", "link" => "Product/Productlist/0/0/"),
                                                    array("title" => "Upto 80% Off", "link" => "Product/Productlist/0/0/"),
                                                ];
                                                foreach ($menuarray as $key => $value) {
                                                    ?>
                                                    <li><a href="<?php echo site_url();?>" class="nav-link u-header__sub-menu-nav-link"><?php echo $value['title']; ?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    
                                    </div>
                                </div>
                            <?php } ?>
                                    <?php  }?>
                                
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