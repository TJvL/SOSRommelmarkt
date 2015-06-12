tinymce.init({
    selector: "textarea#elm1",
    theme: "modern",
    width: 600,
    height: 300,
    plugins: [
         // "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         // "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         // "save table contextmenu directionality emoticons template paste textcolor"
   ],
   // content_css: "css/content.css",
   toolbar: " styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
