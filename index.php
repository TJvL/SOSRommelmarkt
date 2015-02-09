<!DOCTYPE html>
<html>
    
<head>
<?php
$page_title = "Home – My Website";
$page_description = "Description of this page";

//For best practice on includes, a config php file is required which defines the root, so absolute paths can be created from $root/includes/markup for example..
include("includes/markup/header.php"); ?>   

    </head>


<body>

   <div class= "container">
        <!--!!!Placeholder for the image slider-->
			<div class= "jumbotron">
                
                <img width="100%" src="/SOSRommelmarkt/img/slide2.jpg">
				
			</div>
    </div>
		
		<div class="container">
            <!--Placeholders for relevant content-->
            <div class= "col-md-12">
                
                <h1>Lorum Ipsum </h1>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.</p>
                
            </div>
            
				
            <!--Placeholders for relevant content-->
			<div class="row">	
				
				<div class= "col-md-3">
				
					<img class="img-responsive" src="/SOSRommelmarkt/img/exampleProduct.png">
					
				</div>
				
				<div class= "col-md-3">
				
					<img class="img-responsive" src="/SOSRommelmarkt/img/exampleProduct.png">
					
				</div>
				
				<div class= "col-md-3">
				
				<img class="img-responsive" src="/SOSRommelmarkt/img/exampleProduct.png">
					
				</div>
				
				<div class= "col-md-3">
				
				<img class="img-responsive" src="/SOSRommelmarkt/img/exampleProduct.png">
					
				</div>
				
					
			</div>
				
		</div>
    
    
    
    
<?php
include("includes/markup/footer.php"); 
?>     
   
    
</body>
</html>