<?php Type::check("ArrayList:Product", $model) ?>

<div class="container"">

    <div class="white">

        <h1>Veiling</h1>

        <!--Auction Timer-->
        <div id="auction-timer" class="padding-lg">

            <p><i class="fa fa-clock-o"></i> Deze veiling eindigt in <span id="timeRemaining">loading</span></p>

        </div>

        <!--Latest Auction products -->
        <div class="row padding-hor-md">

                <?php foreach ($model as $product){?>

                    <div class="col-sm-3 product padding-lg">

                        <i class="product-info-quality <?php echo $product->colorCode?>"></i>
                        <a href=""><img class="img-responsive" src="<?php echo $product->imagePath ?>" /></a>

                        <div class="product-info">
                            <h4 class="product-name"><?php echo $product->name ?></h4>
                            <a href="" class="auction-product-info">Bekijk product...</a>

                        </div>
                    </div>

                <?php }?>

        </div>

        <!--Auction info-->
        <div class="auction-info padding-lg">

            <a href="">Meer weten over veilingen? <i class="fa fa-chevron-right"></i></a>

        </div>

    </div>

</div>

<script>

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

        var endTime = sqlToJsDate("<?php echo AuctionProduct::getCurrentAuctionDates()[1];?>").getTime() / 1000;

        function setClock() {
            var elapsed = new Date().getTime() / 1000;
            var totalSec = endTime - elapsed;
            var d = parseInt(totalSec / 86400);
            var h = parseInt(totalSec / 3600) % 24;
            var m = parseInt(totalSec / 60) % 60;
            var s = parseInt(totalSec % 60, 10);
            var result = d + " dagen, " + h + " uur, " + m + " minuten en " + s + " seconden.";
            if(s<0){
                result = "<p>Deze veiling is afgelopen</p>";
                document.getElementById('auction-timer').innerHTML = result;
                return;
            }
            document.getElementById('timeRemaining').innerHTML = result;
            setTimeout(setClock, 1000);
        }

        setClock();

    });

</script>