            $(function(){
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description' );
                CKEDITOR.instances['description'].on('change',
                    function()
                    {
                        $('#description').val(CKEDITOR.instances['description'].getData())
                    });

                

            });