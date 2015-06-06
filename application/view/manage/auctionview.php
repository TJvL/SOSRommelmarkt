<div class="container">
	<div class="white">
        <div class="row">
            <div class="col-md-1">
                <a href="<?php echo ROOT_PATH . "/manage/auctionoverview";?>" class="btn btn-default">Terug</a>
            </div>
            <div class="col-md-offset-9 col-md-1">
                <button class="btn btn-danger" type="button" onClick="handleDeleteAuction()">Verwijderen</button>
            </div>
        </div>
		<div class="row">
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <h1>Vitrine informatie</h1>
            </div>

			<form class="idealforms" form="updateForm" id="updateForm" action="javascript:handleUpdateAuction()">

                <input type="hidden" form="updateForm" name="id" id="id" value="<?php echo $model->id ?>"/>

                <div class="field">
                    <label class="main">Startdatum:</label>
                    <input form="updateForm" type="text" name="startDate" id="startDate" data-startDate="<?php echo $model->startDate?>" class="datepicker datepickerStart">
                    <span class="error"></span>
                </div>
                <div class="field">
                    <label class="main">Einddatum:</label>
                    <input form="updateFrom" type="text" name="endDate" id="endDate" data-endDate="<?php echo $model->endDate?>" class="datepicker datepickerEnd">
                    <span class="error"></span>
                </div>
                <div class="field buttons">
                    <label class="main">&nbsp;</label>
                    <button form="updateForm" type="submit" class="submit">Opslaan</button>
                </div>
                <span id="invalid"></span>

			</form>
		</div>
        <div class="row">
            <div class="col-md-12 padding-lg">
                <p id="status" class="padding-lg"></p>
            </div>
        </div>
	</div>
</div>