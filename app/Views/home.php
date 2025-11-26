<?php
    $this->layout('template',['title'=>$gameName]);
?>

<h1>Collection <?= $this->e($gameName) ?></h1>

<a class="btn" href="index.php?action=add-perso">Ajouter un personnage</a>

<div class="personnage-grid">
  <?php foreach ($listPersonnage as $perso): ?>
    <div class="personnage-card rarity-<?= $this->e($perso->getRarity()) ?>">
      <img src="<?= $this->e($perso->getUrlImg()) ?>" alt="<?= $this->e($perso->getName()) ?>">
      <div class="info">
        <div class="name"><?= $this->e($perso->getName()) ?></div>

        <div class="subinfo">
          <img class="icon" src="<?= $this->e($perso->getElement()->getUrlImg()) ?>" alt="<?= $this->e($perso->getElement()->getName()) ?>">
          •
          <img class="icon" src="<?= $this->e($perso->getWeapon()->getUrlImg()) ?>" alt="<?= $this->e($perso->getWeapon()->getName()) ?>">
        </div>

        <div class="actions">
          <a class="btn edit" href="index.php?action=edit-perso&id=<?= $perso->getId() ?>">Modifier</a>
          <a class="btn delete" href="index.php?action=del-perso&id=<?= $perso->getId() ?>">Supprimer</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>