    <div class="recherche mt-5"></div>
    <div class="affichage mt-5 justify-content-around">

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://fakeimg.pl/300x200/" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $option->name ?></h5>

                <a href="index.php?page=modifyOptions&id=<?= $option->id ?>" class="btn btn-primary">Modifier</a>
                <a href="index.php?page=deleteOptions&id=<?= $option->id ?>" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
    </div>