<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?= $this->element('Sidebar/left-nav'); ?>
</nav>
<div class="ambiences index large-9 medium-8 columns content">
    <h3><?= __('Ambiences') ?></h3>
    <?php foreach ($ambiences as $ambience): ?>
        <p><?= h($ambience->title) ?></p>
        <?= $this->Html->link(__('View'), ['action' => 'view', $ambience->id]) ?>
        <?= $this->Html->link(__('Edit'), ['prefix' => 'admin', 'action' => 'edit', $ambience->id]) ?>
    <?php endforeach; ?>
</div>
