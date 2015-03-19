<?php

?>
<div class= "container">
    <div class="white">
        <h1 class="manage-title">Beheer</h1>
        <div class="row margin-sm">
            <!-- User: subsidie, Producten | Admin: Users en Inhoud -->
            <!-- NOT IN USE:  <ul class="management-menu"> -->
            <div class="col-md-12 manage-subtitle">
                <p>Medewerker beheer</p>
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

            <div class="col-md-12 manage-subtitle">
                <p>Administrator beheer</p>
            </div>
            <div class="col-md-2">
                <a href="#">
                <button class="btn btn-red">
                    <i class="fa fa-user-plus fa-5x fa-fw"></i>
                    <br /><b>Gebruiker</b>
                </button>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#">
                <button class="btn btn-red">
                    <i class="fa fa-pencil-square-o fa-5x fa-fw"></i>
                    <br /><b>Paginas</b>
                </button>
                </a>
            </div>
        </div>
    </div>
</div>