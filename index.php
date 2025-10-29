<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Danh sách ArcherRrrrrr</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>🏹 Danh sách Archer (user_table)</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Họ</th>
      <th>Tên</th>
      <th>Giới tính</th>
      <th>Xem điểm</th>
    </tr>
    <?php
      $sql = "SELECT user_id, first_name, last_name, gender FROM user_table LIMIT 20";
      $result = $conn->query($sql);
      if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['user_id']}</td>
                  <td>{$row['first_name']}</td>
                  <td>{$row['last_name']}</td>
                  <td>{$row['gender']}</td>
                  <td><a href='view_scores.php?user_id={$row['user_id']}'>Xem điểm</a></td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='5'>Chưa có người bắn nào.</td></tr>";
      }
    ?>
  </table>
  <a href="add_score.php" class="btn">➕ Nhập điểm mới</a>
</body>
</html>
