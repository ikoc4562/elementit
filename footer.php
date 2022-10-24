<?php include "ayarlar.php";
?>




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
                            <h3>Kumppanimme</h3>
                            <div class="news-partners">

                                <div class="row row-cols-2">
                                    <div class="col"><img class="lazy-image" src="images/partners/p1.jpeg" data-src="images/partners/p1.jpeg" alt=""></div>
                                    <div class="col"><img class="lazy-image" src="images/partners/p2.png" data-src="images/partners/p2.png" alt=""></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>

                                </div>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget info-widget">
                        <div class="widget-content">
                            <h3>Yhteystiedot</h3>
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
                            <h3>Kuvat</h3>




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
                            }
                            ?>

                        </div>
                    </div>
                </div>

            </div>

            <div class="nav-box clearfix">
                <div class="inner clearfix">
                    <ul class="footer-nav clearfix">
                        <li><a href="home">Kotisivu</a></li>
                        <li><a href="causes">Rel Elementit</a></li>
                        <li><a href="events">Palvelut</a></li>
                        <li><a href="services">Talo Paketit</a></li>
                        <li><a href="about">Meiltä</a></li>
                        <li><a href="contact">Contact</a></li>
                    </ul>

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
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById("contact-form").submit();
    }
</script>
</body>
</html>
