<?php 
if($recipes): ?>
	<h2><b><?= count($recipes) ?></b> <?= __dn('cake', 'résultat', 'résultats', count($recipes)) ?> pour "<?= $searchQuery ?>"</h2>
	<?php foreach ($recipes as $recipe): ?>
		<a href="<?= $this->Url->build(['controller' => 'Recipes', 'action' => 'view', $recipe->id]); ?>">
		<?php $title = str_ireplace($searchQuery, '<b>' . $searchQuery .'</b>', $recipe->title); ?>
			<h3><?= html_ucfirst($title) ?></h3>
			<?php if($recipe->description): ?>
				<p><?= str_ireplace($searchQuery, '<b>' . $searchQuery .'</b>', $recipe->description) ?></p>
			<?php endif; ?>
		</a>
	<?php endforeach; ?>
<?php else: ?>
	<p>Aucune recette trouvée :(</p>
<?php endif; ?>



<?php // Capitalize first letter
function html_ucfirst($s) {
    return preg_replace_callback('#^((<(.+?)>)*)(.*?)$#', function ($c) {
            return $c[1].ucfirst(array_pop($c));
    }, $s);
} ?>