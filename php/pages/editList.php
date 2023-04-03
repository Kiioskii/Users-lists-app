<?php
include("../config.php"); //conection to database
if (isset($_GET['toCheck'])) { //checking the corresponding query from the .js file
    $id = $connection->real_escape_string($_GET['id']); //getting user id from .js file
    $listData = $connection->query("SELECT * FROM user_lists WHERE id='$id'"); //getting user data from database
    $row = mysqli_fetch_assoc($listData); //transforming the downloaded data into the appropriate form

    $nazwa = $row['list_name'];
    //Sending data to the client side
    echo ($nazwa);
    echo (";");

    $result = $connection->query("SELECT user_id FROM user_list_members WHERE list_id='$id'"); //getting members of list from database
    $users = array();
    //inserting data from the database into the table for easier sending to the client side
    while ($row = $result->fetch_assoc()) {
        $users[] = $row["user_id"];
    }
    $json = json_encode($users);

    // Set the Content-Type header to application/json
    header('Content-Type: application/json');

    // Sending JSON data to the client side
    echo $json;
    exit();
}
if (isset($_POST['isEdited'])) { //conection to database

    $list_id = $connection->real_escape_string($_POST['list_id']); //getting list id from .js file
    $name = $connection->real_escape_string($_POST['name']); //getting list name from .js file
    $ids = json_decode(stripslashes($_POST['ids'])); //getting users id from .js file

    $connection->query("UPDATE `user_lists` SET list_name='$name' WHERE id='$list_id'");    //updating list name in databse
    $connection->query("DELETE  FROM  `user_list_members` WHERE list_id='$list_id'");       ////deleting all conections betwen user and lists

    foreach ($ids as $id) {;
        $connection->query("INSERT INTO user_list_members (list_id, user_id) VALUES ('$list_id','$id')"); //adding new conections betwen user and lists
    }

    exit('success');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/headerStyle.css" />
    <link rel="stylesheet" href="../../css/usersPageStyle.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>


    <title>Document</title>
</head>

<body>
    <header id="header">
        <div class="header-left-container">
            <a href="../../index.php" class="header-link">
                <img alt="logo" class="header-logo" id="header-logo" src="../../assets/img/logo.svg" />
                <h1>SZU</h1>
            </a>
        </div>
        <div class="header-right-container">
            <nav class="navigation-menu">
                <a href="../pages/users.php" class="header-link">
                    <div class="header-icon-conainer" id="header-users">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                        </svg>
                        <p>Użytkownicy</p>
                    </div>
                </a>
                <a href="../pages/lists.php" class="header-link">
                    <div class="header-icon-conainer" id="header-lists">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z" />
                        </svg>
                        <p>Listy</p>
                    </div>
                </a>
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
            </div>
        </div>
        <div class="users-data-container">
            <div class="input-container" id="list-name-container">
                <label>Nazwa:</label>
                <input type="text" id="nick_list">
                <p class="error-info" id="nick-err">Nazwa nie została wpisana!</p>
            </div>
            <h1>Wybierz osoby do listy</h1>
            <div id="database-container"></div> <!-- this container is replaced by data from a .js file-->
            <p class="error-info" id="list-err">Lista o takiej nazwie już istnieje!</p><!-- this container is displayed when a list with the given name already exists -->
            <button class="main-btn">Edytuj Listę</button>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="../../js/Lists/editList.js"></script>
</body>

</html>