<?php

spl_autoload_register(function($className) {
    $file = '../Classes/'.$className.'.php';
    require $file;
});
getQuastions();
function getQuastions() {
    $arr = array();
    foreach (Question::getQuestions() as $question) {
        $arr[]=array(
            'id' => $question['id'],
            'question' =>htmlspecialchars($question['question'], ENT_QUOTES),
            'choice1'=>htmlentities($question['choice1'],ENT_NOQUOTES),
            'choice2'=>htmlentities($question['choice2'],ENT_NOQUOTES),
            'choice3'=>htmlentities($question['choice3'],ENT_NOQUOTES),
            'choice4'=>htmlentities($question['choice4'],ENT_NOQUOTES),
            'answer'=>htmlentities($question['correctAnswer'],ENT_NOQUOTES)
        );
    }
    echo json_encode($arr);
}


