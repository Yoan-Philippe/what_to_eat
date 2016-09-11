<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?= $this->element('Sidebar/left-nav'); ?>
</nav>
<div class="recipes form large-9 medium-8 columns content">
    <?= $this->Form->create($recipe, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Recipe') ?></legend>
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

            echo $this->Form->input('description');
            echo $this->Form->input('link');
            echo $this->Form->input('ambiences._ids', ['options' => $ambiences]);
            echo $this->Form->input('categories._ids', ['options' => $categories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
