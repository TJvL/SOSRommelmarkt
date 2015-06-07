<div class="container">
    <div class="white">
        <div class="content">
            <div class="row">
                <div class="col-md-1">
                    <a href="<?php echo ROOT_PATH . '/manage/shopproductoverview'?>" class="btn btn-default">Terug</a>
                </div>

            </div>
            <div class="row margin-hor-sm">
                <h1>Winkel product toevoegen</h1>
            </div>

            <div class="idealsteps-container">

                <nav class="idealsteps-nav"></nav>

                <form action="javascript:addShopProduct()" autocomplete="off" class="idealforms" id="product_add">

                    <div class="idealsteps-wrap">

                        <!-- Step 1 -->

                        <section class="idealsteps-step">

                            <div class="field">
                                <label class="main">Product naam:</label>
                                <input form="product_add" name="name" id="name" type="text">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Product omschrijving:</label>
                                <textarea form="product_add" name="description" id="description" cols="10" rows="5" style="resize: none"></textarea>
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
                                <input form="product_add" name="price" id="price" type="text" placeholder="€ 00,00">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <label class="main">Kleur code:</label>
                                <select form="product_add" name="colorCode" id="colorCode">
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
            <div class="row">
                <div class="col-md-12 padding-lg">
                    <p id="status" class="padding-lg"></p>
                </div>
            </div>

        </div>
    </div>
</div>