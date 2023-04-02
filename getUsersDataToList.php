<?php
include("config.php");
$all_users_query = "SELECT * FROM users";
$all_users = mysqli_query($connection, $all_users_query);
if (mysqli_num_rows($all_users) > 0) { ?>
    <table class="users-table-container">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Hasło</th>
                <th>Imię</th>
                <th>Nzawisko</th>
                <th>Data urodzenia</th>
                <th>Wybierz</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($all_users)) {
                $id = $row['ID'];
                $nazwa = $row['Nazwa'];
                $haslo = $row['Haslo'];
                $imie = $row['Imie'];
                $nazwisko = $row['Nazwisko'];
                $data_urodzenia = $row['Data_urodzenia'];
            ?>
                <tr class="users-data-row" item="<?php echo $id ?>">
                    <td><?php echo $id ?></td>
                    <td><?php echo $nazwa ?></td>
                    <td><?php echo $haslo ?></td>
                    <td><?php echo $imie ?></td>
                    <td><?php echo $nazwisko ?></td>
                    <td><?php echo $data_urodzenia ?></td>
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
