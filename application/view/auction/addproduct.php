<div class="container">
    <div class="white">
        <div class="content">
            <div class="row">
                <div class="col-md-1">
                    <a href="/SOSRommelmarkt/manage/editauction/<?php echo $_GET['id']; ?>" class="btn btn-default">Terug naar Beheer</a>
                </div>
            </div>

            <div class="idealsteps-container">

                <nav class="idealsteps-nav"></nav>

                <form action="<?php echo ROOT_PATH ?>/auction/addProduct" method="POST" enctype="multipart/form-data" autocomplete="off" class="idealforms" id="product_add">

                    <input type="hidden" name="auctionId" value="<?php echo $_GET['id'];?>" />

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
                                <label class="main">Kleur code:</label>
                                <select form="product_add" name="colorCode" id="">
                                    <option value="default">&ndash; Selecteer een optie &ndash;</option>
                                    <option value="blue">Blauw</option>
                                    <option value="green">Groen</option>
                                    <option value="yellow">Geel</option>
                                    <option value="red">Rood</option>
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