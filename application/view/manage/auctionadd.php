<div class="container">
    <div class="white">
            <div class="row">
                <div class="col-md-1">
                    <a href="<?php echo ROOT_PATH . '/manage/auctionoverview'?>" class="btn btn-default">Terug</a>
                </div>
            </div>
            <div class="row margin-hor-sm">
                <h1>Vitrine periode toevoegen</h1>
            </div>
            <div class="idealsteps-container">

                <form action="javascript:addAuction()" autocomplete="off" class="idealforms" id="auction_add">

                    <div class="field">
                        <label class="main">Startdatum:</label>
                        <input form="auction_add" type="text" name="startDate" id="startDate" placeholder="yyyy-mm-dd" class="datepicker">
                        <span class="error"></span>
                    </div>
                    <div class="field">
                        <label class="main">Einddatum:</label>
                        <input form="auction_add" type="text" name="endDate" id="endDate" placeholder="yyyy-mm-dd" class="datepicker">
                        <span class="error"></span>
                    </div>
                    <div class="field buttons">
                        <label class="main">&nbsp;</label>
                        <button form="auction_add"  type="submit" class="submit">Opslaan</button>
                    </div>

                    <span id="invalid"></span>

                </form>

            </div>
    </div>
</div>