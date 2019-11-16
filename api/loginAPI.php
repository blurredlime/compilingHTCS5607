<?php
    include_once "../class/User.php";
    $user = new User();
    if (isset($_POST["username"])) {
        $name = $user->login($_POST["username"], $_POST["password"]);
        if (!is_null($name)) {
            session_start();
            $_SESSION["name"] = $name;
        } else {
            session_start();
            session_destroy();
        }
    } else {
        session_start();
        session_destroy();
        $name = null;
    }
    header('Location: '.$_SERVER["HTTP_REFERER"]);
     $name = json_encode($name);
     echo $name;

?>