<?php
include("config.php");
if (isset($_GET['isDeleted'])) {
    $id = $connection->real_escape_string($_GET['id']);
    $connection->query("DELETE FROM `user_list_members` WHERE `user_list_members`.`user_id` = '$id'");
    $connection->query("DELETE FROM `users` WHERE `users`.`id` = '$id'");
}
if (isset($_POST['isEdited'])) {
    $id = $connection->real_escape_string($_GET['id']);
    $connection->query("DELETE FROM `users` WHERE `users`.`id` = '$id'");
}
