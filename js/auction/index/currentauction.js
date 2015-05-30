$(document).ready(function() {

    function sqlToJsDate(sqlDate){
        //sqlDate in SQL DATETIME format ("yyyy-mm-dd hh:mm:ss.ms")
        var sqlDateArr1 = sqlDate.split("-");
        //format of sqlDateArr1[] = ['yyyy','mm','dd hh:mm:ms']
        var sYear = sqlDateArr1[0];
        var sMonth = (Number(sqlDateArr1[1]) - 1).toString();
        var sqlDateArr2 = sqlDateArr1[2].split(" ");
        //format of sqlDateArr2[] = ['dd', 'hh:mm:ss.ms']
        var sDay = sqlDateArr2[0];

        return new Date(sYear,sMonth,sDay);
    }

    var sqlDate = $('#timeValue').val();
    var endTime = sqlToJsDate(sqlDate).getTime() / 1000;

    function setClock() {
        var elapsed = new Date().getTime() / 1000;
        var totalSec = endTime - elapsed;
        var d = parseInt(totalSec / 86400);
        var h = parseInt(totalSec / 3600) % 24;
        var m = parseInt(totalSec / 60) % 60;
        var s = parseInt(totalSec % 60, 10);
        var result = d + " dagen, " + h + " uur, " + m + " minuten en " + s + " seconden.";
        if(s<0){
            result = "<p>Deze vitrine is afgelopen</p>";
            document.getElementById('auction-timer').innerHTML = result;
            return;
        }
        document.getElementById('timeRemaining').innerHTML = result;
        setTimeout(setClock, 1000);
    }

    setClock();

});
