<?php
include "header.php";


$sql = $db->prepare('select * from events where is_deleted=:isd and id=:id');
$sql->execute(
    [
        'isd' => 0,
        'id'=>$_GET['id'],
    ]
);
$event=$sql->fetchAll();



?>

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/events.jpg')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>Palvelun yksityiskohta</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="home">Kotisivu</a></li>
                <li class="active">Palvelun yksityiskohta</li>
            </ul>
        </div>

    </section>
    <!--End Banner Section -->


    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Blog Sidebar-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                    <!--Event Details-->
                    <div class="event-details">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img class="lazy-image" src="images/<?=$event[0]['picture']?>" data-src="images/<?=$event[0]['picture']?>" alt=""></figure>

                            </div>
                            <div class="lower-content">
                            	<h2><?=$event[0]['title']?></h2>

                                <div class="text-content">
                                    <p class="big-text">
                                        <?=$event[0]['text']?>
                                    </p>
                                    <br>

                                </div>


                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->

<?php
include "footer.php";

?>
