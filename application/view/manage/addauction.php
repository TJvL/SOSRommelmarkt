<div class="container">
    <div class="white">
        <div class="content">
            <div class="row">
                <div class="col-md-1">
                    <a href="<?php echo ROOT_PATH . '/manage/auctions'?>" class="btn btn-default">Terug</a>
                </div>
            </div>

            <div class="idealsteps-container">

                <form action="<?php echo ROOT_PATH . '/manage/addauction'?>" method="POST" enctype="multipart/form-data" autocomplete="off" class="idealforms" id="auction_add">

                    <div class="idealsteps-wrap">

                        <!-- Step 1 -->

                        <section class="idealsteps-step">
                        
                        	<div class="field">
                        		<label class="main">Startdatum:</label>
                        		<input form="auction_add" type="text" name="startDate" placeholder="yyyy-mm-dd" class="datepicker">
                        		<span class="error"></span>
                        	</div>
                        	<div class="field">
                        		<label class="main">Einddatum:</label>
                        		<input form="auction_add" type="text" name="endDate" placeholder="yyyy-mm-dd" class="datepicker">
                        		<span class="error"></span>
                        	</div>
                        	<div class="field buttons">
                                <label class="main">&nbsp;</label>
                                <button form="auction_add"  type="submit" class="submit">Opslaan</button>
                            </div>

                        </section>
                    </div>

                    <span id="invalid"></span>

                </form>

            </div>

        </div>
    </div>
</div>