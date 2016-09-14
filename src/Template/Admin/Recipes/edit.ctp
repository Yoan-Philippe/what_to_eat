<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recipe->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Recipes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ambiences'), ['controller' => 'Ambiences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ambience'), ['controller' => 'Ambiences', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recipes form large-9 medium-8 columns content">
    <?= $this->Form->create($recipe, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Recipe') ?></legend>
        <?php
            echo $this->Form->input('title');


            echo $this->Form->input('m_image', [
                'label' => [
                    'escape' => false,
                    'text' => __("Photo") . ' <small>(' . __("format .jpg") . ')</small>'
                ],
                'type' => 'file',
                'templates' => [
                    'file' => '<div class="wrap-file"><input type="file" accept=".jpg" name="{{name}}"{{attrs}}></div>',
                    'label' => '<label{{attrs}}>{{text}}</label>',
                ]
            ]);

            /*echo '<figure class="user-picture round-image">';
                echo '<img src="'.$recipeImage.'">';
            echo '</figure>';*/


            echo $this->Form->input('delete_image', [
                'label' => __("Supprimer la photo"),
                'type' => 'checkbox',
                'templates' => [
                    'nestingLabel' => '{{input}}<label{{attrs}}>{{text}}</label>'
                ]
            ]);


            echo $this->Form->input('description');
            echo $this->Form->input('link');
            echo $this->Form->input('ambiences._ids', ['options' => $ambiences]);
            echo $this->Form->input('categories._ids', ['options' => $categories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
