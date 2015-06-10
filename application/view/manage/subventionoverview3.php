<?php Type::check("ArrayList:SubventionRequest", $model) ?>

<div class="container" >
    <div class="white">

        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . '/manage/index'?>" class="btn btn-default">Terug</a>
            </div>
        </div>
        <div class="row margin-hor-sm">
            <h1>Subsidieaanvragen</h1>
            <hr>
        </div>

            <button class="btn btn-red filterButton" id="alles">Alles</button>
            <button class="btn btn-red filterButton" id="nieuw">Nieuw</button>
            <button class="btn btn-red filterButton" id="geaccepteerd">Geaccepteerd</button>
            <button class="btn btn-red filterButton" id="afgewezen">Afgewezen</button>

        <div class="list-group collapse-group margin-ver-lg">
            <?php
            foreach ($model as $m)
            {
            	?>
                <a class="list-group-item collapse-group-item" id="<?php echo $m->status?>">
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
                            <tr>
                                <th >Status: </th>
                                <td ><?php echo $m->status?></td>
                            </tr>

                            </tbody>

                        </table>
                        
                        <table class="table">
                        	<thead>
                        		<tr>
                        			<th>Toegevoegde bestanden</th>
                        			<th></th>
                        		</tr>
                        	</thead>
                        	<tbody>
	                        	<?php 
	                        	foreach ($m->getAttachedFilenames() as $filename)
	                        	{
	                        		?>
	                        		<tr>
	                        			<td><?php echo $filename ?></td>
	                        			<td>
	                        				<form method="POST" action="../subventionapi/downloadsubventionrequestattachedfile">
	                        					<input name="id" type="hidden" value="<?php echo $m->id ?>">
	                        					<input name="filename" type="hidden" value="<?php echo $filename ?>">
	                        					<button class="btn" type="submit">Download</button>
	                        				</form>
	                        			</td>
	                        		</tr>
	                        		<?php
	                        	} 
	                        	?>
                        	</tbody>
						</table>

                        <div class="row">
                           <div class="col-md-10"></div>
                            <div class="col-md-2">

                                <form class="idealforms" id="deletesubventionForm" action="javascript:deleteSubvention()">
                                    <div class="field">
                                        <input name="id" type="hidden" value="<?php echo $m->id ?>">
                                        <button class="btn" type="submit">Verwijder</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </a>
            	<?php
            }
            ?>
        </div>
    </div>
</div>













