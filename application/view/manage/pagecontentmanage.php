<div class="container">
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
        <h3>Pagina inhoud beheer</h3>
        <div class="tabpanel">
            <!-- start nav tabs -->
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active"><a href="#home-modules" aria-controls="home-modules" role="tab" data-toggle="tab">Home pagina</a></li>
                <li role="presentation"><a href="#aboutus-modules" aria-controls="aboutus-modules" role="tab" data-toggle="tab">Over ons pagina</a></li>
            </ul>
            <!-- end nav tabs -->
            <!-- start tab panes -->
            <div role="tabpanel" class="tab-pane fade margin-ver-lg" id="home-modules">
                <?php $modules = $model->homeModules; ?>
                <div class="row">
                    <div class="col-md-1">
                        <a href="<?php echo ROOT_PATH . '/manage/moduleadd/home'?>" class="btn btn-success">Nieuwe module</a>
                    </div>
                </div>
                <div class="table-responsive padding-sm margin-lg">
                    <table id="homeTable" class="display">
                        <thead>
                        <tr>
                            <th>Titel</th>
                            <th>Opties</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($model->homeModules as $module){ ?>
                            <tr>
                                <td><?php echo $module->heading ?></td>
                                <td>
                                    <a href="<?php echo ROOT_PATH . '/manage/moduleview/' . $module->id?>"> <button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
                                    <!-- Tijdelijk verwijderd -- werken nog niet -->
                                    <!--										<button class="btn btn-default --><?php //if ($i == 0) echo "disabled"; ?><!--" title="Omhoog" onClick="moveModuleUp()"><i class="fa fa-caret-up"></i></button>-->
                                    <!--										<button class="btn btn-default --><?php //if ($i == count($modules) - 1) echo "disabled"; ?><!--" title="Omlaag" onClick="moveModuleDown()"><i class="fa fa-caret-down"></i></button>-->
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12 padding-lg">
                        <p id="statushomemodules" class="padding-lg"></p>
                    </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade margin-ver-lg" id="aboutus-modules">
                <?php $modules = $model->aboutUsModules ?>
                <div class="row">
                    <div class="col-md-1">
                        <a href="<?php echo ROOT_PATH . '/manage/moduleadd/aboutus' ?>" class="btn btn-success">Nieuwe module</a>
                    </div>
                </div>
                <div class="table-responsive padding-sm margin-lg">
                    <table id="aboutusTable" class="display">
                        <thead>
                        <tr>
                            <th>Heading</th>
                            <th>Opties</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($model->aboutUsModules as $module){ ?>
                            <tr>
                                <td><?php echo $module->heading ?></td>
                                <td>
                                    <a href="<?php echo ROOT_PATH . '/manage/moduleview/' . $module->id?>"> <button class="btn btn-default" title="Aanpassen"><i class="fa fa-pencil"></i></button></a>
                                    <!-- Tijdelijk verwijderd -- werken nog niet-->
                                    <!--										<button class="btn btn-default --><?php //if ($i == 0) echo "disabled"; ?><!--" title="Omhoog" onClick="moveModuleUp()"><i class="fa fa-caret-up"></i></button>-->
                                    <!--										<button class="btn btn-default --><?php //if ($i == count($modules) - 1) echo "disabled"; ?><!--" title="Omlaag" onClick="moveModuleDown()"><i class="fa fa-caret-down"></i></button>-->

                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12 padding-lg">
                        <p id="statusaboutusmodules" class="padding-lg"></p>
                    </div>
                </div>
            </div>
            <!-- end tab panes -->