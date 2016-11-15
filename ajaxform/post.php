<?php
    //
    require_once('functions.php');
    $dbh = connectDb();

    // var_dump($_POST);
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $sendAt = date('Y-m-d H:i:s');

    $sql = "insert into formdata (name,comment,created_at) values (:name, :comment, :received)";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":comment", $comment);
    $stmt->bindParam(":received", $sendAt);

    $stmt->execute();

?>