<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
    <title>Document</title>
</head>
<body>


<?php
    // search.php
    include "connect.php";
    
    $keyword = "";
    if (isset($_GET['keyword'])) {
        $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
        $sql = "SELECT * FROM sanpham WHERE tensp LIKE '%$keyword%'";
    } else {
        $sql = "SELECT * FROM sanpham";
    }

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <a href="">
                <div class="mua" width="300px">
                    <div class="anh2"><img src="./img/WAo/<?php echo $row['hinhanhsp']; ?>" alt=""></div>
                    <p><?php echo $row['tensp']; ?>
                        <br>
                    <div>
                        <p><?php echo $row['giasp']; ?>đ</p>
                    </div>
                    <input type="button" value="Thêm vào giỏ" class="btn">
                </div>
            </a>

            <?php
        }
    } else {
        echo "<p style='text-align: center;'>Không tìm thấy sản phẩm nào phù hợp.</p>";
    }
    ?>
    </body>
</html>