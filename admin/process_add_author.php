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
    $catID = $_POST['txtCatID'];
    

    // Chuẩn bị câu lệnh SQL để thêm dữ liệu vào bảng thể loại
    $stmt = $conn->prepare("INSERT INTO tacgia (ma_tgia,ten_tgia) VALUES (:catID,:catName)");
    $stmt->bindParam(':catID', $catID);
    $stmt = $conn->prepare("INSERT INTO tacgia (ten_tgia) VALUES (:catName)");
    $stmt->bindParam(':catName',$catName);
    // Thực thi câu lệnh SQL
    if($stmt->execute()){
        header("Location: author.php");};
      
    // Hiển thị thông báo khi thêm dữ liệu thành công
    echo "Thêm tác giả thành công!";

} catch(PDOException $e) {
    // Hiển thị thông báo khi có lỗi xảy ra
    echo "Lỗi: " . $e->getMessage();
}

// Đóng kết nối CSDL
$conn = null;
?>