<?php
include("./php/config.php");
if (isset($_GET['toGet'])) {
    $users_count = $connection->query("SELECT COUNT(*) as users_count FROM users");
    $result = mysqli_fetch_assoc($users_count);
    echo ($result['users_count']);
    $list_count = $connection->query("SELECT COUNT(*) as lists_count FROM user_lists");
    $result2 = mysqli_fetch_assoc($list_count);
    echo (";");
    echo ($result2['lists_count']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/headerStyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">

    <title>Document</title>
</head>

<body>

    <!--This component is repeated in subsequent files, so let me describe it in detail once -->
    <header id="header">
        <div class="header-left-container"> <!--container containing the logo and name along with a link to the home page-->
            <a href="./" class="header-link">
                <img alt="logo" class="header-logo" id="header-logo" src="./assets/img/logo.svg" />
                <h1>SZU</h1>
            </a>
        </div>
        <div class="header-right-container"><!--container containing two divs representing the links to the List and Users page-->
            <nav class="navigation-menu">
                <a href="./php/pages/users.php" class="header-link">
                    <div class="header-icon-conainer" id="header-users">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                        </svg>
                        <p>Użytkownicy</p>
                    </div>
                </a>
                <a href="./php/pages/lists.php" class="header-link">
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

    <div id="header-change-container"></div>
    <div class="top-container">
        <h1>System zarządzania użytkownikami</h1>
    </div>
    <div class="main-container">
        <div class="top-part" id="maontain-gradient">
            <div>
                <button class="main-btn users-btn"><a href="./php/pages/users.php">Użytkownicy</a></button>
                <button class="main-btn lists-btn"> <a href="./php/pages/lists.php">Listy</a></button>
            </div>
        </div>
        <div class="data-container">
            <div class="left-side">
                <h1>Szybie wybieranie</h1>
                <div>
                    <a href="./php/pages/addUser.php" class="start-page-link">
                        <p class="">
                            Dodaj osobę
                        </p>
                    </a>
                    <a href="./php/pages/addList.php" class="start-page-link">
                        <p class="">
                            Dodaj listę
                        </p>
                    </a>
                    <a href="./php/pages/users.php" class="start-page-link">
                        <p class="">
                            Usuń osobę
                        </p>
                    </a>
                    <a href="./php/pages/lists.php" class="start-page-link">
                        <p class="">
                            Usuń listę
                        </p>
                    </a>
                </div>
            </div>
            <div class="right-side">
                <div class="last-added-container min-data-container">
                    <h1>Ostanio dodane osoby</h1>
                    <div id="last-added"></div><!--This div is replaced with data from the database using a js file -->
                </div>
                <div class="info-container min-data-container">
                    <div>
                        <h1>Dane:</h1>
                    </div>
                    <div>
                        <p id="users-count"> <!--This div is replaced with data from the database using a js file -->
                            Liczba osób: 500
                        </p>
                        <p id="lists-count"> <!-- This div is replaced with data from the database using a js file -->
                            Liczba list: 40
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script><!--jQuery connection-->
    <script type="module" src="./js/startPage.js"></script>


</body>

</html>