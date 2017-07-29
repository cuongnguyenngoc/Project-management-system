<script src="<?php echo BASE_URL ?>public/js/lib/jquery.js"></script>
<script src="<?php echo BASE_URL ?>public/js/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL ?>public/js/functions/validateForm.js" type="text/javascript"></script>
<script>
    validate("#formTime");
    //validateSelect("#formStudent");
</script>
<div class="content">
    <div class="wrapper">
        <div>
            <h2>Thiết Lập Thời Gian Đăng Ký</h2>
            <label><h3><?php echo (isset($data['notice'])) ? $data['notice']: "";?></h3></label>
            <form action="" id="formTime" method="post">
                <fieldset>
                    <legend>Thời Gian Bắt Đầu Mở Đăng Ký</legend>
                    <div class="node">
                        <label for="date">Ngày: <span class="required">*</span></label>
                        <select name="date_start" id="date" required>
                            <option value="">Chọn Ngày</option>
                            <?php for ($i = 1; $i <= 31; $i++) { ?>
                                <option value="<?php echo $i ?>" 
                                    <?php if (isset($_POST['date']) && $_POST['date'] == $i) echo "selected='selected'";?>><?=$i ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="node">
                        <label for="month">Tháng: <span class="required">*</span></label>
                        <select name="month_start" id="month" required>
                            <option value="">Chọn tháng</option>
                            <?php foreach ($data['month'] as $key => $value) { ?>
                                <option value="<?php echo $value ?>" 
                                    <?php if(isset($_POST['date'])&&$_POST['month'] == $value) echo "selected='selected'";?>><?php echo $key ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="node">
                        <label for="year">Năm: <span class="required">*</span></label>
                        <select name="year_start" id="month" required>
                            <option value="">Chọn năm</option>
                            <?php for($i=2013;$i<2016;$i++) { ?>
                                <option value="<?=$i ?>" 
                                    <?php if(isset($_POST['year'])&&$_POST['year'] == $value) echo "selected='selected'";?>><?=$i?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                </fieldset>
                <fieldset>
                    <legend>Thời Gian Đóng Đăng Ký</legend>
                    <div class="node">
                        <label for="date">Ngày: <span class="required">*</span></label>
                        <select name="date_end" id="date" required>
                            <option value="">Chọn Ngày</option>
                            <?php for ($i = 1; $i <= 31; $i++) { ?>
                                <option value="<?php echo $i ?>" 
                                    <?php if (isset($_POST['date']) && $_POST['date'] == $i) echo "selected='selected'";?>><?=$i ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="node">
                        <label for="month">Tháng: <span class="required">*</span></label>
                        <select name="month_end" id="month" required>
                            <option value="">Chọn tháng</option>
                            <?php foreach ($data['month'] as $key => $value) { ?>
                                <option value="<?php echo $value ?>" 
                                    <?php if(isset($_POST['date'])&&$_POST['month'] == $value) echo "selected='selected'";?>><?php echo $key ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="node">
                        <label for="year">Năm: <span class="required">*</span></label>
                        <select name="year_end" id="month" required>
                            <option value="">Chọn năm</option>
                            <?php for($i=2013;$i<2016;$i++) { ?>
                                <option value="<?=$i ?>" 
                                    <?php if(isset($_POST['year'])&&$_POST['year'] == $value) echo "selected='selected'";?>><?=$i?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                </fieldset>
                <p>
                    <input type="submit" value="Thêm"/>
                </p>
            </form>
        </div>
    </div>
</div>

