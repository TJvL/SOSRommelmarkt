/**
 * Created by Conno on 30-5-2015.
 */
$(document).on('click', '#js-handler-preview', renderPreview);

function renderPreview()
{
    $.post("/SOSRommelmarkt/preview/index",
        {
            id: $('#module-id').val(),
            content: $('#module-content').val(),
            heading: $('#module-heading').val(),
            reference_label: $('#module-reference-label').val(),
            reference: "#"
        },
        function(data, status) {
            var html = $('<div>' + data + '</div>');
            html.find('script').remove();
            html.find('nav').remove();
            html.find('#footerContainer').remove();
            html.find('meta').remove();
            html.find('title').remove();
            html.find('title').remove();
            html.find('a').attr('href', '#');
            $("#preview-div").html(html.html());
        }
    );
}