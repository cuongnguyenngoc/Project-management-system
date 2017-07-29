<?php
$_POST = array(); // Làm rỗng mảng $_POST
?>
<script src="<?php echo BASE_URL?>public/js/lib/jquery.js"></script>
<script src="<?php echo BASE_URL?>public/js/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL?>public/js/functions/validateForm.js" type="text/javascript"></script>
<script>
    validate("#formStudent");
    //validateSelect("#formStudent");
</script>
<div class="content">
    <div class="wrapper">
        <div>
            <h2>Cập nhật thông tin Sinh Viên</h2>
            <form action="" id="formStudent" method="post">
                <fieldset>
                    <legend>Cập nhật thông tin</legend>
                    <div class="node">
                        <label for="name">Tên Sinh Viên: <span class="required">*</span></label>
                        <input type="text" id="name" value="<?php echo $data['student']['student_name']; ?>" name="name" required/>
                    </div>
                    <div class="node">
                        <label for="class">Lớp: <span class="required">*</span></label>
                        <select name="class_id" id="class_id" required title="Hãy chọn lớp cho sinh viên">
                            <option value="">Chọn Lớp</option>
                            <?php
                            //if($data['class'].length>1){
                            foreach ($data['class'] as $class) {
                                echo "<option value='{$class['class_id']}'";
                                if($data['student']['class_name'] == $class['class_name']){
                                    echo "selected='selected'";
                                }
                                echo ">".$class['class_name']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="node">
                        <label for="course">Khóa: <span class="required">*</span></label>
                        <select name="course_id" id="course_id" required title="Hãy chọn khóa học cho sinh viên">
                            <option value="">Chọn Khóa</option>
                            <?php
                            foreach ($data['course'] as $course) {
                                echo "<option value='{$course['course_id']}'";
                                if($data['student']['course_name'] == $course['course_name']){
                                    echo "selected='selected'";
                                }
                                echo ">".$course['course_name']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="node">
                        <label for="email">Email: <span class="required">*</span></label>
                        <input type="email" id="email" value="<?php echo $data['student']['email']; ?>" name="email" required/>
                    </div>

                    <div class="node">
                        <label for="password">Password:<span class="required">*</span></label>
                        <input type="password" id="password" value="" name="password" required/>
                    </div>
                    <div class="node">
                        <label for="birth">Ngày Sinh: <span class="required">*</span></label>
                        <input type="text" id="date" value="<?php echo $data['student']['birth']; ?>" name="birth" required/>
                    </div>
                    <div class="node">
                        <label for="address">Địa Chỉ: <span class="required">*</span></label>
                        <input type="text" id="address" value="<?php echo $data['student']['address']; ?>" name="address" required/>
                    </div>
                </fieldset>
                <p>
                    <input type="submit" value="Cập nhật"/>
                </p>
            </form>
        </div>
    </div>
</div>





