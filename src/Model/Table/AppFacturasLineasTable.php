<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppFacturasLineas Model
 *
 * @property \App\Model\Table\AppProductosTable|\Cake\ORM\Association\BelongsTo $AppProductos
 * @property \App\Model\Table\AppClientesNegociosTable|\Cake\ORM\Association\BelongsTo $AppClientesNegocios
 *
 * @method \App\Model\Entity\AppFacturasLinea get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppFacturasLinea newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppFacturasLinea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppFacturasLinea|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppFacturasLinea|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppFacturasLinea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppFacturasLinea[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppFacturasLinea findOrCreate($search, callable $callback = null, $options = [])
 */
class AppFacturasLineasTable extends Table
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

        $this->setTable('app_facturas_lineas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppProductos', [
            'foreignKey' => 'fl_productos_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('AppClientesNegocios', [
            'foreignKey' => 'fl_negocios_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('AppFacturas', [
            'foreignKey' => 'fl_facturas_id'
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
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de línea de factura igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->integer('fl_cantidad')
            ->notEmpty('fl_cantidad', 'create');

        $validator
            ->decimal('fl_subtotal')
            ->notEmpty('fl_subtotal', 'create');

        $validator
            ->dateTime('fl_creacion')
            ->allowEmpty('fl_creacion');

        $validator
            ->dateTime('fl_modificacion')
            ->allowEmpty('fl_modificacion');

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
        $rules->add($rules->existsIn(['fl_productos_id'], 'AppProductos'));
        $rules->add($rules->existsIn(['fl_negocios_id'], 'AppClientesNegocios'));
        $rules->add($rules->existsIn(['fl_facturas_id'], 'AppFacturas'));

        return $rules;
    }
}
