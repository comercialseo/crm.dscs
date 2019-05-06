<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppClientesNegociosSectores Model
 *
 * @method \App\Model\Entity\AppClientesNegociosSectore get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppClientesNegociosSectore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppClientesNegociosSectore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppClientesNegociosSectore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppClientesNegociosSectore|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppClientesNegociosSectore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppClientesNegociosSectore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppClientesNegociosSectore findOrCreate($search, callable $callback = null, $options = [])
 */
class AppClientesNegociosSectoresTable extends Table
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

        $this->setTable('app_clientes_negocios_sectores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('AppClientesNegocios', [
            'foreignKey' => 'app_cliente_negocio_sector_id',
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de sector de negocio de cliente igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('nt_sector')
            ->maxLength('nt_sector', 50, __('No puede contener más de 50 caracteres'))
            ->requirePresence('nt_sector', 'create')
            ->notEmpty('nt_sector', __('Tienes que rellenar este campo'))
            ->add('nt_sector', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'], __('Ya existe un sector de negocio con el mismo nombre, no pueden estar repetidos en la base de datos'));

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
        $rules->add($rules->isUnique(['nt_sector']));
        return $rules;
    }
}
