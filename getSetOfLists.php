<?php
include("config.php");
if (isset($_GET['lists'])) {
    $all_lists_query = "SELECT * FROM user_lists";
    $all_lists = mysqli_query($connection, $all_lists_query);
    if (mysqli_num_rows($all_lists) > 0) { ?>
        <table class="users-table-container">
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Należy do listy</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($all_lists)) {
                    $nazwa = $row['list_name'];
                    $id = $row['id'];
                ?>
                    <tr class="users-data-row" item="<?php echo $id ?>">
                        <td><?php echo $nazwa ?></td>
                        <td>
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
}
if (isset($_GET['user'])) {
    include("config.php");
    $user_id = $connection->real_escape_string($_GET['id']);
    $all_users_query = "SELECT * FROM users WHERE id='$user_id'";
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
                    $id = $row['id'];
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
                        </a>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
<?php
    }
}
