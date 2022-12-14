<?php
include "header.php";

$sql=$db->prepare('select distinct(group_type) from portfolio where is_deleted=:isd');
$sql->execute(
    [
        'isd'=>0
    ]
);
$types=$sql->fetchAll();

$sql=$db->prepare('select * from portfolio where is_deleted=:isd order by id desc');
$sql->execute(
    [
        'isd'=>0
    ]
);
$images=$sql->fetchAll();
?>

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/portfolio.jpg')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>Kuvat</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="home">Kotisivu</a></li>
                <li class="active">Kuvat</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->

    <!-- Gallery Page Section -->
    <section class="gallery-page-section">
        <div class="auto-container">
            <div class="sec-title centered">
                <div class="sub-title">R.E.L elementi kuvat</div>
                <h2>Kaikki kuvat</h2>
            </div>
            <!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <!--Filter-->
                <div class="filters clearfix">
                    <ul class="filter-tabs filter-btns clearfix">
                        <!--  <li class="active filter" data-role="button" data-filter="all">Kaikki</li>-->
                        <?php
                        foreach ($types as $type) {


                            ?>
                            <li class="filter" data-role="button" data-filter=".<?=$type[0]?>"><?=$type[0]?></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>

                <div class="filter-list row">

                    <?php

                    foreach ($images as $image) {


                        ?>
                        <!-- Gallery Item Two -->
                        <div class="gallery-item-two mix all <?=$image['group_type']?> col-lg-3 col-md-4 col-sm-6">
                            <div class="image-box">
                                <figure class="image"><img class="lazy-image"
                                                           src="images/<?=$image['picture']?>"
                                                           data-src="images/<?=$image['picture']?>" alt="" height="200px"></figure>
                                <div class="overlay-box"><a href="images/<?=$image['picture']?>" class="lightbox-image"
                                                            data-fancybox="gallery"><span
                                                class="icon flaticon-cross-1"></span></a></div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- End Gallery Page Section -->



<!-- Main Footer -->
<footer class="main-footer">
    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">


                <?php
                $sql = $db->query('select * from about ');
                $about = $sql->fetchAll();


                $sql2 = $db->query('select * from contactinfo');
                $contactinfo = $sql2->fetchAll();
                ?>

                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget logo-widget">
                        <div class="widget-content">
                            <div class="footer-logo">
                                <a href="index.php"><img class="lazy-image" src="images/<?=$about[0]['logo']?>" data-src="images/<?=$about[0]['logo']?>" alt="" width="150px" /></a>
                            </div>
                            <div class="text"><?=$about[0]['mission']?></div>
                            <ul class="social-links clearfix">
                                <?php
                                $sql=$db->prepare("select * from social_media where is_deleted=:isd");
                                $sql->execute(
                                    [
                                        'isd'=>0
                                    ]
                                );
                                $socials = $sql->fetchAll();
                                foreach ($socials as $social){
                                    ?>
                                    <li><a href="<?=$social['link']?>"><span class="fab fa-<?=$social['title']?>"></span></a></li>
                                    <?php
                                }?>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <div class="widget-content">
                           <h3>Our Partners</h3>
                            <div class="news-partners">

                                    <div class="post-thumb mb-2"><a href="https://www.timetohelp.org.uk/"><img class="lazy-image" src="images/partners/tth.png" data-src="images/partners/tth.png" alt="" width="75px"></a></div>
                                    <div class="post-thumb mb-2"><a href="#"><img class="lazy-image" src="images/partners/embrace.png" data-src="images/partners/embrace.png" alt="" width="75px"></a></div>
                                    <div class="post-thumb mb-2"><a href="#"><img class="lazy-image" src="images/partners/aro.png" data-src="images/partners/aro.png" alt="" width="75px"></a></div>

                                </div>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget info-widget">
                        <div class="widget-content">
                            <h3>Contacts</h3>
                            <ul class="contact-info">
                                <li><?=$contactinfo[0]['address']?></li>
                                <li><a href="tel:<?=$contactinfo[0]['phone']?>"><?=$contactinfo[0]['phone']?></a></li>
                                <li><a href="mailto:<?=$contactinfo[0]['email']?>"><?=$contactinfo[0]['email']?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget news-widget">
                        <div class="widget-content">
                            <h3>Portfolio</h3>



                            <?php
                            $sql=$db->query('select * from portfolio where is_deleted=0 order by RAND() limit 2');
                            $portfolios=$sql->fetchAll();
                            foreach ($portfolios as $portfolio) {
                                ?>

                                <!--News Post-->
                                <div class="news-post">

                                    <div class="post-thumb"><a href="#"><img class="lazy-image" src="images/<?=$portfolio['picture']?>" data-src="images/<?=$portfolio['picture']?>" alt=""></a></div>
                                </div>


                                <?php
                            }?>

                        </div>
                    </div>
                </div>

            </div>

            <div class="nav-box clearfix">
                <div class="inner clearfix">
                    <ul class="footer-nav clearfix">
                        <li><a href="#">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="causes.php">Causes</a></li>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>

                    <div class="donate-link"><a href="https://www.paybills.ug/index.php/Nile-humanitarian-development-agency-limited" class="theme-btn btn-style-one"><span class="btn-title">Donate Now</span></a></div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="auto-container">

            <!--Scroll to top-->
            <div class="clearfix">
                <div class="copyright"><?=$about[0]['title']?>  &copy;  <?=date('Y')?> All Right Reserved</div>
                <ul class="bottom-links">
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>

</footer>

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-up-arrow"></span></div>

<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/mixitup.js"></script>
<script src="js/owl.js"></script>
<script src="js/appear.js"></script>
<script src="js/wow.js"></script>
<script src="js/lazyload.js"></script>
<script src="js/scrollbar.js"></script>
<script src="js/validate.js"></script>
<script src="js/script.js"></script>


<!--Google Map APi Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcaOOcFcQ0hoTqANKZYz-0ii-J0aUoHjk"></script>
<script src="js/map-script.js"></script>
<!--End Google Map APi-->

</body>
</html>
