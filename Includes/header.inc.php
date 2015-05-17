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
    <nav class= "navbar navbar-default navbar-static-top">
        <div class="container">
            <?php 
            	// contactinfo ophalen
            	$companyInformation = CompanyInformation::selectCurrent();
            ?>
            <div id="navbar" class=" navbar">
                <ul class = "nav navbar-nav ">
                    <li>
                        <div class="contact-info">
                            <span class="icon"><i class="fa fa-phone"></i></span>
                            <div class="contact-phone"><span><?php echo $companyInformation->phone; ?></span></div>
                            <span class="icon"><i class="fa fa-envelope"></i></span>
                            <div class="contact-mail"><span><?php echo $companyInformation->email ?> </span></div>
                            <span class="icon"><i class="fa fa-map-marker"></i></span>
                            <div class="contact-address"><span><?php echo $companyInformation->address . ", " . $companyInformation->postalcode . " " . $companyInformation->city; ?></span></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container"> 
        <div id="headerdiv">
            <div class="row">
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
                                         <li><a href="<?php echo ROOT_PATH; ?>/subvention/index"><i class="fa fa-money"></i> Subsidie</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/home/aboutus"><i class="fa fa-group"></i> Over ons</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/home/projects"><i class="fa fa-tasks"></i> Projecten</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/home/retrieval"><i class="fa fa-truck"></i> Afgifte</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/home/contact"><i class="fa fa-envelope"></i> Contact</a></li>
                                     </ul>
                                 <?php
                                 }
                                 else
                                 {?>
                                     <ul class="menu">
                                         <li><a href="<?php echo ROOT_PATH; ?>/manage/settings"><i class="fa fa-cogs"></i> Instellingen</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/manage/subventions"><i class="fa fa-check-square"></i> Subsidies</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/manage/productList"><i class="fa fa-shopping-cart"></i> Webshop</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/manage/auctions"><i class="fa fa-gavel"></i> Vitrines</a></li>
                                         <li><a href="<?php echo ROOT_PATH; ?>/manage/partners"><i class="fa fa-users"></i> Partners</a></li>
                                     </ul>
                                 <?php
                                 }?>
                        </subnav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    