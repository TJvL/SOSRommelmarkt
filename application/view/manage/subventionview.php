<div class="container">
	<div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/subventionoverview" ?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <button class="btn btn-danger" onclick="deleteSubvention()">Verwijder</button>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Subsidieaanvraag informatie</h1>
            </div>
            <div class="col-md-8">
                <form class="form-horizontal">
                    <input type="hidden" id="id" value="<?php echo $model->subventionRequest->id?>">
                    <div class="form-group">
                        <label for="firm" class="col-sm-2 control-label">Bedrijfsnaam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firm" value="<?php echo $model->subventionRequest->firm?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firm" class="col-sm-2 control-label">Adres</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control nonresizeable" id="firm" disabled><?php echo $model->subventionRequest->address?>&#13;&#10;<?php echo $model->subventionRequest->postalcode . ' ' . $model->subventionRequest->city?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firm" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firm" value="<?php echo $model->subventionRequest->email?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firm" class="col-sm-2 control-label">K.v.K</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firm" value="<?php echo $model->subventionRequest->kvk?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firm" class="col-sm-2 control-label">Contactpersoon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firm" value="<?php echo $model->subventionRequest->contactperson?>" disabled>
                        </div>
                    </div>
                    <?php if($model->subventionRequest->fax !=null){?>
                    <div class="form-group">
                        <label for="firm" class="col-sm-2 control-label">Fax</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firm" value="<?php echo $model->subventionRequest->fax?>" disabled>
                        </div>
                    </div>
                    <?php } if($model->subventionRequest->phonenumber1 !=null){?>
                    <div class="form-group">
                        <label for="firm" class="col-sm-2 control-label">Telefoon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firm" value="<?php echo $model->subventionRequest->phonenumber1?>" disabled>
                        </div>
                    </div>
                    <?php } if($model->subventionRequest->phonenumber2 !=null){?>
                    <div class="form-group">
                        <label for="firm" class="col-sm-2 control-label">Mobiel</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firm" value="<?php echo $model->subventionRequest->phonenumber2?>" disabled>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="firm" class="col-sm-2 control-label">Toelichting</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="firm" disabled><?php echo $model->subventionRequest->elucidation ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firm" class="col-sm-2 control-label">Activiteiten</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="firm" disabled><?php echo $model->subventionRequest->activities ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firm" class="col-sm-2 control-label">Resultaten</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="firm" disabled><?php echo $model->subventionRequest->results ?></textarea>
                        </div>
                    </div>

<!--                    <div class="form-group">-->
<!--                        <div class="col-sm-offset-2 col-sm-10">-->
<!--                            <button form="subventionform" onclick="print()" class="btn btn-default"><i class="fa fa-print"></i></button>-->
<!--                        </div>-->
<!--                    </div>-->
                </form>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Toegevoegde bestanden</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($model->subventionRequest->getAttachedFilenames() as $filename)
                    {
                        ?>
                        <tr>
                            <td><?php echo $filename ?></td>
                            <td>
                                <form method="POST" action="<?php echo ROOT_PATH . '/subvention/downloadattachedfile'?>">
                                    <input type="hidden" name="id" id="id" value="<?php echo $model->subventionRequest->id?>">
                                    <input name="filename" id="filename" type="hidden" value="<?php echo $filename ?>">
                                    <button class="btn btn-default" type="submit">Download</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="col-sm-offset-2 col-sm-10">
            <h1>Subsidieaanvraag status</h1>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form class="form-horizontal" action="javascript:updateSubvention()">
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" id="selectedstatus">
                                <?php
                                foreach ($model->subventionStatuses as $status)
                                {
                                    if ($status == $model->subventionRequest->status)
                                    {
                                        ?>
                                        <option value="<?php echo $status ?>" selected="selected"><?php echo $status ?></option>
                                    <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <option value="<?php echo $status ?>"><?php echo $status ?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Opslaan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 padding-lg">
                <p id="statusmessage" class="padding-lg"></p>
            </div>
        </div>
	</div>
</div>
