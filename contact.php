
<?php
include "header.php";

$send='';
$sql = $db->query('select * from contactinfo');
$contactinfo=$sql->fetchAll();



if (@$_POST['isSave']) {
    
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
{
$secret = '6LfK_KIiAAAAAJnTssWAZHfmtP67SzlpvIBrRne7';
$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
$responseData = json_decode($verifyResponse);
if($responseData->success)
   {
    
    $sql = $db->prepare('insert into mesajlar set isim=:isim, email=:email, mesaj=:mesaj');
    $sql->execute([
        'isim' => $_POST['isim'],
        'email' => $_POST['email'],
        'mesaj' => $_POST['mesaj']
    ]);
    
    

    $send=1;

    ?>
    <meta http-equiv="refresh" content="3; url=contact.php">
    <?php
   }
} 
else
{
    $errMsg = 'ReCaptcha verification failed, please try again.';
}
}
$sql=$db->prepare("select * from social_media where is_deleted=:isd");
$sql->execute(
    [
        'isd'=>0
    ]
);
$socials = $sql->fetchAll();
?>

    <!-- Page Banner Section -->
    <section class="page-banner">
        <div class="image-layer lazy-image" data-bg="url('images/background/contactus.jpg')"></div>
        <div class="bottom-rotten-curve"></div>

        <div class="auto-container">
            <h1>Ota Yhdeyttä</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="home">Kotisivu</a></li>
                <li class="active">Ota Yhdeyttä</li>
            </ul>
            <?php
            if (@$send) {
                ?>
                <div class="alert alert-success" role="alert">
                    Viestisi on lähetetty onnistuneesti.                </div>
                <?php
            }
  
            ?>
                <?php
                if (isset($errMsg)) {
                    ?>
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <?=$errMsg?>
                    </div>
                    <?php
                }
                ?>
        </div>

    </section>
    <!--End Banner Section -->
    <!--Contact Info Section-->
    <section class="contact-info-section">
        <div class="auto-container">

            <div class="sec-title centered">
                <div class="sub-title">Ota yhteyttä</div>
            </div>

        	<div class="info-boxes">
                <div class="row clearfix">
                    <!--Info Box-->
                    <div class="info-box col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="0ms">
							<div class="image-layer lazy-image" data-bg="url('images/resource/contact-image-1.jpg')"></div>
                            <div class="icon-box"><span class="flaticon-home-location-marker"></span></div>
                            <h4>Sijaintimme</h4>
                            <ul>
                            	<li><?=$contactinfo[0]['address']?></li>
                            </ul>
                        </div>
                    </div>
                    <!--Info Box-->
                    <div class="info-box col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="300ms">
                            <div class="image-layer lazy-image" data-bg="url('images/resource/contact-image-2.jpg')"></div>
                            <div class="icon-box"><span class="flaticon-phone-call"></span></div>
                            <h4>Puhelinnumero</h4>
                            <ul>
                            	<li><a href="tel:(+55)654-545-5418"><?=$contactinfo[0]['phone']?></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--Info Box-->
                    <div class="info-box col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="600ms">
                            <div class="image-layer lazy-image" data-bg="url('images/resource/contact-image-3.jpg')"></div>
                            <div class="icon-box"><span class="flaticon-email"></span></div>
                            <h4>Sähköpostiosoite</h4>
                            <ul>
                                <li><a href="mailto:<?=$contactinfo[0]['email']?>"><?=$contactinfo[0]['email']?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        	</div>

        </div>
    </section>


    <!--Contact Section-->
    <section class="contact-section">
        <div class="outer-container clearfix">

        	<div class="form-column clearfix">
                <div class="inner clearfix">

                    <div class="sec-title centered">
                        <div class="sub-title">Tiedustelu</div>
                        <h2>Jätä viesti</h2>
                    </div>

                    <!-- Contact Form-->
                    <div class="contact-form">
                        <form method="post" id="contact-form">
                            <input type="hidden" name="isSave" value="1">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <input type="text" name="isim" placeholder="Nimesi" required="">
                                </div>

                                <div class="col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Sähköpostiosoitesi" required="">
                                </div>

                                <div class="col-md-12 col-sm-12 form-group">
                                    <textarea name="mesaj" placeholder="Viestisi"></textarea>
                                </div>
                                
            
                                 <div class="g-recaptcha" data-sitekey="6LfK_KIiAAAAAAp4BNqlD-TI53VAjSyVLN1S2wwg" aria-required="true"></div>
                                 
                                 
                                <div class="col-md-12 col-sm-12 form-group text-center">
                                    <button class="theme-btn btn-style-one"
                                            data-sitekey="6LfK_KIiAAAAAAp4BNqlD-TI53VAjSyVLN1S2wwg" data-callback='onSubmit'  type="submit" name="submit-form"><span class="btn-title">Lähettä</span></button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
        	</div>

            <div class="map-column clearfix">
                    <?=$contactinfo[0]['googlemaps']?>
            </div>

        </div>
    </section>







<!-- Main Footer -->

<?php
include "footer.php";

?>

