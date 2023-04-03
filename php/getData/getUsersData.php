<?php
include("../config.php");
$all_users_query = "SELECT * FROM users";
$all_users = mysqli_query($connection, $all_users_query);
if (mysqli_num_rows($all_users) > 0) { ?>
    <table class="users-table-container"><!--Displaying the table with users data  -->
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Hasło</th>
                <th>Imię</th>
                <th>Nzawisko</th>
                <th>Data urodzenia</th>
                <th>Usuń</th> <!-- column that allows  to see the delete user -->
                <th>Edutuj</th><!--column that allows to edit user data-->
                <th>Dodaj do grupy</th><!--column that allows to add user to list-->
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($all_users)) {
                $id = $row['id'];
                $nick = $row['nick'];
                $password = $row['password'];
                $name = $row['name'];
                $surname = $row['surname'];
                $birthday = $row['birthday'];
            ?>
                <tr class="users-data-row" item="<?php echo $id ?>">
                    <td><?php echo $id ?></td>
                    <td><?php echo $nick ?></td>
                    <td><?php echo $password ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $surname ?></td>
                    <td><?php echo $birthday ?></td>
                    <td><!-- column that allows  to see the delete user -->
                        <svg item="<?php echo $id ?>" class="table-icon delete-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                        </svg>
                    </td>
                    <td><!--column that allows to edit user data-->
                        <a href="../pages/editUser.php?<?php echo $id ?>">
                            <svg item="<?php echo $id ?>" nick="<?php echo $nazwa ?>" haslo="<?php echo $password ?>" name="<?php echo $name ?>" surname="<?php echo $surname ?>" birthday="<?php $birthday ?>" class="table-icon edit-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                            </svg>
                        </a>
                    </td>
                    <td><!--column that allows to add user to list-->
                        <a href="../pages/addUserToList.php?<?php echo $id ?>">
                            <svg item="<?php echo $id ?>" class="table-icon add-to-list-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                            </svg>
                    </td>
                    </a>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
<?php
}
