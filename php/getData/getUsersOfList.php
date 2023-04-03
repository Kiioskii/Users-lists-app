<?php
include("../config.php");
$id = $connection->real_escape_string($_GET['id']);
$all_users_query = "SELECT * FROM users
INNER JOIN user_list_members ON users.ID = user_list_members.user_id
INNER JOIN user_lists ON user_lists.id = user_list_members.list_id
WHERE user_lists.id = '$id'";
$all_users = mysqli_query($connection, $all_users_query);
if (mysqli_num_rows($all_users) > 0) { ?>
    <table class="users-table-container"><<!--Displaying the table with members data of the list -->
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
                    $nick = $row['nick'];
                    $password = $row['password'];
                    $name = $row['name'];
                    $surname = $row['surname'];
                    $birthday = $row['birthday'];
                ?>
                    <tr class="users-data-row" item="<?php echo $id ?>">
                        <td><?php echo $nick ?></td>
                        <td><?php echo $password ?></td>
                        <td><?php echo $name ?></td>
                        <td><?php echo $surname ?></td>
                        <td><?php echo $birthday ?></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
    </table>
<?php
}
