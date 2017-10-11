<?php
include_once ('nav.php');
?>

<?php
$error=array();
if (is_submit('add_category'))
{

    $data=array(

        'CateName'=>input_post('CateName'),
        'CateUrl'=>input_post('CateUrl'),
        'WebId'=>input_post('WebId'),
    );



    if(!$error)
    {

        $add="INSERT INTO `category` (`id`, `CateName`, `CateUrl`, `WebId`) VALUES (NULL, '".$data['CateName']."', '".$data['CateUrl']."', '".$data['WebId']."');";
        if(db_execute($add))
        {

            ?>
            <script language="javascript">
                alert('Thêm category thành công!');
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
                <input type="hidden" name="request_name" value="add_category"/>

                <div class="form-group">
                    <label>CateName</label>
                    <input class="form-control" placeholder="Enter text" value="" name="CateName">
                </div>


                <div class="form-group">
                    <label>CateUrl</label>
                    <input name="CateUrl" class="form-control" placeholder="Enter text" value="">
                </div>
                <div class="form-group">
                    <label>WebId</label>
                    <input name="WebId" class="form-control" placeholder="Enter text" value="">
                </div>








                <a type="submit" class="btn btn-default" href="javascript:{}"   onclick="document.getElementById('main-form').submit();">Lưu</a>
                <a class="btn btn-default" href="<?php echo base_url('category.php'); ?>">Quay lại</a>
            </form>
        </div>
        <!-- /.col-lg-6 (nested) -->

        <!-- /.col-lg-6 (nested) -->
    </div>

</div>