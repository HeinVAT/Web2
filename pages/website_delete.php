<?php


// Thiết lập font chữ UTF8 để khỏi bị lõi font
include_once ('database.php');
include_once ('helper.php');
include_once ('role.php');
include_once ('session.php');




// Nếu người dùng xóa chủng loại
if (is_submit('delete_website'))
{

    // Lấy id
    $id = (int)input_post('website_id');
    if ($id)
    {


        $sql = 'DELETE FROM website where id='.$id;
        if (db_execute($sql)){
            ?>
            <script language="javascript">
                alert('Xóa thành công!');
                window.location = '<?php echo base_url('website.php'); ?>';
            </script>
            <?php
        }
        else{

            ?>

            <script language="javascript">
                alert('Xóa thất bại!');
                window.location = '<?php echo base_url('website.php'); ?>';
            </script>
            <?php
        }
    }

}
else{
    // Nếu không phải submit delete user thì chuyển về trang chủ
    redirect('main.php');
}
?>