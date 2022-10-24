<?php
include 'header.php';
include 'yanmenu.php';
error_reporting(0);
if ($_GET['islem']=='sil' and @$_GET['id'])
{
    // $sql=$db->query('update hakkinda set aktifmi=0 where id="'.$_GET['id'].'"');
    $sql=$db->prepare('update dokumans set is_deleted=1 where id=:id');
    $sql->execute(['id'=>$_GET['id']]);

}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="box">
        <div class="box-header" style="float: right">

            <a href="dokuman_add.php?islem=dok&id=<?= $_GET['id'] ?>"
               class="btn btn-info btn-xs">Lisää Dokumentit</a>


        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <td>Dop</td>
                    <td>Edp</td>
                    <td>Tuo</td>
                    <td>Työ</td>
                    <td>Suu</td>
                </tr>
                </thead>
                <tbody>
                <?php

                    $sql=$db->query('select * from dokumans where relid='.$_GET["id"].' and is_deleted=0');
                    $sonuc2=$sql->fetchAll();


                foreach ($sonuc2 as $sonuc)
                {

                    ?>
                    <tr>
                        <td>
                            <img src="../images/<?=$sonuc['dop']?>" width="200px" height="150px">
                        </td>
                        <td>
                            <img src="../images/<?=$sonuc['edp']?>" width="200px" height="150px">

                        </td>
                        <td>
                            <img src="../images/<?=$sonuc['tuo']?>" width="200px" height="150px">

                        </td>
                        <td>
                            <img src="../images/<?=$sonuc['työ']?>" width="200px" height="150px">

                        </td>
                        <td>
                            <img src="../images/<?=$sonuc['suu']?>" width="200px" height="150px">

                        </td>

                        <td>
                            <a href="dokuman_goster.php?islem=sil&id=<?= $sonuc['id'] ?>" class="btn btn-danger btn-xs">Delete</a>
                            |
                            <a href="dokuman_add.php?islem=dokUpdate&id=<?= $sonuc['id'] ?>"
                               class="btn btn-primary btn-xs">Update</a>
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
