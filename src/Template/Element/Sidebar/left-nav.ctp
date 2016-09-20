<ul class="side-nav">
	<li><?= $this->Html->link(__('Mes recettes'), ['controller' => 'Recipes', 'action' => 'index']) ?> </li>
	<li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipes', 'action' => 'add']) ?> </li>
	<li><?= $this->Html->link(__('List Ambiences'), ['controller' => 'Ambiences', 'action' => 'index']) ?> </li>
	<li><?= $this->Html->link(__('New Ambience'), ['controller' => 'Ambiences', 'action' => 'add']) ?> </li>
	<li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
	<li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
</ul>