<?php
include("config.php");
if (isset($_GET['created'])) {

    $ids = $connection->real_escape_string($_GET['id']);
    print_r($ids);
    print_r("XD");
}
