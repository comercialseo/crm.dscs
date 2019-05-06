<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppProductos Model
 *
 * @property \App\Model\Table\AppDepartamentosTable|\Cake\ORM\Association\BelongsTo $AppDepartamentos
 *
 * @method \App\Model\Entity\AppProducto get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppProducto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppProducto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppProducto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppProducto|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppProducto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppProducto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppProducto findOrCreate($search, callable $callback = null, $options = [])
 */
class AppProductosTable extends Table
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

        $this->setTable('app_productos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppDepartamentos', [
            'foreignKey' => 'app_departamentos_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('AppFacturasLineas', [
            'foreignKey' => 'fl_productos_id',
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
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de Producto igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('pr_nombre')
            ->minLength('pr_nombre', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('pr_nombre', 50, __('No puede contener más de 50 caracteres'))
            ->requirePresence('pr_nombre', 'create')
            ->notEmpty('pr_nombre', __('Tienes que rellenar este campo...'))
            ->add('pr_nombre', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('El nombre ya existe en la base de datos, por favor escoge otro distinto...')]);

        $validator
            ->scalar('pr_descripcion')
            ->allowEmpty('pr_descripcion');

        $validator
            ->scalar('pr_tipo')
            ->requirePresence('pr_tipo', 'create')
            ->notEmpty('pr_tipo', __('Tienes que rellenar este campo...'));

        $validator
            ->decimal('pr_base_imponible')
            ->requirePresence('pr_base_imponible', 'create')
            ->notEmpty('pr_base_imponible', __('Tienes que rellenar este campo...'));

        $validator
            ->dateTime('pr_creacion')
            ->allowEmpty('pr_creacion');

        $validator
            ->dateTime('pr_modificacion')
            ->allowEmpty('pr_modificacion');

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
        $rules->add($rules->isUnique(['pr_nombre']));
        $rules->add($rules->existsIn(['app_departamentos_id'], 'AppDepartamentos'));

        return $rules;
    }
}
