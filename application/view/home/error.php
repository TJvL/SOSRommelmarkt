<div class= "container">
    <div style="margin-bottom:5%" class="white">
        <div class="content">
            <div class="row">
                <div class="col-md-1">
                    <a href="<?php echo ROOT_PATH . SEPARATOR . $viewBag['prevLocation']; ?>" class="btn btn-default">Terug</a>
                </div>
            </div>
            <h2><b>Er is iets fout gegaan...</b></h2>
            <h3><b><?php echo $viewBag['code']; ?></b></h3>
            <p><?php echo $viewBag['msg']; ?></p>
        </div>
    </div>
</div>