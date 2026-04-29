<?php

require_once("util/Connection.php");

$connection = Connection::getConnection();

if (isset($_GET['id'])) {
    $book = $_GET['id'];
    $sql = "DELETE FROM livros WHERE id = ?";
    $stm = $connection->prepare($sql);
    $stm->execute([$book]);
    header("location: form.php");
}else{
    header("Location: form.php?erro=1");
}