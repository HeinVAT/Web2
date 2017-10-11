<?php
include_once ('nav.php');
?>
<?php
$id = (int)input_get('id');

if($id<>0)
{
    $sql='SELECT * FROM `category` WHERE `id`='.$id;
    $row=db_get_row($sql);

}
?>
<?php
$error=array();
if (is_submit('edit_category'))
{

    $data=array(
        'id'=>$row['id'],
        'CateName'=>input_post('CateName'),
        'CateUrl'=>input_post('CateUrl'),
        'WebId'=>input_post('WebId'),
    );



    if(!$error)
    {

        $edit="UPDATE `category` SET  `CateName` = '".$data['CateName']."', 
                `CateUrl` = '".$data['CateUrl']."', 
                `WebId` = '".$data['WebId']."' 
                WHERE `category`.`id` =".$id;
        if(db_execute($edit))
        {

            ?>
            <script language="javascript">
                alert('Sửa thông tin category thành công!');
                window.location = '<?php echo base_url('category.php'); ?>';
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
            <h1 class="page-header">Category</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <form role="form" id="main-form" method="post" action="">
                <input type="hidden" name="request_name" value="edit_category"/>
                <div class="form-group">
                    <label for="disabledSelect">ID </label>
                    <input name="txt_idCL" class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled value="<?php echo $row['id']; ?>">
                </div>
                <div class="form-group">
                    <label>CateName</label>
                    <input class="form-control" placeholder="Enter text" value="<?php echo $row['CateName']; ?>" name="CateName">
                </div>


                <div class="form-group">
                    <label>CateUrl</label>
                    <input name="CateUrl" class="form-control" placeholder="Enter text" value="<?php echo $row['CateUrl']; ?>">
                </div>
                <div class="form-group">
                    <label>CateUrl</label>
                    <input name="WebId" class="form-control" placeholder="Enter text" value="<?php echo $row['WebId']; ?>">
                </div>








                <a type="submit" class="btn btn-default" href="javascript:{}"   onclick="document.getElementById('main-form').submit();">Lưu</a>
                <a class="btn btn-default" href="<?php echo base_url('category.php'); ?>">Quay lại</a>
            </form>
        </div>
        <!-- /.col-lg-6 (nested) -->

        <!-- /.col-lg-6 (nested) -->
    </div>

</div>