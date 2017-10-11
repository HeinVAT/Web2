<?php
include_once ('nav.php');

$sql = db_create_sql("SELECT * FROM category ");
$result = db_get_list($sql);

?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <a class="btn btn-outline btn-primary btn-lg btn-block" href="category_add.php">Thêm</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>CateName</th>
                            <th>CateURL</th>
                            <th>Web Name</th>
                            <th>Edit</th>
                        </tr>


                        </thead>
                        <tbody>
                        <?php
                        foreach($result as $value) {

                            ?>


                        <tr class="odd gradeX">
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['CateName'] ?></td>
                            <td><?php echo $value['CateUrl'] ?></td>
                            <td class="center">
                                <?php
                                $sql_tenweb='SELECT WebName FROM website WHERE id='.$value['WebId'];
                                $tenweb=db_get_row($sql_tenweb);
                                echo $tenweb['WebName']
                                ?>
                            </td>
                            <form method="POST" id="form-delete<?php echo $value['id']; ?>" class="form-delete" action="<?php  echo 'category_delete.php' ?>">
                                <input type="hidden" name="category_id" value="<?php echo $value['id']; ?>"/>
                                <input type="hidden" name="request_name" value="delete_category"/>
                                <td><a href="category_edit.php?id=<?php echo $value['id']; ?>">Edit</a>/<a href="javascript:{}" onclick="document.getElementById('form-delete<?php echo $value['id']; ?>').submit(); return false;">Delete</a></td>
                            </form>
                        </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
