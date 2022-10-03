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
    <h1>page d'ajout</h1>
    <nav>
        <ul>
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="add">ajouter une classe</a></li>
        </ul>
    </nav>
</header>
<main>
    <h2>Ajouter une classe</h2>
    <form method="POST" id="form">
        <input
                type="text"
                name="name"
                placeholder="name"
                value=""
                id="nom"
        >
        <input
                type="text"
                name="heure"
                placeholder="heure"
                value=""
                id="heure"
        >
        <input
                type="text"
                name="date"
                placeholder="date"
                value=""
                id="date"
        >
        <input
                type="submit"
                value="Ajouter"
                id="add_class"
        >
    </form>
</main>
<footer>

</footer>
</body>
</html>
