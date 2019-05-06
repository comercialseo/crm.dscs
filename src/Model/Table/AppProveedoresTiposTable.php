<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppProveedoresTipos Model
 *
 * @property \App\Model\Table\AppProveedoresTable|\Cake\ORM\Association\HasMany $AppProveedores
 *
 * @method \App\Model\Entity\AppProveedoresTipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppProveedoresTipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppProveedoresTipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppProveedoresTipo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppProveedoresTipo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppProveedoresTipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppProveedoresTipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppProveedoresTipo findOrCreate($search, callable $callback = null, $options = [])
 */
class AppProveedoresTiposTable extends Table
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

        $this->setTable('app_proveedores_tipos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('AppProveedores', [
            'foreignKey' => 'app_proveedores_tipo_id'
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
            ->notEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de contacto igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('pt_tipo')
            ->maxLength('pt_tipo', 50)
            ->requirePresence('pt_tipo', 'create')
            ->notEmpty('pt_tipo')
            ->add('pt_tipo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un tipo de proveedor igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

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
        $rules->add($rules->isUnique(['pt_tipo']));
        return $rules;
    }
}
