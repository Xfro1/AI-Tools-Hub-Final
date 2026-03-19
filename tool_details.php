
<?php include 'db.php'; 
$tool_id = $_GET['id'];
?>
<h2>البرومبت الافتراضي</h2>
<p><?php echo $tool['prompt']; ?></p>

<h3>برومبتات المجتمع</h3>
<?php
$query = "SELECT * FROM community_prompts WHERE tool_id = ? AND status = 'approved'";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $tool_id);
$stmt->execute();
$results = $stmt->get_result();
while($row = $results->fetch_assoc()) {
    echo "<p>" . $row['prompt_text'] . "</p>";
}
?>
<a href="submit-prompt.php?id=<?php echo $tool_id; ?>">أضف برومبت جديد</a>