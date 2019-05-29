<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppFacturas Model
 *
 * @property \App\Model\Table\AppClientesNegociosTable|\Cake\ORM\Association\BelongsTo $AppClientesNegocios
 * @property \App\Model\Table\AppUsuariosTable|\Cake\ORM\Association\BelongsTo $AppUsuarios
 *
 * @method \App\Model\Entity\AppFactura get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppFactura newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppFactura[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppFactura|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppFactura|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppFactura patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppFactura[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppFactura findOrCreate($search, callable $callback = null, $options = [])
 */
class AppFacturasTable extends Table
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

        $this->setTable('app_facturas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppClientesNegocios', [
            'foreignKey' => 'fc_app_negocios_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AppUsuarios', [
            'foreignKey' => 'fc_app_usuarios_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('AppFacturasLineas', [
            'foreignKey' => 'fl_facturas_id',
        ]);

        $this->hasMany('AppFacturasFormasPagos', [
            'foreignKey' => 'app_forma_pago_id',
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
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de factura igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('fc_codigo')
            ->maxLength('fc_codigo', 50)
            ->allowEmpty('fc_codigo')
            ->add('fc_codigo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('fc_periodo')
            ->requirePresence('fc_periodo', 'create')
            ->notEmpty('fc_periodo', __('Tienes que rellenar este campo...'));

        $validator
            ->decimal('fc_iva_estipulado')
            ->requirePresence('fc_iva_estipulado', 'create')
            ->notEmpty('fc_iva_estipulado', __('Tienes que rellenar este campo...'));

        $validator
            ->decimal('fc_iva')
            ->allowEmpty('fc_iva');

        $validator
            ->decimal('fc_irpf_estipulado')
            ->requirePresence('fc_irpf_estipulado', 'create')
            ->notEmpty('fc_irpf_estipulado', __('Tienes que rellenar este campo...'));

        $validator
            ->decimal('fc_irpf')
            ->allowEmpty('fc_irpf');

        $validator
            ->decimal('fc_base_imponible')
            ->allowEmpty('fc_base_imponible');

        $validator
            ->decimal('fc_descuento')
            ->allowEmpty('fc_descuento');

        $validator
            ->decimal('fc_total')
            ->allowEmpty('fc_total');

        $validator
            ->boolean('fc_entregada')
            ->requirePresence('fc_entregada', 'create')
            ->notEmpty('fc_entregada');

        $validator
            ->boolean('fc_abonada')
            ->requirePresence('fc_abonada', 'create')
            ->notEmpty('fc_abonada');

        $validator
            ->scalar('fc_comentarios')
            ->allowEmpty('fc_comentarios');

        $validator
            ->date('fc_fecha_facturacion')
            ->requirePresence('fc_fecha_facturacion', 'create')
            ->notEmpty('fc_fecha_facturacion', __('Tienes que rellenar este campo...'));

        $validator
            ->dateTime('fc_creacion')
            ->allowEmpty('fc_creacion');

        $validator
            ->dateTime('fc_modificacion')
            ->allowEmpty('fc_modificacion');

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
        $rules->add($rules->isUnique(['fc_codigo']));
        $rules->add($rules->existsIn(['fc_app_negocios_id'], 'AppClientesNegocios'));
        $rules->add($rules->existsIn(['fc_app_usuarios_id'], 'AppUsuarios'));
        $rules->add($rules->existsIn(['app_forma_pago_id'], 'AppFacturasFormasPagos'));

        return $rules;
    }
}
