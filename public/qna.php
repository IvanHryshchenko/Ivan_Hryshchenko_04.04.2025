<?php
require_once __DIR__ . '/../classes/QnA.php';

$qna = new QnA();
$questions = $qna->getAllQuestionsAndAnswers();
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Otázky a odpovede</title>
    <style>
        .qna-item { margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px; }
        .question { font-weight: bold; color: #2c3e50; font-size: 1.1em; }
        .answer { color: #7f8c8d; margin-top: 5px; }
    </style>
</head>
<body>
    <h1>Časté otázky</h1>
    
    <?php if (!empty($questions)): ?>
        <div class="qna-list">
            <?php foreach ($questions as $item): ?>
                <div class="qna-item">
                    <div class="question"><?= htmlspecialchars($item['question']) ?></div>
                    <div class="answer"><?= htmlspecialchars($item['answer']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Momentálne nie sú k dispozícii žiadne otázky.</p>
    <?php endif; ?>
</body>
</html>