<!-- THIS FILE IS OBSOLETE AS OF 16-5-2014. SAVING IT FOR POSSIBLE LATER REFERENCE -->
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>SOS Rommelmarkt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--    <link href = "--><?php //echo ROOT_DIR; ?><!--/database.php" rel = "database">-->

    <?php
    IncludeLocator::locateIncludes("css", $controller, $action);
    ?>

    <?php
    IncludeLocator::locateIncludes("js", $controller, $action);
    ?>
    <script src="<?php echo ROOT_PATH; ?>/frameworks/idealforms/js/out/jquery.idealforms.js" type="text/javascript"></script>


</head>
<body>

<div class="container">

    <div id="headerdiv">
        <div class="row">

            <div class="col-sm-3">

                <a href="<?php echo ROOT_PATH?>/home"><img class="img-responsive" id="logo" src="<?php echo ROOT_PATH; ?>/img/content/logo2.png" /></a>

            </div>
            <div class="col-md-8 margin-lg">

                <div class="col-md-12 manage-subtitle">
                    <p><a href="<?php echo ROOT_PATH?>/manage">Beheer</a> </p>
                </div>
             



                    <div class="col-md-2">
                        <a href="<?php echo ROOT_PATH; ?>/manage/settings">
                            <button class="btn btn-red">
                                <i class="fa fa-cogs fa-5x fa-fw"></i>
                                <br /><b>Instellingen</b>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo ROOT_PATH; ?>/manage/pages">
                            <button class="btn btn-red">
                                <i class="fa fa-file-text-o fa-5x fa-fw"></i>
                                <br /><b>Pagina's</b>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo ROOT_PATH; ?>/manage/subventions">
                            <button class="btn btn-red">
                                <i class="fa fa-check-square fa-5x fa-fw"></i>
                                <br /><b>Subsidies</b>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo ROOT_PATH; ?>/manage/productList">
                            <button class="btn btn-red">
                                <i class="fa fa-shopping-cart fa-5x fa-fw"></i>
                                <br /><b>Producten</b>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo ROOT_PATH; ?>/manage/auctions">
                            <button class="btn btn-red">
                                <i class="fa fa-gavel fa-5x fa-fw"></i>
                                <br /><b>Veilingen</b>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo ROOT_PATH; ?>/manage/partners">
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
    