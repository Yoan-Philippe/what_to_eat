<h2><?= __('Accueil') ?></h2>
    <?php foreach ($recipes as $recipe): ?>
    <div class="recipe-box">
        <a href="<?= $this->Url->build(['controller' => 'Recipes', 'action' => 'view', $recipe->id]); ?>">
            <h3><?= h($recipe->title) ?></h3>
            <a target="_blank" href="<?= h($recipe->link) ?>">En savoir plus</a>
            <p class="actions">
                <?= $this->Html->link(__('Éditer'), ['prefix' => 'admin', 'controller'=>'Recipes', 'action' => 'edit', $recipe->id]) ?>
            </p>
        </a>
    </div>
    <?php endforeach; ?>

<?= $this->Util->linkTo('Mes recettes', 'recipes_path') ?>