<?php include 'db.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO community_prompts (tool_id, prompt_text, comment, status) VALUES (?, ?, ?, 'pending')");
    $stmt->bind_param("sss", $_POST['tool_id'], $_POST['prompt_text'], $_POST['comment']);
    $stmt->execute();
    echo "تم إرسال البرومبت للمراجعة!";
}
?>
<form method="POST">
    <input type="hidden" name="tool_id" value="<?php echo $_GET['id']; ?>">
    <textarea name="prompt_text" required placeholder="اكتب البرومبت..."></textarea>
    <input type="text" name="comment" placeholder="تعليقك...">
    <button type="submit">إرسال</button>
</form>