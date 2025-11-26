<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet"href="public/css/main.css"/>
    <meta name="viewport"content="width=device-width, initial-scale=1">
    <title><?= $this->e($title) ?></title>
</head>
<body>
<header>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <a href="index.php">
                    <img src="../public/img/logo.png" alt="Logo du site" class="logo">
                </a>
            </div>

            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?action=add-perso">Ajout Perso</a></li>
                <li><a href="index.php?action=add-attribut">Ajout Attribut</a></li>
                <li><a href="index.php?action=logs">Logs</a></li>
            </ul>
        </div>
    </nav>
    <div class="nav-spacer"></div>
</header>

<!-- #contenu -->
<main id="contenu">
<?php if (isset($message)): ?>
    <div class="global-message <?= $message->getColor() ?>">
        <div class="message-title"><?= $this->e($message->getTitle()) ?></div>
        <div class="message-text"><?= $this->e($message->getMessage()) ?></div>
    </div>
<?php endif; ?>
    <?=$this->section('content')?>
</main>

<footer>

</footer>
</body>
</html>