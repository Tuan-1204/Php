
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
        input[type="text"], input[type="password"] {
            padding: 10px;
            border: 1px solid #b2bec3;
            border-radius: 6px;
            font-size: 1rem;
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
        .register-link {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #2980b9;
            text-decoration: none;
            font-weight: 500;
        }
        .register-link:hover {
            text-decoration: underline;
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
        <h2>Đăng nhập</h2>
       <form method="POST" action="../CONTROLLER/controller.php">
    <input type="text" name="txtuser" placeholder="Username" required
        value="<?php echo isset($_GET['user']) ? htmlspecialchars($_GET['user']) : ''; ?>">
    <input type="password" name="txtpass" id="txtpass" placeholder="Password" required>
    <div style="margin-bottom:10px;">
        <input type="checkbox" id="showPass" onclick="togglePassword()"> <label for="showPass" style="font-size:0.95em;">Hiển thị mật khẩu</label>
    </div>
    <input type="submit" name="txtsub_login" value="Đăng nhập">
</form>
<script>
function togglePassword() {
    var x = document.getElementById("txtpass");
    x.type = x.type === "password" ? "text" : "password";
}
</script>
        <a class="register-link" href="index.php">Chưa có tài khoản? Đăng ký</a>
        <a class="login-link" href="forgot_password.php">Quên mật khẩu?</a>

    </div>
</body>
</html>