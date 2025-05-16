<?php
include_once('../MODEL/model.php');
$data = new data_user();

// Lấy danh sách user
$conn = mysqli_connect('localhost', 'root', '', 'webphp');
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách người dùng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { max-width: 800px; margin: 30px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background: #4CAF50; color: white; }
        tr:nth-child(even) { background: #f2f2f2; }
        img { max-width: 60px; max-height: 60px; border-radius: 4px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Danh sách người dùng</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Address</th>
            <th>Avatar</th>
            <th>Gender</th>
            <th>Hobby</th>
        </tr>
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
<td><?php echo $i_user['id_user'] ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['address']); ?></td>
                    <td>
                        <?php if (!empty($row['avatar'])): ?>
                            <img src="../uploads/<?php echo htmlspecialchars($row['avatar']); ?>" alt="Avatar">
                        <?php else: ?>
                            Không có
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($row['gender']); ?></td>
                    <td><?php echo htmlspecialchars($row['hobby']); ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">Chưa có người dùng nào.</td></tr>
        <?php endif; ?>
    </table>
</div>
</body>
</html> 