<?php
session_start();
require_once 'includes/data.php';

$lang = $_GET['lang'] ?? 'ar'; 
$cat = $_GET['cat'] ?? 'design'; 

$texts = [
    'en' => [
        'dir' => 'ltr', 'title' => 'AI Tools Hub', 'open' => 'View Details', 
        'login' => 'Login', 'logout' => 'Logout', 
        'about' => 'About Us', 'contact' => 'Contact',
        'sections' => ['design'=>'Design', 'content'=>'Writing','coding'=>'Coding', 'video'=>'Edit Video', 'audio'=>'Audio', 'present'=>'Present', 'misc'=>'Misc']
    ],
    'ar' => [
        'dir' => 'rtl', 'title' => 'منصة أدوات الذكاء', 'open' => 'عرض التفاصيل', 
        'login' => 'دخول', 'logout' => 'خروج',
        'about' => 'من نحن', 'contact' => 'اتصل بنا',
        'sections' => ['design'=>'التصميم', 'content'=>'المحتوى', 'coding'=>'البرمجة', 'video'=>'إنتاج الفيديو', 'audio'=>'الصوتيات', 'present'=>'العروض التقديمية', 'misc'=>'متنوعة']
    ]
];
$t = $texts[$lang];
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $t['dir']; ?>">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $t['title']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<button class="menu-toggle" onclick="toggleMenu()">
    <i class="fa-solid fa-bars"></i>
</button>

<div class="overlay" id="overlay" onclick="toggleMenu()"></div>

<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h2><?php echo $t['title']; ?></h2>
    </div>
    
    <nav class="nav-links">
    <?php
    $icons = [
        'design'  => '<i class="fa-solid fa-palette"></i>',
        'content' => '<i class="fa-solid fa-pen-nib"></i>',
        'coding'  => '<i class="fa-solid fa-code"></i>',
        'video'   => '<i class="fa-solid fa-clapperboard"></i>',
        'audio'   => '<i class="fa-solid fa-wave-square"></i>',
        'present' => '<i class="fa-solid fa-chart-pie"></i>',
        'misc'    => '<i class="fa-solid fa-gears"></i>'
    ];

    foreach ($t['sections'] as $key => $label):
        $active = ($cat == $key) ? 'active' : '';
    ?>
        <a href="?cat=<?php echo $key; ?>&lang=<?php echo $lang; ?>" class="nav-item <?php echo $active; ?>">
            <span class="nav-icon"><?php echo $icons[$key] ?? '<i class="fa-solid fa-circle"></i>'; ?></span> 
            <span class="nav-text"><?php echo $label; ?></span> </a>
    <?php endforeach; ?>

    <hr class="sidebar-divider">
    
    <a href="about.php?lang=<?php echo $lang; ?>" class="nav-item">
        <span class="nav-icon"><i class="fa-solid fa-circle-info"></i></span> 
        <span class="nav-text"><?php echo $t['about']; ?></span>
    </a>
    <a href="contact.php?lang=<?php echo $lang; ?>" class="nav-item">
        <span class="nav-icon"><i class="fa-solid fa-envelope"></i></span> 
        <span class="nav-text"><?php echo $t['contact']; ?></span>
    </a>
</nav>

    <div class="sidebar-footer">
        <div class="lang-switch">
            <a href="?lang=en&cat=<?php echo $cat; ?>" class="lang-link">EN</a>
            <span class="separator">|</span>
            <a href="?lang=ar&cat=<?php echo $cat; ?>" class="lang-link">AR</a>
        </div>
        
        <?php if(isset($_SESSION['user_logged_in'])): ?>
            <a href="logout.php?lang=<?php echo $lang; ?>" class="login-btn logout">
                <?php echo ($lang == 'ar') ? 'خروج' : 'Logout'; ?>
            </a>
        <?php else: ?>
            <a href="login.php?lang=<?php echo $lang; ?>" class="login-btn">
                <?php echo $t['login']; ?>
            </a>
        <?php endif; ?>
    </div>
</aside>

<main class="main-content" id="main-content">
    <div class="grid">
        <?php 
        if (isset($tools[$cat])): 
            foreach($tools[$cat] as $tool): 
        ?>
            <article class="card">
                <div class="card-header">
                    <img src="<?php echo $tool['logo']; ?>" alt="logo" class="tool-logo">
                    <h3><?php echo ($lang == 'ar') ? $tool['name_ar'] : $tool['name_en']; ?></h3>
                </div>
                <p class="description">
                    <?php echo ($lang == 'ar') ? $tool['desc_ar'] : $tool['desc_en']; ?>
                </p>
                <a href="details.php?id=<?php echo $tool['id']; ?>&lang=<?php echo $lang; ?>" class="open-btn">
                    <?php echo $t['open']; ?>
                </a>
            </article>
        <?php 
            endforeach; 
        else:
            echo "<p class='no-data'>" . (($lang == 'ar') ? "لا توجد بيانات متاحة لهذا القسم حالياً." : "No tools available.") . "</p>";
        endif; 
        ?>
    </div>
</main>

<script>
  function toggleMenu() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    
    // استخدام toggle البسيط كافٍ جداً مع تعديل الـ CSS أعلاه
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');

    // للديسكتوب فقط
    if(window.innerWidth > 768) {
        const mainContent = document.getElementById('main-content');
        sidebar.classList.toggle('inactive');
        if(mainContent) mainContent.classList.toggle('full-width');
    }
}
</script>
</body>
</html>