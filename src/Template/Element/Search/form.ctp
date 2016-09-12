<?= $this->Form->create('Pages', [
    'url' => ['controller' => 'Pages', 'action' => 'search']
]) ?>
<fieldset>
    <?= $this->Form->input('search'); ?>
</fieldset>
<?= $this->Form->end() ?>