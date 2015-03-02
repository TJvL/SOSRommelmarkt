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
    
    $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 700,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "€" + ui.values[ 0 ] + " - €" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "€" + $( "#slider-range" ).slider( "values", 0 ) +
      " - €" + $( "#slider-range" ).slider( "values", 1 ) );
  });
    
    
       
});