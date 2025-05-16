<!-- hiển thị danh sách người dùng -->
<?php
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include_once('../MODEL/model.php');
$get_data = new data_user();

// Xử lý xóa
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $get_data->delete_user($id);
    header("Location: user_select.php");
    exit();
}

// Xử lý lấy dữ liệu để sửa
$edit_user = null;
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $result = $get_data->select_user_by_id($id);
    $edit_user = mysqli_fetch_assoc($result);
}

// Lấy danh sách user
$select_user = $get_data->select_user();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Danh sách người dùng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .container {
            max-width: 1000px;
            margin: 32px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 24px;
        }
        h2 {
            text-align: center;
            color: #3498db;
            margin-bottom: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #f9f9f9;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 8px;
            text-align: center;
        }
        th {
            background: #3498db;
            color: #fff;
        }
        tr:nth-child(even) {
            background: #eaf6fb;
        }
        tr:hover {
            background: #d0eaf7;
        }
        a {
            color: #2980b9;
            text-decoration: none;
            font-weight: 500;
        }
        a:hover {
            text-decoration: underline;
        }
        .action-link {
            padding: 4px 10px;
            border-radius: 4px;
            margin: 0 2px;
            background: #ecf0f1;
            transition: background 0.2s;
        }
        .action-link:hover {
            background: #d0eaf7;
        }
        @media (max-width: 700px) {
            .container {
                padding: 8px;
            }
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead tr {
                display: none;
            }
            tr {
                margin-bottom: 16px;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.05);
                background: #fff;
            }
            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            td:before {
                position: absolute;
                left: 12px;
                top: 12px;
                white-space: nowrap;
                font-weight: bold;
                color: #3498db;
            }
            td:nth-child(1):before { content: "ID"; }
            td:nth-child(2):before { content: "USERNAME"; }
            td:nth-child(3):before { content: "ADDRESS"; }
            td:nth-child(4):before { content: "AVATAR"; }
            td:nth-child(5):before { content: "GENDER"; }
            td:nth-child(6):before { content: "HOBBY"; }
            td:nth-child(7):before { content: "SỬA"; }
            td:nth-child(8):before { content: "XÓA"; }
        }
         
        @media (max-width: 600px) {
            .edit-user-form {
                padding: 12px 4px;
            }
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
    </style>
    
</head>
<body>
<div class="container">
    <a href="?logout=1" style="float:right;margin-left:10px;">Đăng xuất</a>
    <a href="index.php" style="float:right;">Đăng ký mới</a>
    <h2>Danh sách người dùng</h2>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>USERNAME</th>
            <th>ADDRESS</th>
            <th>AVATAR</th>
            <th>GENDER</th>
            <th>HOBBY</th>
            <th colspan="2">OPTION</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($i_user = mysqli_fetch_assoc($select_user)) { ?>
        <tr>
            <td><?php echo $i_user['id_user'] ?></td>
            <td><?php echo $i_user['username'] ?></td>
            <td><?php echo $i_user['address'] ?></td>
            <td>
   <?php if (!empty($i_user['avatar'])): ?>
        <img src="../uploads/<?php echo htmlspecialchars($i_user['avatar']); ?>" alt="avatar"
             style="width:60px;height:60px;display:block;margin:auto;">
    <?php else: ?>
        <span style="color:#bbb;">No image</span>
    <?php endif; ?>
</td>
            <td><?php echo $i_user['gender'] ?></td>
            <td><?php echo $i_user['hobby'] ?></td>
            <td>
           
<a class="action-link" href="user_select.php?edit=<?php echo $i_user['id_user']; ?>">Sửa</a>
            </td>
            <td>
                <a class="action-link" href="user_select.php?delete=<?php echo $i_user['id_user']; ?>" onclick="return confirm('Bạn có chắc muốn xóa?');">Xóa</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

  
<?php if ($edit_user): ?>
    <div id="editUserForm" class="edit-user-form" style="display:none;max-width:400px;margin:32px auto 0 auto;background:#f8fafd;padding:24px 18px;border-radius:10px;box-shadow:0 2px 12px rgba(52,152,219,0.08);">
        <h3 style="color:#3498db;text-align:center;margin-bottom:18px;">Sửa thông tin người dùng</h3>
        <form method="POST" action="../CONTROLLER/controller.php">
            <input type="hidden" name="id_user" value="<?php echo $edit_user['id_user']; ?>">
            <div class="form-group">
                <label for="txtaddress" style="font-weight:500;color:#636e72;">Địa chỉ</label>
                <input type="text" name="txtaddress" id="txtaddress" class="form-control" value="<?php echo htmlspecialchars($edit_user['address']); ?>" placeholder="Địa chỉ" required>
            </div>
            <div class="form-group">
                <label for="txtgen" style="font-weight:500;color:#636e72;">Giới tính</label>
                <select name="txtgen" id="txtgen" class="form-control">
                    <option value="Nam" <?php if($edit_user['gender']=='Nam') echo 'selected'; ?>>Nam</option>
                    <option value="Nữ" <?php if($edit_user['gender']=='Nữ') echo 'selected'; ?>>Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txthobby" style="font-weight:500;color:#636e72;">Sở thích</label>
                <input type="text" name="txthobby" id="txthobby" class="form-control" value="<?php echo htmlspecialchars($edit_user['hobby']); ?>" placeholder="Sở thích">
            </div>
            <input type="submit" name="update_user" value="Cập nhật" style="width:100%;background:#3498db;color:#fff;border:none;padding:12px;border-radius:6px;font-size:1rem;cursor:pointer;transition:background 0.2s;">
        </form>
    </div>
    <script>
        // Hiển thị form sửa khi trang được load với tham số edit
        window.onload = function() {
            var editForm = document.getElementById('editUserForm');
            if (editForm) editForm.style.display = 'block';
            // Cuộn tới form sửa cho tiện thao tác
            editForm.scrollIntoView({behavior: "smooth"});
        }
    </script>
<?php endif; ?>

</body>
</html>