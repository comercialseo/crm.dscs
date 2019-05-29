<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppDepartamentos Model
 *
 * @method \App\Model\Entity\AppDepartamento get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppDepartamento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppDepartamento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppDepartamento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppDepartamento|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppDepartamento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppDepartamento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppDepartamento findOrCreate($search, callable $callback = null, $options = [])
 */
class AppDepartamentosTable extends Table
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

        $this->setTable('app_departamentos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('AppProductos', [
            'foreignKey' => 'app_departamentos_id',
        ]);

        $this->hasMany('AppEquipos', [
            'foreignKey' => 'app_departamentos_id',
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
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de departamento igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('dp_departamento')
            ->minLength('dp_departamento', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('dp_departamento', 50, __('No puede contener más de 50 caracteres'))
            ->requirePresence('dp_departamento', 'create')
            ->notEmpty('dp_departamento', __('Tienes que rellenar este campo...'))
            ->add('dp_departamento', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un departamento igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);;

        $validator
            ->scalar('dp_descripcion')
            ->allowEmpty('dp_descripcion');

        $validator
            ->scalar('dp_labores')
            ->minLength('dp_labores', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('dp_labores', 150, __('No puede contener más de 50 caracteres'))
            ->allowEmpty('dp_labores');

        $validator
            ->dateTime('dp_creacion')
            ->allowEmpty('dp_creacion');

        $validator
            ->dateTime('dp_modificacion')
            ->allowEmpty('dp_modificacion');

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
        $rules->add($rules->isUnique(['dp_departamento']));
        return $rules;
    }
}
