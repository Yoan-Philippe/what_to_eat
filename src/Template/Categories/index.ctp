<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?= $this->element('Sidebar/left-nav'); ?>
</nav>
<div class="categories index large-9 medium-8 columns content">
    <h3><?= __('Categories') ?></h3>
    <?php foreach ($categories as $category): ?>
        <h4><?= h($category->title) ?></h4>
        <?= $this->Html->link(__('View'), ['action' => 'view', $category->id]) ?>
        <?= $this->Html->link(__('Edit'), ['prefix' => 'admin', 'action' => 'edit', $category->id]) ?>
    <?php endforeach; ?>
</div>
