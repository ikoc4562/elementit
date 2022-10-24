<?php
include "header.php";
$sql = $db->query('select * from services where is_deleted=0');
$services = $sql->fetchAll();

?>

<!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/services.png')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>Talo Paketit</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="home">Kotisivu</a></li>
                <li class="active">Talo Paketit</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->

    <!--What We Do Section-->
    <section class="what-we-do">
        <div class="auto-container">
            <div class="sec-title centered">
                <div class="sub-title">R.E.L Talo Paketit</div>
                <h2>Talo Pakettimme</h2>
            </div>
            <div class="row clearfix">

                <!--Service Block-->

                <?php
                foreach ($services as $service){
                    ?>

                    <div class="service-block col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="icon-box"><span class="<?=$service['icon']?>"></span></div>
                            <h3><?=$service['title']?></h3>
                            <div class="text"><?=$service['text']?></div>
                        </div>
                    </div>



                    <?php
                }

                ?>

            </div>

            <div class="bottom-image"><img class="lazy-image" src="images/background/anahtar.jpeg" data-src="images/background/anahtar.jpeg" alt=""></div>

        </div>
    </section>
</br>






<?php
include
"footer.php";
?>
