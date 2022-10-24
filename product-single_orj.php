<?php
include "header.php";

?>
<div class="page-wrapper">
    <!-- Preloader -->

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/singlepro.jpeg')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>Yksittäinen tuote</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="home">Kotisivu</a></li>
                <li class="active">Yksittäinen tuote</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->
    <?php

    $sql = $db->prepare('select * from causes where id=:id  ');
    $sql->execute([
        'id'=>$_GET['id'],
    ]);
    $causes = $sql->fetchAll();

    ?>
    <!-- Product Detail -->
    <section class="product-details">
        <div class="auto-container">
            <!--Basic Details-->
            <div class="basic-details">
                <div class="row clearfix">
                    <div class="image-column col-md-6 col-sm-12">



                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="banner-carousel love-carousel owl-theme owl-carousel"
                                 data-options='{"loop": true, "margin": 0,
                                 "autoheight":false, "lazyload":true,
                                 "nav": true, "dots": true, "autoplay": true,
                                 "autoplayTimeout": 4000, "smartSpeed": 300,
                                 "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>
                                <!-- Slide Item -->


                                <?php
                                $sql = $db->query('select * from relImage where is_deleted=0 and relid='.$_GET['id'].'');
                                $images = $sql->fetchAll();
                                foreach ($images as $image){
                                    ?>

                                    <div class="slide-item">
                                        <div class="image-layer lazy-image" data-bg="url('images/<?=$image[2]?>')"></div>
                                    </div>

                                    <?php
                                }
                                ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                    <div class="info-column col-md-6 col-sm-12">
                        <div class="inner-column">
                            <div class="details-header">
                                <h3><?=$causes[0][1]?></h3>

                            </div>

                            <div class="text"><?=$causes[0][2]?></div>


                            <div class="social-links">
                                <ul class="social-icon-three">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Basic Details-->

            <!--Product Info Tabs-->

            <div class="container text-center">
                <div class="row">
                                <div class="col">

                                    <?php
                                    if(!empty($causes[0][3])){
                                    ?>
                                        <h3 class="title"><?=$causes[0][1]?> tuoteperheen tekniset tiedot
                                        </h3>
                                    <p><?=$causes[0][3]?></p>

                                    <div class="table-footer"><p>*Halkaistussa kivessä määräytyy rakenteen mukaan.<br>
                                            **Valmiin, pinnoitetun seinän ominaisuus</p>
                                    </div>
                                        <?php

                                    }
                                    ?>
                                </div>
                                <div class="col">

                                    <?php

                                    $sql = $db->prepare('select * from dokumans where relid=:relid and is_deleted=0 ');
                                    $sql->execute([
                                        'relid'=>$_GET['id'],
                                    ]);
                                    $doks = $sql->fetchAll();
                                    $count = $sql->rowCount();
                                    if($count>0){
                                    ?>
                                        <h3 class="title">Ohjeet ja dokumentit

                                        </h3>
                                        <table class="table table-striped">

                                            <?php
                                            if(@$doks[0][2]){
                                            ?>
                                            <tr>
                                                <td>Suoritustasoilmoitus (DoP) </td>
                                                <td><a download=""  href="images/<?=$doks[0][2]?>">Lataa PDF</a></td>
                                            </tr>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                            if(@$doks[0][3]){
                                            ?>
                                            <tr>
                                                <td>Ympäristöseloste (EPD)</td>
                                                <td><a download=""  href="images/<?=$doks[0][3]?>">Lataa PDF</a></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if(@$doks[0][4]){
                                            ?>
                                            <tr>
                                                <td>Tuotesertifikaatti</td>
                                                <td><a download=""  href="images/<?=$doks[0][4]?>">Lataa PDF</a></td>
                                            </tr>
                                            <?php
                                    }
                                    ?>

                                            <?php
                                            if(@$doks[0][5]){
                                                ?>
                                            <tr>
                                                <td>Työohjeet </td>
                                                <td><a download="" href="images/<?=$doks[0][5]?>">Lataa PDF</a></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if(@$doks[0][6]){
                                                ?>
                                            <tr>
                                                <td>Suunnitteluohjeet</td>
                                                <td><a download="" href="images/<?=$doks[0][6]?>">Lataa PDF</a></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>

                                        </table>

                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
            </div>
            <!--End Product Info Tabs-->

        </div>

    </section>
    <!-- End Product Detail -->
    <div class="container">
        <div class="row">
            <?php

            $sql = $db->prepare('select * from videos where relid=:relid and is_deleted=0  ');
            $sql->execute([
                'relid'=>$_GET['id'],
            ]);
            $doks = $sql->fetchAll();
            $count = $sql->rowCount();
            if($count>0){

            ?>
            <video width="800" controls>
                <source src="images/<?=$doks[0][4]?>" type="video/mp4">
                Your browser does not support HTML video.
            </video>
                <?php
            }
            ?>
        </div>
    </div>
    <!-- Related Products -->
    <section class="related-products">
        <div class="auto-container">
            <div class="sec-title centered">
                <div class="sub-title">R.E.L</div>
                <h2>Liittyvät tuotteet</h2>
            </div>

            <div class="related-products-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 500, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "1" }, "800" :{ "items" : "2" }, "1024":{ "items" : "3" }, "1366":{ "items" : "3" }}}'>
                <!--Shop Item-->
                <?php
                $sql=$db->query('select * from causes where  is_deleted=0 and id not in('.$_GET['id'].')');
                $causes=$sql->fetchAll();
                foreach ($causes as $cause) {
                ?>
                <div class="shop-item">
                    <div class="inner-box">
                        <div class="image">
                            <img class="lazy-image owl-lazy" src="images/<?= $cause['picture'] ?>" data-src="images/<?= $cause['picture'] ?>" alt="" />
                            <div class="overlay-box">
                                <ul class="option-box">
                                    <li><a href="images/<?= $cause['picture'] ?>" class="lightbox-image" data-fancybox="products"><span class="fa fa-search"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="product-detail-<?=$cause[0]?>""><?= $cause['title'] ?></a></h3>
                        </div>
                    </div>
                </div>

                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!--End Related Products -->


</div>
<?php
include "footer.php";

?>
