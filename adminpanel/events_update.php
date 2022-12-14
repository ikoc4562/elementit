<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php

$sql=$db->prepare ('select * from events where id=:id');
$sql->execute(['id'=>$_GET['id']]);
$events=$sql->fetchAll();

if (@$_POST['isGuncelle'])
{
    if (@$_FILES['fotograf']['name']<>'')
    {
        $hedef = "../images/";
        $kaynak1 = $_FILES["fotograf"]["tmp_name"];
        $resim1 = $_FILES["fotograf"]["name"];
        $rtipi1 = $_FILES["fotograf"]["type"];
        $rboyut1 = $_FILES["fotograf"]["size"];
        $ruzanti1 	= substr($resim1, -4);
        $yeniad1	= substr(uniqid(md5(rand())), 0,15);
        $resim = $yeniad1.'.'.$ruzanti1;
        @move_uploaded_file($kaynak1, $hedef . '/' . $resim);
        $sql=$db->prepare('update events set title=:title,is_deleted=:is_deleted,picture=:resim,text=:text where id=:id');
        $sql->execute(['title'=>$_POST['title'],'is_deleted'=>0,'id'=>$_GET['id'],'resim'=>$resim ,'text'=>$_POST['text']]);

    }
    else
    {
        $sql=$db->prepare('update events set title=:title,is_deleted=:is_deleted,text=:text where id=:id');
        $sql->execute(['title'=>$_POST['title'],'id'=>$_GET['id'],'is_deleted'=>0,'text'=>$_POST['text']]);

    }
    ?>
    <meta http-equiv="refresh" content="0; url=events.php" />
    <?php

}
?>

  <div class="content-wrapper">


      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Add New Event</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
              <input type="hidden" value="1" name="isGuncelle">
              <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">title</label>
                      <input type="text" class="form-control" name="title" value="<?=$events[0]['title']?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">text</label>
                      <textarea id="editor1" name="text">
                          <?=$events[0]['text']?>
                      </textarea>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputFile">Resim</label>
                      <input type="file" id="fotograf" name="fotograf">
                      <img src="../images/<?=$events[0]['picture']?>" width="100px">
                      <a href="events.php?islem=resSil&id=<?=$events[0]['id']?>" class="btn btn-danger btn-xm">Pois Kuva</a>

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
