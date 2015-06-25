            $(function(){
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'module-content' );
                CKEDITOR.instances['module-content'].on('change',
                    function()
                    {
                        $('#module-content').val(CKEDITOR.instances['module-content'].getData())
                    });

            });