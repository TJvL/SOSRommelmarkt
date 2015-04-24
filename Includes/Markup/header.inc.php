<!DOCTYPE html>
<html>
    
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>SOS Rommelmarkt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href = "<?php echo ROOT_DIR; ?>/includes/utility/database.class.php" rel = "database">

    <link rel="stylesheet" href="<?php echo ROOT_DIR; ?>/includes/css/menu.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo ROOT_DIR; ?>/includes/fonts/font-awesome/css/font-awesome.min.css" >
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/bootstrap.css" rel = "stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/shoppingcart.css" rel = "stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/footer.css" rel = "stylesheet">
    <link href=  "<?php echo ROOT_DIR; ?>/includes/css/jquery.bxslider.css" rel="stylesheet">
    <link href=  "<?php echo ROOT_DIR; ?>/includes/css/style.css" rel="stylesheet">
    <link href=  "<?php echo ROOT_DIR; ?>/includes/css/vitrine.css" rel="stylesheet">
    <link href=  "<?php echo ROOT_DIR; ?>/includes/css/angular.rangeSlider.css" rel="stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/carousel.css" rel="stylesheet">
    <link href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css">
    <link href=  "/SOSRommelmarkt/IdealForms/css/jquery.idealforms.css" rel="stylesheet">
    <link href=  "<?php echo ROOT_DIR; ?>/includes/css/override-bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
    <![endif]-->    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script src="<?php echo ROOT_DIR; ?>/includes/js/shopfilter.js" type="text/javascript"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/shoppingcart.js" type="text/javascript"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/bootstrap.js"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/jquery.bxslider.min.js"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/menu.js" type="text/javascript"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/vitrine.js" type="text/javascript"></script>
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js" type="text/javascript"></script>

    <script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.js"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/angular.rangeSlider.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular-animate.js"></script>

<!--     // <script src="<?php echo ROOT_DIR; ?>/includes/js/edit_product.js" type="text/javascript"></script> -->

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
            $query = "SELECT * FROM Info ";
            //submit the query and capture the result
            $result = Database::fetch($query);
            $query=getenv("QUERY_STRING");
            parse_str($query);

            while ($row = $result->fetch_assoc())
            {
            ?>
            <div id="navbar" class=" navbar">
                <ul class = "nav navbar-nav ">
                    <li>
                        <div class="contact-info">
                            <span class="icon"><i class="fa fa-phone"></i></span>
                            <div class="contact-phone"><span><?php echo $row['Telefoon']; ?></span></div>
                            <span class="icon"><i class="fa fa-envelope"></i></span>
                            <div class="contact-mail"><span><?php echo $row['Email']; ?> </span></div>
                        </div>
                    </li>
                </ul>
<!--                <ul class="nav navbar-nav navbar-left">-->
<!--                    <li><a href="--><?php //echo ROOT_DIR; ?><!--/home/index"><i class="fa fa-home"></i> Home</a></li>-->
<!--                    <li><a  href="--><?php //echo ROOT_DIR; ?><!--/shop/index"><i class="fa fa-cubes"></i> Producten</a></li>-->
<!--                    <li><a href="--><?php //echo ROOT_DIR; ?><!--/subvention/index"><i class="fa fa-money"></i> Subsidie</a></li>-->
<!--                    <li><a href="--><?php //echo ROOT_DIR; ?><!--/aboutUs/index"><i class="fa fa-group"></i> Over ons</a></li>-->
<!--                    <li><a  href="--><?php //echo ROOT_DIR; ?><!--/contact/index"><i class="fa fa-envelope"></i> Contact</a></li>-->
<!--                </ul>-->
           <?php } ?>
            </div>
        </div>
    </nav>

    <div class="container"> 
        <div id="headerdiv">
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo ROOT_DIR; ?>/home/index">
                        <img class="img-responsive" id="logo" src="<?php echo ROOT_DIR; ?>/img/logo2.png" />
                    </a>
                </div>
                <div class="col-md-9">
                     <div>
                         <a id="touch-menu" class="mobile-menu" href="#">Menu<i class="fa fa-angle-double-down fa-lg"></i></a>
                         <subnav>
                             <ul class="menu">
                                 <li><a href="<?php echo ROOT_DIR; ?>/home/index"><i class="fa fa-home"></i> Home</a></li>
                                 <li><a  href="<?php echo ROOT_DIR; ?>/shop/index"><i class="fa fa-cubes"></i> Producten</a></li>
                                 <li><a href="<?php echo ROOT_DIR; ?>/subvention/index"><i class="fa fa-money"></i> Subsidie</a></li>
                                 <li><a href="<?php echo ROOT_DIR; ?>/aboutUs/index"><i class="fa fa-group"></i> Over ons</a></li>
                                 <li><a  href="<?php echo ROOT_DIR; ?>/contact/index"><i class="fa fa-envelope"></i> Contact</a></li>
                             </ul>
                        </subnav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    