<div class="container">
    <div class="white">
        <div class="content">
            <div class="row">
                <div class="col-md-1">
                    <a href="<?php echo ROOT_DIR . '/manage/auctions'?>" class="btn btn-default">Terug</a>
                </div>
            </div>

            <div class="idealsteps-container">

                <form action="<?php echo ROOT_DIR . '/manage/addauction'?>" method="POST" enctype="multipart/form-data" autocomplete="off" class="idealforms" id="auction_add">

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

<script type="text/javascript">
    //Initialize ideal forms
    $('#auction_add').idealforms({

        // Do not select the first input field and show error message.
        silentLoad: true,

        //Add rules for the input fields
        rules: {
            'startDate': 'required date:yyyy-mm-dd',
            'endDate': 'required date:yyyy-mm-dd'
        },


        //When submit is pressed catch the event.
        onSubmit: function(invalid,event) {

            // if the form is invalid (everything is not filled in correctly) then show an error and prevent submit.
            if (invalid > 0) {
                event.preventDefault();
                $('#invalid').show().text(invalid +' ongeldige velden!');
            // else submit the form in a POST request
            } else {
                $('#invalid').hide();
            }
        }
    });

    //Checks input fields and show message on bottom after every user input.
    $('#aution_add').find('input, select, textarea').on('change keyup', function() {
        $('#invalid').hide();
    });

    //Prompts idealforms to show the next step in the form.
    $('.prev').click(function(){
        $('.prev').show();
        $('form.idealforms').idealforms('prevStep');
    });
    //Prompts idealforms to show the previous step in the form.
    $('.next').click(function(){
        $('.next').show();
        $('form.idealforms').idealforms('nextStep');
    });

    $('.datepicker').datepicker('option', 'dateFormat', 'yyyy-mm-dd');
</script>