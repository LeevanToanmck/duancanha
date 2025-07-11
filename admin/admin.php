<?php 
include "../connect.php";
session_start();

// Kiểm tra đăng nhập và quyền admin
if (!isset($_SESSION['username']) || $_SESSION['level'] != 1) {
    echo "<script>alert('Bạn không có quyền truy cập trang này!'); window.location.href='../index.php';</script>";
    exit();
}

// Xử lý xóa sản phẩm
if (isset($_GET['delete'])) {
    $masp = $_GET['delete'];
    $sql = "DELETE FROM sanpham WHERE masp = '$masp'";
    mysqli_query($conn, $sql);
    header('Location: admin.php');
    exit();
}

// Truy vấn dữ liệu sản phẩm
$sql = "SELECT * FROM sanpham";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Quản lý sản phẩm</title>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <div class="header-left">
                <h2>Xin chào, <?php echo $_SESSION['username']; ?></h2>
            </div>
            <div>
                <a href="add_product.php" class="add-product-btn">Thêm sản phẩm mới</a>
                <a href="manage_orders.php" class="add-product-btn">Quản lý đơn hàng</a>
                <a href="../public/logout.php" class="logout-btn">Đăng xuất</a>
            </div>
        </div>
        <div class="product-update"><?php include "product_update.php"; ?></div>
        
        <div class="footer"><?php include "../public/footer.php"; ?></div>
    </div>
</body>
</html>