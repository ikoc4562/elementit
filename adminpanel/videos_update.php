<?php
include 'header.php';
include 'yanmenu.php';
?>
<?php

$sql=$db->prepare ('select * from videos where id=:id and is_deleted=0');
$sql->execute(['id'=>$_GET['id']]);
$videos=$sql->fetchAll();

if (@$_POST['isGuncelle'])
{

        $sql=$db->prepare('update videos set title=:title,text=:text where id=:id');
        $sql->execute(['title'=>$_POST['title'],'text'=>$_POST['text'],'id'=>$_GET['id']]);

    header('location:videos.php');
}

?>

  <div class="content-wrapper">


      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Päivittää Video</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
              <input type="hidden" value="1" name="isGuncelle">
              <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" name="title" value="<?=$videos[0]['title']?>">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Text</label>
                      <input type="text" class="form-control" name="text" value="<?=$videos[0]['text']?>">
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
