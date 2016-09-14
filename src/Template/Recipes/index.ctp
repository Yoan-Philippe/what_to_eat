<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?= $this->element('Sidebar/left-nav'); ?>
</nav>
<div class="recipes index large-9 medium-8 columns content">
    <h2><?= __('Repas') ?></h2>
    <p><?= $this->Html->link(__('Ajouter une recette'), ['action' => 'add']) ?></p>
    <?php foreach ($recipes as $recipe): ?>
    <div class="recipe-box">
        <a href="<?= $this->Url->build(['controller' => 'Recipes', 'action' => 'view', $recipe->id]); ?>">
            <h3><?= h($recipe->title) ?></h3>
            <a target="_blank" href="<?= h($recipe->link) ?>">En savoir plus</a>
            <p class="actions">
                <?= $this->Html->link(__('Éditer'), ['prefix' => 'admin', 'action' => 'edit', $recipe->id]) ?>
            </p>
        </a>
    </div>
    <?php endforeach; ?>
</div>
