<?php
include("../config.php");
if (isset($_GET['isDeleted'])) {  //handle deleting of list
    $id = $connection->real_escape_string($_GET['id']);
    $connection->query("DELETE FROM `user_list_members` WHERE `list_id` = '$id'"); //deleting all conection betwen susers and list
    $connection->query("DELETE FROM `user_lists` WHERE `user_lists`.`id` = '$id'"); //deleting list
}
