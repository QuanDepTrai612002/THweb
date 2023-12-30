<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ form
    $user_id = $_POST['user_id'];
    
    // Kiểm tra xem access_level đã được chọn hay chưa
    if(isset($_POST['access_level'])) {
        $access_level = $_POST['access_level'];
        
        // Xử lý dữ liệu tại đây (ví dụ: cập nhật quyền truy cập trong cơ sở dữ liệu)

        // In ra thông tin để kiểm tra
        echo "User ID: " . $user_id . "<br>";
        echo "Access Level: " . $access_level . "<br>";

        // Tiếp tục xử lý dữ liệu hoặc chuyển hướng người dùng
    } else {
        // Nếu access_level không được chọn, có thể xử lý khác tùy thuộc vào yêu cầu của bạn
        echo "Vui lòng chọn Access Level";
    }
} else {
    // Nếu không phải là phương thức POST, có thể xử lý khác tùy thuộc vào yêu cầu của bạn
    // Ví dụ: chuyển hướng hoặc hiển thị thông báo lỗi
}
?>
