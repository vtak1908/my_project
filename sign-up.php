<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Sign Up</title>

    <!-- CSS FILES -->
       <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
</head>
<body>

    <main>
        <section class="sign-in-form section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto col-12">
                        <h1 class="hero-title text-center mb-5">Đăng ký</h1>
                        <div class="row">
                            <div class="col-lg-8 col-11 mx-auto">
                                <form role="form" method="post">
                                    <div class="form-floating">
                                        <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
                                        <br>
                                    </div>
                                    <div class="form-floating">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-floating my-4">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Xác nhận mật khẩu" required>
                                    </div>
                                    <button name="submit" type="submit" class="btn custom-btn form-control mt-4 mb-3">Đăng ký</button>
                                    <p class="text-center">Bạn đã có tài khoản? <a href="sign-in.php">Đăng nhập</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php 
            include("control.php");
            $get_Data = new data_user();

            if (isset($_POST['submit'])) {
                if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['email'])) {
                    if ($_POST['password'] != $_POST['confirm_password']) {
                        echo "<script>alert('Passwords do not match')</script>";
                    } else {
                        $select = $get_Data->select_user($_POST['username']);
                        $check = 0;
                        foreach ($select as $sel) {
                            $check++;
                        }
                        if ($check >= 1) {
                            echo "<script>alert('Tên đăng nhập đã tồn tại')</script>";
                        } else {
                            $insert = $get_Data->insert_User($_POST['username'], $_POST['password'], $_POST['email']);
                            if ($insert) {
                                echo "<script>alert('Đăng ký thành công'); window.location='sign-in.php';</script>";
                            } else {
                                echo "<script>alert('Đăng ký thất bại')</script>";
                            }
                        }
                    }
                } else {
                    echo "<script>alert('Vui lòng nhập đủ thông tin')</script>";
                }
            }
        ?>
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/Headroom.js"></script>
    <script src="js/jQuery.headroom.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
