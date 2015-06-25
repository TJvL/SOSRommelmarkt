<div class="container">
    <div class="white">

        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/index" ?>" class="btn btn-default">Terug</a>
            </div>
        </div>
        <h3>Projecten Beheer</h3>
        <div class="tabpanel">
        	<!-- start nav tabs -->
        	<ul class="nav nav-tabs nav-justified" role="tablist">
        		<li role="pressentation" class="active"><a href="#projects" aria-controls="projects" role="tab" data-toggle="tab">Projecten</a></li>
        		<li role="pressentation"><a href="#projects-description" aria-controls="projects-description" role="tab" data-toggle="tab">Projecten Inleiding</a></li>
        	</ul>
        	<!-- end nav tabs -->
        	<!-- start tab panes -->
        	<div class="tab-content">
        		<div role="tabpanel" class="tab-pane fade in active margin-ver-lg" id="projects">
        			<div class="row">
			            <div class="col-md-1">
			                <a href="<?php echo ROOT_PATH . '/manage/projectadd'?>" class="btn btn-success">Nieuw project</a>
			            </div>
        			</div>
			        <div class="table-responsive padding-sm margin-lg">
			            <table id="projectTable" class="display">
			                <thead>
			                <tr>
			                    <th>Titel</th>
			                    <th></th>
			                </tr>
			                </thead>
			                <tbody>
			                <?php
			                foreach ($model->projects as $project)
			                {?>
			                    <tr>
			                        <td><?php echo $project->title ?></td>
			                        <td>
			                            <a href="<?php echo ROOT_PATH ?>/manage/projectview/<?php echo $project->id ?>"><button class="btn btn-default"><i class="fa fa-pencil"></i></button></a>
			                        </td>
			                    </tr>
			                <?php
			                }?>
			                </tbody>
			            </table>
			        </div>
			        <div class="row">
			            <div class="col-md-12 padding-lg">
			                <p id="status" class="padding-lg"></p>
			            </div>
			        </div>
        		</div>
	            
	            <div role="tabpabel" class="tab-pane fade in" id="projects-description">
	            	<?php $projectDescription = $model->projectDescription[0]; // always the first?>
	            	<div class="row">
	            		<div class="col-lg-offset-1 col-lg-9">
			            	<h4>Huidige Projectpagina Beschrijving:</h2>
			            	<hr />
			            	<?php echo $projectDescription->content ?>
			            	<hr />
			            	<a href="<?php echo ROOT_PATH . '/manage/moduleview/' . $projectDescription->id; ?>" class="btn btn-default">Bewerken</a>
	            		</div>
	            	</div>
	            </div>
        	</div>
        	<!-- end nav panes -->
        </div>
    </div>
</div>

