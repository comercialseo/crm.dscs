<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppEventos Model
 *
 * @property \App\Model\Table\EvAppUsuariosTable|\Cake\ORM\Association\BelongsTo $EvAppUsuarios
 *
 * @method \App\Model\Entity\AppEvento get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppEvento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppEvento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppEvento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppEvento|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppEvento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppEvento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppEvento findOrCreate($search, callable $callback = null, $options = [])
 */
class AppEventosTable extends Table
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

        $this->setTable('app_eventos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppUsuarios', [
            'foreignKey' => 'ev_app_usuarios_id',
            'joinType' => 'INNER'
        ]);

        $this->addBehavior('Calendar.Calendar', [
            'field' => 'ev_comienzo',
            'endField' => 'ev_final',
            'scope' => ['ev_invisible' => false],
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
            ->scalar('ev_evento')
            ->minLength('ev_evento', 5, __('Ha de contener más de 5 caracteres'))
            ->maxLength('ev_evento', 75, __('No puede contener más de 75 caracteres'))
            ->requirePresence('ev_evento', 'create')
            ->notEmpty('ev_evento', __('Tienes que rellenar este campo...'))
            ->add('ev_evento', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('El evento ya existe en la base de datos, por favor marca otro distinto...')]);

        $validator
            ->scalar('ev_descripcion')
            ->allowEmpty('ev_descripcion');

        $validator
            ->dateTime('ev_comienzo')
            ->requirePresence('ev_comienzo', 'create')
            ->notEmpty('ev_comienzo');

        $validator
            ->dateTime('ev_final')
            ->requirePresence('ev_final', 'create')
            ->notEmpty('ev_final');

        $validator
            ->scalar('ev_prioridad')
            ->requirePresence('ev_prioridad', 'create')
            ->notEmpty('ev_prioridad');

        $validator
            ->dateTime('ev_creacion')
            ->allowEmpty('ev_creacion');

        $validator
            ->dateTime('ev_creacion')
            ->allowEmpty('ev_creacion');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['ev_evento']));
        $rules->add($rules->existsIn(['ev_app_usuarios_id'], 'EvAppUsuarios'));

        return $rules;
    }
}
