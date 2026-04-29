<?php

require_once("util/Connection.php");

$connection = Connection::getConnection();

//print_r($connection);

if (isset($_POST['titulo'])) {
    $title = $_POST['titulo'];
    $author = $_POST['autor'];
    $genre = $_POST['genero'];
    $pages = $_POST['qtd_paginas'];

    $sql = "INSERT INTO livros (titulo, autor, genero, qtd_paginas)
            VALUES (?, ?, ?, ?)";
    $stm = $connection->prepare($sql);
    $stm->execute([$title, $author, $genre, $pages]);

    header("location: form.php");
    
}

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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Registration of Books</h1>

    <hr>
    <h3>Listing</h3>

    <table border="1px solid black">

    <!-- Header -->
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Genere</th>
        <th>Pages</th>
        <th>📚</th>
    </tr>

    <!-- Data -->      
    <?php 
        foreach ($livros as $l): ?>
            <tr>
                <td><?= $l["id"] ?></td>
                <td><?= $l["titulo"] ?></td>
                <td><?= $l["autor"] ?></td>
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
                <td>
                    <a href="delete.php?id=<?= $l['id'] ?>"
                        onclick="if(! confirm('Are you sure you want to delete <?= $l['titulo'] ?>?')) return false"
                        >Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <div class="error">
        <?php if (isset($_GET['erro']) == 1){echo "Erro: ID not found for deletion";} ?>
    </div>

    <hr>
    <h3>Form</h3>

        <form action="" method="POST">

            <label for="titulo">Title</label>
            <input type="text" name="titulo">
            <br><br>

            <label for="autor">Author</label>
            <input type="text" name="autor">
            <br><br>

            <label for="id">Genere</label>
            <select name="genero" >
                <option value="">Select the option</option>
                <option value="D">Drama</option>
                <option value="F">Fiction</option>
                <option value="R">Romance</option>
                <option value="O">Other</option>
            </select>
            <br><br>

            <label for="qtd_paginas">Pages</label>
            <input type="number" name="qtd_paginas">
            <br><br>

            <button>Send</button>

        </form>

</body>
</html>