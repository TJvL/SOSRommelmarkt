
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
                    
                    
<div class="tabbable"> <!-- Only required for left/right tabs -->
<ul class="nav nav-tabs">
<li class="active"><a href="#tab1" data-toggle="tab">Adres</a></li>
<li><a href="#tab2" data-toggle="tab">Openingstijden</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane fade in active" id="tab1">

<?php
//TODO implementeer database.php
        //Create a query
        $query = "SELECT * FROM Info ";
        //submit the query and capture the result
         $result = Database::fetch($query);
        $query=getenv("QUERY_STRING");
        parse_str($query);
?>

                  <div class="col-md-4">
                    <h2> Adres:</h2>

                         <form class="form-horizontal"  action="<?php echo ROOT_DIR;?>/manage/companyInfomation" method="Post">
                            <?php
                        while ($row = $result->fetch_assoc()) {?>
                        <div class="form-group">
                            <label class="col-xs-2 control-label" >Adres</label>
                            <div class="col-xs-10">
                                <input type="Adres" name="Adres" value="<?php echo $row['Adres']; ?>" />
                                <!-- <input type="text" id="day" class="form-control" > -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label" >Plaats</label>
                            <div class="col-xs-10">
                                <input type="Plaats" name="Plaats" value="<?php echo $row['Plaats']; ?>"/>
                                <!-- <input type="text" id="day" class="form-control" > -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label" >Telefoon</label>
                            <div class="col-xs-10">
                                <input type="Telefoon" name="Telefoon" value="<?php echo $row['Telefoon']; ?>" />
                                <!-- <input type="text" id="day" class="form-control" > -->
                         </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label" >Email</label>
                            <div class="col-xs-10">
                                <input type="Email" name="Email" value="<?php echo $row['Email']; ?>" />
                                <!-- <input type="text" id="day" class="form-control" > -->
                         </div>
                         </div>
                        <td>
                        <input name="add" type="submit" id="submit" value="Update Gegevens">
                        
                        </td>
                       
                    </form>
                    <?php } ?>

                   </div> 


</div>
<div class="tab-pane fade" id="tab2">
<?php
//TODO implementeer database.php
        //Create a query
        $query = "SELECT * FROM Openingstijden ";
        //submit the query and capture the result
         $result = Database::fetch($query);
        $query=getenv("QUERY_STRING");
        parse_str($query);


?>

                    <div class="col-md-4">
                    <h2> Openingstijden:</h2>
                    <form class="form-horizontal" action="<?php echo ROOT_DIR;?>/manage/instellingen" method="Post">
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


</div>
</div>

        
