<?php
include 'header.php';
include 'yanmenu.php';
?>

<?php

if ($_GET['islem']=='sil' and @$_GET['id'])
{
   // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update causes set is_deleted=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);


}
if ($_GET['islem']=='resSil' and @$_GET['id'])
{
    // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update causes set picture="" where id=:id');
    $sql->execute(['id'=>$_GET['id']]);


}
$sql=$db->query('select * from causes where  is_deleted=0');
$causes=$sql->fetchAll();
?>
  <div class="content-wrapper">


      <div class="box">
          <div class="box-header" style="float: right">
              <a href="causes_new.php" class="btn btn-success btn-xm">Lisää uusi</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Title</th>
                      <th>Text</th>
                      <th>Image</th>
                      <th>Teknik Info</th>
                      <th></th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php

                  foreach ($causes as $cause) {
                      ?>
                      <tr>

                          <td><?= $cause['title'] ?>
                          <td><?= $cause['text'] ?>
                          <td><img src="../images/<?= $cause['picture'] ?>" width="100px"></td>
                          <td><?= $cause['teknik'] ?>


                          <td>
                             <a href="causes.php?islem=sil&id=<?= $cause['id'] ?>" class="btn btn-danger btn-xs">Delete</a>

                              <a href="causes_update.php?islem=guncelle&id=<?= $cause['id'] ?>"
                                 class="btn btn-primary btn-xs">Update</a>
                              <a href="resimgoster.php?islem=rel&id=<?= $cause['id'] ?>"
                                 class="btn btn-warning btn-xs">Kuva</a>
                              <a href="dokuman_goster.php?islem=dok&id=<?= $cause['id'] ?>"
                                 class="btn btn-info btn-xs">Dokuman</a>

                          </td>
                      </tr>
                      <?php
                  }
                  ?>
                  </tbody>
              </table>
          </div>
          <!-- /.box-body -->
      </div>


  </div>
<?php
include 'footer.php';
?>
