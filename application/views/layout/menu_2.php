<style>
    .u-header__sub-menu-nav-link {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-pack: justify;
        justify-content: space-between;
        font-size: 0.875rem;
        color: #5a5757;
    }
    .navbar-expand-lg .u-header__mega-menu-col:not(:last-child) {
        border-right: 1px solid #e3e6f0;
    }


    .navbar-expand-md .u-header__mega-menu-col {
        padding-left: 2rem;
    }
    .u-header__navbar--wide.navbar-expand-md .u-header__navbar-nav .hs-mega-menu-opened .u-header__nav-link, .u-header__navbar--wide.navbar-expand-md .u-header__navbar-nav .hs-sub-menu-opened .u-header__nav-link {
        background-color: #e5c100;
    }
</style>

<div class="d-none d-xl-block bg-primary">
    <div class="container">
        <div class="min-height-45">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--wide u-header__navbar--no-space hs-menu-initialized hs-menu-horizontal">
                <!-- Navigation -->

                <!-- Navigation -->
                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse py-0">
                    <ul class="navbar-nav u-header__navbar-nav">
                        <?php
                        $this->db->where('parent_id', 0);
                        $query = $this->db->get('category');
                        $parent_categories = $query->result_array();
                        foreach ($parent_categories as $key1 => $menu_l1) {
                            $p_id = $menu_l1["id"];
                            $this->db->where('parent_id', $p_id);
                            $sub_query_l1 = $this->db->get('category');
                            $submenu_l1 = $sub_query_l1->result_array();
                            ?>
                            <!-- Home -->
                            <li class="nav-item hs-has-sub-menu u-header__nav-item"
                                data-event="hover"
                                data-animation-in="fadeInUp"
                                data-animation-out="fadeOut">
                                <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="<?php echo site_url("Product/productList/$p_id/$p_id"); ?>"
                                   aria-haspopup="true"
                                   aria-expanded="false"
                                   aria-labelledby="homeSubMenu">
                                       <?php echo $menu_l1["category_name"]; ?>
                                       <?php if ($submenu_l1) {
                                           ?>  
                                        <span class="fa fa-angle-down u-header__nav-link-icon"></span> 
                                        <?php
                                    }
                                    ?>
                                </a>
                                <?php if ($submenu_l1) { ?>
                                    <!-- Home - Submenu -->
                                    <ul id="homeSubMenu" class="list-inline hs-sub-menu u-header__sub-menu mb-0" style="min-width: 220px;"
                                        aria-labelledby="homeMegaMenu">
                                            <?php
                                            foreach ($submenu_l1 as $key_l2 => $menu_l2) {
                                                $s1_id = $menu_l2["id"];
                                                $this->db->where('parent_id', $s1_id);
                                                $sub_query_l2 = $this->db->get('category');
                                                $submenu_l2 = $sub_query_l2->result_array();
                                                ?>
                                            <!-- Classic -->
                                            <li class="dropdown-item hs-has-sub-menu">
                                                <a id="navLinkHomeClassic" class="nav-link u-header__sub-menu-nav-link" href="<?php echo site_url("Product/productList/$s1_id/$s1_id"); ?>"
                                                   aria-haspopup="true"
                                                   aria-expanded="false"
                                                   aria-controls="navSubmenuHomeClassic">
                                                       <?php echo $menu_l2["category_name"]; ?>
                                                       <?php
                                                       if ($submenu_l2) {
                                                           ?>
                                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                                        <?php
                                                    }
                                                    ?>
                                                </a>
                                                <?php if ($submenu_l2) { ?>
                                                    <!-- Submenu (level 2) -->
                                                    <ul id="navSubmenuHomeClassic" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-offset" style="min-width: 220px;"
                                                        aria-labelledby="navLinkHomeClassic">
                                                            <?php
                                                            foreach ($submenu_l2 as $key_l3 => $menu_l3) {
                                                                $s2_id = $menu_l3["id"];
                                                                ?>
                                                            <li class="dropdown-item u-header__sub-menu-list-item">
                                                                <a class="nav-link u-header__sub-menu-nav-link" href="<?php echo site_url("Product/productList/$s2_id/$s2_id"); ?>">  
                                                                    <?php echo $menu_l3["category_name"]; ?>
                                                                </a>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>

                                                    </ul>
                                                    <?php
                                                }
                                                ?>
                                                <!-- End Submenu (level 2) -->
                                            </li>
                                            <!-- Classic -->
                                            <?php
                                        }
                                        ?>


                                    </ul>
                                    <!-- End Home - Submenu -->
                                    <?php
                                }
                                ?>
                            </li>
                            <!-- End Home -->
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <!-- End Navigation -->
            </nav>
        </div>
    </div>
</div>