<?php
include("connect.php");

class data_user
{
    // Hàm thêm tài sản
    public function insert_assets($name, $img, $type, $status, $location, $purchadate)
    {
        global $conn;
        $sql = "INSERT INTO assets (Name, Img, Type, Status, Location, Purchadate) 
                VALUES ('$name', '$img', '$type', '$status', '$location', '$purchadate')";
        $run = mysqli_query($conn, $sql);
    
        // Kiểm tra nếu có lỗi trong truy vấn
        if (!$run) {
            echo "Error: " . mysqli_error($conn);
        }
    
        return $run;
    }
    // Hàm lấy danh sách tài sản
    public function select_Assets()
    {
        global $conn;
        $sql = "SELECT * FROM assets";
        $run = mysqli_query($conn, $sql);
        return $run;  // Trả về kết quả truy vấn
    }

    // Hàm xóa tài sản
    public function delete_assets($id_con)
    {
        global $conn;
        $sql = "DELETE FROM assets WHERE Id_Assets = '$id_con'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    
}


?>
