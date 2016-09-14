<?= $this->Form->create('Pages', [
    'url' => ['controller' => 'Pages', 'action' => 'search'], 'autocomplete' => 'off'
]) ?>
<fieldset>
    <?= $this->Form->input('search', ['class' => 'search-input', 'placeholder' => 'Search', 'label' => false, 'autocomplete' => 'off']); ?>
</fieldset>
<div class="suggestions"></div>
<?= $this->Form->end() ?>