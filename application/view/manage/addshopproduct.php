<div class="container">
    <div class="white">
        <div class="content">
            <div class="row">
                <div class="col-md-1">
                    <a href="<?php echo ROOT_PATH . '/manage/manageproduct'?>" class="btn btn-default">Back</a>
                </div>
            </div>

            <div class="idealsteps-container">

                <nav class="idealsteps-nav"></nav>

                <form action="<?php echo ROOT_PATH . '/manage/addshopproduct'?>" method="POST" enctype="multipart/form-data" autocomplete="off" class="idealforms" id="product_add">

                    <div class="idealsteps-wrap">

                        <!-- Step 1 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Product naam:</label>
                                <input form="product_add" name="name" type="text">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Product omschrijving:</label>
                                <textarea form="product_add" name="description" cols="10" rows="5" style="resize: none"></textarea>
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="next">Volgende &raquo;</button>
                            </div>

                        </section>

                        <!-- Step 2 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Prijs:</label>
                                <input form="product_add" name="price" type="text" placeholder="00,00">
                                <span class="error"></span>
                            </div>


                            <div class="field">
                                <label class="main">Kleur code:</label>
                                <select form="product_add" name="colorCode" id="">
                                    <option value="default">&ndash; Selecteer een optie &ndash;</option>
                                    <?php
                                    foreach($model as $colorCode)
                                    {
                                        echo "<option value='$colorCode->name'>$colorCode->name - $colorCode->description</option>";
                                    }
                                    ?>
                                </select>
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button type="button" class="prev">&laquo; Vorige</button>
                                <button form="product_add"  type="submit" class="submit">Opslaan</button>
                            </div>

                        </section>

                    </div>

                    <span id="invalid"></span>

                </form>

            </div>

        </div>
    </div>
</div>