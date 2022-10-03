<?php
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" defer></script>
    <script src="assets/script.js" defer></script>
    <title>page d'acceuil</title>
</head>
<body>
<header>
    <h1>page d'acceuil</h1>
    <nav>
        <ul>
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="add">ajouter une classe</a></li>
        </ul>
    </nav>
</header>
<main>
    <h2>voici la liste de toutes les classes</h2>
    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-color: #C44D58;
            border-spacing: 0;
        }

        .tg td {
            background-color: #F9CDAD;
            border-color: #C44D58;
            border-style: solid;
            border-width: 1px;
            color: #002b36;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            background-color: #FE4365;
            border-color: #C44D58;
            border-style: solid;
            border-width: 1px;
            color: #fdf6e3;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-0pky {
            border-color: inherit;
            text-align: left;
            vertical-align: top
        }

        .tg .tg-0lax {
            text-align: left;
            vertical-align: top
        }
    </style>
    <table class="tg">
        <thead>
        <tr>
            <th class="tg-0pky">id</th>
            <th class="tg-0pky">name</th>
            <th class="tg-0pky">heure</th>
            <th class="tg-0lax">date</th>
            <th class="tg-0lax">modifié</th>
            <th class="tg-0lax">Supprimé</th>
        </tr>
        </thead>
        <tbody id="table-body">
        <?php // insertion des data en javascript ?>
        </tbody>
    </table>
</main>
<footer>

</footer>
</body>
</html>
