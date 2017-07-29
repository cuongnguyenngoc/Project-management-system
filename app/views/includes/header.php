<!Doctype html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>-->
        <title>Project Register Management System</title>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/css/info.css"/>
    </head>

    <body>
        <div id="container">
            <div id="header">
                <div class="wrapper_header">
                    <div id="top_header">
                        <div id="logo">
                            <img alt="Page's logo" src="<?php echo BASE_URL; ?>public/images/logo.png"/>
                        </div>
                        <div class="signin-signup">
                            <?php if (!isset($_SESSION['name'])) { ?>
                                <form action = "<?php echo BASE_URL; ?>home/login" method = "POST">
                                    <div class="input">
                                        <label for="email">Email :</label> 
                                        <input type = "text" name = "email"/>
                                    </div>
                                    <div class="input">
                                        <label for="password">Password :</label> 
                                        <input type = "password" name = "password"/><br/>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="submit">
                                        <input  type = "submit" value = "Đăng nhập" name="submit"/>
                                    </div>
                                </form>
                                <?php
                            } else {
                                echo "<p>Welcome " . $_SESSION['name'] . ", ";
                                echo "<a href='" . BASE_URL . "home/logout'>Đăng xuất</a></p>";
                            }
                            ?>
                        </div>
                        <h1><p>Project Register Management System</p></h1>

                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <?php
                    if (isset($_SESSION['level'])) {
                        switch ($_SESSION['level']) {
                            case 1: $this->view('includes/header/admin_navi');
                                break;
                            case 2: $this->view('includes/header/teacher_navi');
                                break;
                            case 3: $this->view('includes/header/student_navi');
                                break;
                            default : $this->view('includes/header/default_navi');
                                break;
                        }
                    } else {
                        $this->view('includes/header/default_navi');
                    }
                
                