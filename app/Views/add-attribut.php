<?php
    $this->layout('template',['title'=>$gameName, 'message'=>$message]);
?>

<h1>Ajout d'un attribut</h1>

<form action="index.php?action=add-attribut" method="post" class="form-add-attribut">

    <div class="form-group">
        <label for="type">Type</label>
        <select id="type" name="type" required>
            <option value="element">Élément</option>
            <option value="origin">Origin</option>
            <option value="class">Unit Class</option>
            <option value="Weapon">Arme</option>
        </select>
    </div>

    <div class="form-group">
        <label for="name">Nom de l'attribut</label>
        <input type="text" id="name" name="name" value="" required>
    </div>

    <div class="form-group">
        <label for="urlImg">Image (URL)</label>
        <input type="text" id="urlImg" name="urlImg" value="">
    </div>

    <!-- <div class="form-group" id="color-field" style="display: none;">
        <label for="color">Couleur</label>
        <select id="color" name="color">
            <?php foreach ($listColors as $color): ?>
                <option value="<?= $color->value ?>"><?= $color->name ?></option>
            <?php endforeach; ?>
        </select>
    </div> -->

    <button type="submit" class="btn-submit">
         Ajouter
    </button>

</form>


<script>
document.addEventListener("DOMContentLoaded", () => {
    const typeSelect = document.getElementById("type");
    const colorField = document.getElementById("color-field");

    function updateVisibility() {
        colorField.style.display = (typeSelect.value === "element") ? "block" : "none";
    }

    typeSelect.addEventListener("change", updateVisibility);
    updateVisibility();
});
</script>