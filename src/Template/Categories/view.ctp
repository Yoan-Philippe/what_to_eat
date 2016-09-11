<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?= $this->element('Sidebar/left-nav'); ?>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->title) ?></h3>

    <div class="related">
        <h4><?= __('Recettes associées') ?></h4>
        <?php if (!empty($category->recipes)): ?>
            <?php foreach ($category->recipes as $recipes): ?>
                <h5><?= h($recipes->title) ?></h5>
                <p><?= h($recipes->description) ?></p>
                <?= $this->Html->link(__('En savoir plus'), $recipes->link , ['target' => '_blank']) ?>
                <?= $this->Html->link(__('View'), ['controller' => 'Recipes', 'action' => 'view', $recipes->id]) ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>