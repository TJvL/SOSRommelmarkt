<!DOCTYPE html>
<html>
    
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>SOS Rommelmarkt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    IncludeLocator::locateIncludes("css", $controller, $action);
    ?>

    <?php
    IncludeLocator::locateIncludes("js", $controller, $action);
    ?>
    <script src="<?php echo ROOT_PATH; ?>/frameworks/idealforms/js/out/jquery.idealforms.js" type="text/javascript"></script>

<!--    <link rel="stylesheet" href="--><?php //echo ROOT_DIR; ?><!--css/menu.css" type="text/css" media="screen">-->
<!--    <link rel="stylesheet" href="--><?php //echo ROOT_DIR; ?><!--fonts/font-awesome/css/font-awesome.min.css" >-->
<!--    <link href = "--><?php //echo ROOT_DIR; ?><!--frameworks/bootstrap/css/bootstrap.min.css" rel = "stylesheet">-->
<!--    <link href = "--><?php //echo ROOT_DIR; ?><!--css/shoppingcart.css" rel = "stylesheet">-->
<!--    <link href = "--><?php //echo ROOT_DIR; ?><!--css/footer.css" rel = "stylesheet">-->
<!--    <link href=  "--><?php //echo ROOT_DIR; ?><!--css/jquery.bxslider.css" rel="stylesheet">-->
<!--    <link href=  "--><?php //echo ROOT_DIR; ?><!--css/style.css" rel="stylesheet">-->
<!--    <link href=  "--><?php //echo ROOT_DIR; ?><!--css/vitrine.css" rel="stylesheet">-->
<!--    <link href=  "--><?php //echo ROOT_DIR; ?><!--css/angular.rangeSlider.css" rel="stylesheet">-->
<!--    <link href = "--><?php //echo ROOT_DIR; ?><!--css/carousel.css" rel="stylesheet">-->
<!--    <link href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet">-->
<!--    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css">-->
<!--    <link href="--><?php //echo ROOT_DIR; ?><!--frameworks/IdealForms/css/jquery.idealforms.css" rel="stylesheet">-->
<!--    <link href="--><?php //echo ROOT_DIR; ?><!--css/override-bootstrap.css" rel="stylesheet">-->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
    <![endif]-->


<!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<!---->
<!--    <script src="--><?php //echo ROOT_DIR; ?><!--js/shopfilter.js" type="text/javascript"></script>-->
<!--    <script src="--><?php //echo ROOT_DIR; ?><!--js/shoppingcart.js" type="text/javascript"></script>-->
<!--    <script src="--><?php //echo ROOT_DIR; ?><!--frameworks/bootstrap/js/bootstrap.min.js"></script>-->
<!--    <script src="--><?php //echo ROOT_DIR; ?><!--js/jquery.bxslider.min.js"></script>-->
<!--    <script src="--><?php //echo ROOT_DIR; ?><!--js/menu.js" type="text/javascript"></script>-->
<!--    <script src="--><?php //echo ROOT_DIR; ?><!--js/vitrine.js" type="text/javascript"></script>-->
<!--    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js" type="text/javascript"></script>-->
<!---->
<!--    <script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js" type="text/javascript"></script>-->
<!--    <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>-->
<!--    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.js"></script>-->
<!--    <script src="--><?php //echo ROOT_DIR; ?><!--js/shop/angular.rangeSlider.js" type="text/javascript"></script>-->
<!--    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular-animate.js"></script>-->

</head>
<body>
    <nav class= "navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
<!--                <button class = "navbar-toggle" data-toggle = "collapse" data-target = "#navbar">-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                </button>-->
            </div>
            
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
                     <div>
                         <a id="touch-menu" class="mobile-menu" href="#">Menu<i class="fa fa-angle-double-down fa-lg"></i></a>
                         <subnav>
                             <ul class="menu">
                                 <li><a href="<?php echo ROOT_PATH; ?>/home/index"><i class="fa fa-home"></i> Home</a></li>
                                 <li><a  href="<?php echo ROOT_PATH; ?>/shop/index"><i class="fa fa-cubes"></i> Producten</a></li>
                                 <li><a href="<?php echo ROOT_PATH; ?>/subvention/index"><i class="fa fa-money"></i> Subsidie</a></li>
                                 <li><a href="<?php echo ROOT_PATH; ?>/aboutUs/index"><i class="fa fa-group"></i> Over ons</a></li>
                                 <li><a  href="<?php echo ROOT_PATH; ?>/contact/index"><i class="fa fa-envelope"></i> Contact</a></li>
                             </ul>
                        </subnav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    