<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Blog</title>
</head>

<body>
    <?php if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) : ?>
        <p>Bienvenue, <?= $_SESSION['username']; ?>! <a href="/monblog/auth/logout">Se déconnecter</a></p>
    <?php else : ?>
        <p><a href="/monblog/auth/login">Se connecter</a></p>
    <?php endif; ?>

    <h1>Liste des billets</h1>
    <ul>
        <?php foreach ($billet as $billet) : ?>
            <li><?= $billet['titre']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>