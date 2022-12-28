<?php

spl_autoload_register(function($className) {
    $file = '../Classes/'.$className.'.php';
    require $file;
});

function getQuastions()  {
    $arr = array();
    foreach (Question::getQuestions() as $question) {
        $arr=getQuastions($question);
    }
    return  json_decode($arr);
}
 function getMaxScore(){

 }
function getArray(array $sourceArray) : array {
    $newArray[]=array(
        'id' => $sourceArray['id'],
        'choice1'=>$sourceArray['choice1'],
        'choice2'=>$sourceArray['choice2'],
        'choice3'=>$sourceArray['choice3'],
        'choice4'=>$sourceArray['choice4'],
        'correcctAnswer'=>$sourceArray['correcctAnswer']
    );
    return $newArray;
}