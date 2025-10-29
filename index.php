<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Danh sách Archer</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>  
  <div class="mainboard">
  <h1>🏹 Danh sách Archer(user_table)</h1>
  
  <!-- Search Bar, Reset buttonnn -->
  <form action="" method="GET">
    <div class="input-group mb-3">
      <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Tìm kiếm Archer">
      <button type="submit" class="btn btn-primary">Tìm</button>
       <a href="index.php" class="btn">Reset</a>
    </div>
  </form>

 

  <div class="table-containerr">
    <table>
      <tr>
        <th>IDDDDDDDDDDDsssdadasdsadsa</th>
        <th>Họ</th>
        <th>Tên</th>
        <th>Giới tính</th>
        <th>Xem điểm</th>
      </tr>
      <?php
        if (isset($_GET['search'])) {
          $search = $_GET['search'];
          $sql = "SELECT user_id, first_name, last_name, gender FROM user_table 
                  WHERE CONCAT(first_name, last_name, gender, user_id) LIKE '%$search%' LIMIT 500";
        } else {
          $sql = "SELECT user_id, first_name, last_name, gender, user_id FROM user_table LIMIT 500";
        }
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
          echo "<tr><td colspan='5'>Không tìm thấy kết quả.</td></tr>";
        }
      ?>
    </table>
  </div>

  <a href="add_score.php" class="btn">➕ Nhập điểm mới</a>
  </div>
</body>
</html>
