            $(function(){
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.

                CKEDITOR.replace( 'content' );

                CKEDITOR.instances['content'].on('change',
                    function()
                    {
                        $('#content').val(CKEDITOR.instances['content'].getData())
                    });
                

            });