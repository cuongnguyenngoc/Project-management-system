<script src="<?php echo BASE_URL?>public/js/lib/jquery.js"></script>
<script src="<?php echo BASE_URL?>public/js/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL?>public/js/functions/validateForm.js" type="text/javascript"></script>
<script>
    validate("#formProject");
</script>
<div class="content">
    <div class="wrapper">
        <div>
            <h2>Cập Nhật Thông Tin Đề Tài</h2>
            <form action="" id="formProject" method="post">
                <fieldset>
                    <legend>Cập nhật</legend>
                    <div>
                        <label for="name">Tên Đề Tài: <span class="required">*</span></label>
                        <input type="text" id="name" value="<?php echo $data['project']['project_name'] ?>" name="name"/>
                    </div>
            
                    <div>
                        <label for="description">Mô tả: <span class="required">*</span></label>
                        <textarea type="text" id="description" value="" name="description" rows="10" cols="100"><?php echo $data['project']['description']; ?>
                        </textarea>
                    </div>
                </fieldset>
                <p>
                    <input type="submit" value="Cập nhật"/>
                </p>
            </form>
        </div>
    </div>
</div>



