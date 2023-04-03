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
                <th>Wybierz</th><!--column that allows to add user to list-->
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
                    <td><!--column that allows to add user to list-->
                        <input type="checkbox" item="<?php echo $id ?>" class="table-checkbox" />
                    </td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
<?php
}
