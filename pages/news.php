<?php
include_once ('nav.php');

$sql = db_create_sql("SELECT * FROM news ");
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
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>CateID</th>
                            <th>Title</th>
                            <th>Description</th>

                            <th>KeyWord</th>
                            <th>Author</th>
                            <th>Picture</th>
                            <th>CreateDate</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Edit</th>

                        </tr>


                        </thead>
                        <tbody>
                        <?php
                        foreach($result as $value) {

                            ?>


                            <tr class="odd gradeX">
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['CateId'] ?></td>
                                <td><?php echo $value['Title'] ?></td>
                                <td><?php echo $value['Description'] ?></td>

                                <td><?php echo $value['KeyWord'] ?></td>
                                <td><?php echo $value['Author'] ?></td>
                                <td><img src="<?php echo $value['Picture'] ?>"></td>
                                <td><?php echo $value['CreateDate'] ?></td>
                                <td><?php echo $value['Link'] ?></td>
                                <td><?php echo $value['Status'] ?></td>

                                <form method="POST" id="form-delete<?php echo $value['id']; ?>" class="form-delete" action="<?php  echo 'news_delete.php' ?>">
                                    <input type="hidden" name="news_id" value="<?php echo $value['id']; ?>"/>
                                    <input type="hidden" name="request_name" value="delete_news"/>
                                    <td><a href="news_edit.php?id=<?php echo $value['id']; ?>">Edit</a>/<a href="javascript:{}" onclick="document.getElementById('form-delete<?php echo $value['id']; ?>').submit(); return false;">Delete</a></td>
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
