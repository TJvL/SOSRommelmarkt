function getBaseURL() {
    var url = location.href;  // entire url including querystring - also: window.location.href;
    var baseURL = url.substring(0, url.indexOf('/', 14));


    if (baseURL.indexOf('http://localhost') != -1) {
        // Base Url for localhost
        var url = location.href;  // window.location.href;
        var pathname = location.pathname;  // window.location.pathname;
        var index1 = url.indexOf(pathname);
        var index2 = url.indexOf("/", index1 + 1);
        var baseLocalUrl = url.substr(0, index2);

        return baseLocalUrl + "/";
    }
    else {
        // Root Url for domain name
        return baseURL + "/";
    }

}

function translateHttpError(message)
{
    var translatedMessage = message;
    switch (translatedMessage)
    {
        case "Bad Request":
            translatedMessage = "Actie niet geaccepteerd door server, check actie parameters.";
            return translatedMessage;
        case "Unauthorized":
            translatedMessage = "U bent niet bevoegd om deze actie uit te voeren.";
            return translatedMessage;
        case "Forbidden":
            translatedMessage = "Deze actie is verboden.";
            return translatedMessage;
        case "Not Found":
            translatedMessage = "De aangevraagde gegevens konden niet gevonden worden.";
            return translatedMessage;
        case "Method Not Allowed":
            translatedMessage = "HTTP request methode wordt niet ondersteund op deze actie.";
            return translatedMessage;
        default :
            translatedMessage = "Interne server fout. Probeer opnieuw of neem contact op met de beheerder.";
            return translatedMessage;
    }
}

