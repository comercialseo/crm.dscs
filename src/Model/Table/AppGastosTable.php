<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppGastos Model
 *
 * @property \App\Model\Table\AppProveedoresTable|\Cake\ORM\Association\BelongsTo $AppProveedores
 *
 * @method \App\Model\Entity\AppGasto get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppGasto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppGasto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppGasto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppGasto|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppGasto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppGasto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppGasto findOrCreate($search, callable $callback = null, $options = [])
 */
class AppGastosTable extends Table
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

        $this->setTable('app_gastos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppProveedores', [
            'foreignKey' => 'app_proveedores_id',
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
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de gasto igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('ga_codigo')
            ->minLength('ga_codigo', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('ga_codigo', 100, __('No puede contener más de 100 caracteres'))
            ->allowEmpty('ga_codigo');

        $validator
            ->decimal('ga_iva')
            ->requirePresence('ga_iva', 'create')
            ->add('ga_iva', 'iva', ['rule' => 'decimal', 2, 'message' => __('Inserta un número decimal con dos decimakes. Ej: 21,00')])
            ->notEmpty('ga_iva', __('Tienes que rellenar este campo...'));

        $validator
            ->decimal('ga_irpf')
            ->allowEmpty('ga_irpf');

        $validator
            ->decimal('ga_descuento')
            ->allowEmpty('ga_descuento');

        $validator
            ->decimal('ga_base')
            ->requirePresence('ga_base', 'create')
            ->notEmpty('ga_base', __('Tienes que rellenar este campo...'));

        $validator
            ->decimal('ga_total')
            ->requirePresence('ga_total', 'create')
            ->notEmpty('ga_total', __('Tienes que rellenar este campo...'));

        $validator
            ->scalar('ga_factura')
            ->allowEmpty('ga_factura');

        $validator
            ->scalar('ga_factura_url')
            ->allowEmpty('ga_factura_url');

        $validator
            ->integer('ga_periodo')
            ->requirePresence('ga_periodo', 'create')
            ->minLength('ga_periodo', 1, __('Ha de contener más de 1 caracteres'))
            ->maxLength('ga_periodo', 1, __('No puede contener más de 1 caracteres'))
            ->notEmpty('ga_periodo', __('Tienes que rellenar este campo...'));

        $validator
            ->scalar('ga_comentario')
            ->allowEmpty('ga_comentario');

        $validator
            ->dateTime('ga_creacion')
            ->allowEmpty('ga_creacion');

        $validator
            ->dateTime('ga_modificacion')
            ->allowEmpty('ga_modificacion');

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
        $rules->add($rules->existsIn(['app_proveedores_id'], 'AppProveedores'));

        return $rules;
    }
}
