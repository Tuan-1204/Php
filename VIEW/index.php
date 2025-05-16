<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
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
            max-width: 400px;
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
        input[type="text"], input[type="password"], input[type="file"], select {
            padding: 10px;
            border: 1px solid #b2bec3;
            border-radius: 6px;
            font-size: 1rem;
        }
        label {
            font-weight: 500;
            color: #636e72;
        }
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .checkbox-group label {
            font-weight: normal;
            color: #2d3436;
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
        @media (max-width: 500px) {
            .container {
                padding: 18px 6px;
            }
        }
        .show-link {
    display: block;
    text-align: center;
    margin-top: 12px;
    color: #27ae60;
    text-decoration: none;
    font-weight: 500;
}
.show-link:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Đăng ký tài khoản</h2>
        <form method="POST" action="../CONTROLLER/controller.php" enctype="multipart/form-data">
            <input type="text" name="txtuser" placeholder="Username" required>
            <input type="password" name="txtpass" placeholder="Password" required>
            <input type="password" name="txtrepass" placeholder="Nhập lại Password" required>
           <select name="txtaddress" required>
    <option value="">-- Chọn địa chỉ --</option>
    <option value="Hà Nội">Hà Nội</option>
    <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
    <option value="Đà Nẵng">Đà Nẵng</option>
    <option value="Cần Thơ">Cần Thơ</option>
    <option value="Hải Phòng">Hải Phòng</option>
    <option value="Nha Trang">Nha Trang</option>
    <option value="Huế">Huế</option>
    <option value="Vũng Tàu">Vũng Tàu</option>
    <option value="Đà Lạt">Đà Lạt</option>
    <option value="Quy Nhơn">Quy Nhơn</option>
    <option value="Phan Thiết">Phan Thiết</option>  
    <option value="Hạ Long">Hạ Long</option>
    <option value="Nam Định">Nam Định</option>
    <option value="Thái Bình">Thái Bình</option>
    <option value="Bắc Ninh">Bắc Ninh</option>
    <option value="Thái Nguyên">Thái Nguyên</option>
    <option value="Ninh Bình">Ninh Bình</option>
    <option value="Hưng Yên">Hưng Yên</option>
    <option value="Vĩnh Phúc">Vĩnh Phúc</option>
    <option value="Bình Dương">Bình Dương</option>
    <!-- Thêm các địa phương khác nếu muốn -->
</select>
            <input type="file" name="txtfile">
            <select name="txtgen">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
            <label>Sở thích:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="txtcheck[]" value="Game"> Game</label>
                <label><input type="checkbox" name="txtcheck[]" value="Football"> Football</label>
                <label><input type="checkbox" name="txtcheck[]" value="Travel"> Travel</label>
                <label><input type="checkbox" name="txtcheck[]" value="Shopping"> Shopping</label>
            </div>
            
<input type="submit" name="txtsub_register" value="Đăng ký">
<a class="show-link" href="user_select.php">Hiển thị danh sách người dùng</a>
<!-- ...existing code... -->
        </form>
        <a class="login-link" href="login.php">Đã có tài khoản? Đăng nhập</a>
    </div>
</body>
</html>