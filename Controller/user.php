<?php
spl_autoload_register(function($className) {
    $file = '../Classes/'.$className.'.php';
    require $file;
});
if($_POST['functionName']=="updateUser"){
    updateUser();
}else if ($_POST['functionName']=="checkUser"){
    checkUser();
}else if ($_POST['functionName']=="maxScore"){
    getMaxScore();
}
function checkUser(){
    session_start();
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(User::checkUser($username,$password)){

        header('Location: http://localhost/QuizBackEnd/index.php');
    }else {
        echo 'Please enter';
    }
}
function updateUser(){
    session_start();
    $addressIp=$_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $score = $_POST['SCORE'];
    $user=new User($_SESSION['userData']["id"],$score,getOS($user_agent),getBrowser($user_agent),$addressIp);
     if($user->updateUser()){
        echo 'User updated successfully';

    }else {
        echo 'User update failed';
    }
}

function getMaxScore(){
    session_start();
    $s= User::getMaxScore($_SESSION['userData']['id']);
    echo $s['score'];
}
function getBrowser($userbrowsername) {


    $browser="";
    $browser_array  = array(
        '/msie/i'       =>  'Internet Explorer',
        '/firefox/i'    =>  'Firefox',
        '/safari/i'     =>  'Safari',
        '/chrome/i'     =>  'Chrome',
        '/edge/i'       =>  'Edge',
        '/opera/i'      =>  'Opera',
        '/netscape/i'   =>  'Netscape',
        '/maxthon/i'    =>  'Maxthon',
        '/konqueror/i'  =>  'Konqueror',
        '/mobile/i'     =>  'Handheld Browser'
    );

    foreach ( $browser_array as $regex => $match ) {
        if ( preg_match( $regex, $userbrowsername ) ) {
            $browser = $match;
        }
    }
    return $browser;
}


function getOS($userOsName) {


    $os_platform =   " ";
    $os_array =   array(
        '/windows nt 10/i'      =>  'Win 10 ou 11',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile'
    );

    foreach ( $os_array as $regex => $value ) {
        if ( preg_match($regex, $userOsName ) ) {
            $os_platform = $value;
        }
    }
    return $os_platform;
}

