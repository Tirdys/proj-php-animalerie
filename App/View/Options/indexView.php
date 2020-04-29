    <div class="recherche mt-5"></div>
    <div class="affichage mt-5 justify-content-around">
    <ul>
        <?php foreach ($options as $option) : ?>
            <li><a href="index.php?page=singleOptions&id=<?= $option->id ?>"><?= $option->name ?></a></li>
        <?php endforeach ?>
    </ul>
    </div>