<?php
// تحديد اللغة (يمكنك تغيير هذا بناءً على كود لغة المتصفح أو متغير الجلسة)
$lang = isset($_GET['lang']) && $_GET['lang'] == 'en' ? 'en' : 'ar';
// أضف هذا الكود قبل عرض الـ HTML لترى هل الأداة متعرفة أم لا
if (!isset($tool)) {
    die("خطأ: بيانات الأداة غير معرفة في هذه الصفحة!");
}

// أضف هذا الكود تحت قسم المجتمع لترى هل هناك بيانات قادمة من القاعدة
if ($results->num_rows == 0) {
    echo "";
}
// مصفوفة النصوص (Translation Array)
$texts = [
    'ar' => [
        'default_title' => 'البرومبت الافتراضي للأداة',
        'prompt_label' => 'البرومبت:',
        'comment_label' => 'التعليق:',
        'badge' => 'رسمي',
        'community_title' => 'برومبتات إضافية من المجتمع',
        'contribution' => 'مساهمة:',
        'no_prompts' => 'لا توجد برومبتات إضافية بعد، كن أول من يشارك!',
        'submit_btn' => 'شارك برومبت جديد لهذه الأداة'
    ],
    'en' => [
        'default_title' => 'Default Tool Prompt',
        'prompt_label' => 'Prompt:',
        'comment_label' => 'Comment:',
        'badge' => 'Official',
        'community_title' => 'Community Prompts',
        'contribution' => 'Contributed by:',
        'no_prompts' => 'No additional prompts yet, be the first to contribute!',
        'submit_btn' => 'Share a new prompt for this tool'
    ]
];

$t = $texts[$lang]; // جلب النصوص بناءً على اللغة المختارة
?>

<div class="main-page">
    <section class="default-prompt-section">
        <h2><?php echo $t['default_title']; ?></h2>
        <div class="prompt-card border-gold">
            <p><strong><?php echo $t['prompt_label']; ?></strong> <?php echo $tool['prompt']; ?></p>
            <p><em><?php echo $t['comment_label']; ?></em> <?php echo $tool['comment']; ?></p>
            <span class="badge"><?php echo $t['badge']; ?></span>
        </div>
    </section>

    <section class="community-prompts-section">
        <h3><?php echo $t['community_title']; ?></h3>
        <?php
        $query = "SELECT * FROM community_prompts WHERE tool_id = ? AND status = 'approved'";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $tool['id']);
        $stmt->execute();
        $results = $stmt->get_result();

        if ($results->num_rows > 0):
            while($row = $results->fetch_assoc()): ?>
                <div class="prompt-card">
                    <p><strong><?php echo htmlspecialchars($row['prompt_text']); ?></strong></p>
                    <p><em><?php echo $t['contribution']; ?></em> <?php echo htmlspecialchars($row['comment']); ?></p>
                </div>
            <?php endwhile;
        else:
            echo "<p>" . $t['no_prompts'] . "</p>";
        endif;
        ?>
    </section>

    <a href="submit-prompt.php?id=<?php echo $tool['id']; ?>&lang=<?php echo $lang; ?>" class="btn-primary">
        <?php echo $t['submit_btn']; ?>
    </a>
</div>