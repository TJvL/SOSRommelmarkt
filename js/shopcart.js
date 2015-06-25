

jQuery(document).ready(function($){
    //if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
    var $L = 1200,
        $menu_navigation = $('#main-nav'),
        $cart_trigger = $('.cd-cart-trigger'),
        $hamburger_icon = $('#cd-hamburger-menu'),
        $lateral_cart = $('#cd-cart'),
        $shadow_layer = $('#cd-shadow-layer');

    //open lateral menu on mobile
    $hamburger_icon.on('click', function(event){
        event.preventDefault();
        //close cart panel (if it's open)
        $lateral_cart.removeClass('speed-in');
        toggle_panel_visibility($menu_navigation, $shadow_layer, $('body'));
    });

    //open cart
    $cart_trigger.on('click', function(event){
        event.preventDefault();
        //close lateral menu (if it's open)
        $menu_navigation.removeClass('speed-in');
        toggle_panel_visibility($lateral_cart, $shadow_layer, $('body'));
    });



    //close lateral cart or lateral menu
    $shadow_layer.on('click', function(){
        $shadow_layer.removeClass('is-visible');
        // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
        if( $lateral_cart.hasClass('speed-in') ) {
            $lateral_cart.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                $('body').removeClass('overflow-hidden');
            });
            $menu_navigation.removeClass('speed-in');
        } else {
            $menu_navigation.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                $('body').removeClass('overflow-hidden');
            });
            $lateral_cart.removeClass('speed-in');
        }
    });

    //move #main-navigation inside header on laptop
    //insert #main-navigation after header on mobile
    move_navigation( $menu_navigation, $L);
    $(window).on('resize', function(){
        move_navigation( $menu_navigation, $L);

        if( $(window).width() >= $L && $menu_navigation.hasClass('speed-in')) {
            $menu_navigation.removeClass('speed-in');
            $shadow_layer.removeClass('is-visible');
            $('body').removeClass('overflow-hidden');
        }

    });

    refreshCart();
});

function toggle_panel_visibility ($lateral_panel, $background_layer, $body) {
    if( $lateral_panel.hasClass('speed-in') ) {
        // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
        $lateral_panel.removeClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
            $body.removeClass('overflow-hidden');
        });
        $background_layer.removeClass('is-visible');

    } else {
        $lateral_panel.addClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
            $body.addClass('overflow-hidden');
        });
        $background_layer.addClass('is-visible');
    }
}

function move_navigation( $navigation, $MQ) {
    if ( $(window).width() >= $MQ ) {
        $navigation.detach();
        $navigation.appendTo('header');
    } else {
        $navigation.detach();
        $navigation.insertAfter('header');
    }
}

function showCart() {
    $('.cd-cart-trigger').click();
}

function deleteProductFromCart(id){

    var data =
    {
        id:id
    };

    $.ajax(
        {
            url: getBaseURL() + "cartapi/deleteitem",
            type: "POST",
            data: data,
            async: true,
            success: function () {
                refreshCart()
                //$("#status").text("Productgegevens succesvol gewijzigd.");
                //$("#status").addClass("alert-success");
            },
            error: function (status) {
                $("#status").text(status.status + ": " + translateHttpError(status.statusText));
                $("#status").addClass("alert-danger");
            }
        });
}

function refreshCart(){

    $.ajax(
        {
            url: getBaseURL() + "cartapi/get",
            type: "GET",
            async: true,
            success: function (cartVM) {
                var $cartVM = cartVM;
                var list = $(".cd-cart-items");
                var totalPrice =0.0;
                var amount = 0;

                list.empty();
                for (i in $cartVM.cartContent) {

                    var listItem = '<li>'+
                        '            <div class="row">'+
                        '                <div class="col-sm-6">'+
                        $cartVM.cartContent[i].name +
                        '                    <div class="cd-price">Prijs: €' + $cartVM.cartContent[i].price + '</div>'+
                        '                </div>'+
                        '                <div class="col-sm-4">'+
                        '                    <img class="cart-product-image" src=' + $cartVM.cartContent[i].imagePath + ' />'+
                        '                </div>'+
                        '                <div class="col-sm-2">'+
                        '                    <button class="btn btn-danger" onclick=' + "deleteProductFromCart(" + $cartVM.cartContent[i].id + ")" + '><i class="fa fa-trash"></i></button>'+
                        '                </div>'+
                        '             </div>'+
                        ''+
                        '        </li>';

                    list.append(listItem);
                    totalPrice += parseInt($cartVM.cartContent[i].price);
                    amount++;
                }
                $(".cd-cart-total").html('<p>Totaal <span>€' + totalPrice + '</span></p>')
                $('#cd-cart-amount').html("(" + amount + ")");
            }
        });
}



