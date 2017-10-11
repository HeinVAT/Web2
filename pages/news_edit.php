<?php
include_once ('nav.php');
?>
<?php
$id = (int)input_get('id');

if($id<>0)
{
    $sql='SELECT * FROM `news` WHERE `id`='.$id;
    $row=db_get_row($sql);

}
?>
<?php
$error=array();
if (is_submit('edit_news'))
{

    $data=array(
        'id'=>$row['id'],
        'CateId'=>input_post('CateId'),
        'Title'=>input_post('Title'),
        'Description'=>input_post('Description'),
        'Content'=>input_post('Content'),
        'KeyWord'=>input_post('KeyWord'),
        'Author'=>input_post('Author'),
        'Picture'=>input_post('Picture'),
        'CreateDate'=>input_post('CreateDate'),
        'Link'=>input_post('Link'),
        'Status'=>input_post('Status'),
    );



    if(!$error)
    {

        $edit="UPDATE `news` SET  `CateId` = '".$data['CateId']."', 
                `Title` = '".$data['Title']."', 
                `Description` = '".$data['Description']."', 
                `Content` = '".$data['Content']."', 
                `KeyWord` = '".$data['KeyWord']."', 
                `Author` = '".$data['Author']."', 
                `Picture` = '".$data['Picture']."', 
                `CreateDate` = '".$data['CreateDate']."', 
                `Link` = '".$data['Link']."', 
                `Status` = '".$data['Status']."'
                WHERE `news`.`id` =".$id;
        if(db_execute($edit))
        {

            ?>
            <script language="javascript">
                alert('Sửa thông tin news thành công!');
                window.location = '<?php echo base_url('news.php'); ?>';
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
            <h1 class="page-header">News</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <form role="form" id="main-form" method="post" action="">
                <input type="hidden" name="request_name" value="edit_news"/>
                <div class="form-group">
                    <label for="disabledSelect">ID </label>
                    <input name="txt_idCL" class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled value="<?php echo $row['id']; ?>">
                </div>
                <div class="form-group">
                    <label>CateId</label>
                    <input class="form-control" placeholder="Enter text" value="<?php echo $row['CateId']; ?>" name="CateId">
                </div>


                <div class="form-group">
                    <label>Title</label>
                    <input name="Title" class="form-control" placeholder="Enter text" value="<?php echo $row['Title']; ?>">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="Description" ><?php echo $row['Description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" rows="3" name="Content" ><?php echo $row['Content']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>KeyWord</label>
                    <textarea class="form-control" rows="3" name="KeyWord" ><?php echo $row['KeyWord']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <textarea class="form-control" rows="3" name="Author" ><?php echo $row['Author']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Picture</label>
                    <input class="form-control" placeholder="Enter text" value="<?php echo $row['Picture']; ?>" name="Picture">
                </div>
                <div class="form-group">
                    <label>CreateDate</label>
                    <input class="form-control" placeholder="Enter text" value="<?php echo $row['CreateDate']; ?>" name="CreateDate">
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input class="form-control" placeholder="Enter text" value="<?php echo $row['Link']; ?>" name="Link">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input class="form-control" placeholder="Enter text" value="<?php echo $row['Status']; ?>" name="Status">
                </div>






                <a type="submit" class="btn btn-default" href="javascript:{}"   onclick="document.getElementById('main-form').submit();">Lưu</a>
                <a class="btn btn-default" href="<?php echo base_url('news.php'); ?>">Quay lại</a>
            </form>
        </div>
        <!-- /.col-lg-6 (nested) -->

        <!-- /.col-lg-6 (nested) -->
    </div>

</div>