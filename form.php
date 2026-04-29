<?php

require_once("util/Connection.php");

$connection = Connection::getConnection();

//print_r($connection);

$sql = "SELECT * FROM livros";
$stm = $connection->prepare($sql);
$stm->execute();
$livros = $stm->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration of Books</title>
</head>
<body>
    <h1>Registration of Books</h1>

    <h3>Listing</h3>

    <table border="1px solid black">

    <!-- Header -->
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Genere</th>
        <th>Pages</th>
    </tr>

    <!-- Data -->      
    <?php 
        foreach ($livros as $l): ?>
            <tr>
                <td><?= $l["id"] ?></td>
                <td><?= $l["titulo"] ?></td>
                <td>
                    <?php 
                    
                        if ($l["genero"] == "D") {
                            print "Drama";
                        }elseif ($l["genero"] == "F") {
                            print "Fiction";
                        }elseif ($l["genero"] == "R") {
                            print "Romance";
                        }elseif ($l["genero"] == "O") {
                            print "Other";
                        }
                    
                    ?>
                </td>
                <td><?= $l["qtd_paginas"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>Form</h3>

        <form action="" method="POST">

            <label for="titulo">Title</label>
            <input type="text" name="titulo">

            <label for="id">Genere</label>
            <select name="genero" >
                <option value="">Select the option</option>
                <option value="D">Drama</option>
                <option value="F">Fiction</option>
                <option value="R">Romance</option>
                <option value="O">Other</option>
            </select>

            <label for="qtd_paginas">Pages</label>
            <input type="number" name="qtd_paginas">

            
        </form>

</body>
</html>