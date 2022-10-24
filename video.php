<?php
include "header.php";



$sql=$db->prepare('select * from videos where is_deleted=:isd order by id desc');
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
            <h1>Videot</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="home">Kotisivu</a></li>
                <li class="active">Videot</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->

    <!-- Gallery Page Section -->
<section class="video-section">




                        <!-- Gallery Item Two -->
                        <div class="auto-container">
                            <div class="sec-title centered">
                                <div class="sub-title">R.E.L elementi videot</div>
                                <h2>Kaikki videot</h2>
                            </div>
                            <div class="row clearfix">
                                <?php

                                foreach ($images as $videos) {


                                ?>
                                <div class="image-column col-lg-4 col-md-4 col-sm-6 mr-5">
                                            <video width="400" controls>
                                                <source src="images/<?=$videos[4]?>" type="video/mp4">
                                                Your browser does not support HTML video.
                                            </video>
                                </div>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>


    </section>
    <!-- End Gallery Page Section -->


<?php
include "footer.php";
?>
