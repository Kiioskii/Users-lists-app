<?php
include("config.php");
if (isset($_GET['created'])) {

    $nazwa = $connection->real_escape_string($_GET['name']);
    $ids = json_decode(stripslashes($_GET['id']));
    $count = $connection->query("SELECT id FROM user_lists WHERE list_name='$nazwa'");

    if (count($ids) == 0) {
        exit("empty");
    }

    if ($count->num_rows == 0) {

        $connection->query("INSERT INTO `user_lists` (`id`, `list_name`) VALUES (NULL, '$nazwa')");
        $result = $connection->query(("SELECT LAST_INSERT_ID() AS id;"));
        $data = $result->fetch_assoc();
        $list_id = $data['id'];

        foreach ($ids as $id) {
            $connection->query("INSERT INTO user_list_members (list_id, user_id) VALUES ('$list_id','$id')");
        }

        exit('success');
    } else {
        exit("existed");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="headerStyle.css" />
    <link rel="stylesheet" href="usersPageStyle.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" /> -->
    <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>


    <title>Document</title>
</head>

<body>
    <header id="header">
        <div class="header-left-container">
            <img alt="logo" class="header-logo" id="header-logo" src="./assets/img/logo.svg" />
            <h1>SZU</h1>
        </div>
        <div class="header-right-container">
            <nav class="navigation-menu">
                <div class="header-icon-conainer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg>
                    <p>Użytkownicy</p>
                </div>
                <div class="header-icon-conainer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z" />
                    </svg>
                    <p>Listy</p>
                </div>
            </nav>
        </div>
    </header>
    <div class="top-container" id="users-page">
        <h1>Listy</h1>
    </div>
    <div class="main-container">
        <div class="search-container">
            <div>
                <input type="text" class="search-bar" placeholder="Szukaj">
                <button class="main-btn" id="search-btn">Szukaj</button>
                <button class="main-btn">Dodaj listę</button>
            </div>
        </div>
        <div class="users-data-container">
            <div class="input-container" id="list-name-container">
                <label>Nazwa:</label>
                <input type="text" id="nick_list">
                <p class="error-info" id="nick-err">Nazwa nie została wpisana!</p>
            </div>
            <h1>Wybierz osoby do listy</h1>
            <div id="database-container"></div>
            <p class="error-info" id="list-err">Lista o takiej nazwie już istnieje!</p>
            <p class="error-info" id="list-empty-err">Nie wybrano osób do listy!</p>
            <button class="main-btn">Utwórz listę</button>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="./getUsersToList.js"></script>
    <script src="./interaction.js"></script>
    <!-- <script src="./interaction.js"></script> -->
</body>

</html>