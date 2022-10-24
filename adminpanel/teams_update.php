<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php

$sql=$db->prepare ('select * from teams where id=:id');
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
        $resim = $yeniad1.$ruzanti1;
        @move_uploaded_file($kaynak1, $hedef . '/' . $resim);
        $sql=$db->prepare('update teams set name=:name,title=:title,explanation=:explanation,isdeleted=:is_deleted,image=:resim,facebook=:facebook,twitter=:twitter,linkedin=:linkedin,instagram=:instagram where id=:id');
        $sql->execute(['name'=>$_POST['ad'],'title'=>$_POST['title'],'is_deleted'=>0,'id'=>$_GET['id'],'resim'=>$resim ,'explanation'=>$_POST['explanation'],'facebook'=>$_POST['facebook'],'twitter'=>$_POST['twitter'],'linkedin'=>$_POST['linkedin'],'instagram'=>$_POST['instagram']]);

    }
    else
    {
        $sql=$db->prepare('update teams set name=:name,title=:title,explanation=:explanation,isdeleted=:is_deleted,facebook=:facebook,twitter=:twitter,linkedin=:linkedin,instagram=:instagram where id=:id');
        $sql->execute(['name'=>$_POST['ad'],'title'=>$_POST['title'],'is_deleted'=>0,'id'=>$_GET['id'],'explanation'=>$_POST['explanation'],'facebook'=>$_POST['facebook'],'twitter'=>$_POST['twitter'],'linkedin'=>$_POST['linkedin'],'instagram'=>$_POST['instagram']]);

    }
    ?>
    <meta http-equiv="refresh" content="0; url=teams.php" />
    <?php

}
?>

  <div class="content-wrapper">


      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Add New Teams Member</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
              <input type="hidden" value="1" name="isGuncelle">
              <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" name="ad" value="<?=$events[0]['name']?>" required>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" name="title" value="<?=$events[0]['title']?>" required>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">About</label>
                      <textarea id="editor1" name="explanation">
                          <?=$events[0]['explanation']?>
                      </textarea>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Facebook </label>
                      <input type="text" class="form-control" name="facebook" value="<?=$events[0]['facebook']?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Twitter</label>
                      <input type="text" class="form-control" name="twitter" value="<?=$events[0]['twitter']?>">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Linkedin</label>
                      <input type="text" class="form-control" name="linkedin" value="<?=$events[0]['linkedin']?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Instagram</label>
                      <input type="text" class="form-control" name="instagram" value="<?=$events[0]['instagram']?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputFile">Resim</label>
                      <input type="file" id="fotograf" name="fotograf">
                      <img src="../images/<?=$events[0]['image']?>" width="100px">
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
