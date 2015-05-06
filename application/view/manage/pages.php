<div class="container">
	<div class="white">
		<h1> Pagina's Bewerken </h1>
		<div class="row">
			<div class="col-md-3">
				<div class"list-group">
				<p>Page list</p>
					<?php



					    $servername = "samwise.technotive.nl";
					    $username = "sosAdmin";
					    $password = "shadowrend";
					    $database = "sosRommel";
					    $port = 3306;

					    $dbc = new mysqli($servername, $username, $password, $database, $port);

					    // Check connection.
					    if ($dbc->connect_error)
					    {
					        die("Connection failed: " . $dbc->connect_error);
					    }




							$q = "SELECT * FROM Page ORDER BY name ASC";
							$r = mysqli_query($dbc, $q) or die(mysqli_error($dbc));
							 
						
							// execute the query
							// $result = Database::m ysql_fetch_array($query);
							
							// put the result into an object
							while($page_list = mysqli_fetch_assoc($r)) {
									
 								 $blurb = substr(strip_tags($page_list['body']), 0, 20)
 								 ?>
				

					<a class="list-group-item" href="#">
						<h4 class="list-griup-item-heading"><?php echo $page_list['title']; ?></h4>
						<p class="list-group-item-text"><?php echo $blurb; ?></p>
					</a>

					<?php } ?>
			</div>
			</div>
<div class="col-md-9">
				<p> Page Form </p>	
			<form action ="#" method="post" role="form">
				<div class="form-group">
					<label for="title">Page Title:</label>
					<input class="form-control" type="text" name="title" id="title" placeholder="Page Title">
				</div>

				<div class="form-group">
					<label for="Label">Label:</label>
					<input class="form-control" type="text" name="Label" id="Label" placeholder="Page Label">
				</div>

				<div class="form-group">
					<label for="header">Header:</label>
					<input class="form-control" type="header" name="header" id="header" placeholder="Page Header">
				</div>

				<div class="form-group">
					<label for="body">Body:</label>
					<textarea class="form-control" name="body" rows="8" id="body" placeholder="Page body"></textarea>
				</div>

				<button type="submit" class="btm btn-deafault"> Save </button>

			</div>
		</div>
	</div>
</div>
