    <div class="container mt-5">
    <form action="index.php?page=saveModifyOptions&id=<?= $option->id ?>" method="POST">
        <div class="form-group">
            <label for="name">Titre</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $option->name ?>">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
    </div>