
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
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin cá nhân</title>
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
        .info-container {
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
        .info-list {
            list-style: none;
            padding: 0;
            margin: 0 0 18px 0;
        }
        .info-list li {
            margin-bottom: 12px;
            font-size: 1.08em;
            color: #2d3436;
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
        @media (max-width: 500px) {
            .info-container {
                padding: 18px 6px;
            }
        }
    </style>
</head>
<body>
    <div class="info-container">
        <h2>Thông tin người dùng</h2>
        <ul class="info-list">
            <li><strong>Username:</strong> <?php echo htmlspecialchars($info['username']); ?></li>
            <li><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($info['address']); ?></li>
            <li><strong>Giới tính:</strong> <?php echo htmlspecialchars($info['gender']); ?></li>
            <li><strong>Sở thích:</strong> <?php echo htmlspecialchars($info['hobby']); ?></li>
        </ul>
        <a class="back-link" href="user_select.php">Quay lại</a>
    </div>
</body>
</html>