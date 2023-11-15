<?php
require_once('../includes/header.php');

$query = "SELECT name, total, correct, incorrect FROM results ORDER BY correct DESC LIMIT 10";
$result = $db->query($query);

?>

            <table>
                <tr>
                    <th>Ім'я</th>
                    <th>Всього</th>
                    <th>Правильно</th>
                    <th>Неправильно</th>
                </tr>
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= strip_tags($row['name'] )?></td>
                        <td><?= $row['total'] ?></td>
                        <td><?= $row['correct'] ?></td>
                        <td><?= $row['incorrect'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </body>
</html>
