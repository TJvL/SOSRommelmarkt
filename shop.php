<?php include("includes/markup/header.php"); ?> 

<div class= "container">
    <div class="row">
        
         <div class= "col-lg-12">
             
             <center><h1>Vitrine</h1></center>
             
        </div>
        
    </div>  
    
    <div class="row">
         <div class= "col-sm-3">

              <div class="filters">
                    <div id="search" class="input-group">
                            <input type="text" class="form-control" placeholder="Zoeken" name="srch-term" id="srch-term">                    <span class="input-group-btn">
                            <button class="btn btn-default btn-search" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="false" href="#categorie">
                                        Categorie
                                    </a>
                                </h4>
                            </div>
                            <div id="categorie" class="panel-collapse collapse in">
                                <div class="panel-body">

                                    <select name="categorie" class="form-control ajax">
                                        <option>Z.G.A.N.</option>
                                        <option>Beschadigd</option>
                                        <option>Goede staat</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="false" href="#prijs">
                                        Prijs
                                    </a>
                                </h4>
                            </div>
                            <div id="prijs" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>
                                      <input type="text" id="amount" readonly style="border:0; color:#B20000; font-weight:bold;">
                                    </p>

                                    <div id="slider-range"></div>
                                </div>
                            </div>
                        </div>             
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="false" href="#reset">
                                        Reset Filters
                                    </a>
                                </h4>
                            </div>
                            <div id="reset" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <a href="#" class="btn btn-danger btn-block">Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  

        </div>

    </div>    
</div>

<?php include("includes/markup/footer.php"); ?>  