<div class="container -home" style="margin: 0 auto; width: 80%;">
	<div class="recipes-home" style="float:left; width:30%;">
		<h3>Recettes</h3> <span class="reload">Reload</span>
		<div class="recipes-home-list">
		    <?php foreach ($recipes as $recipe): ?>
		    <div data-js-recipe-id="<?= $recipe->id ?>" class="recipe-box" style="border-radius: 5px; border: 1px solid #ccc; padding:10px; width: 70%; margin-bottom: 8px;">
		        <a href="<?= $this->Url->build(['controller' => 'Recipes', 'action' => 'view', $recipe->id]); ?>">
		            <h4><?= h($recipe->title) ?></h4>
		            <?php if($recipe->link): ?>
		                <?= $this->Html->link(__('En savoir plus'), $recipe->link , ['target' => '_blank']) ?>
		            <?php endif; ?>
		            <p class="actions">
		                <?= $this->Html->link(__('Éditer'), ['prefix' => 'admin', 'controller'=>'Recipes', 'action' => 'edit', $recipe->id]) ?>
		            </p>
		        </a>
		    </div>
		    <?php endforeach; ?>
	    </div>
	</div>

	<div class="categories-home" style="float:left; margin-left:30px; width:30%;">
		<h3>Catégories</h3>
		<?php foreach ($categories as $category): ?>
			<?php if($category->recipes): ?>
			    <div class="category-box" style="border-radius: 5px; border: 1px solid #ccc; padding:10px; width: 70%; margin-bottom: 8px;">
			        <a href="<?= $this->Url->build(['controller' => 'categories', 'action' => 'view', $category->id]); ?>">
			            <h4><?= h($category->title) ?></h4>
			        </a>
			    </div>
			<?php endif; ?>
	    <?php endforeach; ?>
	</div>

	<div class="ambiences-home" style="float:left; margin-left:30px; width:30%;">
		<h3>Ambiences</h3>
		<?php foreach ($ambiences as $ambience): ?>
			<?php if($ambience->recipes): ?>
			    <div class="ambience-box" style="border-radius: 5px; border: 1px solid #ccc; padding:10px; width: 70%; margin-bottom: 8px;">
			        <a href="<?= $this->Url->build(['controller' => 'ambiences', 'action' => 'view', $ambience->id]); ?>">
			            <h4><?= h($ambience->title) ?></h4>
			        </a>
			    </div>
			<?php endif; ?>
	    <?php endforeach; ?>
	</div>
</div>