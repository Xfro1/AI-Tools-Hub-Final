<?php
// إعدادات الاتصال
$servername = "localhost"; // السيرفر المحلي
$username = "root";        // اسم المستخدم الافتراضي
$password = "";            // كلمة المرور الافتراضية
$dbname = "ai_project_db";   // اسم قاعدة البيانات التي أنشأناها
// أضف هذا قبل السطر رقم 6
$tool = ['prompt' => 'هنا تكتب البرومبت الافتراضي للأداة'];
// إنشاء الاتصال باستخدام مكتبة mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// ضبط الترميز ليدعم اللغة العربية
$conn->set_charset("utf8mb4");

// فحص إذا كان هناك خطأ في الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>
<?php
// تأكد من تغيير الاسم هنا إلى الاسم الجديد
$conn = new mysqli("localhost", "root", "", "ai_project_db");

$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>