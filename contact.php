<?php
session_start();
$lang = $_GET['lang'] ?? 'ar';
$title = ($lang == 'ar') ? 'اتصل بنا' : 'Contact Us';
$email = "AIToolsHub200@gmail.com"; 
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
            margin: 0; padding: 0; min-height: 100vh;
            display: flex; justify-content: center; align-items: center;
            background: var(--secondary-gradient); overflow: hidden;
        }
        .contact-card {
            width: 90%; max-width: 550px; padding: 40px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            text-align: center;
            animation: fadeIn 0.8s ease-out forwards;
        }
        h2 { color: var(--primary-color); margin-bottom: 20px; }
        .email-box {
            background: #f8f9fa; padding: 15px; border-radius: 10px;
            margin: 20px 0; border: 1px dashed var(--primary-color);
            font-family: monospace; font-size: 1.1em; color: #333;
        }
        
        /* تنسيق الأزرار الجديد */
        .actions { margin-top: 30px; display: flex; flex-direction: column; align-items: center; gap: 15px; }
        
        .home-btn {
            display: flex; align-items: center; gap: 10px;
            padding: 12px 25px;
            background: linear-gradient(135deg, var(--primary-color), #2b6cb0);
            color: white !important; text-decoration: none !important;
            border-radius: 50px; font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        .home-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.25);
            background: linear-gradient(135deg, #2b6cb0, var(--primary-color));
        }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body>

    <article class="contact-card">
        <h2><?php echo $title; ?></h2>
        <p><?php echo ($lang == 'ar' ? 'يمكنك التواصل معنا عبر البريد الإلكتروني التالي:' : 'You can contact us via the following email:'); ?></p>
        
        <div class="email-box">
            <?php echo $email; ?>
        </div>

        <div class="actions">
            <a href="mailto:<?php echo $email; ?>" class="home-btn" style="background: #2b6cb0;">
                <?php echo ($lang == 'ar' ? 'إرسال بريد إلكتروني' : 'Send Email'); ?>
            </a>
            
            <a href="index.php?lang=<?php echo $lang; ?>" class="home-btn">
                <?php echo ($lang == 'ar' ? 'العودة للرئيسية' : 'Back Home'); ?>
            </a>
        </div>
    </article>

</body>
</html>