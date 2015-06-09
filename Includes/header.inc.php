<!DOCTYPE html>
<html>
    
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOS Rommelmarkt</title>

<?php
IncludeLocator::locateIncludes("css", $controller, $action);
IncludeLocator::locateIncludes("js", $controller, $action);
?>

</head>
<body>
    <nav class= "navbar navbar-default navbar-static-top header_fixed" id="staticHeader">
        <div class="container">
            <div id="navbar" class=" navbar">
                <ul class = "nav navbar-nav ">
                    <li>
                        <div class="contact-info">
                            <div class="contact-phone padding-hor-md"><span><i class="fa fa-phone"></i> <?php echo $headerVM->companyInformation->phone; ?> </span></div>
                            <div class="contact-mail padding-hor-md"><span><i class="fa fa-envelope"></i> <?php echo $headerVM->companyInformation->email ?> </span></div>
                            <div class="contact-address padding-hor-md"><span><i class="fa fa-map-marker"></i> <?php echo $headerVM->companyInformation->address . ", " . $headerVM->companyInformation->postalcode . " " . $headerVM->companyInformation->city; ?> </span></div>
                        </div>
                    </li>
                    <?php
                    if(isset($headerVM->username))
                    {
                    ?>
                        <li><a href="<?php echo ROOT_PATH; ?>/home/contact"><i class="fa fa-envelope"></i> Contact</a></li>
                        <li><a href="<?php echo ROOT_PATH; ?>/account/index"><i class="fa fa-male"></i> <?php echo $headerVM->username; ?></a></li>
                        <li><a href="<?php echo ROOT_PATH; ?>/account/logout"><i class="fa fa-sign-out"></i> Uitloggen</a></li>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li><a href="<?php echo ROOT_PATH; ?>/home/contact"><i class="fa fa-envelope"></i> Contact</a></li>
                        <li><a href="<?php echo ROOT_PATH; ?>/account/login"><i class="fa fa-sign-in"></i> Inloggen</a></li>
                        <li><a href="<?php echo ROOT_PATH; ?>/account/register"><i class="fa fa-user-plus"></i> Registreren</a></li>
                        <li class=""><a class="shopping-cart-btn cd-cart-trigger"> <i class="fa fa-shopping-cart fa-fw"></i> (3)</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container"> 
        <div id="headerdiv">
            <div class="row menu_position">
                <div class="col-sm-3">
                    <a href="<?php echo ROOT_PATH; ?>/home/index">
                        <img class="img-responsive" id="logo" src="<?php echo ROOT_PATH; ?>/img/content/logo2.png" />
                    </a>
                </div>
                <div class="col-md-9">

                    <?php
                    //If logged in
                    $placeholder = false;
                    if($placeholder)
                    {?>
                        <div class="col-md-12 manage-subtitle">
                            <p><a href="<?php echo ROOT_PATH?>/manage">Beheer</a> </p>
                        </div>
                    <?php }?>

                     <div>

                         <a id="touch-menu" class="mobile-menu" href="#">Menu<i class="fa fa-angle-double-down fa-lg"></i></a>
                         <subnav>
                                 <?php
                                 //If logged in
                                 $placeholder = false; //!!!!Momenteel staat de header standaard op normaal. Zet deze boolean op true als je de manageheader nodig hebt. (later wordt dit met login afgehandeld)
                                 if(!$placeholder)
                                 {
                                 ?>
                                     <ul class="menu">
                                         <li><a href="<?php echo ROOT_PATH; ?>/home/index"><i class="fa fa-home"></i> Home</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/shop/index"><i class="fa fa-cubes"></i> Webshop</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/auction/index"><i class="fa fa-eye"></i> Vitrine</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/home/retrieval"><i class="fa fa-truck"></i> Afgifte</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/subvention/index"><i class="fa fa-money"></i> Subsidie</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/home/projects"><i class="fa fa-tasks"></i> Projecten</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/home/aboutus"><i class="fa fa-group"></i> Over ons</a></li>
                                     </ul>
                                 <?php
                                 }
                                 else
                                 {?>
                                     <ul class="menu">
                                         <li><a href="<?php echo ROOT_PATH; ?>/manage/settings"><i class="fa fa-cogs"></i> Instellingen</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/manage/subventions"><i class="fa fa-check-square"></i> Subsidies</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/manage/productList"><i class="fa fa-shopping-cart"></i> Webshop</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/manage/auctions"><i class="fa fa-diamond"></i> Vitrines</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/manage/partners"><i class="fa fa-users"></i> Partners</a></li>
                                     </ul>
                                 <?php
                                 }?>
                        </subnav>
                    </div>
                </div>
            </div>
        </div>
        <div id="cd-cart">
            <div class="close-btn cd-cart-trigger"><i class="fa fa-times fa-2x"></i></div>
            <h2>Winkelwagen</h2>
            <ul class="cd-cart-items">
                <li>
                    <div class="row">
                        <div class="col-sm-6">
                            Product Name
                            <div class="cd-price">€9.99</div>
                        </div>
                        <div class="col-sm-4">
                            <img class="cart-product-image" src="<?php echo ROOT_PATH . '/img/products/3/1.jpg'?>" >
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-6">
                            Product Name
                            <div class="cd-price">€9.99</div>
                        </div>
                        <div class="col-sm-4">
                            <img class="cart-product-image" src="<?php echo ROOT_PATH . '/img/products/2/1.jpg'?>" >
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-6">
                            Product Name
                            <div class="cd-price">€9.99</div>
                        </div>
                        <div class="col-sm-4">
                            <img class="cart-product-image" src="<?php echo ROOT_PATH . '/img/products/1/1.jpg'?>" >
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </li>
            </ul> <!-- cd-cart-items -->

            <div class="cd-cart-total">
                <p>Totaal <span>€29.96</span></p>
            </div> <!-- cd-cart-total -->

            <a href="#" class="checkout-btn">Afrekenen</a>

        </div>

    </div>
    