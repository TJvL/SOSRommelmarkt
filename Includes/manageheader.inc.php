<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>SOS Rommelmarkt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--    <link href = "--><?php //echo ROOT_DIR; ?><!--/database.php" rel = "database">-->

    <link href = "<?php echo ROOT_DIR; ?>/css/menu.css" type="text/css" media="screen" rel="stylesheet" >
    <link href = "<?php echo ROOT_DIR; ?>/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" >
    <link href = "<?php echo ROOT_DIR; ?>/css/bootstrap.css" rel = "stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/css/shoppingcart.css" rel = "stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/css/footer.css" rel = "stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/css/style.css" rel="stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/css/carousel.css" rel="stylesheet">
    <link href = "//cdn.datatables.net/1.10.5/css/jquery.dataTables.css" rel="stylesheet" type="text/css" >
    <link href = "<?php echo ROOT_DIR; ?>/css/override-bootstrap.css" rel="stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/frameworks/idealforms/css/jquery.idealforms.css" rel="stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/css/cropper.css" rel="stylesheet">


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js" type="text/javascript"></script>
    <script src="<?php echo ROOT_DIR; ?>/js/bootstrap.js"></script>
    <script src="<?php echo ROOT_DIR; ?>/js/manage/shopproduct/cropper.min.js"></script>
    <script src="<?php echo ROOT_DIR; ?>/frameworks/idealforms/js/out/jquery.idealforms.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.js"></script>

</head>
<body>

<div class="container">

    <div id="headerdiv">
        <div class="row">

            <div class="col-sm-3">

                <a href="<?php echo ROOT_DIR?>/home"><img class="img-responsive" id="logo" src="<?php echo ROOT_DIR; ?>/img/content/logo2.png" /></a>

            </div>
            <div class="col-md-8 margin-lg">

                <div class="col-md-12 manage-subtitle">
                    <p><a href="<?php echo ROOT_DIR?>/manage">Beheer</a> </p>
                </div>
             



                    <div class="col-md-2">
                        <a href="<?php echo ROOT_DIR; ?>/manage/instellingen">
                            <button class="btn btn-red">
                                <i class="fa fa-cogs fa-5x fa-fw"></i>
                                <br /><b>Instellingen</b>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo ROOT_DIR; ?>/manage/subventions">
                            <button class="btn btn-red">
                                <i class="fa fa-check-square fa-5x fa-fw"></i>
                                <br /><b>Subsidies</b>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo ROOT_DIR; ?>/manage/productList">
                            <button class="btn btn-red">
                                <i class="fa fa-shopping-cart fa-5x fa-fw"></i>
                                <br /><b>Producten</b>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo ROOT_DIR; ?>/manage/auctions">
                            <button class="btn btn-red">
                                <i class="fa fa-gavel fa-5x fa-fw"></i>
                                <br /><b>Veilingen</b>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo ROOT_DIR; ?>/manage/partners">
                            <button class="btn btn-red">
                                <i class="fa fa-users fa-5x fa-fw"></i>
                                <br /><b>Partners</b>
                            </button>
                        </a>
                    </div>
            



            </div>

        </div>
    </div>

</div>
    