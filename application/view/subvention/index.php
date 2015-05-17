   
        <?php 
             // contactinfo ophalen
             $subventionsContent = SubventionsContent::selectCurrent();
        ?>

<div class= "container">
<!--        <div class="grey_subvention" >-->

    <div style="margin-bottom:5%" class="white">
        <content>

                <h2><b><?php echo $subventionsContent->titel; ?></b></h2>
                
                <?php echo $subventionsContent->content; ?>
                
        </content>



        <a href="<?php echo ROOT_PATH; ?>/subvention/landing"> <button type="button" class="btn btn-red btn-lg">Aanvragen<i class="fa fa-chevron-right"></i></button></a>

    </div>
</div>