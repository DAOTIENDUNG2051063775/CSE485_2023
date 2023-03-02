<?php
$host = "localhost";  
$dbname="btth01_cse485"; 
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);  // thực hiện kết nối đến database
    $sql= "SELECT* FROM tacgia";
    $kq = $conn->query($sql);
    
?>
<!DOCTYPE html>
<html lang="en">
<<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
<body>
<div class="row">
            <div class="col-sm">
                <a href="add_author.php" class="btn btn-success">Thêm mới</a>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Tên tác giả</th>
      <th>Hình tác giả</th>
      <th>Chỉnh sửa</th>
      <th>Xóa</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
                    
                            while ($row = $kq->fetch(PDO::FETCH_ASSOC)){?>
                                <tr>
                                
                                <td><?php echo $row['ma_tgia']; ?></td>
                                <td><?php echo $row['ten_tgia']; ?></td>
                                <td><?php echo $row['hinh_tgia']; ?></td>
                                <td>
                                    <a href="edit_author.php?id="><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                                <td>
                                    <a href=""><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php }
                         ?>
    <!-- Thêm các hàng tương tự cho các tác giả khác -->
  </tbody>
</table>
            </div>
        </div>
<footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>