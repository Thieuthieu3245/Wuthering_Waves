<?php
    $this->layout('template', ['title' => 'Logs']);
?>

<h1>Logs du site</h1>

<form method="post" action="index.php?action=logs" class="form-log">
    <label for="fileName">Sélectionnez un fichier log :</label>
    <select name="fileName" id="fileName" onchange="this.form.submit()">

        <?php foreach ($logs as $log): ?>
            <option value="<?= $log ?>"
                <?= ($selectedFile === $log) ? 'selected' : '' ?>>
                <?= $log ?>
            </option>
        <?php endforeach; ?>

    </select>
</form>

<div class="log-container">
    <?php if ($content): ?>
        <h2>Contenu du fichier : <?= $selectedFile ?></h2>

        <pre class="log-content"><?= $this->e($content) ?></pre>
    <?php endif; ?>
</div>