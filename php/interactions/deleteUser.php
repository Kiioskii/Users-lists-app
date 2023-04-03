<?php
include("../config.php");
if (isset($_GET['isDeleted'])) {
    $id = $connection->real_escape_string($_GET['id']); //handle deleting of user
    $connection->query("DELETE FROM `user_list_members` WHERE `user_list_members`.`user_id` = '$id'"); //deleting all conection betwen suser and lists
    $connection->query("DELETE FROM `users` WHERE `users`.`id` = '$id'"); //deleting user
}
if (isset($_POST['isEdited'])) {
    $id = $connection->real_escape_string($_GET['id']);
    $connection->query("DELETE FROM `users` WHERE `users`.`id` = '$id'");
}
