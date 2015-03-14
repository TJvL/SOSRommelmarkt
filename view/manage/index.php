<?php

?>
<div class= "container">
    <div class="white">
        <h1>Beheer</h1>
        <div class="row">
            <!-- User: subsidie, Producten | Admin: Users en Inhoud -->
            <!-- NOT IN USE:  <ul class="management-menu"> -->
            <div class="col-md-12">
                <a  href="#">Medewerker beheer:</a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo ROOT_DIR; ?>/manage/subventions">
                <button class="btn btn-default">
                    <i class="fa fa-check-square fa-5x"></i>
                    <br /><b>Subsidies</b>
                </button>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo ROOT_DIR; ?>/manage/productList">
                <button class="btn btn-default">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                    <br /><b>Producten</b>
                </button>
                </a>
            </div>

            <div class="col-md-12">
                <a href="#">Administrator beheer:</a>
            </div>
            <div class="col-md-2">
                <a href="#">
                <button class="btn btn-default">
                    <i class="fa fa-user-plus fa-5x"></i>
                    <br /><b>Gebruiker</b>
                </button>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#">
                <button class="btn btn-default">
                    <i class="fa fa-pencil-square-o fa-5x"></i>
                    <br /><b>Paginas</b>
                </button>
                </a>
            </div>
        </div>
    </div>
</div>