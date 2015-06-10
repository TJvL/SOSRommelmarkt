/**
 * Created by Bram on 9-6-2015.
 */

//check if user is mobile
function isMobile(device)
{
    switch(device) {
        case "Android":
            return navigator.userAgent.match(/Android/i);
            break;
        case "Blackberry":
            return navigator.userAgent.match(/BlackBerry/i);
            break;
        case "iOS":
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            break;
        case "Opera":
            return navigator.userAgent.match(/Opera Mini/i);
            break;
        case "Windows":
            return navigator.userAgent.match(/IEMobile/i);
            break;
        case "any":
            return (isMobile("Android") || isMobile("BlackBerry") || isMobile("iOS") || isMobile("Opera") || isMobile("Windows"));
            break;
        default:

    }
}


$( document ).ready(function() {

    if(isMobile("any"))
    {
        //show mobile header, hide normal header
        $('#desktop_header').hide();
        $('#mobile_header').show();
    }
    else
    {
        //show normal header, hide mobile header
        $('#mobile_header').hide();
        $('#desktop_header').show();
    }

});
