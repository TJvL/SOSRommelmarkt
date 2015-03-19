<!DOCTYPE html>
<html>
    
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>SOS Rommelmarkt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo ROOT_DIR; ?>/includes/css/menu.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo ROOT_DIR; ?>/includes/fonts/font-awesome/css/font-awesome.min.css" >
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/bootstrap.css" rel = "stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/shoppingcart.css" rel = "stylesheet">
    <link href = "<?php echo ROOT_DIR; ?>/includes/css/footer.css" rel = "stylesheet">
    <link href=  "<?php echo ROOT_DIR; ?>/includes/css/jquery.bxslider.css" rel="stylesheet">
    <link href=  "<?php echo ROOT_DIR; ?>/includes/css/style.css" rel="stylesheet">
    <link href=  "<?php echo ROOT_DIR; ?>/includes/css/vitrine.css" rel="stylesheet">
    <link href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css">
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
    <![endif]-->    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script src="<?php echo ROOT_DIR; ?>/includes/js/shopfilter.js" type="text/javascript"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/shoppingcart.js" type="text/javascript"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/bootstrap.js"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/jquery.bxslider.min.js"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/menu.js" type="text/javascript"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/vitrine.js" type="text/javascript"></script>
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js" type="text/javascript"></script>
    <script src="<?php echo ROOT_DIR; ?>/includes/js/edit_product.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>

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
					  <ul class = "nav navbar-nav navbar-left">
              <li>
               <div class="contact-info">
              <span class="icon"><i class="fa fa-phone"></i></span>
               <div class="contact-phone"><span>073 613 3774</span> </div>
               <span class="icon"><i class="fa fa-envelope"></i></span>
               <div class="contact-mail"><span>info@sosrommelmarkt.nl </span></div>
               </div>
              </li>
            </ul>
            
              

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
                
                   <img class="img-responsive" id="logo" src="<?php echo ROOT_DIR; ?>/img/logo2.png" />
                
            </div>            
            <div class="col-md-9">
                
                
                 <div>  
                    <a id="touch-menu" class="mobile-menu" href="#">Menu<i class="fa fa-angle-double-down fa-lg"></i></a>

                    <subnav>
                        <ul class="menu">
                            <li><a href="<?php echo ROOT_DIR; ?>/home/index"><i class="fa fa-home"></i> Home</a></li>
                            <li><a  href="<?php echo ROOT_DIR; ?>/shop/index"><i class="fa fa-cubes"></i> Producten</a></li>
                            <li><a href="<?php echo ROOT_DIR; ?>/subvention/index"><i class="fa fa-money"></i> Subsidie</a></li>
                            <li><a  href="#"><i class="fa fa-group"></i> Over ons</a></li>                            
                            <li><a  href="<?php echo ROOT_DIR; ?>/contact/index"><i class="fa fa-envelope"></i> Contact</a></li>
                      </ul>
                    </subnav>
                </div>
                
            </div>
            
        </div>
        </div>
        
    </div>
    