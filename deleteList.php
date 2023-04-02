<?php
include("config.php");
if (isset($_GET['isDeleted'])) {
    $id = $connection->real_escape_string($_GET['id']);
    $connection->query("DELETE FROM `user_lists` WHERE `user_lists`.`id` = '$id'");
}
if (isset($_POST['isEdited'])) {
    $id = $connection->real_escape_string($_GET['id']);
    $connection->query("DELETE FROM `users` WHERE `users`.`ID` = '$id'");
}
