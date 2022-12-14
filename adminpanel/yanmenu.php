<?php
ob_start();
session_start();
include "../ayarlar.php";
$sql = $db->prepare ('select * from kullanicilar where id=:id');
$sql->execute(
    [
        'id'=>$_SESSION['id']
    ]
);
$kullanicilar = $sql->fetchAll();
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../images/<?=$kullanicilar[0]['resim']?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?=$kullanicilar[0]['email']?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Verkossa</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Ylläpitäjän paneeli</li>

            <li>
                <a href="hakkinda.php">
                    <i class="fa fa-home"></i> <span>Meiltä</span>
                </a>
            </li>
            <li>
                <a href="slider.php">
                    <i class="fa fa-image"></i> <span>Liukusäädin</span>
                </a>
            </li>
            <li>
                <a href="contactinfo.php">
                    <i class="fa fa-address-card"></i> <span>Yhteystiedot</span>

                </a>
            </li>
            <li>
                <a href="social.php">
                    <i class="fa fa-at"></i> <span>Some</span>

                </a>
            </li>
            <li>
                <a href="causes.php">
                    <i class="fa fa-bookmark-o"></i> <span>R.E.L elementit</span>

                </a>
            </li>
            <li>
                <a href="events.php">
                    <i class="fa fa-calendar"></i> <span>Palvelut</span>

                </a>
            </li>
            <li>
                <a href="about_counter.php">
                    <i class="fa fa-clock-o"></i> <span>Laskuri</span>

                </a>
            </li>

            <li>
                <a href="service.php">
                    <i class="fa fa-universal-access"></i> <span>Talo Paketit</span>

                </a>
            </li>
            <li>
                <a href="mesajlar.php">
                    <i class="fa fa-envelope"></i> <span>Viestit</span>

                </a>
            </li>
            <li>
                <a href="resimgoster.php">
                    <i class="fa fa-image"></i> <span>Kuvat</span>

                </a>
            </li>
            <li>
                <a href="videos.php">
                    <i class="fa fa-caret-square-o-right"></i> <span>Videot</span>

                </a>
            </li>
            <li>
                <a href="users.php">
                    <i class="fa fa-user"></i> <span>Käyttäjät</span>

                </a>
            </li>
            <li>
                <a href="teams.php">
                    <i class="fa fa-user-plus"></i> <span>Tiimimme</span>

                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

