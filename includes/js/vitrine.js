$(document).ready(function(){ 
    
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

});