<?php
include 'header.php';

include 'yanmenu.php';




if (@$_POST['isKaydet'])
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

        $sql=$db->prepare('insert into events(title,picture,is_deleted,text) values(?,?,?,?)');
        $sql->execute([
            $_POST['title'],
            $resim,
            0,
            $_POST['text'],
        ]);

    }


    ?>
    <meta http-equiv="refresh" content="0; url=events.php" />
    <?php

}
?>

  <div class="content-wrapper">

      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">New Event</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
              <input type="hidden" value="1" name="isKaydet">
              <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" name="title" required>
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Text</label>
                      <textarea name="text" id="editor1" required>

                      </textarea>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputFile">Picture</label>
                      <input type="file" id="fotograf" name="fotograf" required>

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
<script>
    $(function () {
        CKEDITOR.replace('editor2')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>
<?php
include 'footer.php';
?>
