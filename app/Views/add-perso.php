<?php
    $isEdit = ($perso->getId() !== null);

    $this->layout('template', [
        'message'=>$message,
        'title' => $isEdit ? 'Modifier un personnage' : 'Ajouter un personnage'
    ]);
?>

<h1><?= $isEdit ? 'Modifier un personnage' : 'Ajouter un personnage' ?></h1>

<form action="index.php?action=<?= $isEdit ? 'edit-perso' : 'add-perso' ?>" method="post" class="form-add-perso">

    <?php if ($isEdit): ?>
        <input type="hidden" id="id" name="id" value="<?= $perso->getId() ?>">
    <?php endif; ?>

    <!-- Nom -->
    <div class="form-group">
        <label for="name">Nom du personnage</label>
        <input  type="text" id="name" name="name" value="<?= $perso->getName() ?>" required>
    </div>

    <!-- Rareté -->
    <div class="form-group">
        <label for="rarity">Rareté</label>
        <select id="rarity" name="rarity" required>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <option value="<?= $i ?>" 
                    <?= $perso->getRarity() == $i ? 'selected' : '' ?>>
                    <?= $i ?> ★
                </option>
            <?php endfor; ?>
        </select>
    </div>

    <!-- Image URL -->
    <div class="form-group">
        <label for="img">Image (URL)</label>
        <input type="text" id="img" name="img" value="<?= $perso->getUrlImg() ?>">
    </div>

    <!-- Élément -->
    <div class="form-group">
        <label for="element">Élément</label>
        <select id="element" name="element" required>
            <?php foreach ($listElements as $el): ?>
                <option value="<?= $el->getId() ?>" <?= $perso->getElement()->getId() == $el->getId() ? 'selected' : '' ?>>
                    <?= $el->getName() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Arme -->
    <div class="form-group">
        <label for="weapon">Arme</label>
        <select id="weapon" name="weapon" required>
            <?php foreach ($listWeapons as $wp): ?>
                <option value="<?= $wp->getId() ?>" <?= $perso->getWeapon()->getId() == $wp->getId() ? 'selected' : '' ?>>
                    <?= $wp->getName() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Origine -->
    <div class="form-group">
        <label for="origin">Origine</label>
        <select id="origin" name="origin" required>
            <?php foreach ($listOrigins as $orig): ?>
                <option value="<?= $orig->getId() ?>" <?= $perso->getOrigin() && $perso->getOrigin()->getId() == $orig->getId() ? 'selected' : '' ?>>
                    <?= $orig->getName() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Unit Class -->
    <div class="form-group">
        <label for="unitclass">Classe</label>
        <select id="unitclass" name="class" required>
            <?php foreach ($listClasses as $cl): ?>
                <option value="<?= $cl->getId() ?>" <?= $perso->getUnitClass()->getId() == $cl->getId() ? 'selected' : '' ?>>
                    <?= $cl->getName() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn-submit">
        <?= $isEdit ? 'Mettre à jour' : 'Ajouter' ?>
    </button>

</form>