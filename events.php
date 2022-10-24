<?php
include "header.php";

?>

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/events.jpg')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>Palvelut</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="home">Kotisivu</a></li>
                <li class="active">Palvelut</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->

    <!--Events Section-->
    <section class="events-section">
        <div class="auto-container">
            <div class="sec-title centered">
                <div class="sub-title">R.E.L palvelumme</div>
                <h2>Kaikki Palvelut</h2>
            </div>
        	<div class="row clearfix">

                <?php
                $sql = $db->query('select * from events where is_deleted=0');
                $events=$sql->fetchAll();
                foreach ($events as $event)
                {

                ?>
                <!--Event Block-->
                <div class="event-block-three col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
                        <div class="image-box">
                            <figure class="image"><a href="event-detail-<?=$event['id']?>"><img class="lazy-image" src="images/<?=$event['picture']?>" data-src="images/<?=$event['picture']?>" alt=""></a></figure>

                        </div>
                        <div class="lower-content">
                            <h3><a href="event-detail-<?=$event['id']?>"><?=$event['title']?></a></h3>
                            <div class="link-box"><a href="event-detail-<?=$event['id']?>" class="theme-btn btn-style-two"><span class="btn-title">Lisää</span></a></div>
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
