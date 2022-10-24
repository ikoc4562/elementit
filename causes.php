<?php
include "header.php";
//include 'ayarlar.php';


?>
    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/causes.png')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>R.E.L elementit</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="home">Kotisivu</a></li>
                <li class="active">R.E.L elementit</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->

    <!--Causes Section-->
    <section class="causes-section">

        <div class="auto-container">
            <div class="sec-title centered">
                <div class="sub-title">R.E.L elementi</div>
                <h2>Tuotteemme</h2>
            </div>

        	<div class="row clearfix">

                <?php
                    $sql = $db->query('select * from causes where is_deleted=0');
                    $causes = $sql->fetchAll();
                    foreach ($causes as $cause){
                    ?>

                    <div class="cause-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                            <div class="image-box">
                                <figure class="image"><a href="product-detail-<?=$cause[0]?>"> <img class="lazy-image" src="images/<?=$cause[4]?>" data-src="" alt=""></a></figure>
                            </div>

                            <div class="lower-content">
                                <h3><a href="product-detail-<?=$cause[0]?>"><?=$cause[1]?></a></h3>
                                <div class="link-box"><a href="product-detail-<?=$cause[0]?>" class="theme-btn btn-style-two"><span class="btn-title">Lisää</span></a></div>
                            </div>
                        </div>
                    </div>



                    <?php
                }
                ?>


            </div>

        </div>
    </section>



    <!-- Call To Action Section -->
    <!--End Gallery Section -->


<?php
include "footer.php";

?>
