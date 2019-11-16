<?php
//for login
include_once "../class/User.php";
$user = new User();
if (isset($_POST["username"])){
    $user->login($_POST["username"], $_POST["password"]);
    if ($user->id > 0){
        session_start();
        $name = $user->name;
        $rank = $user->rank;
        $_SESSION["name"] = $name;
        $_SESSION["rank"] = $rank;
        // echo $rank;
    }else{
        session_start();
        session_destroy();
    }
}else{
    session_start();
    session_destroy();
    $name = null;
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
$name = json_encode($name);
echo $name;
?>