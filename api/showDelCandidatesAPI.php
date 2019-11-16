<?php
include_once "../class/User.php";

$user = new User();
$delUsers = $user->showDeleteCandidates();
$usersData = json_encode($delUsers);
echo $usersData;

?>