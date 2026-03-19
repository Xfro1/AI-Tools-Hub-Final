<?php
// هذا الملف وظيفته جلب البيانات فقط
include 'db.php'; 

// جلب الأدوات حسب القسم
$stmt = $conn->prepare("SELECT * FROM tools WHERE category = ?");
$stmt->bind_param("s", $cat);
$stmt->execute();
$tools_result = $stmt->get_result();
?>