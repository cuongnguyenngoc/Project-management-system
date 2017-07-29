<?php
$_POST = array(); // Làm rỗng mảng $_POST
?>
<script src="<?php echo BASE_URL ?>public/js/lib/jquery.js"></script>
<script src="<?php echo BASE_URL ?>public/js/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL ?>public/js/functions/validateForm.js" type="text/javascript"></script>

<script>
    validate("#formPropose");
    //validateSelect("#formStudent");
</script>
<div class="content">
    <div class = "wrapper">
        <div>
            <h2>Đề xuất đề tài</h2>
            <form action="" id="formPropose" method="post">
                <fieldset>
                    <legend>Đề xuất</legend>
                    <div>
                        <label for="name">Tên Đề Tài: <span class="required">*</span></label>
                        <input type="text" id="name" value="<?php if (isset($_POST['name'])) echo strip_tags($_POST['name']); ?>" name="name" required/>
                    </div>
                    <div>
                        <label for="description">Mô tả: <span class="required">*</span></label>
                        <textarea type="text" id="description" value="" name="description" required rows="10" cols="100"><?php if (isset($_POST['description'])) echo strip_tags($_POST['description']); ?></textarea>
                    </div>

                </fieldset>
                <p>
                    <input type="submit" value="Thêm"/>
                </p>
            </form>
        </div>	
    </div>
</div>


