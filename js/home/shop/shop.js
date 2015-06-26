$(document).ready(function()
{
	// Check if we should show a product modal.
	var productId = getUrlVars()["product"];
	if (productId !== undefined)
	{
		$("#product" + productId + "Modal").modal("show");
	}
	
	// Facebook.
	(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.3";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	
    $(function(){

      $(".filterHeadings").click(function() {
        $(this).next().find('ul.filterListings').slideToggle(400);
        $(this).find('i').toggleClass('category-plus-open category-plus-closed')
        $(this).find('i').toggleClass('fa-plus fa-minus')     
  
        return false;
      });
    });

    boxes = $('.product');
    maxHeight = Math.max.apply(
        Math, boxes.map(function() {
            return $(this).height();
        }).get());
    boxes.height(maxHeight);

    $(function() {
        $( "#rangeSlider" ).slider({
            range: true,
            min: $('#rangeSlider').data('minprice'),
            max: $('#rangeSlider').data('maxprice'),
            values: [ ($('#rangeSlider').data('minprice')), (($('#rangeSlider').data('maxprice'))*3) ],
            slide: function( event, ui ) {
                $( "#amount" ).html( "€" + ui.values[ 0 ] + " - €" + ui.values[ 1 ] );

                var $checkboxes = $("input[id^='type-']");

                if( $('input[type=checkbox]:checked'
                    ).length>0)
                {
                    var selector = '';
                    $checkboxes.filter(':checked').each(function() { // checked
                        selector += '.' + this.id.replace('type-', '') + ', ';
                        // builds a selector like '.A, .B, .C, '
                    });
                    selector = selector.substring(0, selector.length - 2); // remove trailing ', '

                }

                $( ".product" ).each( function( index, element ){

                    var value=$(this).data('productprice');

                    if(value >= ui.values[ 0 ] && value <= ui.values[ 1 ])
                    {
                        $(this).hide()
                            .filter(selector).show(); // reduce set to matched and show
                    }
                    else{
                        $(this).hide()
                    }

                });
            }
        });
        $( "#amount" ).html( "€" + $( "#rangeSlider").slider( "values", 0 ) +
        " - €" + $( "#rangeSlider" ).slider( "values", 1 ) );
    });

    $(function() {

        var $checkboxes = $("input[id^='type-']");
        $('input[type=checkbox]:checked').attr('checked', true);

        if( $('input[type=checkbox]:checked'
            ).length>0)
        {
            var selector = '';
            $checkboxes.filter(':checked').each(function() { // checked
                selector += '.' + this.id.replace('type-', '') + ', ';
                // builds a selector like '.A, .B, .C, '
            });
            selector = selector.substring(0, selector.length - 2); // remove trailing ', '
            $('.product').hide() // hide all rows
                .filter(selector).show(); // reduce set to matched and show

            $( ".product" ).each( function( index, element ){

                var value=$(this).data('productprice');

                if(value >= $( "#rangeSlider").slider( "values", 0 ) && value <= $( "#rangeSlider" ).slider( "values", 1 ))
                {
                    $(this).hide() // hide all rows
                        .filter(selector).show(); // reduce set to matched and show
                }
                else{
                    $(this).hide()
                }

            });

        }else
        {
            $('.product').show()
        }

        $checkboxes.change(function() {
            //console.log($('input[type=checkbox]:checked').length);
            if( $('input[type=checkbox]:checked'
                ).length>0)
            {
                var selector = '';
                $checkboxes.filter(':checked').each(function() { // checked
                    selector += '.' + this.id.replace('type-', '') + ', ';
                    // builds a selector like '.A, .B, .C, '
                });
                selector = selector.substring(0, selector.length - 2); // remove trailing ', '
                $('.product').hide() // hide all rows
                    .filter(selector).show(); // reduce set to matched and show

                $( ".product" ).each( function( index, element ){

                    var value=$(this).data('productprice');

                    if(value >= $( "#rangeSlider").slider( "values", 0 ) && value <= $( "#rangeSlider" ).slider( "values", 1 ))
                    {
                        $(this).hide() // hide all rows
                            .filter(selector).show(); // reduce set to matched and show
                    }
                    else{
                        $(this).hide()
                    }

                });

            }else
            {
                $('.product').show()
            }
        });

    });

    $('#type-All').click(function(event) {
        if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
                $( ".product" ).each( function( index, element ){

                    var value=$(this).data('productprice');

                    if(value >= $( "#rangeSlider").slider( "values", 0 ) && value <= $( "#rangeSlider" ).slider( "values", 1 ))
                    {
                        $(this).show();
                    }
                    else{
                        $(this).hide()
                    }
                });
            });
        }
        else{
            $(':checkbox').each(function() {
                this.checked = false;
                $('.product').hide()
            });
        }
    });

});

function getUrlVars()
{
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value)
	{
		vars[key] = value;
	});
	return vars;
}