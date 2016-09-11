<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recipes Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Ambiences
 * @property \Cake\ORM\Association\BelongsToMany $Categories
 *
 * @method \App\Model\Entity\Recipe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Recipe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Recipe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recipe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Recipe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recipe findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RecipesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('recipes');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Ambiences', [
            'foreignKey' => 'recipe_id',
            'targetForeignKey' => 'ambience_id',
            'joinTable' => 'recipes_ambiences'
        ]);
        $this->belongsToMany('Categories', [
            'foreignKey' => 'recipe_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'recipes_categories'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->allowEmpty('image');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('link');

        return $validator;
    }
}
