<!DOCTYPE html>
<html>
    
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>SOS Rommelmarkt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="/SOSRommelmarkt/includes/css/menu.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/SOSRommelmarkt/includes/fonts/font-awesome/css/font-awesome.min.css" >
    <link href = "/SOSRommelmarkt/includes/css/bootstrap.css" rel = "stylesheet">
    <link href = "/SOSRommelmarkt/includes/css/shoppingcart.css" rel = "stylesheet">
    <link href = "/SOSRommelmarkt/includes/css/footer.css" rel = "stylesheet">
    <link href=  "/SOSRommelmarkt/includes/css/jquery.bxslider.css" rel="stylesheet">
    <link href=  "/SOSRommelmarkt/includes/css/style.css" rel="stylesheet">
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
    <![endif]-->    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <script src="/SOSRommelmarkt/includes/js/shopfilter.js" type="text/javascript"></script>
    <script src="/SOSRommelmarkt/includes/js/shoppingcart.js" type="text/javascript"></script>
    <script src="/SOSrommelmarkt/includes/js/bootstrap.js"></script>
    <script src="/SOSRommelmarkt/includes/js/jquery.bxslider.min.js"></script>
    <script src="/SOSRommelmarkt/includes/js/menu.js" type="text/javascript"></script>
    
    <!--Product filter slider -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
      
      <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

</head>
<body>
    
    <nav class= "navbar navbar-default navbar-static-top">
		
			<div class="container">
				<div class="navbar-header">			
					
					<button class = "navbar-toggle" data-toggle = "collapse" data-target = "#navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
				
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					                     
						<ul class = "nav navbar-nav navbar-right">
												
							<li> 
                                <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Zoeken" name="srch-term" id="srch-term">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                                </form>
                            </li>											
						
                            <li>
                                <div id="cart_details_3">
                                      <div class="cart_btn">
                                        <span class="icon"><i class="fa fa-shopping-cart"></i></span>
                                        <div class="items"><span>2 producten</span></div>
                                        <div class="price"><span>&euro; 27,95</span></div>
                                      </div>
                                      <div class="details">
                                        <div class="product_row">
                                          <div class="image">
                                             <img id="cart_image" src="http://i.imgur.com/gJsXvHB.jpg"/>
                                          </div>
                                          <div class="info">
                                            <span class="title">Pink Halter Small</span>
                                            <span class="price">$27.95</span>
                                            <div class="qty"><input id="qty" placeholder="1" disabled></input></div>
                                            <div class="remove"><i class="fa fa-times-circle"></i></div>
                                          </div>
                                        </div>
                                        <div class="product_row">
                                          <div class="image">
                                            <img id="cart_image" src="http://i.imgur.com/gJsXvHB.jpg"/>
                                          </div>
                                          <div class="info">
                                            <span class="title">Pink Halter Small</span>
                                            <span class="price">$27.95</span>
                                            <div class="qty"><input id="qty" placeholder="1" disabled></input></div>
                                            <div class="remove"><i class="fa fa-times-circle"></i></div>
                                          </div>
                                        </div>
                                        <div class="bottom">
                                          <div class="left">
                                              <p>Totaal: &euro; 27,95</p>

                                          </div>
                                          <div class="right">
                                            <a class="checkout" href="#">Bestellen <i class="fa fa-chevron-right"></i></a>
                                          </div>
                                       </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
					
					</div> 
			</div>
		
		</nav>

    <div class="container"> 
        
        <div id="headerdiv">
        <div class="row"> 
        
            <div class="col-sm-3">
                
                   <img class="img-responsive" id="logo" src="/SOSRommelmarkt/img/logo2.png" />   
                
            </div>            
            <div class="col-md-9">
                
                
                 <div>  
                    <a id="touch-menu" class="mobile-menu" href="#"><i class="fa fa-bars"></i></a>

                    <subnav>
                        <ul class="menu">
                            <li><a href="#"><i class="fa fa-home"></i> Home</a>             
                            </li>
                            <li><a  href="#"><i class="fa fa-cubes"></i> Producten</a></li>
                                <ul class="sub-menu">
                                    <li><a href="#">Sub-Menu 1</a></li>
                                    <li><a href="#">Sub-Menu 2</a></li>
                                    <li><a href="#">Sub-Menu 3</a></li>
                                </ul>
                            <li><a  href="#"><i class="fa fa-newspaper-o"></i> Activiteiten</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Sub-Menu 1</a></li>
                                    <li><a href="#">Level 3 Menu</a>
                                        <ul>
                                            <li><a href="#">Sub-Menu 4</a></li>
                                            <li><a href="#">Sub-Menu 5</a></li>
                                            <li><a href="#">Sub-Menu 6</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a  href="#"><i class="fa fa-group"></i> Over ons</a></li>
                            <li><a  href="#"><i class="fa fa-suitcase"></i> SOS</a></li>
                            <li><a  href="#"><i class="fa fa-envelope"></i> Contact</a></li>
                      </ul>
                    </nav>
                </div>
                
            </div>
            
        </div>
        </div>
        
    </div>
    