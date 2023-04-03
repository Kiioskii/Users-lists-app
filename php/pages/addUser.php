<?php
include("../config.php"); //conection to database
if (isset($_POST['created'])) { //checking the corresponding query from the .js file
    //getting data from .js file
    $nick = $connection->real_escape_string($_POST['nick']);
    $password = $connection->real_escape_string($_POST['password']);
    $name = $connection->real_escape_string($_POST['name']);
    $surname = $connection->real_escape_string($_POST['surname']);
    $birthday = $connection->real_escape_string($_POST['birthday']);

    $count = $connection->query("SELECT id FROM users WHERE nick='$nick'"); //getting the number of lists with the same name

    if ($count->num_rows == 0) { //checking if list of $name already existing
        $connection->query("INSERT INTO users (`id`, `nick`, `password`, `name`, `surname`, `birthday`) VALUES(NULL,'$nick','$password','$name','$surname','$birthday')"); //adding new user to database
        exit('success');
    } else {
        exit("faild");
    }
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
    <link rel="stylesheet" href="../../css/addUserStyle.css" />
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
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
    <div class="add-user-page">
        <div class="add-user-container">
            <h1>Dodanie użytkowników:</h1>
            <form method="post" action="addUser.php" class="from-container"> <!-- Form with information about the newly created user -->
                <div class="input-container">
                    <label>nick:</label>
                    <input type="text" id="nick">
                    <p class="error-info" id="nick-err">nick nie została wpisana!</p> <!-- this container is displayed when no nick id enetered -->
                </div>
                <div class="input-container">
                    <label>Hasło:</label>
                    <input type="text" id="password">
                    <p class="error-info" id="pass-err">Hasło nie zostało wpisane!</p><!-- this container is displayed when no password id enetered -->
                </div>
                <div class="input-container">
                    <label>Imię:</label>
                    <input type="text" id="name">
                    <p class="error-info" id="name-err">name nie zostało wpisane!</p><!-- this container is displayed when no name id enetered -->
                </div>
                <div class="input-container">
                    <label>surname:</label>
                    <input type="text" id="surname">
                    <p class="error-info" id="usrname-err">surname nie zostało wpisane!</p><!-- this container is displayed when no surname id enetered -->
                </div>
                <div class="input-container">
                    <label>Data urodzenia:</label>
                    <input type="date" id="birthday">
                    <p class="error-info" id="date-err">Data jest nie poprawna!</p><!-- this container is displayed when no birthday id enetered -->
                </div>
                <div class="form-buttons-container">
                    <input type="button" value="Sapisz użytkownika" id="add_user" class="form-btn">
                    <input type="button" value="Zapisz i dodaj następnego" id="add_user_and_next" class="form-btn">
                </div>
            </form>
            <p id="succes-container"> <!-- this container is displayed when a user is successfully added  -->
                Udało się zapisać osobę!
            </p>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type='text/javascript' src="../../js/Users/addUser.js"></script>
</body>

</html>