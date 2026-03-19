<?php
require_once 'includes/data.php';

$id = $_GET['id'] ?? '';
$lang = $_GET['lang'] ?? 'ar';

$selectedTool = null;
foreach ($tools as $category) {
    foreach ($category as $item) {
        if (isset($item['id']) && $item['id'] === $id) {
            $selectedTool = $item;
            break 2;
        }
    }
}

if (!$selectedTool) {
    die("<h1>" . ($lang == 'ar' ? "الأداة غير موجودة" : "Tool not found") . "</h1>");
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo ($lang == 'ar' ? 'rtl' : 'ltr'); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($lang == 'ar' ? $selectedTool['name_ar'] : $selectedTool['name_en']); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .details-container {
            max-width: 900px;
            margin: 40px auto;
            background: var(--white);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        .details-header {
            display: flex;
            align-items: center;
            gap: 25px;
            margin-bottom: 30px;
            border-bottom: 2px solid var(--bg-color);
            padding-bottom: 25px;
        }
        .details-logo {
            width: 90px;
            height: 90px;
            border-radius: 18px;
            object-fit: cover;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .tool-info h1 {
            font-size: 2.2rem;
            color: var(--text-dark);
            margin-bottom: 8px;
        }
        .trust-badge {
            color: var(--primary-color);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
        }
        .section-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 35px 0 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding-bottom: 10px;
        }
        .section-title i {
            width: 25px;
            text-align: center;
        }
        .content-box {
            background: var(--bg-color);
            padding: 20px;
            border-radius: 12px;
            line-height: 1.8;
            color: var(--text-gray);
            font-size: 1.05rem;
        }
        /* تنسيق الخطوط الجانبية */
        [dir="rtl"] .content-box { border-right: 5px solid var(--primary-color); }
        [dir="ltr"] .content-box { border-left: 5px solid var(--primary-color); }

        .prompt-box {
            background: #fffaf0; 
            border-color: #558bf6b5 !important; 
        }
        .prompt-box code {
            color: #2d3748;
            font-family: 'Courier New', Courier, monospace;
            font-weight: 600;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            margin: 20px 0;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .video-container iframe {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            border: none;
        }

        .action-area {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .back-link {
            text-decoration: none;
            color: var(--text-gray);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
        }
        .back-link:hover {
            color: var(--primary-color);
            transform: translateX(<?php echo ($lang == 'ar' ? '-5px' : '5px'); ?>);
        }
        .visit-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 35px;
            background: var(--secondary-gradient);
            color: white;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s;
        }
        .visit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(49, 130, 206, 0.3);
        }

        /* التجاوب للموبايل */
        @media (max-width: 768px) {
            .details-container { margin: 15px; padding: 25px; }
            .details-header { flex-direction: column; text-align: center; }
            .action-area { flex-direction: column-reverse; gap: 25px; }
            .visit-btn { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body style="display: block; background-color: var(--bg-color);">

    <div class="details-container">
        <div class="details-header">
            <img src="<?php echo $selectedTool['logo']; ?>" alt="logo" class="details-logo">
            <div class="tool-info">
                <h1><?php echo ($lang == 'ar' ? $selectedTool['name_ar'] : $selectedTool['name_en']); ?></h1>
                <div class="trust-badge">
                    <i class="fa-solid fa-shield-check"></i>
                    <?php echo ($lang == 'ar' ? 'أداة ذكاء اصطناعي موثوقة' : 'Trusted AI Tool'); ?>
                </div>
            </div>
        </div>

        <div class="section-title">
            <i class="fa-solid fa-align-right"></i>
            <span><?php echo ($lang == 'ar' ? 'عن الأداة' : 'About'); ?></span>
        </div>
        <p style="color: var(--text-gray); line-height: 1.8; font-size: 1.1rem; padding: 0 5px;">
            <?php echo ($lang == 'ar' ? $selectedTool['desc_ar'] : $selectedTool['desc_en']); ?>
        </p>

        <?php if (!empty($selectedTool['videos'][0])): ?>
            <div class="section-title">
                <i class="fa-solid fa-circle-play"></i>
                <span><?php echo ($lang == 'ar' ? 'شرح الفيديو' : 'Video Tutorial'); ?></span>
            </div>
            <div class="video-container">
                <iframe src="<?php echo $selectedTool['videos'][0]; ?>" allowfullscreen></iframe>
            </div>
        <?php endif; ?>

        <div class="section-title">
            <i class="fa-solid fa-terminal"></i>
            <span><?php echo ($lang == 'ar' ? 'الأمر المقترح (Prompt)' : 'Suggested Prompt'); ?></span>
        </div>
        <div class="content-box prompt-box">
            <code><?php echo $selectedTool['prompt'] ?? '---'; ?></code>
        </div>

        <div class="section-title">
            <i class="fa-solid fa-wand-magic-sparkles"></i>
            <span><?php echo ($lang == 'ar' ? 'تحليل الخبير' : 'Expert Insight'); ?></span>
        </div>
        <div class="content-box">
            <?php echo $selectedTool['comment'] ?? '---'; ?>
        </div>

        <div class="action-area">
            <a href="index.php?lang=<?php echo $lang; ?>" class="back-link">
                <i class="fa-solid <?php echo ($lang == 'ar' ? 'fa-arrow-right' : 'fa-arrow-left'); ?>"></i>
                <?php echo ($lang == 'ar' ? 'العودة للرئيسية' : 'Back Home'); ?>
            </a>
            <a href="<?php echo $selectedTool['url']; ?>" target="_blank" class="visit-btn">
                <i class="fa-solid fa-external-link"></i>
                <?php echo ($lang == 'ar' ? 'زيارة الموقع الرسمي' : 'Visit Official Site'); ?>
            </a>
        </div>
    </div>

</body>
</html>