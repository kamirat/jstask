<?php

  require_once('functions.php');


  $dbh = connectDatabase();

  $sql = "select * from formdata";
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // var_dump($row);

?>

<!DOCTYPE html>
<html>
<body>
    <div class="">
          <?php foreach ($rows as $row): ?>
          <tr>
            <td>
              <?php echo h($row['name']); ?>
            </td>
            <td>
              <?php echo h($row['created_at']); ?>
            </td>
            <td>
              <?php echo h($row['comment']); ?>
            </td>
          </tr>
            <?php endforeach ?>
        </div>
</body>
</html>