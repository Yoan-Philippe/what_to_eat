<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ambiences Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Recipes
 *
 * @method \App\Model\Entity\Ambience get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ambience newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ambience[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ambience|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ambience patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ambience[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ambience findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AmbiencesTable extends Table
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

        $this->table('ambiences');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Recipes', [
            'foreignKey' => 'ambience_id',
            'targetForeignKey' => 'recipe_id',
            'joinTable' => 'recipes_ambiences'
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

        return $validator;
    }
}
