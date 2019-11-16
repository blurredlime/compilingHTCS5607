

<?php
session_start();
if (!isset($_SESSION["name"]) || is_null($_SESSION["name"])) {

    ?>

    <p>You need to login to access the system.</p>



    <?php
} else {
//    echo "rank".$_SESSION["rank"];
//    $rank = $_SESSION["rank"];
    if ($_SESSION["rank"] == "ITC"){
        include_once "navIT.html";
                                        }

    }

?>