<?php include("includes/markup/manage_header.php"); ?>

<div class= "container">
        <div class="grey">
            <!--		   all data is labeled with a name, a reference will be  in the action page like this : $_POST["onderneming"];-->
            <form role="form" action="contact_action.php" id="contactForm" method="post">
                <div class="form-group">
                    <h1>Product toevoegen</h1>
                    <div class="row">
                        <div class="col-md-12"> <textarea name="name" class="form-control" placeholder="Korte omschrijving" required></textarea> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> <textarea name="description" class="form-control"  placeholder="Volledige omschrijving" required></textarea></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select name="color_code">
                                <option>Rood</option>
                                <option>Paars</option>
                                <option>Geel</option>
                            </select>
                        </div>
                    </div>
                    <input  type="submit" value="Submit" style="width: 30%" class="form-control">
                </div>
            </form>
        </div>
</div>