<?php
$lang = $_GET['lang'] ?? 'en';
$texts = [
    'en' => ['title' => 'AI Tools', 'open' => 'Open', 'login' => 'Login'],
    'ar' => ['title' => 'أدوات الذكاء الاصطناعي', 'open' => 'فتح', 'login' => 'تسجيل الدخول']
];
$t = $texts[$lang];
?>