<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?= $this->element('Sidebar/left-nav'); ?>
</nav>
<div class="recipes view large-9 medium-8 columns content">
    <h2><?= h($recipe->title) ?></h2>

    <?php if($recipe->link): ?>
        <a target="_blank" href="<?= $recipe->link ?>">En savoir plus</a>
    <?php endif; ?>

    <div class="description">
        <?= $this->Text->autoParagraph(h($recipe->description)); ?>
    </div>

    <div class="related">
        <h3><?= __('Ambiences') ?></h3>
        <?php if (!empty($recipe->ambiences)): ?>
            <?php foreach ($recipe->ambiences as $ambiences): ?>
                <p><?= h($ambiences->title) ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="related">
        <h3><?= __('Categories') ?></h3>
        <?php if (!empty($recipe->categories)): ?>
            <?php foreach ($recipe->categories as $categories): ?>
                <p><?= h($categories->title) ?></p>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>

    <p><?= $this->Html->link(__('Edit'), ['prefix' => 'admin', 'action' => 'edit', $recipe->id]) ?></p>
</div>