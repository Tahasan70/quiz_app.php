<?php

$questions = [
    ['question' => 'What is 2 + 2?', 'correct' => '4'],
    ['question' => 'What is the capital of France?', 'correct' => 'Paris'],
    ['question' => 'Who wrote "Hamlet"?', 'correct' => 'Shakespeare'],
];

function evaluateQuiz(array $questions, array $answers): int {
    $score = 0;
    
    foreach ($questions as $index => $q) {
        if (isset($answers[$index]) && strtolower(trim($answers[$index])) === strtolower(trim($q['correct']))) {
            $score++;
        }
    }
    return $score;
}

$answers = [];
echo "Welcome to the Quiz!\n";
foreach ($questions as $index => $q) {
    echo ($index + 1) . ". " . $q['question'] . "\n";
    $userAnswer = readline("Your answer: ");
    $answers[] = $userAnswer;
}

$score = evaluateQuiz($questions, $answers);
$totalQuestions = count($questions);

echo "\nYou scored $score out of $totalQuestions.\n";

if ($score === $totalQuestions) {
    echo "Excellent job!\n";
} elseif ($score > $totalQuestions / 2) {
    echo "Good effort!\n";
} else {
    echo "Better luck next time!\n";
}
