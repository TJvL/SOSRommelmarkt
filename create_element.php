<?php include("includes/markup/manage_header.php"); ?>
<div class="container">
            <form>
                <div class="col-md-12">
                    <input id="elementTitle" class="titleField" type="text">
                </div>
                <div class="col-md-12">
                    <textarea cols="70" rows="5" id="elementContent"></textarea>
                </div>
                <div class="col-md-12">
                    <button type="button">Terug</button>
                    <button type="button"
                            onclick="previewElement()">
                        Preview
                    </button>
                    <input type="submit" value="Opslaan">
                </div>
            </form>
        </div>
        <div class="container">
            <div class="col-md-12" id="preview">
            </div>
        </div>
        <script>
            function previewElement()
            {
                var elementContent = document.getElementById('elementContent').value;
                document.getElementById('preview').innerHTML = elementContent;
            }
        </script>
    </body>
</html>