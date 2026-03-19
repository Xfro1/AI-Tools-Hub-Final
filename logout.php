<?php
session_start();

// 1. مسح جميع بيانات الجلسة
$_SESSION = array();

// 2. إذا كنت تستخدم ملفات تعريف ارتباط (Cookies) للجلسة، قم بحذفها
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. تدمير الجلسة
session_destroy();

// 4. إعادة التوجيه للرئيسية مع الحفاظ على اللغة
$lang = $_GET['lang'] ?? 'ar';
header("Location: index.php?lang=$lang");
exit();
?>