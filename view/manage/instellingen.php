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


    $servername = "samwise.technotive.nl";
    $username = "sosAdmin";
    $password = "shadowrend";
    $database = "sosRommel";
    $port = 3306;

    $connection = new mysqli($servername, $username, $password, $database, $port);

    // Check connection.
    if ($connection->connect_error)
    {
        die("Connection failed: " . $connection->connect_error);
    }


// Retrieve data from database
    // $sql =  mysqli_query($connection,"SELECT * FROM Openingstijden");


      
//             $Maandag ="Maandag";
//             $Dinsdag ="Dinsdag";
//             $Woensdag ="Woensdag"; 
//             $Donderdag ="Donderdag";
//             $Vrijdag ="Vrijdag";
//             $Zaterdag ="Zaterdag";
//             $Zondag ="Zondag";

// $sql = "UPDATE Openingstijden SET Maandag = $Maandag";
// $sql = "UPDATE Openingstijden SET Dinsdag = $Dinsdag ";
// $sql = "UPDATE Openingstijden SET Woensdag = $Woensdag ";
// $sql = "UPDATE Openingstijden SET Donderdag = $Donderdag ";
// $sql = "UPDATE Openingstijden SET Vrijdag = $Vrijdag ";
// $sql = "UPDATE Openingstijden SET Zaterdag = $Zaterdag ";
// $sql = "UPDATE Openingstijden SET Zondag = $Zondag ";




?>

<?php
     $query =  mysqli_query($connection,"SELECT * FROM Openingstijden");
    while ($row = mysqli_fetch_assoc($query)) {
        ?>
<?php
//Create a query
$sql = "SELECT * FROM Openingstijden";

        if(isset($_POST['Submit'])){//if the submit button is clicked
            
            $Maandag = $_POST['Maandag'];
            $Dinsdag = $_POST['Dinsdag'];
            $Woensdag = $_POST['Woensdag'];
            $Donderdag = $_POST['Donderdag'];
            $Vrijdag = $_POST['Vrijdag'];
            $Zaterdag = $_POST['Zondag'];
            $Zondag = $_POST['Zondag'];

            $update = "UPDATE Openingstijden SET Maandag='$Maandag', Dinsdag='$Dinsdag', Woensdag='$Woensdag', 
            Donderdag='$Donderdag', Vrijdag='$Vrijdag', Zaterdag='$Zaterdag', 
            Zondag='$Zondag'";


    $connection->query($update) or die("Cannot update");//update or error
    }
?>


<?php
//Create a query
$sql = "SELECT * FROM Openingstijden ";
//submit the query and capture the result
$result = $connection->query($sql) or die(mysql_error());
// $query=getenv(QUERY_STRING);
// parse_str($query);
//$ud_title = $_POST['Title'];
//$ud_pub = $_POST['Publisher'];
//$ud_pubdate = $_POST['PublishDate'];
//$ud_img = $_POST['Image'];
?>

                    <div class="col-md-4">
                    <h2> Openingstijden:</h2>
                    <form class="form-horizontal" action="" method="post">
                        <?php
    
    
    while ($row = $result->fetch_assoc()) {?>
                        <div class="form-group">
                            <label class="col-xs-2 control-label" >Maandag</label>
                            <div class="col-xs-10">
                                <input id="Maandag" type="text" name="maandag" value="<?php echo $row['Maandag']; ?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label" >Dinsdag</label>
                            <div class="col-xs-10">
                                 <input id="dinsdag" type="text" name="dinsdag" value="<?php echo $row['Dinsdag']; ?> "  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label">Woensdag</label>
                            <div class="col-xs-10">
                               <input id="Woensdag" type="text" name="woensdag" value="<?php echo $row['Woensdag']; ?> "  />
                            </div>
                        </div>
                            <div class="form-group">
                            <label class="col-xs-2 control-label">Donderdag</label>
                            <div class="col-xs-10">
                                 <input id="Donderdag" type="text" name="donderdag" value="<?php echo $row['Donderdag']; ?> "  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label">Vrijdag</label>
                            <div class="col-xs-10">
                               <input id="Vrijdag" type="text" name="vrijdag" value=" <?php echo $row['Vrijdag']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label">Zaterdag</label>
                            <div class="col-xs-10">
                                 <input id="Zaterdag" type="text" name="zaterdag" value=" <?php echo $row['Zaterdag']; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label">Zondag</label>
                            <div class="col-xs-10">
                                <input id="Zondag" type="text" name="zondag" value="<?php echo $row['Zondag']; ?> " />
                            </div>
                        </div>
                        <td>
                        <input name="add" type="submit" id="submit" value="Update Tijd">
                        </td>
                        <?php   }
    ?>
                    </form>
                </div>

                  <?php } ?>

                </div>
         
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                            </div>
                        </div>
<?php
    if ($connection->query($sql))
   echo "connection Successful.";
else die("Cannot update");

?>

                                            
