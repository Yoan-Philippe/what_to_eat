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


        // Add the behaviour and configure any options you want
        $this->addBehavior('Proffer.Proffer', [
            'm_image' => [ 
                //'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
                'dir' => 'm_image_dir',   // The name of the field to store the folder
                'thumbnailSizes' => [
                     '80x80' => [   
                        'w' => 80, 
                        'h' => 80, 
                        'crop' => false,
                    ],
                    '370x370' => [ 
                        'w' => 370, 
                        'h' => 370, 
                        'crop' => false, 
                    ],
                    '80x80-crop' => [  
                        'w' => 80,
                        'h' => 80, 
                        'crop' => true,  
                    ],
                    '370x370-crop' => [ 
                        'w' => 370,
                        'h' => 370, 
                        'crop' => true,  
                    ],
                    '80x80-fit' => [  
                        'w' => 80, 
                        'h' => 80, 
                        'fit' => true,
                    ],
                    '370x370-fit' => [  
                        'w' => 370,
                        'h' => 370,
                        'fit' => true, 
                    ],
                ],
                'thumbnailMethod' => 'Gd'  // Options are Imagick, Gd or Gmagick
            ]
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
            ->allowEmpty('m_image');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('link');

        return $validator;
    }
}
