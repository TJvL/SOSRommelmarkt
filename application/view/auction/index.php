<?php Type::check("ArrayList:Product", $model) ?>

<div class="container"">

    <div class="white">

        <h1>Vitrine</h1>

        <!--Auction Timer-->
        <div id="auction-timer" class="padding-lg">

            <p><i class="fa fa-clock-o"></i> Deze vitrine eindigt in <span id="timeRemaining">loading</span></p>

        </div>

        <!--Latest Auction products -->
        <div class="row padding-hor-md">

                <?php foreach ($model as $product){?>

                    <div class="col-sm-3 product padding-lg">

                        <i class="product-info-quality <?php echo $product->colorCode?>"></i>
                        <a href="#" data-toggle="modal" data-target=".bs-<?php echo $product->id; ?>-modal-lg"><img class="img-responsive" src="<?php echo $product->imagePath ?>" /></a>

                        <div class="product-info">
                            <h4 class="product-name"><?php echo $product->name ?></h4>
                            <button type="button" class="btn-clear" data-toggle="modal" data-target=".bs-<?php echo $product->id; ?>-modal-lg">
                                <a href="#" class="auction-product-info">Bekijk product...</a>
                            </button>

                            <!-- modal start -->
                            <div class="modal fade bs-<?php echo $product->id; ?>-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div style="padding:12px;">
                                            <!-- Carousel start -->
                                            <div id="prod-<?php echo $product->id; ?>-carousel" class="carousel slide" style="display:inline-table;" data-ride="carousel">

                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                    <?php
                                                    $count = 0;
                                                    foreach($product->getImagePaths() as $path)
                                                    {
                                                        if($count == 0)
                                                        {
                                                            echo '<li data-target="#prod-' . $product->id . '-carousel" data-slide-to="' . $count . '" class="active"></li>';
                                                        }
                                                        else
                                                        	echo '<li data-target="#prod-' . $product->id . '-carousel" data-slide-to="' . $count . '"></li>';
                                                        $count = $count + 1;
                                                    }
                                                    ?>
                                                </ol>

                                                <!-- Data -->
                                                <div class="carousel-inner" role="listbox">
                                                    <?php
                                                    $count = 0;
                                                    foreach($product->getImagePaths() as $path)
                                                    {
                                                        if($count == 0)
                                                        {
                                                            echo '<div class="item active"><img class="img" src="' . $path . '" alt="image for {{x.name}}"/></div>';
                                                        }
                                                        else
                                                        	echo '<div class="item"><img class="img" src="' . $path . '" alt="image for {{x.name}}"/></div>';
                                                        $count = $count + 1;
                                                    }
                                                    ?>
                                                </div>

                                                <!-- Controls -->
                                                <a class="left carousel-control" href="#prod-<?php echo $product->id; ?>-carousel" role="button" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#prod-<?php echo $product->id; ?>-carousel" role="button" data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>

                                            </div>
                                            <!-- Carousel end -->
                                            <div style="display: inline-block; width: 65%; vertical-align: top;">
                                                <div class="row margin-sm">
                                                    <div class="col-md-12 margin-lg black-bar">
                                                        <h1><?php echo $product->name; ?></h1>
                                                    </div>
                                                    <div class="col-md-12 margin-lg padding-hor-lg red-bar">
                                                        <h4>Beschrijving</h4>
                                                    </div>
                                                    <div class="col-md-12 margin-lg padding-sm">
                                                        <p>
                                                            <?php echo $product->description; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal end -->

                        </div>
                    </div>
                <?php }?>

        </div>

        <!--Auction info-->
        <div class="auction-info padding-lg">
            <a href="#" data-toggle="modal" data-target=".bs-auction-info-modal-lg">Meer weten over onze vitrine? <i class="fa fa-chevron-right"></i></a>
            <div class="modal fade bs-auction-info-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div style="margin-left: 12px; color:black;">
                        <h3>Over de Vitrine</h3>
                        <p>
                            Elke maand worden er bijzondere artikelen in onze vitrinekast geplaatst. Iedereen kan een bod op een van deze artikelen uitbrengen.<br />
                            Bij de kassa in de winkel liggen biedbriefjes. Op het biedbriefje schrijf je:
                        </p>
                        <ul>
                            <li>je naam</li>
                            <li>je telefoonnummer</li>
                            <li>welk bedrag je wilt betalen</li>
                        </ul>
                        <p>
                            Je ingevulde briefje gaat in de bus naast de vitrinekast. elke laatste zaterdag van de maand worden alle biedbriefjes verzameld en de hoogste bieder wordt telefonisch benaderd.
                        </p>
                    </div>
                </div>
            </div>
        </div>
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
                result = "<p>Deze vitrine is afgelopen</p>";
                document.getElementById('auction-timer').innerHTML = result;
                return;
            }
            document.getElementById('timeRemaining').innerHTML = result;
            setTimeout(setClock, 1000);
        }

        setClock();

    });

</script>