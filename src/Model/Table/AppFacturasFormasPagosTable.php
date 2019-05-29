<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppFacturasFormasPagos Model
 *
 * @method \App\Model\Entity\AppFacturasFormasPago get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppFacturasFormasPago newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppFacturasFormasPago[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppFacturasFormasPago|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppFacturasFormasPago|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppFacturasFormasPago patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppFacturasFormasPago[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppFacturasFormasPago findOrCreate($search, callable $callback = null, $options = [])
 */
class AppFacturasFormasPagosTable extends Table
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

        $this->setTable('app_facturas_formas_pagos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppFacturas', [
            'foreignKey' => 'app_forma_pago_id',
            'joinType' => 'INNER'
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
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de forma de pago igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('fp_forma')
            ->maxLength('fp_forma', 50)
            ->requirePresence('fp_forma', 'create')
            ->notEmpty('fp_forma')
            ->add('fp_forma', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('fp_comentario')
            ->allowEmpty('fp_comentario');

        $validator
            ->dateTime('fp_creacion')
            ->allowEmpty('fp_creacion');

        $validator
            ->dateTime('fp_modificacion')
            ->allowEmpty('fp_modificacion');

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
        $rules->add($rules->isUnique(['fp_forma']));

        return $rules;
    }
}
