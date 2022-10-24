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

        $sql=$db->prepare('insert into videos(title,text,relid,picture,is_deleted) values(?,?,?,?,?)');
        $sql->execute([
            $_POST['title'],
            $_POST['text'],
            $_POST['relid'],
            $resim,
            0

        ]);


        ?>
        <meta http-equiv="refresh" content="0; url=videos.php" />
        <?php

    }

}

?>

  <div class="content-wrapper">

      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Lisää Uusi Video</h3>
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
                      <input type="text" class="form-control" name="text" required>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Valitse REL Elementti</label>
                      <select class="form-select" id="relid" name="relid" required>
                          <option value="">Valitse REL Elementti</option>

                          <?php
                          $sql = $db->query('select * from causes where is_deleted=0');
                          $causes = $sql->fetchAll();
                          foreach ($causes as $cause){
                          ?>
                          <option value="<?=$cause[0]?>"><?=$cause[1]?></option>

                              <?php
                          }



                          ?>
                          <option value="0">Yleinen Video</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <label for="exampleInputFile">Video</label>
                      <input type="file" id="fotograf" name="fotograf">

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
