<?php
$host = "localhost";  
$dbname="btth01_cse485"; 
$username = "root";
$password = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("DELETE FROM theloai WHERE ma_tloai=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: category.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>