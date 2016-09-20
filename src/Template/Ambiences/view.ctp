<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?= $this->element('Sidebar/left-nav'); ?>
</nav>
<div class="ambiences view large-9 medium-8 columns content">
    <h3><?= h($ambience->title) ?></h3>

    <div class="related">
        <h4><?= __('Recette associées') ?></h4>
        <?php if (!empty($ambience->recipes)): ?>
            <?php foreach ($ambience->recipes as $recipe): ?>
                <a href="<?= $this->Url->build(['controller' => 'Recipes', 'action' => 'view', $recipe->id]); ?>">
                    <h5><?= h($recipe->title) ?></h5>
                    <p><?= h($recipe->description) ?></p>
                    <?php if($recipe->link): ?>
                        <?= $this->Html->link(__('En savoir plus'), $recipe->link , ['target' => '_blank']) ?>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>