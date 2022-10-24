<?php
include 'header.php';

include 'yanmenu.php';





if (@$_POST['isKaydet'])
{

if ($_GET['islem']=='dokUpdate' and !empty($_GET['id']))
{
    if (@$_FILES['dop']['name']<>'') {
        $hedef = "../images/";
        $kaynak1 = $_FILES["dop"]["tmp_name"];
        $resim1 = $_FILES["dop"]["name"];
        $rtipi1 = $_FILES["dop"]["type"];
        $rboyut1 = $_FILES["dop"]["size"];
        $ruzanti1 = substr($resim1, -4);
        $yeniad1 = substr(uniqid(md5(rand())), 0, 15);
        $dop = $yeniad1 . '.' . $ruzanti1;
        @move_uploaded_file($kaynak1, $hedef . '/' . $dop);
        $sql=$db->prepare('update dokumans set dop=:dop where id=:id');
        $sql->execute(['dop'=>$dop,'id'=>$_GET['id']]);
    }

    if (@$_FILES['epd']['name']<>'') {
        $hedef = "../images/";
        $kaynak2 = $_FILES["epd"]["tmp_name"];
        $resim2 = $_FILES["epd"]["name"];
        $rtipi2 = $_FILES["epd"]["type"];
        $rboyut2 = $_FILES["epd"]["size"];
        $ruzanti2 	= substr($resim2, -4);
        $yeniad2	= substr(uniqid(md5(rand())), 0,15);
        $epd = $yeniad2.'.'.$ruzanti2;
        @move_uploaded_file($kaynak2, $hedef . '/' . $epd);
        $sql=$db->prepare('update dokumans set epd=:epd where id=:id');
        $sql->execute(['epd'=>$epd,'id'=>$_GET['id']]);
    }

    if (@$_FILES['tuo']['name']<>'') {
        $hedef = "../images/";
        $kaynak3 = $_FILES["tuo"]["tmp_name"];
        $resim3 = $_FILES["tuo"]["name"];
        $rtipi3 = $_FILES["tuo"]["type"];
        $rboyut3 = $_FILES["tuo"]["size"];
        $ruzanti3 	= substr($resim3, -4);
        $yeniad3	= substr(uniqid(md5(rand())), 0,15);
        $tuo = $yeniad3.'.'.$ruzanti3;
        @move_uploaded_file($kaynak3, $hedef . '/' . $tuo);
        $sql=$db->prepare('update dokumans set tuo=:tuo where id=:id');
        $sql->execute(['tuo'=>$tuo,'id'=>$_GET['id']]);
    }

    if (@$_FILES['työ']['name']<>'') {
        $hedef = "../images/";
        $kaynak4 = $_FILES["työ"]["tmp_name"];
        $resim4 = $_FILES["työ"]["name"];
        $rtipi4 = $_FILES["työ"]["type"];
        $rboyut4 = $_FILES["työ"]["size"];
        $ruzanti4 	= substr($resim4, -4);
        $yeniad4	= substr(uniqid(md5(rand())), 0,15);
        $työ = $yeniad4.'.'.$ruzanti4;
        @move_uploaded_file($kaynak4, $hedef . '/' . $työ);
        $sql=$db->prepare('update dokumans set työ=:työ where id=:id');
        $sql->execute(['työ'=>$työ,'id'=>$_GET['id']]);
    }
    if (@$_FILES['suu']['name']<>'') {
        $hedef = "../images/";
        $kaynak5 = $_FILES["suu"]["tmp_name"];
        $resim5 = $_FILES["suu"]["name"];
        $rtipi5 = $_FILES["suu"]["type"];
        $rboyut5 = $_FILES["suu"]["size"];
        $ruzanti5 	= substr($resim5, -4);
        $yeniad5	= substr(uniqid(md5(rand())), 0,15);
        $suu = $yeniad5.'.'.$ruzanti5;
        @move_uploaded_file($kaynak5, $hedef . '/' . $suu);
        $sql=$db->prepare('update dokumans set suu=:suu where id=:id');
        $sql->execute(['suu'=>$suu,'id'=>$_GET['id']]);
    }


}
else {


        $hedef = "../images/";
        $kaynak1 = $_FILES["dop"]["tmp_name"];
        $resim1 = $_FILES["dop"]["name"];
        $rtipi1 = $_FILES["dop"]["type"];
        $rboyut1 = $_FILES["dop"]["size"];
        $ruzanti1 	= substr($resim1, -4);
        $yeniad1	= substr(uniqid(md5(rand())), 0,15);
        $dop = $yeniad1.'.'.$ruzanti1;
        @move_uploaded_file($kaynak1, $hedef . '/' . $dop);

        $kaynak2 = $_FILES["epd"]["tmp_name"];
        $resim2 = $_FILES["epd"]["name"];
        $rtipi2 = $_FILES["epd"]["type"];
        $rboyut2 = $_FILES["epd"]["size"];
        $ruzanti2 	= substr($resim2, -4);
        $yeniad2	= substr(uniqid(md5(rand())), 0,15);
        $epd = $yeniad2.'.'.$ruzanti2;
        @move_uploaded_file($kaynak2, $hedef . '/' . $epd);

        $kaynak3 = $_FILES["tuo"]["tmp_name"];
        $resim3 = $_FILES["tuo"]["name"];
        $rtipi3 = $_FILES["tuo"]["type"];
        $rboyut3 = $_FILES["tuo"]["size"];
        $ruzanti3 	= substr($resim3, -4);
        $yeniad3	= substr(uniqid(md5(rand())), 0,15);
        $tuo = $yeniad3.'.'.$ruzanti3;
        @move_uploaded_file($kaynak3, $hedef . '/' . $tuo);

        $kaynak4 = $_FILES["työ"]["tmp_name"];
        $resim4 = $_FILES["työ"]["name"];
        $rtipi4 = $_FILES["työ"]["type"];
        $rboyut4 = $_FILES["työ"]["size"];
        $ruzanti4 	= substr($resim4, -4);
        $yeniad4	= substr(uniqid(md5(rand())), 0,15);
        $työ = $yeniad4.'.'.$ruzanti4;
        @move_uploaded_file($kaynak4, $hedef . '/' . $työ);

        $kaynak5 = $_FILES["suu"]["tmp_name"];
        $resim5 = $_FILES["suu"]["name"];
        $rtipi5 = $_FILES["suu"]["type"];
        $rboyut5 = $_FILES["suu"]["size"];
        $ruzanti5 	= substr($resim5, -4);
        $yeniad5	= substr(uniqid(md5(rand())), 0,15);
        $suu = $yeniad5.'.'.$ruzanti5;
        @move_uploaded_file($kaynak5, $hedef . '/' . $suu);

        $sql=$db->prepare('insert into dokumans(relid,dop,epd,tuo,työ,suu,is_deleted) values(?,?,?,?,?,?,?)');
        $sql->execute([
            $_GET['id'],
            $dop,
            $epd,
            $tuo,
            $työ,
            $suu,
            0

        ]);
}

        ?>
        <meta http-equiv="refresh" content="0; url=dokuman_goster.php" />
        <?php


}

?>

  <div class="content-wrapper">

      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Add New Video</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
              <input type="hidden" value="1" name="isKaydet">
              <div class="box-body">

                  <div class="form-group">
                      <label for="exampleInputFile">Suoritustasoilmoitus (DoP)</label>
                      <input type="file" id="dop" name="dop">

                  </div>

                  <div class="form-group">
                      <label for="exampleInputFile">Ympäristöseloste (EPD)</label>
                      <input type="file" id="epd" name="epd">

                  </div>

                  <div class="form-group">
                      <label for="exampleInputFile">Tuotesertifikaatti</label>
                      <input type="file" id="tuo" name="tuo">

                  </div>

                  <div class="form-group">
                      <label for="exampleInputFile">Työohjeet</label>
                      <input type="file" id="työ" name="työ">

                  </div>

                  <div class="form-group">
                      <label for="exampleInputFile">Suunnitteluohjeet</label>
                      <input type="file" id="suu" name="suu">

                  </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>

          </form>
      </div>



  </div>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>
<?php
include 'footer.php';
?>
