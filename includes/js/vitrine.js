//$(document).ready(function({ 
//
//$( ".filter-category" ).click(function() {
//  $( ".filter-category" ).slideToggle( "slow", function() {
//    
////        $(this).toggleClass( "filter-category-show" );
//    
//  });
//});
//    
//    
//});

$(document).ready(function(){ 

$( "#clickme" ).click(function() {
  $( "#book" ).slideToggle( "slow", function() {
    // Animation complete.
  });
});
    
//$( ".filter-category" ).click(function() {
//  $( ".filter-category" ).slideToggle( "slow", function() {
//    
//$(this).toggleClass( "filter-category-show" );
//    
//  });
//});
    
$(".filter-category").click(function() {
    $(this).next().children('ul.categories').slideToggle(300);
    return false;
});    
    
$(function(){
  $("ul.filterListings").hide();

  $(".filterHeadings").click(function() {
    $(this).next().find('ul.filterListings').slideToggle(600);
    return false;
  });
});    
    
    
});