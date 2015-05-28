<?php Type::check("ArrayList:SubventionRequest", $model) ?>

<div class="container" >
    <div class="white">
        <!--        title-->
        <h1>Subsidieaanvragen</h1>
        <!--            list-->
        <div class="list-group collapse-group margin-ver-lg">
            <?php foreach ($model as $m) {?>
                <!--                        one list item-->
                <a class="list-group-item collapse-group-item">
                    <!--                        collapsible part-->
                    <div class="row">
                        <div class="collapse-button">
                            <div class="col-sm-8"><h3 class="list-group-item-heading"><?php echo $m->firm ?></h3></div>
                            <div class="col-sm-4"><i class="fa fa-expand fa-2x pull-right"></i></div>
                        </div>
                    </div>
                    <div class="collapse">
                        <table class="table-responsive">
                            <tbody>
                            <tr>
                                <td>
                                    <?php echo $m->contactperson ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
        <!--        list end-->

    </div>
</div>

