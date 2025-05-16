<!-- xử lí dữ liệu và điều hướng -->
<?php
include_once('../MODEL/model.php');
session_start();
$data = new data_user();

// Đăng ký
if (isset($_POST['txtsub_register'])) {
    $check_sothich = "";
    if (isset($_POST['txtcheck']) && is_array($_POST['txtcheck'])) {
        foreach ($_POST['txtcheck'] as $i_check) {
            $check_sothich .= $i_check . " ";
        }
    }
    $avatar = '';
    if (isset($_FILES['txtfile']) && $_FILES['txtfile']['error'] == 0) {
        $avatar = $_FILES['txtfile']['name'];
        move_uploaded_file(
            $_FILES['txtfile']['tmp_name'],
            __DIR__ . '/../uploads/' . $avatar
        );
    }
    if ($_POST['txtpass'] != $_POST['txtrepass']) {
        echo "<script>alert('Mật khẩu và nhập lại mật khẩu chưa đúng')</script>";
    } elseif (empty($_POST['txtuser']) || empty($_POST['txtpass'])) {
        echo "<script>alert('Bạn chưa nhập đủ thông tin')</script>";
    } else {
        $select_user = $data->select_user($_POST['txtuser']);
        if (mysqli_num_rows($select_user) == 0) {
            $insert = $data->register(
                $_POST['txtuser'],
                $_POST['txtpass'],
                $_POST['txtaddress'],
                $avatar,
                $_POST['txtgen'],
                $check_sothich
            );
            if ($insert) {
                echo "<script>alert('Bạn đã đăng ký thành công');window.location='../VIEW/login.php';</script>";
            } else {
                echo "<script>alert('Đăng ký thất bại')</script>";
            }
        } else {
            echo "<script>alert('User đã tồn tại')</script>";
        }
    }
}

// Đăng nhập

if (isset($_POST['txtsub_login'])) {
    $user = $_POST['txtuser'];
    $pass = $_POST['txtpass'];
    $login = $data->login($user, $pass);
    if ($login && mysqli_num_rows($login) > 0) {
        $_SESSION['username'] = $user;
        header('location:../VIEW/user_select.php');
        exit();
    } else {
        header("Location: ../VIEW/login.php?user=" . urlencode($user));
        exit();
    }
}

// Sửa user
if (isset($_POST['update_user'])) {
    $id = $_POST['id_user'];
    $address = $_POST['txtaddress'];
    $gender = $_POST['txtgen'];
    $hobby = $_POST['txthobby'];
    $data->update_user($id, $address, $gender, $hobby);
    header('location:../VIEW/user_select.php');
    exit();
}

// quên mật khẩu

if (isset($_POST['forgot_submit'])) {
    $user = $_POST['forgot_user'];
    $result = $data->select_user($user);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Chuyển hướng sang trang đổi mật khẩu, truyền id qua GET
        header("Location: ../VIEW/rest_password.php?id=" . $row['id']);
        exit();
    } else {
        echo "<script>alert('Không tìm thấy tài khoản!');window.location='../VIEW/forgot_password.php';</script>";
        exit();
    }
}

// đổi mật khẩu

if (isset($_POST['reset_submit'])) {
    $id = intval($_POST['reset_id']);
    $pass = $_POST['reset_pass'];
    $repass = $_POST['reset_repass'];
    if ($pass !== $repass) {
        echo "<script>alert('Mật khẩu nhập lại không khớp!');window.location='../VIEW/reset_password.php?id=$id';</script>";
        exit();
    }
    global $conn;
    $sql = "UPDATE user SET password='$pass' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Đổi mật khẩu thành công!');window.location='../VIEW/login.php';</script>";
    } else {
        echo "<script>alert('Đổi mật khẩu thất bại!');window.location='../VIEW/reset_password.php?id=$id';</script>";
    }
    exit();
}

// quản lý người dùng

if (isset($_POST['admin_change_pass'])) {
    $user = $_POST['admin_user'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $renewpass = $_POST['renewpass'];
    $result = $data->login($user, $oldpass);
    if (!$result || mysqli_num_rows($result) == 0) {
        echo "<script>alert('Mật khẩu cũ không đúng!');window.location='../VIEW/admin.php';</script>";
        exit();
    }
    if ($newpass !== $renewpass) {
        echo "<script>alert('Mật khẩu mới nhập lại không khớp!');window.location='../VIEW/admin.php';</script>";
        exit();
    }
    global $conn;
    $sql = "UPDATE user SET password='$newpass' WHERE username='$user'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Đổi mật khẩu thành công!');window.location='../VIEW/admin.php';</script>";
    } else {
        echo "<script>alert('Đổi mật khẩu thất bại!');window.location='../VIEW/admin.php';</script>";
    }
    exit();
}
?>