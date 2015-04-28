<?php Type::check("Partner", $model) ?>

<head>
    <script>
		function handleUpdatePartner()
        {
            if (confirm("Weet u zeker dat u de wijzigingen wilt toepassen?"))
            {
                // Reset status message.
                $("#status").text("");
                $("#status").removeClass("alert-success alert-danger");

                var data =
                {
                    id:	<?php echo $model->id ?>,
                    name:		$("#name").val(),
                    website:	$("#website").val()
                };

                $.ajax(
                    {
                        url: "update",
                        type: "POST",
                        data: data,
                        async: true,
                        success: function(result)
                        {
                            // Check if it went alright.
                            if (result == 0)
                            {
                                $("#status").text("  Succes!");
                                $("#status").addClass("alert-success");
                            }
                            else
                            {
                                $("#status").text("  Er is iets verkeerd gegaan");
                                $("#status").addClass("alert-danger");
                            }
                        }
                    });
            }
        }

        function handleDeletePartner()
        {
            if (confirm("Weet u zeker dat u deze partner wilt verwijderen?"))
            {
                var data =
                {
                    id: <?php echo $model->id ?>,
                };

                $.ajax(
                {
					url: "delete",
					type: "POST",
					data: data,
					async: true,
					success: function(result)
					{
						// Check if it went alright.
						if (result == 0)
						{
							alert("Success");
						}
						else
						{
							alert("fail");
						}
						
						// Go to the partner management page.
						document.location.href = "../partners";
					}
				});
            }
        }
    </script>
</head>

<div class="container">
	<div class="white">
		<div class="row">
			<div class="col-md-1">
				<a href="<?php echo ROOT_PATH . "/manage/partners" ?>" class="btn btn-default">Terug</a>
			</div>
		</div>
		<div class="row">
			<hr>
			<div class="col-sm-1"></div>
			<h1>Partnerinformatie</h1>
			<form class="form-horizontal" action="javascript:handleUpdatePartner()">
				<div class="form-group">
					<label class="control-label col-sm-2">ID</label>
					<div class="col-sm-10">
						<div class="input-group">
							<input class="form-control" id="id" type="number" value="<?php echo $model->id ?>" disabled>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Naam</label>
					<div class="col-sm-10">
						<div class="input-group">
							<input class="form-control" id="name" type="text" placeholder="Naam van de partner" value="<?php echo $model->name ?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
                    <label class="control-label col-sm-2">Website</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <textarea class="form-control" id="website" style="resize: none" rows="3" placeholder="Website van de partner" required><?php echo $model->website ?></textarea>
                        </div>
                    </div>
                </div>
				<div class="form-group">
					<label class="control-label col-sm-2"></label>
					<div class="col-sm-10">
						<div class="input-group">
							<div class="btn-toolbar">
								<button class="btn btn-default" type="submit">Update</button>
								<button class="btn btn-danger" type="button" onClick="handleDeletePartner()">Delete</button>
							</div>
						</div>
						<div class="alert" id="status" role="alert"></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
