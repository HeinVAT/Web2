<?php
include_once ('nav.php');
?>
<?php
$id = (int)input_get('id');

if($id<>0)
{
    $sql='SELECT * FROM `website` WHERE `id`='.$id;
    $row=db_get_row($sql);

}
?>
<?php
$error=array();
if (is_submit('edit_website'))
{


    $data=array(
        'id'=>$row['id'],
        'WebName'=>input_post('WebName'),
        'WebUrl'=>input_post('WebUrl'),
        'Pattern'=>input_post('Pattern'),
    );



    if(!$error)
    {

        $edit="UPDATE `website` SET  `WebName` = '".$data['WebName']."', 
                `WebUrl` = '".$data['WebUrl']."', 
                `Pattern` = '".$data['Pattern']."' 
                WHERE `website`.`id` =".$id;
        echo $edit;
        if(db_execute($edit))
        {

            ?>
            <script language="javascript">
                alert('Sửa thông tin website thành công!');
                window.location = '<?php echo base_url('website.php'); ?>';
            </script>
            <?php
            die();
        }
    }
}




?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Website</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <form role="form" id="main-form" method="post" action="">
                <input type="hidden" name="request_name" value="edit_website"/>
                <div class="form-group">
                    <label for="disabledSelect">ID </label>
                    <input name="txt_idCL" class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled value="<?php echo $row['id']; ?>">
                </div>
                <div class="form-group">
                    <label>WebName</label>
                    <input class="form-control" placeholder="Enter text" value="<?php echo $row['WebName']; ?>" name="WebName">
                </div>


                <div class="form-group">
                    <label>WebUrl</label>
                    <input name="WebUrl" class="form-control" placeholder="Enter text" value="<?php echo $row['WebUrl']; ?>">
                </div>

                <div class="form-group">
                    <label>Pattern</label>
                    <textarea class="form-control" rows="3" name="Pattern" ><?php echo $row['Pattern']; ?></textarea>
                </div>








                <a type="submit" class="btn btn-default" href="javascript:{}"   onclick="document.getElementById('main-form').submit();">Lưu</a>
                <a class="btn btn-default" href="<?php echo base_url('website.php'); ?>">Quay lại</a>
            </form>
        </div>
        <!-- /.col-lg-6 (nested) -->

        <!-- /.col-lg-6 (nested) -->
    </div>

</div>