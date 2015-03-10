<?php 
include("includes/config.inc.php");
include("includes/markup/header.php"); 
?> 

<div class="container">

    <div class="white">
        
       
        
        <div class="row">
        
            <div class="col-sm-3">
            
                <!--Filters-->
                <!-- Browse: categories, Filter by price, Reset filters -->
                <div class="col-md-12 filter">
                    
                    <ul class="filterContainer">
                        <li class="filterHeadings"><h3>Categori&euml;en <i class="fa fa-minus category-plus-open"></i></h3></li>
                        <li>
                            <ul class="filterListings ">
                                <li>Electronica <small class="category-count">[10]</small></li>
                                <li>Meubels <small class="category-count">[33]</small></li>
                                <li>Shit <small class="category-count">[99]</small></li>
                            </ul>
                        </li>
                        <li class="filterHeadings"><h3>Kwaliteit <i class="fa fa-minus category-plus-open"></i></h3></li>
                        <li>
                            <ul class="filterListings ">
                                <li>Z.G.A.N<i class="product-filter-quality green" title="Z.G.A.N"></i></li>
                                <li>Gebruikt<i class="product-filter-quality blue" title="Gebruikt"></i></li>
                                <li>Shit<i class="product-filter-quality red" title="Shit"></i></li>
                            </ul>
                        </li>
                        <li class="filterHeadings"><h3>Prijs <i class="fa fa-minus category-plus-open"></i></h3></li>
                        <li>
                            <ul class="filterListings ">
                                <li>
                                    <div class="price-slider">
                                        <p>                                     
                                          <input type="text" id="amount" readonly style="border:0; color:#b20000; font-weight:bold;">
                                        </p>
                                        <div id="slider-range"></div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    
                    
                    
                
                   
                
                </div>
            
            </div>
            <div class="col-sm-9">
            
                <!--Products-->
                <!-- height : 300px, 4 on a row -->
                <div class="col-sm-3 product">
                
                    <div class="view view-first">  
                         <img class="img-responsive" src="img/Content/item1.jpg" />  
                         <div class="mask">  
                         <h2>Title</h2>  
                         <p>Your Text</p>  
                             <a href="#" class="info"><i class="fa fa-cart-plus fa-2x"></i></a>  
                         </div>  
                    </div> 
                    
                    <div class="product-info">
                    
                        <div class="product-info-left">
                        
                            <h4>Item 2</h4>
                            <i class="product-info-quality green" title="Z.G.A.N"></i>
                            
                        </div>
                        <div class="product-info-right">
                        
                            <p class="price">&euro; 49,99</p>
                            <p class="reserved">Gereserveerd</p>
                            
                        </div>
                        
                        
                    
                    </div>
                    
                
                </div>
                
                <div class="col-sm-3 product">
                
                    <div class="view view-first">  
                         <img class="img-responsive" src="img/Content/item2.jpg" />  
                         <div class="mask">  
                         <h2>Title</h2>  
                         <p>Your Text</p>  
                             <a href="#" class="info"><i class="fa fa-cart-plus fa-2x"></i></a>  
                         </div>  
                    </div> 
                    
                    <div class="product-info">
                    
                        <div class="product-info-left">
                        
                            <h4>Item 2</h4>
                            <i class="product-info-quality green" title="Z.G.A.N"></i>
                            
                        </div>
                        <div class="product-info-right">
                        
                            <p class="price">&euro; 49,99</p>
                            <p class="reserved"></p>
                            
                        </div>
                        
                        
                    
                    </div>
                    
                
                </div>
                <div class="col-sm-3 product">
                
                    <div class="view view-first">  
                         <img class="img-responsive" src="img/Content/item3.jpg" />  
                         <div class="mask">  
                         <h2>Title</h2>  
                         <p>Your Text</p>  
                             <a href="#" class="info"><i class="fa fa-cart-plus fa-2x"></i></a>  
                         </div>  
                    </div> 
                    
                    <div class="product-info">
                    
                        <div class="product-info-left">
                        
                            <h4>Item 2</h4>
                            <i class="product-info-quality green" title="Z.G.A.N"></i>
                            
                        </div>
                        <div class="product-info-right">
                        
                            <p class="price">&euro; 49,99</p>
                            <p class="reserved">Gereserveerd</p>
                            
                        </div>
                        
                        
                    
                    </div>
                    
                
                </div>
                <div class="col-sm-3 product">
                
                    <div class="view view-first">  
                         <img class="img-responsive" src="img/Content/item4.jpg" />  
                         <div class="mask">  
                         <h2>Title</h2>  
                         <p>Your Text</p>  
                             <a href="#" class="info"><i class="fa fa-cart-plus fa-2x"></i></a>  
                         </div>  
                    </div> 
                    
                    <div class="product-info">
                    
                        <div class="product-info-left">
                        
                            <h4>Te gek awesum shit 2</h4>
                            <i class="product-info-quality red" title="Z.G.A.N"></i>
                            
                        </div>
                        <div class="product-info-right">
                        
                            <p class="price">&euro; 49,99</p>
                            <p class="reserved">Gereserveerd</p>
                            
                        </div>
                        
                        
                    
                    </div>
                    
                
                </div>
                
            
            </div>
        
        
        
        </div>
        
    </div>

</div>

<?php include("includes/markup/footer.php"); ?>  