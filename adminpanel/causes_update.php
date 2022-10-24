<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php

$sql=$db->prepare ('select * from causes where id=:id and is_deleted=0');
$sql->execute(['id'=>$_GET['id']]);
$causes=$sql->fetchAll();

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
        $sql=$db->prepare('update causes set title=:title,picture=:resim ,teknik=:teknik,is_deleted=:is_deleted,text=:text where id=:id');
        $sql->execute(['title'=>$_POST['title'],'resim'=>$resim,'teknik'=>$_POST['teknik'],'is_deleted'=>0,'id'=>$_GET['id'],'text'=>$_POST['text']]);

    }
    else
    {
        $sql=$db->prepare('update causes set title=:title,teknik=:teknik,is_deleted=:is_deleted,text=:text where id=:id');
        $sql->execute(['title'=>$_POST['title'],'teknik'=>$_POST['teknik'],'id'=>$_GET['id'],'is_deleted'=>0,'text'=>$_POST['text']]);
    }

?>
    <meta http-equiv="refresh" content="0; url=causes.php" />
<?php

}
?>
  <div class="content-wrapper">


      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Päivittä R.E.L Elementit</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
              <input type="hidden" value="1" name="isGuncelle">
              <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" name="title" value="<?=$causes[0]['title']?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Teknik Info</label>
                      <textarea id="editor1" name="teknik" rows="10" cols="80" >
                      <?=$causes[0]['teknik']?>
                    </textarea>
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Text</label>
                      <input type="text" class="form-control" name="text" value="<?=$causes[0]['text']?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputFile">Image</label>
                      <input type="file" id="fotograf" name="fotograf">
                      <img src="../images/<?=$causes[0]['picture']?>" width="100px">
                      <a href="causes.php?islem=resSil&id=<?=$causes[0]['id']?>" class="btn btn-danger btn-xm">Pois Kuva</a>
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
