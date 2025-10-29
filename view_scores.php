<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Lịch sử điểm</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="mainboard">
  <h1>📊 Lịch sử điểmABC</h1>
  <form method="GET" action="">
    <label>Nhập User ID:</label>
    <input type="number" name="user_id" required>
    <button type="submit">Xem điểm</button>
    
  </form>

  <?php
  if (isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']);
    $sql = "SELECT s.score_id, s.total_score, s.competition_id, s.round_id, r.location, s.date_recorded
            FROM scores s
            LEFT JOIN rounds r ON s.round_id = r.round_id
            WHERE s.user_id = $user_id
            ORDER BY s.score_id DESC";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      echo "<table>
              <tr>
                <th>Score ID</th>
                <th>Round</th>
                <th>Competition</th>
                <th>Tổng điểm</th>
                <th>Ngày ghi</th>
              </tr>";
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['score_id']}</td>
                <td>{$row['location']}</td>
                <td>{$row['competition_id']}</td>
                <td>{$row['total_score']}</td>
                <td>{$row['date_recorded']}</td>
              </tr>";
      }
      echo "</table>";
    } else {
      echo "<p>⚠️ Người này chưa có điểm nào.</p>";
    }
  }
  ?>
  </div>
</body>

<p>
<a href="index.php" class="btn">⬅ Quay lại</a>
</p>
</html>

