<?php
include_once ('nav.php');
?>

<?php
$error=array();
if (is_submit('add_website'))
{

    $data=array(

        'WebName'=>input_post('WebName'),
        'WebUrl'=>input_post('WebUrl'),
        'Pattern'=>input_post('Pattern'),
    );



    if(!$error)
    {

        $add="INSERT INTO `website` (`id`, `WebName`, `WebUrl`, `Pattern`) VALUES (NULL, '".$data['WebName']."', '".$data['WebUrl']."', '".$data['Pattern']."');";
        if(db_execute($add))
        {

            ?>
            <script language="javascript">
                alert('Thêm website thành công!');
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
                <input type="hidden" name="request_name" value="add_website"/>

                <div class="form-group">
                    <label>WebName</label>
                    <input class="form-control" placeholder="Enter text" value="" name="WebName">
                </div>


                <div class="form-group">
                    <label>WebUrl</label>
                    <input name="WebUrl" class="form-control" placeholder="Enter text" value="">
                </div>

                <div class="form-group">
                    <label>Pattern</label>
                    <textarea class="form-control" rows="3" name="Pattern" ></textarea>
                </div>








                <a type="submit" class="btn btn-default" href="javascript:{}"   onclick="document.getElementById('main-form').submit();">Lưu</a>
                <a class="btn btn-default" href="<?php echo base_url('website.php'); ?>">Quay lại</a>
            </form>
        </div>
        <!-- /.col-lg-6 (nested) -->

        <!-- /.col-lg-6 (nested) -->
    </div>

</div>