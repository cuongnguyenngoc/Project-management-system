<script src="<?php echo BASE_URL?>public/js/lib/jquery.js"></script>
<script src="<?php echo BASE_URL?>public/js/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL?>public/js/functions/validateForm.js" type="text/javascript"></script>
<script>
    validate("#formTeacher");
    //validateSelect("#formTeacher");
</script>
<div class="content">
    <div class="wrapper">
        <div>
            <h2>Thêm Giảng Viên</h2>
            <form action="" id="formTeacher" method="post">
                <fieldset>
                    <legend>Thêm</legend>
                    <div class="node">
                        <label for="name">Tên Giảng Viên: <span class="required">*</span></label>
                        <input type="text" id="name" value="<?php if (isset($_POST['name'])) echo strip_tags($_POST['name']); ?>" name="name"/>
                    </div>
                    <div class="node">
                        <label for="department">Bộ Môn: <span class="required">*</span></label>
                        <select name="dept_id" id="dept_id" required title="Hãy chọn bộ môn giảng viên trực thuộc">
                            <option value="">Chọn bộ môn</option>
                            <?php
                            foreach ($data['department'] as $dept) {
                                echo "<option value='{$dept['dept_id']}'";
                                if (isset($_POST['dept_id']) && $_POST['dept_id'] == $dept['dept_id']) {
                                    echo "selected='selected'";
                                }
                                echo ">" . $dept['dept_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="node">
                        <label for="degree">Học Vị: <span class="required">*</span></label>
                        <select name="degree_id" id="degree_id" required title="Hãy chọn học vị của giảng viên">
                            <option value="">Chọn Học Vị</option>
                            <?php
                            foreach ($data['degree'] as $degree) {
                                echo "<option value='{$degree['degree_id']}'";
                                if(isset($_POST['degree_id'])&&$_POST['degree_id'] == $degree['degree_id']){
                                    echo "selected='selected'";
                                }
                                echo ">".$degree['job']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="node">
                        <label for="email">Email: <span class="required">*</span></label>
                        <input type="email" id="email" value="<?php if (isset($_POST['email'])) echo strip_tags($_POST['email']); ?>" name="email"/>
                    </div>

                    <div class="node">
                        <label for="password">Password:<span class="required">*</span></label>
                        <input type="password" value="" name="password" id="password"/>
                    </div>

                    <div class="node">
                        <label for="address">Địa Chỉ: <span class="required">*</span></label>
                        <input type="text" id="address" value="<?php if (isset($_POST['address'])) echo strip_tags($_POST['address']); ?>" name="address"/>
                    </div>
                    <div class="node">
                        <label for="phone">Số Điện Thoại: <span class="required">*</span></label>
                        <input type="text" id="phone" value="<?php if (isset($_POST['phone'])) echo strip_tags($_POST['phone']); ?>" name="phone"/>
                    </div>
                    <div class="node sp">
                        <label for="research">Hướng nghiên cứu: <span class="required">*</span></label>
                        <textarea type="text" id="description" name="research" required rows="10" cols="100"><?php if (isset($_POST['research'])) echo strip_tags($_POST['research']); ?></textarea>
                    </div>
                </fieldset>
                <p>
                    <input type="submit" value="Thêm"/>
                </p>
            </form>
        </div>
    </div>
</div>




