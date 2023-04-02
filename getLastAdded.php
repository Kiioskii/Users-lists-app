<?php
include("config.php");
$all_lists_query = "SELECT * FROM users ORDER BY id DESC LIMIT 4;";
$all_lists = mysqli_query($connection, $all_lists_query);
if (mysqli_num_rows($all_lists) > 0) { ?>
    <table class="last-add-table">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Hasło</th>
                <th>Imie</th>
                <th>Nzawisko</th>
                <th>Data urodzenia</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($all_lists)) {
                $nick = $row['nick'];
                $password = $row['password'];
                $name = $row['name'];
                $surname = $row['surname'];
                $birthday = $row['birthday'];
            ?>
                <tr class="last-add-row">
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
