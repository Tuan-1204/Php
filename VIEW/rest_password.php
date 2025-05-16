
<!-- thay đổi mật khẩu -->
<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    echo "Yêu cầu không hợp lệ!";
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đổi mật khẩu</title>
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
            max-width: 350px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #3498db;
            margin-bottom: 24px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        input[type="password"] {
            padding: 10px;
            border: 1px solid #b2bec3;
            border-radius: 6px;
            font-size: 1rem;
        }
        .show-pass {
            margin-bottom: 10px;
            font-size: 0.95em;
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
        }
        input[type="submit"]:hover {
            background: #217dbb;
        }
        .login-link {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #2980b9;
            text-decoration: none;
            font-weight: 500;
        }
        .login-link:hover {
            text-decoration: underline;
        }
        .error {
            color: #e74c3c;
            text-align: center;
            margin-bottom: 10px;
            font-size: 0.98em;
        }
        @media (max-width: 500px) {
            .container {
                padding: 18px 6px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Đổi mật khẩu mới</h2>
        <form method="POST" action="../CONTROLLER/controller.php" onsubmit="return checkPasswordMatch();">
            <input type="hidden" name="reset_id" value="<?php echo $id; ?>">
            <input type="password" name="reset_pass" id="reset_pass" placeholder="Mật khẩu mới" required>
            <input type="password" name="reset_repass" id="reset_repass" placeholder="Nhập lại mật khẩu mới" required>
            <div class="show-pass">
                <input type="checkbox" id="showPass" onclick="togglePassword()"> <label for="showPass">Hiển thị mật khẩu</label>
            </div>
            <div id="error-message" class="error"></div>
            <input type="submit" name="reset_submit" value="Đổi mật khẩu">
        </form>
        <a class="login-link" href="login.php">Quay lại đăng nhập</a>
    </div>
    <script>
        function togglePassword() {
            var pass1 = document.getElementById("reset_pass");
            var pass2 = document.getElementById("reset_repass");
            var type = pass1.type === "password" ? "text" : "password";
            pass1.type = type;
            pass2.type = type;
        }
        function checkPasswordMatch() {
            var pass1 = document.getElementById("reset_pass").value;
            var pass2 = document.getElementById("reset_repass").value;
            var errorDiv = document.getElementById("error-message");
            if (pass1 !== pass2) {
                errorDiv.textContent = "Mật khẩu nhập lại không khớp!";
                return false;
            }
            errorDiv.textContent = "";
            return true;
        }
    </script>
</body>
</html>