<?php
include 'header.php';
include 'yanmenu.php';
error_reporting(0);
if ($_GET['islem']=='sil' and @$_GET['id'])
{
    // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update portfolio set is_deleted=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);

}
if ($_GET['islem']=='silRel' and @$_GET['id'])
{
    // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update relImage set is_deleted=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);

}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="box">
        <div class="box-header" style="float: right">

            <?php
            if ($_GET['islem']=='rel' and !empty($_GET['id']))
            {
              ?><a href="cokluresimekleme.php?islem=rel&id=<?= $_GET['id'] ?>" class="btn btn-success btn-xm">Lisää Kuva</a>
<?php
            }
            else {
                echo ' <a href="cokluresimekleme.php" class="btn btn-success btn-xm">Lisää Kuva</a>';
            }
            ?>


        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Photos</th

                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php

                if ($_GET['islem']=='rel' and !empty($_GET['id']))
                {
                    $sql=$db->query('select * from relImage where relid='.$_GET["id"].' and is_deleted=0');
                    $sonuc2=$sql->fetchAll();
                } else {
                    $sql=$db->query('select * from portfolio where is_deleted=0');
                    $sonuc2=$sql->fetchAll();
                }

                foreach ($sonuc2 as $sonuc)
                {

                    ?>
                    <tr>
                        <td>
                            <img src="../images/<?=$sonuc['picture']?>" width="200px" height="150px">
                        </td>
                        <td>
                            <?php
                            if ($_GET['islem']=='rel'){
                                ?>
                                <a href="resimgoster.php?islem=silRel&id=<?= $sonuc['id'] ?>" class="btn btn-danger btn-xs">Delete</a>

                                <?php
                            } else {
                                ?>
                                <a href="resimgoster.php?islem=sil&id=<?= $sonuc['id'] ?>" class="btn btn-danger btn-xs">Delete</a>

                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

</div>
<!-- /.content-wrapper -->


<?php
include 'footer.php';
?>
