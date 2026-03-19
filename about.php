<?php
session_start();
$lang = $_GET['lang'] ?? 'ar';
$title = ($lang == 'ar') ? 'من نحن' : 'About Us';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo ($lang == 'ar' ? 'rtl' : 'ltr'); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
          
            background: var(--secondary-gradient); 
            overflow: hidden; 
        }

        /* كرت "من نحن" مع ظل وحركة ظهور */
        .about-card {
            width: 90%;
            max-width: 700px; /* زيادة عرض الكرت قليلاً */
            padding: 40px;
            background: rgba(255, 255, 255, 0.95); 
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2); 
            text-align: center;
            transform: translateY(20px); 
            opacity: 0; /* مخفي في البداية */
            animation: fadeIn 0.8s ease-out forwards; /* حركة الظهور */
        }

        /* حركة ظهور الكرت */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            color: var(--primary-color); /* لون العنوان الأساسي */
            font-size: 3em;
            margin-bottom: 15px;
            transform: scale(0.9); /* يبدأ أصغر قليلاً */
            opacity: 0;
            animation: scaleIn 0.6s ease-out 0.4s forwards; /* حركة ظهور وتكبير العنوان */
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }

        hr {
            border: 0;
            border-top: 3px solid var(--primary-color); /* خط سميك بلون مميز */
            width: 80px; /* خط أطول قليلاً */
            margin: 20px auto 30px auto;
            opacity: 0;
            animation: drawLine 0.6s ease-out 0.8s forwards; 
        }

        @keyframes drawLine {
            from { width: 0; opacity: 0; }
            to { width: 80px; opacity: 1; }
        }

        p {
            line-height: 1.8;
            color: #444; 
            font-size: 1.1em;
            margin-bottom: 30px;
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 0.7s ease-out 1s forwards; /* حركة ظهور النص */
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .back-btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 30px;
            background: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.7s ease-out 1.2s forwards; 
        }

        .back-btn:hover {
            background: var(--secondary-color); 
            transform: translateY(-3px) scale(1.02); /* تأثير رفع بسيط */
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .about-card {
                padding: 30px;
                margin: 20px;
            }
            h1 { font-size: 2.2em; }
            p { font-size: 1em; }
        }
    </style>
</head>
<body>

    <article class="about-card">
        <h1><?php echo $title; ?></h1>
        <hr>
        <p>
            <?php echo ($lang == 'ar') 
                ? 'مرحباً بك في منصتنا الرائدة لجمع أدوات الذكاء الاصطناعي. هدفنا هو تسهيل وصولك إلى أفضل التقنيات الحديثة التي ترفع من إنتاجيتك وتوفر وقتك.' .
                  ' ولهذا نسعى لتقديم مرجع شامل لكل ما تحتاجه في عالم الـ AI.' 
                : 'Welcome to our leading platform for collecting AI tools. Our goal is to facilitate your access to the best modern technologies that increase your productivity and save your time.' .
                  ' we strive to provide a comprehensive reference for everything you need in the world of AI.'; ?>
        </p>
        <a href="index.php?lang=<?php echo $lang; ?>" class="back-btn"><?php echo ($lang == 'ar' ? 'العودة للرئيسية' : 'Back Home'); ?></a>
    </article>

</body>
</html>