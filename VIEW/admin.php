<!-- trang quản trị viên -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include_once('../MODEL/model.php');
$data = new data_user();
$user = $_SESSION['username'];
$result = $data->select_user($user);
$info = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Trang quản trị viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: #fff;
            padding: 32px 24px;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #3498db;
            margin-bottom: 24px;
        }
        .form-group {
            margin-bottom: 14px;
        }
        .form-control {
            width: 100%;
            padding: 9px 10px;
            border: 1px solid #b2bec3;
            border-radius: 6px;
            font-size: 1rem;
        }
        .form-control:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 2px #eaf6fb;
        }
        input[type="submit"] {
            background: #3498db;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
            width: 100%;
        }
        input[type="submit"]:hover {
            background: #217dbb;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #2980b9;
            text-decoration: none;
            font-weight: 500;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Quản trị viên: <?php echo htmlspecialchars($info['username']); ?></h2>
    <form method="POST" action="../CONTROLLER/controller.php">
        <div class="form-group">
            <label for="oldpass">Mật khẩu cũ</label>
            <input type="password" name="oldpass" id="oldpass" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="newpass">Mật khẩu mới</label>
            <input type="password" name="newpass" id="newpass" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="renewpass">Nhập lại mật khẩu mới</label>
            <input type="password" name="renewpass" id="renewpass" class="form-control" required>
        </div>
        <input type="hidden" name="admin_user" value="<?php echo htmlspecialchars($info['username']); ?>">
        <input type="submit" name="admin_change_pass" value="Đổi mật khẩu">
    </form>
    <a class="back-link" href="user_select.php">Quay lại trang người dùng</a>
</div>
</body>
</html>