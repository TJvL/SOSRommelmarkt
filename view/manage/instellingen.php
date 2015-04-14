
<div class="container">
	<div class="white">

      <div class="row">
        
        <div class="span8">             
            
            <div class="widget stacked ">
                
                <div class="widget-header">
                    <i class="icon-user"></i>
                    <h3>Instellingen</h3>
                </div> 
                
                <div class="widget-content">
                    
                    
                    
                    <div class="tabbable">
                    <ul class="nav nav-tabs">
                      <li class="active">
                        <a href="#profile" data-toggle="tab">Openingstijden</a>
              
                      </li>
                      <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                    
                    <br />
                    
                   
                   <div class="row"> 

                  <div class="col-md-4">
                    <h2> Adres:</h2>

                         <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-xs-2 control-label" >Adres</label>
                            <div class="col-xs-10">
                                <input type="adres" name="time" />
                                <!-- <input type="text" id="day" class="form-control" > -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label" >Plaats</label>
                            <div class="col-xs-10">
                                <input type="place" name="time" />
                                <!-- <input type="text" id="day" class="form-control" > -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label" >Telefoon</label>
                            <div class="col-xs-10">
                                <input type="phone" name="time" />
                                <!-- <input type="text" id="day" class="form-control" > -->
                         </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label" >Email</label>
                            <div class="col-xs-10">
                                <input type="mail" name="time" />
                                <!-- <input type="text" id="day" class="form-control" > -->
                         </div>
                        </div>
                    </form>
                

                   </div> 




<?php
        //Create a query
        $query = "SELECT * FROM Openingstijden ";
        //submit the query and capture the result
         $result = Database::fetch($query);
        $query=getenv("QUERY_STRING");
        parse_str($query);


?>

                    <div class="col-md-4">
                    <h2> Openingstijden:</h2>
                    <form class="form-horizontal" action="" method="post">
                        <?php
                        while ($row = $result->fetch_assoc()) {?>
                        <div class="form-group">
                            <label class="col-xs-2 control-label" >Maandag</label>
                            <div class="col-xs-10">
                                <input id="Maandag" type="text" name="Maandag" value="<?php echo $row['Maandag']; ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label" >Dinsdag</label>
                            <div class="col-xs-10">
                                 <input id="Dinsdag" type="text" name="Dinsdag" value="<?php echo $row['Dinsdag']; ?> "  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label">Woensdag</label>
                            <div class="col-xs-10">
                               <input id="Woensdag" type="text" name="Woensdag" value="<?php echo $row['Woensdag']; ?> "  />
                            </div>
                        </div>
                            <div class="form-group">
                            <label class="col-xs-2 control-label">Donderdag</label>
                            <div class="col-xs-10">
                                 <input id="Donderdag" type="text" name="Donderdag" value="<?php echo $row['Donderdag']; ?> "  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label">Vrijdag</label>
                            <div class="col-xs-10">
                               <input id="Vrijdag" type="text" name="Vrijdag" value="<?php echo $row['Vrijdag']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label">Zaterdag</label>
                            <div class="col-xs-10">
                                 <input id="Zaterdag" type="text" name="Zaterdag" value="<?php echo $row['Zaterdag']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label">Zondag</label>
                            <div class="col-xs-10">
                                <input id="Zondag" type="text" name="Zondag" value="<?php echo $row['Zondag']; ?> " />
                            </div>
                        </div>
                        <td>
                        <input name="add" type="submit" id="submit" value="Update Tijd">
                        </td>
                    </form>
                </div>

                  <?php } ?>

                </div>
         
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                            </div>
                        </div>


                                            
