<?php
include "header.php";
$sql = $db->query("select * from about");
$about = $sql->fetchAll();
?>


    <!-- Banner Section -->
    <section class="banner-section">
		<div class="banner-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>
			<!-- Slide Item -->


            <?php
            $sql = $db->query('select * from slider where is_deleted=0');
            $sliders = $sql->fetchAll();
            foreach ($sliders as $slider){
                ?>

			<div class="slide-item">
				<div class="image-layer lazy-image" data-bg="url('images/<?=$slider['picture']?>')"></div>
				<div class="auto-container">
					<div class="content-box">
						<h2><?=$slider['title']?></h2>
						<div class="text"><?=$slider['text']?></div>
					</div>
				</div>
			</div>

                <?php
            }
            ?>

		</div>
    </section>
    <!--End Banner Section -->

	<!--About Section-->
    <section class="about-section">
    	<div class="top-rotten-curve"></div>
        <div class="bottom-rotten-curve"></div>
        <div class="circle-one"></div>
        <div class="circle-two"></div>


        <div class="auto-container">
        	<div class="row clearfix">
            	<!--Left Column-->
                <div class="left-column col-lg-6 col-md-12 col-sm-12">
                	<div class="inner">
                    	<div class="sec-title">
                        	<div class="sub-title">Meiltä</div>
                            <h2><?=$about[0]['title']?></h2>
                            <div class="text"><?=$about[0]['contents']?></div>
							<div class="link-box clearfix"><a href="about" class="theme-btn btn-style-one"><span class="btn-title">Lisää</span></a></div>
                        </div>
                    </div>
                </div>
                <!--Right Column-->
                <div class="right-column col-lg-6 col-md-12 col-sm-12">
                	<div class="inner">
                    	<div class="row clearfix">
                        	<!--About Feature-->
                            <div class="about-feature col-md-6 col-sm-12">
                            	<div class="inner-box wow fadeInUp">
                                	<div class="icon-box"><span class="flaticon-user"></span></div>
                                    <h4>MÖKKI</h4>
                                    <a href="/contact" class="over-link"></a>
                                </div>
                            </div>
                            <!--About Feature-->
                            <div class="about-feature col-md-6 col-sm-12">
                            	<div class="inner-box wow fadeInUp" data-wow-delay="300ms">
                                	<div class="icon-box"><span class="flaticon-heart-2"></span></div>
                                    <h4>AUTOTALLI</h4>
                                    <a href="/contact" class="over-link"></a>
                                </div>
                            </div>
                            <!--About Feature-->
                            <div class="about-feature col-md-6 col-sm-12">
                            	<div class="inner-box wow fadeInUp">
                                	<div class="icon-box"><span class="flaticon-coin-2"></span></div>
                                    <h4>HALLI</h4>
                                    <a href="/contact" class="over-link"></a>
                                </div>
                            </div>
                            <!--About Feature-->
                            <div class="about-feature col-md-6 col-sm-12">
                            	<div class="inner-box wow fadeInUp" data-wow-delay="300ms">
                                	<div class="icon-box"><span class="flaticon-care"></span></div>
                                    <h4>TEOLLISUUS</h4>
                                    <a href="/contact" class="over-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Causes Section-->
    <section class="causes-section">
        <div class="auto-container">

        	<div class="sec-title centered">
                <div class="sub-title">Rel Elementit</div>
                <h2>Suosittuja tuotteita</h2>
            </div>

        	<div class="row clearfix">


                    <?php
                        $sql = $db->query('select * from causes where is_deleted=0 order by RAND() limit 3');
                        $causes = $sql->fetchAll();
                        foreach ($causes as $cause){
                            ?>


            	<!--Cause Block-->
                <div class="cause-block col-lg-4 col-md-6 col-sm-12">
                	<div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                    	<div class="image-box">
                        	<figure class="image"><a href="cause-detail-<?=$cause[0]?>"><img class="lazy-image" src="images/<?=$cause['picture']?>" data-src="images/<?=$cause['picture']?>" alt=""></a></figure>
                        </div>

                        <div class="lower-content">
                            <h3><a href="cause-detail-<?=$cause[0]?>"><?=$cause['title']?></a></h3>
                            <div class="link-box"><a href="/cause/<?=$cause[0]?>" class="theme-btn btn-style-two"><span class="btn-title">Lisää</span></a></div>
                        </div>
                    </div>
                </div>

                    <?php
                            }
                    ?>

            </div>

        </div>
    </section>

    <!--Video Section-->
    <section class="video-section">
    	<div class="circle-one"></div>
        <div class="circle-two"></div>
        <div class="top-rotten-curve"></div>
        <div class="bottom-rotten-curve"></div>


<?php
$sql=$db->query('select * from videos where is_deleted=0 order by id desc limit 1');
$videos=$sql->fetchAll();


 ?>

    	<!--Image Layer-->
        <div class="image-layer wow slideInLeft" data-wow-delay="500ms"><div class="bg-image lazy-image" data-bg="url('images/background/videob.webp')"></div></div>
        <div class="auto-container">
        	<div class="row clearfix">
            	<!--Text Column-->
                <div class="text-column col-lg-6 col-md-12 col-sm-12">
                	<div class="inner">
                    	<div class="sec-title">
                        	<div class="sub-title">Katso video</div>
                            <h2><?=$videos[0]['title']?></h2>
                            <div class="text"><?=$videos[0]['text']?></div>
							<div class="link-box clearfix"><a href="videos" class="theme-btn btn-style-three"><span class="btn-title">Kaikki videot</span></a></div>
                        </div>
                    </div>
                </div>
                <!--Image Column-->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                	<div class="inner wow fadeInLeft" data-wow-delay="0ms">
                    	<figure class="image-box">
                        	<img class="lazy-image" src="images/background/vb.png" data-src="images/background/vb.png" alt="" width="300px">
                            <a href="images/<?=$videos[0]['picture']?>" class="lightbox-image over-link"><span class="icon flaticon-play-button"></span></a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--What We Do Section-->
    <section class="what-we-do">
        <div class="auto-container">

        	<div class="sec-title centered">
                <div class="sub-title">Mitä me teemme?</div>
                <h2>Meillä on tehtävä ratkaistavaksi
                     <br>Ongelmat</h2>
            </div>

        	<div class="row clearfix">


<?php
$sql=$db->query('select * from services where is_deleted=0');
$services=$sql->fetchAll();

foreach ($services as $service) {

    ?>
            	<!--Service Block-->
                <div class="service-block col-xl-4 col-lg-4 col-md-4 col-sm-12">
                	<div class="inner-box">
                    	<div class="icon-box"><span class="<?=$service['icon']?>"></span></div>
                        <h3><?=$service['title']?></h3>
                        <div class="text"><?= substr($service['text'],0,400)?>...</div>
                    </div>
                </div>

                <?php
} ?>


            </div>


        </div>
    </section>
</br>
<!-- Funfacts Section -->
<section class="facts-section">
    <div class="auto-container">
        <div class="inner-container">

            <!-- Fact Counter -->
            <div class="fact-counter">
                <div class="row clearfix">


                    <?php $sql = $db->query('select * from about_counter ');
                    $about_counts = $sql->fetchAll();
                    foreach ($about_counts as $about){

                        ?>

                        <!--Column-->
                        <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                            <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="content">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3000" data-stop="<?=$about['complete']?>"></span>
                                    </div>
                                    <div class="counter-title"> <?=$about['title']?></div>
                                </div>
                            </div>
                        </div>

                        <?php
                    } ?>


                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Funfacts Section -->

<?php
include "teams.php";
?>
    <!--Call To Action Section-->
    <section class="call-to-action">

    	<!--Image Layer-->
        <div class="image-layer lazy-image" data-bg="url('images/background/help.jpg')"></div>

        <div class="auto-container">
            <div class="inner">
                <div class="sec-title centered">
                    <h2>Kuinka voit auttaa?</h2>
                    <div class="text">Voit ottaa meihin epäröimättä yhteyttä palvelualueitamme tai konsultointi amme koskevissa kysymyksissä ja ehdotuksissa.</div>
                    <div class="link-box clearfix"><a href="/contact" class="theme-btn btn-style-one"><span class="btn-title">Ota yhdeyttä</span></a></div>
                </div>
            </div>
        </div>
    </section>





    <!--Upcoming Events Section-->
    <section class="upcoming-events">
    	<div class="circle-one"></div>
        <div class="circle-two"></div>

        <div class="auto-container">

        	<div class="sec-title centered">
                <div class="sub-title">Palvelut</div>
                <h2>Jotkut palvelut</h2>
            </div>

            <div class="carousel-box">

            	<div class="single-item-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 0, "autoHeight":false, "singleItem" : true, "autoplay": true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1024":{ "items" : "1" }}}'>




                <?php
                    $sql = $db->query('select * from events where is_deleted=0 limit 3');
                    $events = $sql->fetchAll();
                    foreach ($events as $event){
                        ?>




                    <!--Slide-->
                    <div class="slide-item">
                    	<div class="event-block">
                            <div class="inner-box clearfix">
                                <div class="image-column">
                                    <div class="image-box"><img class="lazy-image owl-lazy" src="images/<?=$event['picture']?>" data-src="images/<?=$event['picture']?>g" alt=""></div>
                                    <div class="bg-image-layer lazy-image" data-bg="url('images/<?=$event['picture']?>')"></div>
                                    <a href="event-detail-<?=$event['id']?>" class="over-link"></a>
                                </div>
                                <div class="text-column">
                                    <div class="inner">
                                        <h3><a href="event-detail-<?=$event['id']?>"><?=$event['title']?></a></h3>
                                        <div class="link-box"><a href="event-detail-<?=$event['id']?>" class="theme-btn btn-style-one"><span class="btn-title">Lisää</span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                    } ?>




                </div>

            </div>

        </div>
    </section>



    <!-- Insta Gallery Section
    <section class="insta-gallery">
        <div class="insta-gallery-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 500, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "2" }, "768" :{ "items" : "3" }, "1024":{ "items" : "4" }, "1366":{ "items" : "4" }, "1500":{ "items" : "5" }, "1920":{ "items" : "6" }}}'>
             Gallery Item -->


<?php
$sql=$db->query('select * from portfolio where is_deleted=0 order by id desc limit 6');
$portfolios=$sql->fetchAll();
foreach ($portfolios as $portfolio) {
    ?>

<!--
    <div class="gallery-item">
                <div class="image-box">
                    <figure class="image"><img class="lazy-image owl-lazy" src="images/<?=$portfolio['picture']?>" data-src="images/<?=$portfolio['picture']?>" alt=""></figure>
                    <div class="overlay-box"><a href="images/<?=$portfolio['picture']?>" class="lightbox-image" data-fancybox="gallery"><span class="icon flaticon-instagram"></span></a></div>
                </div>
            </div>
-->
    <?php
} ?> <!--
        </div>

    </section>
    End Gallery Section -->



<?php
include "footer.php";

?>
