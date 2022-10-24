<?php
include "header.php";
error_reporting(0);

$sql = $db->query('select * from about');
$about = $sql->fetchAll();

$sql = $db->query('select * from about_counter');
$about_counts = $sql->fetchAll();

$sql = $db->query('select * from causes where is_deleted=0');
$causes = $sql->fetchAll();


$sql = $db->query('select * from services where is_deleted=0 limit 4');
$services = $sql->fetchAll();

?>

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/aboutus.jpg')"></div>
        <div class="bottom-rotten-curve alternate"></div>

        <div class="auto-container">
            <h1>Meiltä</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.php">Kotisivu</a></li>
                <li class="active">Meiltä</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->

	<!--About Section-->
    <section class="about-section style-two alternate">
        <div class="circle-one"></div>
        <div class="circle-two"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <!--Left Column-->
                <div class="left-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <div class="sub-title">Yritys</div>
                            <h2>D.B Group Oy</h2>

                            <div class="text"><?=$about[0][2]?></div>
                            <div class="link-box clearfix"><a href="causes.php" class="theme-btn btn-style-one"><span class="btn-title">Lisää</span></a></div>
                        </div>
                    </div>
                </div>
                <!--Right Column-->
                <div class="right-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="images clearfix">
                            <?php
                            $sql = $db->query('select * from portfolio where is_deleted=0  limit 4');
                            $picture_portfolios = $sql->fetchAll();
                                foreach ($picture_portfolios as $picture_portfolio){

?>
                                <figure class="image wow fadeInRight" data-wow-delay="300ms"><img class="lazy-image" src="images/<?=$picture_portfolio[2]?>" data-src="images/<?=$picture_portfolio[2]?>" alt=""></figure>
                            <?php
                                }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <!--
            <div class="text-blocks">
                <div class="row clearfix">

                    <div class="default-text-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <h3>Our Mission</h3>
                            <div class="text"><?=$about[0][4]?></div>
                        </div>
                    </div>

                    <div class="default-text-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <h3>Our Vision</h3>
                            <div class="text"><?=$about[0][5]?></div>
                        </div>
                    </div>

                    <div class="default-text-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <h3>Our Values</h3>
                            <div class="text"><?=$about[0][6]?></div>
                        </div>
                    </div>
                </div>
            </div>
        !-->
        </div>

    </section>

<?php
include "teams.php";
?>

<!--What We Do Section / Style Two-->
<section class="what-we-do style-two">
    <div class="image-layer lazy-image" data-bg="url('images/background/wwd.png')"></div>
    <div class="top-rotten-curve"></div>
    <div class="bottom-rotten-curve"></div>

    <div class="auto-container">
        <div class="row clearfix">
            <div class="title-column col-xl-6 col-lg-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <div class="sub-title">DIY kaikki voi rakentaa</div>
                        <h4>R.E.L elementin kokoaminen vaatii hyvin samanlaisia työkaluja ja tietämystä kuin perinteinen runkorakennus, mutta kootaan suuren palapelin tavoin.</h4>
                        <div class="text"></div>
                    </div>
                    <div class="sec-title">
                        <div class="sub-title">R.E.L elementin toimitus</div>
                        <h4>Voimme toimittaa minne tahansa. R.E.L elementit tarjoavat jakelupalvelun, ja ne voidaan toimittaa mihin tahansa Suomessa tai sen ulkopuolella.</h4>
                        <div class="text"></div>
                    </div>
                </div>
            </div>

            <div class="content-column col-xl-6 col-lg-12 col-sm-12">
                <div class="row clearfix">

                    <!--Service Block-->
                    <?php
                    foreach ($services as $service){
                        ?>

                        <div class="service-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="<?=$service['icon']?>"></span></div>
                                <h3><?=$service['title']?></h3>
                                <div class="text"><?= substr($service['text'],0,300)?></div>
                            </div>
                        </div>



                        <?php
                    }



                    ?>

                    <!--Service Block-->

                </div>
            </div>
        </div>

    </div>
</section>
    <!--Causes Section-->
    <section class="causes-section">
        <div class="auto-container">

        	<div class="sec-title centered">
                <div class="sub-title">R.E.L Elementit</div>
                <h2>Suosittuja Tuotteita</h2>
                <div class="text"></div>
            </div>

        	<div class="row clearfix">

            	<!--Cause Block-->
                <?php

                    $sql = $db->query('select * from causes where is_deleted=0 limit 3 ');
                    $causes = $sql->fetchAll();
                     foreach ($causes as $cause){
                         if($cause[3]!=0){
                             $cause[3]=$cause[3];
                         } else {
                             $cause[3]=1;
                         }
                    ?>

                    <div class="cause-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                            <div class="image-box">
                                <figure class="image"><a href="product-detail-<?=$cause[0]?>"><img class="lazy-image" src="images/<?=$cause[4]?>" data-src="" alt=""></a></figure>
                            </div>

                            <div class="lower-content">
                                <h3><a href="product-detail-<?=$cause[0]?>"><?=$cause[1]?></a></h3>
                                <div class="text"></div>
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





<?php
include "footer.php";
?>
