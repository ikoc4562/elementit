<?php
//include 'ayarlar.php';
?>
<section class="team-section">
    <div class="bottom-rotten-curve"></div>

    <div class="auto-container">

        <div class="sec-title centered">
            <div class="sub-title">Tutustu tiimiimme</div>
            <h2>Tiimimme</h2>
        </div>

        <div class="row clearfix">
            <?php
            $sql = $db->query('select * from teams where isdeleted=0');
            $teams = $sql->fetchAll();
            foreach ($teams as $team){
            ?>
            <!--Team Block-->
            <div class="team-block col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                    <figure class="image-box"><a href="#"><img class="lazy-image" src="images/<?=$team[3]?>" data-src="images/<?=$team[3]?>" alt=""></a></figure>
                    <div class="lower-box">
                        <div class="content">
                            <h3><a href="#"><?=$team[1]?></a></h3>
                            <div class="designation"><?=$team[2]?></div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="<?=$team[5]?>"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="<?=$team[6]?>"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="<?=$team[8]?>"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php
            }
            ?>

        </div>

    </div>
</section>
