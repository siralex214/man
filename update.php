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
    <script src="../assets/script.js" defer></script>
    <title>update élément</title>
</head>
<body>
<h1>update</h1>

form for update element
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
            value="update"
            id="update_class"
    >
</body>
</html>
