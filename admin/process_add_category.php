<?php
// Kết nối CSDL
$servername = "localhost";
$username = 'root';         // Enter YOUR username here
$password = '';   
$dbname = "btth01_cse485";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Lấy giá trị từ form
    $catName = $_POST['txtCatName'];
    

    // Chuẩn bị câu lệnh SQL để thêm dữ liệu vào bảng thể loại
   
    $stmt = $conn->prepare("INSERT INTO theloai (ten_tloai) VALUES (:catName)");
    $stmt->bindParam(':catName', $catName);
    
    // Thực thi câu lệnh SQL
    if($stmt->execute()){
    header("Location: category.php");};
    // Hiển thị thông báo khi thêm dữ liệu thành công
    echo "Thêm thể loại thành công!";

} catch(PDOException $e) {
    // Hiển thị thông báo khi có lỗi xảy ra
    echo "Lỗi: " . $e->getMessage();
}

// Đóng kết nối CSDL
$conn = null;
?>