<?php
$conn = new mysqli("localhost", "root", "", "ai_project_db");
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
echo "تم الاتصال بنجاح!"; // هذه الجملة هي التي ستظهر لك في الصفحة
?>