<?php Type::check("ArrayList:SubventionRequest", $model) ?>

<div class="container" >
    <div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="/SOSRommelmarkt/manage/index" class="btn btn-default">Terug</a>
            </div>
        </div>

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
                                <th >Contactpersoon: </th>
                                <td><?php echo $m->contactperson?></td>
                            </tr>


                            <tr>
                                <th >Onderneming: </th>
                                <td><?php echo $m->firm?></td>
                            </tr>


                            <tr>
                                <th >KVK: </th>
                                <td><?php echo $m->kvk?></td>
                            </tr>


                            <tr>
                                <th >Adres: </th>
                                <td><?php echo $m->address?></td>
                            </tr>

                            <tr>
                                <th >Postcode: </th>
                                <td><?php echo $m->postalcode?></td>
                            </tr>

                            <tr>
                                <th >Plaats: </th>
                                <td><?php echo $m->city?></td>
                            </tr>

                            <tr>
                                <th >Telefoon (1): </th>
                                <td><?php echo $m->phonenumber1?></td>
                            </tr>

                            <tr>
                                <th >Telefoon (2): </th>
                                <td><?php echo $m->phonenumber2?></td>
                            </tr>

                            <tr>
                                <th >Fax: </th>
                                <td><?php echo $m->fax?></td>
                            </tr>

                            <tr>
                                <th >E-Mail: </th>
                                <td><?php echo $m->email?></td>
                            </tr>

                            <tr>
                                <th>Toelichting: </th>
                                <td><?php echo $m->elucidation?></td>
                            </tr>

                            <tr>
                                <th >Activiteiten: </th>
                                <td><?php echo $m->activities?></td>
                            </tr>

                            <tr>
                                <th >Resultaten: </th>
                                <td><?php echo $m->results?></td>
                            </tr>
                            </tbody>

                        </table>

                        <div class="row">
                           <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <button id="<?php echo $m->id ?>" onClick="delete_sub(this.id)" type="button" title="Print" class="btn btn-default">
                                    <span class="glyphicon glyphicon-trash  col-sm-1" aria-hidden="true"></span>
                                </button>

                            </div>
                        </div>
                    </div>



                </a>
            <?php
            }
            ?>
        </div>
        <!--        list end-->

    </div>
</div>













