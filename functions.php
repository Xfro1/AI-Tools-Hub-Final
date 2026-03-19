<?php
function getAllTools() {
    return [
        ['name' => 'Canva', 'cat' => 'design', 'desc' => 'Design tool', 'url' => '#'],
        ['name' => 'ChatGPT', 'cat' => 'content', 'desc' => 'Writing tool', 'url' => '#']
    ];
}

function getToolsByCategory($category) {
    return array_filter(getAllTools(), fn($tool) => $tool['cat'] == $category);
}
?>         