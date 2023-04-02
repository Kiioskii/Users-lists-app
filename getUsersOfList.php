<?php
include("config.php");
$id = $connection->real_escape_string($_GET['id']);
$all_users_query = "SELECT * FROM users
INNER JOIN user_list_members ON users.ID = user_list_members.user_id
INNER JOIN user_lists ON user_lists.id = user_list_members.list_id
WHERE user_lists.id = '$id'";
$all_users = mysqli_query($connection, $all_users_query);
if (mysqli_num_rows($all_users) > 0) { ?>
    <table class="users-table-container">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Hasło</th>
                <th>Imię</th>
                <th>Nzawisko</th>
                <th>Data urodzenia</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($all_users)) {
                $nazwa = $row['Nazwa'];
                $haslo = $row['Haslo'];
                $imie = $row['Imie'];
                $nazwisko = $row['Nazwisko'];
                $data_urodzenia = $row['Data_urodzenia'];
            ?>
                <tr class="users-data-row" item="<?php echo $id ?>">
                    <td><?php echo $nazwa ?></td>
                    <td><?php echo $haslo ?></td>
                    <td><?php echo $imie ?></td>
                    <td><?php echo $nazwisko ?></td>
                    <td><?php echo $data_urodzenia ?></td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
<?php
}
