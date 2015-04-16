<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>SOS Rommelmarkt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--    <link href = "--><?php //echo ROOT_DIR; ?><!--/database.php" rel = "database">-->

    <link href = "<?php echo ROOT_DIR; ?>/includes/css/menu.css" type="text/css" media="screen" rel="stylesheet" >
    <link href = "<?php echo ROOT_DIR; ?>/includes/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" >
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/bootstrap.css" rel = "stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/shoppingcart.css" rel = "stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/footer.css" rel = "stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/style.css" rel="stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/carousel.css" rel="stylesheet">
    <link href = "//cdn.datatables.net/1.10.5/css/jquery.dataTables.css" rel="stylesheet" type="text/css" >
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/override-bootstrap.css" rel="stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/IdealForms/css/jquery.idealforms.css" rel="stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/cropper.css" rel="stylesheet">


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/bootstrap.js"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/cropper.min.js"></script>
    <script src="<?php echo ROOT_DIR; ?>/IdealForms/js/out/jquery.idealforms.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.js"></script>

</head>
<body>

<nav class= "navbar navbar-default navbar-static-top">

    <div class="container">
        <div class="navbar-header">

            <button class = "navbar-toggle" data-toggle = "collapse" data-target = "#navbar">
<!--                <span class="icon-bar">hoi</span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
            </button>




        </div>
        <div id="navbar" class="collapse navbar-collapse">

            <ul class = "nav navbar-nav navbar-right">

                <li>
                    <!--User data -->
                    <div id="userData" class="col-md-12">
                        <div class="col-sm-8"><i class="fa fa-user"></i> Admin</div>
                        <div class="col-sm-2"><i class="fa fa-sign-out"></i></div>
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

                <a href="<?php echo ROOT_DIR?>/home"><img class="img-responsive" id="logo" src="<?php echo ROOT_DIR; ?>/img/logo2.png" /></a>

            </div>
            <div class="col-md-8 margin-lg">

                <div class="col-md-12 manage-subtitle">
                    <p><a href="<?php echo ROOT_DIR?>/manage">Beheer</a> </p>
                </div>
                <div class="row">



                    <div class="col-md-2">
                        <a href="<?php echo ROOT_DIR; ?>/manage/instellingen">
                            <button class="btn btn-red">
                                <i class="fa fa-cogs fa-5x fa-fw"></i>
                                <br /><b>Instellingen</b>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-1"></div><!--spacer-->
                    <div class="col-md-2">
                        <a href="<?php echo ROOT_DIR; ?>/manage/subventions">
                            <button class="btn btn-red">
                                <i class="fa fa-check-square fa-5x fa-fw"></i>
                                <br /><b>Subsidies</b>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-1"></div><!--spacer-->
                    <div class="col-md-2">
                        <a href="<?php echo ROOT_DIR; ?>/manage/productList">
                            <button class="btn btn-red">
                                <i class="fa fa-shopping-cart fa-5x fa-fw"></i>
                                <br /><b>Producten</b>
                            </button>
                        </a>
                    </div>

                </div>



            </div>

        </div>
    </div>

</div>
    