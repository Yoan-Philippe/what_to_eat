<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ambience->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ambience->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ambiences'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Recipes'), ['controller' => 'Recipes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ambiences form large-9 medium-8 columns content">
    <?= $this->Form->create($ambience) ?>
    <fieldset>
        <legend><?= __('Edit Ambience') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('recipes._ids', ['options' => $recipes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
