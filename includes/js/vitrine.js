$(document).ready(function(){ 
    
    $(function(){
//      $("ul.filterListings").hide();

      $(".filterHeadings").click(function() {
        $(this).next().find('ul.filterListings').slideToggle(400);
        $(this).find('i').toggleClass('category-plus-open category-plus-closed')
        $(this).find('i').toggleClass('fa-plus fa-minus')     
  
        return false;
      });
    });



    $(function(){

        var prices = document.querySelector('#priceRanges');
        var pricesStr = prices.dataset.prices;
        var pricesArray = pricesStr.split(",");


    $( "#slider-range" ).slider({
      range: true,
      min: Math.floor(pricesArray[0]),
      max: Math.ceil(pricesArray[1]),
      values: [ Math.ceil(pricesArray[1]*0.25), Math.ceil(pricesArray[1]*0.75) ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "€" + ui.values[ 0 ] + " - €" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "€" + $( "#slider-range" ).slider( "values", 0 ) +
      " - €" + $( "#slider-range" ).slider( "values", 1 ) );
  });

    boxes = $('.product');
    maxHeight = Math.max.apply(
        Math, boxes.map(function() {
            return $(this).height();
        }).get());
    boxes.height(maxHeight);

    $("#myDiv").text().length;

    $('#filterOptions li a').click(function() {
        // fetch the class of the clicked item
        var ourClass = $(this).attr('class');

        // reset the active class on all the buttons
        $('#filterOptions li').removeClass('active');
        // update the active state on our clicked button
        $(this).parent().addClass('active');

        if(ourClass == 'all') {
            // show all our items
            $('#ourHolder').children('div.item').show();
        }
        else {
            // hide all elements that don't share ourClass
            $('#ourHolder').children('div:not(.' + ourClass + ')').hide();
            // show all elements that do share ourClass
            $('#ourHolder').children('div.' + ourClass).show();
        }
        return false;
    });
       
});